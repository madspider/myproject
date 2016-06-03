<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',  'WelcomeController@index');

Route::get('/home', 'WelcomeController@index');
Route::get('/admin', 'UsersController@index');



Route::get('/upload', 'UploadController@index');
Route::post('/temporaryupload', 'UploadController@temporaryupload');
Route::get('/temporaryupload', 'UploadController@temporaryupload');

Route::get('/admin', 'UsersController@index');
Route::post('/selectdataforpage', 'UsersController@selectDataForPage');

