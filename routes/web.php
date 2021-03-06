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





//后台首页
Route::get('/admin','AdminController@index');


//用户管理
Route::resource('/user','UserController');



//后台登录
Route::get('/admin/login','LoginController@login');
Route::post('/admin/login','LoginController@dologin');




//前台
Route::get('/Homes','HomeController@index');
Route::get('/index','HomeController@doindex');
Route::get('/nubiaUI','HomeController@nubiaUI');
