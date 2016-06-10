<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */
Route::get ( '/', 'WelcomeController@index' );

Route::get ( '/home', 'WelcomeController@index' );
Route::get ( '/admin', 'UsersController@index' );

Route::get ( '/upload', 'UploadController@index' );
Route::get ( '/getproducts', 'UploadController@getproductbycategoryid' );
Route::post ( '/upload', 'UploadController@upload' );

Route::get ( '/temporarydelete', 'UploadController@temporarydelete' );
Route::post ( '/temporaryupload', 'UploadController@temporaryupload' );

Route::get ( '/admin', 'UsersController@index' );

/* product */
Route::get ( '/productlist', 'ProductController@index' );
Route::get ( '/selectdataforpage', 'ProductController@selectdataforpage' );
Route::post ( '/save', 'ProductController@save' );
Route::get ( '/delete', 'ProductController@delete' );
Route::get ( '/product', 'ProductController@display' );
Route::get ( '/getimageproduct', 'ProductController@getimageproduct' );

/* Genneral */
Route::get ( '/direction', 'InfomationController@getdirection' );
