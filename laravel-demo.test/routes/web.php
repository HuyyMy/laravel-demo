<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => 'Web'], function () {

    // 默认欢迎页。
    Route::get('/', function () {
        return view('welcome', ['website' => 'Huyy\'s Blog']);
    });

    // 用户登录，注册，找回密码。
    Auth::routes();

    // 默认主页。
    Route::get('/home', 'DefaultsController@index')->name('home');

    // 用户中心
    Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

    // 话题分类
    Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

    // 话题
    Route::resource('topics', 'TopicsController');

    Route::post('upload', 'TopicsController@upload')->name('topics.upload');
});
