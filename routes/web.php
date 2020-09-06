<?php

use Illuminate\Support\Facades\Route;




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

// API
Route::get('/api/cat', 'ApiController@cat')->name('cat');
Route::get('/api/dog', 'ApiController@dog')->name('dog');

//Twitter
Route::get('twitter', 'TwitterController@index');