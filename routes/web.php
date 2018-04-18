<?php

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


/**
Hardcoded a get logout route, since laravel decided to explicitly ask for post routes.
**/

Route::get('logout', function (){
  Auth::logout();
  return redirect('/');
});

Auth::routes();


Route::get('/', 'HomeController@home')->name('home');
// Route::get('/home', 'HomeController@home')->name('home');
Route::get('/newest', 'HomeController@newest')->name('newest');
Route::get('/teams', 'HomeController@index')->name('teams');
Route::get('/about', 'HomeController@about');
//Route::get('/', 'HomeController@index')->name('news');
Route::get('/trending', 'HomeController@trending')->name('trending');
Route::get('/following', 'HomeController@following')->name('following');

Route::get('settings', 'HomeController@settings');
Route::post('settings', 'HomeController@settings');

Route::get('articles', 'ArticlesController@index');
Route::get('articles/{id}', 'ArticlesController@article');
Route::get('articles/create', 'ArticlesController@add');

Route::post('articles/create', 'ArticlesController@create');

Route::post('change_password', 'HomeController@change_password');

Route::post('new_post', 'PostController@addPost');

Route::post('post/add_comment', 'CommentController@addComment');

Route::get('profile/{username}', 'HomeController@profile');
Route::get('tag/{name}', 'HomeController@tags');

Route::get('post/{id}', 'PostController@post');

Route::get('search/{text}', 'HomeController@search');
Route::post('search/{text}', 'HomeController@search');

Route::get('profile', 'HomeController@profile');
Route::post('profile_avatar', 'HomeController@update_avatar');
Route::post('profile_banner', 'HomeController@update_banner');

Route::get('notifications', 'HomeController@notifications');

Route::post('comment', 'CommentController@comment');

Route::post('like', 'LikeController@like');
Route::post('removelike', 'LikeController@removeLike');

Route::post('removepost', 'PostController@removePost');
Route::get('followuser', 'FollowController@followuser');
Route::post('followuser', 'FollowController@followuser');
Route::post('unfollowuser', 'FollowController@unfollowuser');
Route::get('unfollowuser', 'FollowController@unfollowuser');
