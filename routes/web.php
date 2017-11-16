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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/teams', 'HomeController@index')->name('teams');
Route::get('/connect', 'HomeController@index')->name('connect');
//Route::get('/', 'HomeController@index')->name('news');
Route::get('/community', 'HomeController@index')->name('community');


Route::post('new_post', 'HomeController@addPost');
Route::get('new_post', 'HomeController@addPost');


Route::get('/', function () {
    return view('welcome');
})->name('home');
