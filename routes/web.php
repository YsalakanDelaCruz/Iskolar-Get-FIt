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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/home', 'PostsController');


Route::get('/profile/{username}', 'ProfileController@profile');
Route::get('/profile/{username}/edit', 'ProfileController@edit');



Route::post('/home/addList','PostsController@storeList');
Route::post('/home/deleteList','PostsController@deleteList');

Route::post('/home/weightCal','PostsController@storeWeight');

Route::post('/home/like', 'PostsController@likePost');
Route::post('/home/unlike', 'PostsController@unlikePost');
