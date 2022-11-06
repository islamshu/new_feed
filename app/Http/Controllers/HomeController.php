<?php

namespace App\Http\Controllers;

use App\Models\Sound;
use App\Models\User;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;
use wapmorgan\Mp3Info\Mp3Info;

class HomeController extends Controller
{
    public function rss_feed($id){
        $podcast = DB::table('new_podcasts')->find($id);
        $feed = app("feed");
        $user = DB::table('users')->find($podcast->user_id);
        $owen = DB::table('owen_podcasts')->where('podcast_id',$podcast->id)->first();

        $posts = Sound::where('podcast_id',$owen->id)
            ->get();
    
        /* set your feed's title, description, link, pubdate and language */
        $feed->title = $owen->title;
        $feed->description = $owen->description;
        $feed->logo = 'http://dashboard.arabicreators.com/public/uploads/'.$owen->image;
        $feed->link = 'http://dashboard.arabicreators.com';
        $feed->setDateFormat('datetime'); /* 'datetime', 'timestamp' or 'carbon' */
        $feed->pubdate = now();
        $feed->lang = 'en';
        $feed->icon=$user->name;
        $feed->ga= $user->email;
        $feed->setShortening(true); /* true or false */
        $feed->setTextLimit(100); /* maximum length of description text */
        $posts->each(fn ($post) => $feed->addItem([
            'title' => $post->title,
            'author' => $user->name,
            'url' =>'http://dashboard.arabicreators.com/public/audio/'.$post->sound,
            'link' => 'http://dashboard.arabicreators.com/public/audio/'.$post->sound,
            'pubdate' => $post->created_at,
            'description' => $post->description,
            'content' => $post->title,
        ]));
    
        $feed->ctype = "application/xml";
    
        return $feed->render('rss');
    
    }
    public function media_rss($id){
        $url = route('rss_feed',$id);
        $content = file_get_contents($url);
        $flux = new SimpleXMLElement($content);
        return View::make('rss_media', compact('flux'));
    }
    public function media_rss_by_id($url){
        $content = file_get_contents($url);
        $flux = new SimpleXMLElement($content);
        return View::make('rss_media', compact('flux'));
    }
}
