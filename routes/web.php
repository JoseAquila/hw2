<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

//registrazione
Route::get('register', 'App\Http\Controllers\RegisterController@register_form')->name('register');
Route::post('register', 'App\Http\Controllers\RegisterController@do_register');
Route::get('register_email/{email}', 'App\Http\Controllers\RegisterController@checkEmail');
Route::get('register_username/{username}', 'App\Http\Controllers\RegisterController@checkUsername');

//login e logout
Route::get("login", "App\Http\Controllers\LoginController@login_form")->name('login');
Route::get("logout", "App\Http\Controllers\LoginController@logout");
Route::post("login", "App\Http\Controllers\LoginController@do_Login");

//home
Route::get('home', "App\Http\Controllers\HomeController@index")->name('home');
Route::get('profile', "App\Http\Controllers\HomeController@profilo");
Route::get('cat', 'App\Http\Controllers\HomeController@cat')->name('cat');


//new post
Route::get('create_post_view', 'App\Http\Controllers\PostController@view');
Route::post('create_post_view/create_post', 'App\Http\Controllers\PostController@create')->name('create_post'); 

//post feed
Route::get('home/feed/{id?}', 'App\Http\Controllers\FeedController@getPosts')->name('feed');

//likes
Route::post('home/addLike', 'App\Http\Controllers\LikeController@addLike');
Route::post('home/removeLike', 'App\Http\Controllers\LikeController@removeLike');
Route::get('home/likeView/{postid}', 'App\Http\Controllers\LikeController@likeView');

//comments
Route::post('home/addComment', 'App\Http\Controllers\CommentController@addComment')->name('add_comment');
Route::get('home/showComments/{postid}', 'App\Http\Controllers\CommentController@showComments');

//search users
Route::get('searchView', 'App\Http\Controllers\SearchController@view');
Route::post('search', 'App\Http\Controllers\SearchController@search');





