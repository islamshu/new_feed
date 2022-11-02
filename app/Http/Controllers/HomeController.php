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
        $feed->title = 'ArabiCreaotr';
        $feed->description = 'ArabiCreaotr';
        $feed->logo = 'data:image/png;base64,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';
        $feed->link = 'https://arabicreators.com';
        $feed->setDateFormat('datetime'); /* 'datetime', 'timestamp' or 'carbon' */
        $feed->pubdate = now();
        $feed->lang = 'en';
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
