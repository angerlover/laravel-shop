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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/index',"Admin\IndexController@index");
Route::get('/admin/menu',"Admin\IndexController@menu");
Route::get('/admin/top',"Admin\IndexController@top");
Route::get('/admin/main',"Admin\IndexController@main");
