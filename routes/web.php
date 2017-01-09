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
*/

Route::get('/', function () {
    return view('welcome');
});
/*首页*/
Route::get('admin/index','Admin\UserController@index');
/*注册*/
Route::get('admin/reg','Admin\UserController@reg');
Route::post('admin/doreg','Admin\UserController@doReg');
/*个人中心*/
Route::get('admin/profile','Admin\UserController@profile')->middleware('auth');
/*登录*/
Route::get('admin/login','Admin\UserController@login');
Route::post('admin/login','Admin\UserController@dologin');
/*退出*/
Route::get('admin/logout','Admin\UserController@logout');
