<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('rss_feed/{id}','HomeController@rss_feed')->name('rss_feed');
Route::get('media_rss/{id}','HomeController@media_rss');
Route::get('rss_link/{url}','HomeController@media_rss_by_id');
