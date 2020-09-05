<?php

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

Route::get('/', 'PostsController@index')->name('top');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store','show', 'edit', 'update','destroy']]);
Route::resource('comments', 'CommentsController',['only' =>['store']]);

// Route::get('/albums/create', 'AlbumsController@create');
Route::get('/albums', 'AlbumsController@index')->name('album');
Route::post('/albums/store', 'AlbumsController@store')->name('store');
Route::resource('albums', 'AlbumsController',['only' => ['show','create','destroy']]);;



Route::get('/consultation', 'ConsultationController@index')->name('consultation');
Route::resource('consultation', 'ConsultationController', ['only' => ['create', 'store','show', 'edit', 'update','destroy']]);

Route::post('/consultation/comments', 'CommentsConsulController@store')->name('CommentsConsul.store');
// Route::get('/cat', function() {return view('api.catapi');});
Route::get('/cat', 'PostsController@cat');
Route::get('/dog', 'PostsController@dog');
// Route::get('/dog', function() {return view('api.dogapi');});