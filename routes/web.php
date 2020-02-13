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

// トップ画面
Route::get('/top', 'UserController@showTop');

// ログイン
Route::post('/login', 'UserController@loginUser');

// ユーザー新規登録画面
Route::get('/user/create', 'UserController@showRegistForm');

Route::post('/user/confirm', 'UserController@confirmRegistUser')->name('user.confirm');

Route::post('/user/complete', 'UserController@registUser')->name('user.complete');

// ログアウト
Route::get('/logout', 'UserController@logoutUser');

// ユーザー削除確認
Route::get('/user/delete/confirm', 'UserController@showConfirmDeleteUser');

Route::get('/user/delete', 'UserController@deleteUser')->name('user.delete');

// スレッド一覧画面
Route::get('/thread/index', 'ThreadController@indexThread')->name('thread.Index');

// スレッド作成
Route::get('/thread/create', 'ThreadController@showCreateThread')->name('thread.create.show');

Route::post('/thread/create', 'ThreadController@createThread')->name('thread.create.send');

// スレッド削除
Route::get('/thread/delete/confirm/{thread_id}', 'ThreadController@showThreadDeleteConfirm')->name('thread.delete.confirm');

Route::get('thread/delete/{thread_id}', 'ThreadController@deleteThread')->name('thread.delete');

Auth::routes();
