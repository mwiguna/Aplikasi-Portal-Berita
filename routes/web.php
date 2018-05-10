<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|

Route::get('/', function () {
    return view('welcome');
});

*/

Auth::routes();
Route::get('/home',  'HomeController@index');
Route::get('/',      'MainController@index');
Route::get('/berita/{path}',  'MainController@showBerita');
Route::get('/kategori/{cat}', 'MainController@kategoriBerita');
Route::post('/cari',		  'MainController@cari');

/* -------------- Admin -----------*/

Route::get('/tambah',         'AdminController@tambah');
Route::post('/addPost',       'AdminController@addPost');
Route::post('/editPost/{id}', 'AdminController@editPost');
ROute::get('/daftar',         'AdminController@daftar');
Route::get('/edit/{id}',      'AdminController@edit');
Route::get('/hapus/{id}',	  'AdminController@hapus');
Route::get('/user',           'AdminController@user');
Route::get('/komentar',		  'AdminController@komentar');
Route::get('/hapusUser/{id}',	  'AdminController@hapusUser');

/* -------------- User-----------*/

Route::post('/userInfo', 	'UserController@userInfo');
Route::post('/addComment',  'UserController@addComment');
Route::get('/comment', 		'UserController@comment');
Route::get('/editComment/{id}',    'UserController@editComment');
Route::post('/updateComment/{id}', 'UserController@updateComment');
Route::get('/deleteComment/{id}',  'UserController@deleteComment');
Route::post('/editBiodata', 	   'UserController@editBiodata');
Route::post('/reply',			   'UserController@reply');
Route::post('/like',			   'UserController@like');
Route::post('/unlike',			   'UserController@unlike');
Route::get('/notification', 	   'UserController@notification');


