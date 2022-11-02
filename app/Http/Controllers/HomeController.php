<?php

namespace App\Http\Controllers;

use App\Models\Sound;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function rss_feed($id){
        $user  = User::find($id);
        $feed = app("feed");

        $posts = Sound::where('user_id',$user->id)
            ->get();
    
        /* set your feed's title, description, link, pubdate and language */
        $feed->author=$user->name;
        $feed->title = 'ArabiCreaotr';
        $feed->description = 'ArabiCreaotr';
        $feed->logo = 'https://laracasts.nyc3.cdn.digitaloceanspaces.com/series/thumbnails/build-an-app-with-tdd.png';
        $feed->link = 'https://arabicreators.com';
        $feed->setDateFormat('datetime'); /* 'datetime', 'timestamp' or 'carbon' */
        $feed->pubdate = now();
        $feed->lang = 'en';
        $feed->email=$user->email;

        $feed->setShortening(true); /* true or false */
        $feed->setTextLimit(100); /* maximum length of description text */
    
        $posts->each(fn ($post) => $feed->addItem([
            'title' => $post->title,
            'author' => $user->name,
            'url' => asset('public/audio/'.$post->sound),
            'link' => asset('public/audio/'.$post->sound),
            'pubdate' => $post->created_at,
            'description' => $post->title,
            'content' => $post->title,
        ]));
    
        $feed->ctype = "application/xml";
    
        return $feed->render('rss');
    }
}
