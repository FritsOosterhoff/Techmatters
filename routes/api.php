<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('comment', 'HomeController@comment');
Route::post('like', 'HomeController@like');
Route::post('removelike', 'HomeController@removeLike');
Route::post('removepost', 'HomeController@removePost');
Route::get('followuser', 'HomeController@followuser');
Route::post('followuser', 'HomeController@followuser');
Route::post('unfollowuser', 'HomeController@unfollowuser');
Route::get('unfollowuser', 'HomeController@unfollowuser');
