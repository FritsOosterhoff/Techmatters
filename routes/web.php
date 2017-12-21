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
//Route::get('/', 'HomeController@index')->name('news');
Route::get('/trending', 'HomeController@trending')->name('trending');
Route::get('/following', 'HomeController@following')->name('following');



Route::post('new_post', 'HomeController@addPost');

Route::post('post/add_comment', 'HomeController@addComment');

Route::get('profile/{username}', 'HomeController@profile');
Route::get('tag/{name}', 'HomeController@tags');

Route::get('post/{id}', 'HomeController@post');

Route::get('search/{text}', 'HomeController@search');
Route::post('search/{text}', 'HomeController@search');

Route::get('profile', 'HomeController@profile');
Route::post('profile', 'HomeController@update_avatar');

Route::post('comment', 'HomeController@comment');
Route::post('like', 'HomeController@like');
Route::post('removelike', 'HomeController@removeLike');
Route::post('removepost', 'HomeController@removePost');
Route::get('followuser', 'HomeController@followuser');
Route::post('followuser', 'HomeController@followuser');
Route::post('unfollowuser', 'HomeController@unfollowuser');
Route::get('unfollowuser', 'HomeController@unfollowuser');
