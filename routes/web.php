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

// トップ画面 //
Route::get('/top', 'UserController@showTop')->name('top');

// ログイン //
Route::post('/login', 'UserController@loginUser')->name('login');

// ユーザー新規登録画面 //
Route::get('/user/create', 'UserController@showRegistForm')->name('user.create');

Route::post('/user/confirm', 'UserController@confirmRegistUser')->name('user.confirm');

Route::post('/user/complete', 'UserController@registUser')->name('user.complete');

// ログアウト //
Route::get('/logout', 'UserController@logoutUser')->name('logout');

// ユーザー削除確認 //
Route::get('/user/delete/confirm', 'UserController@showConfirmDeleteUser')->name('user.delete.confirm');

Route::get('/user/delete', 'UserController@deleteUser')->name('user.delete');

// スレッド一覧画面
Route::get('/thread/index', 'ThreadController@indexThread')->name('thread.Index');

Auth::routes();
