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
Route::get('/top', 'UserController@showTop')->name('top');

// ログイン
Route::post('/login', 'UserController@loginUser')->name('login.send');

Route::get('/login', 'UserController@showTop')->name('login.show');

// ユーザー新規登録画面
Route::get('/user/create', 'UserController@showRegistForm')->name('user.create');

Route::post('/user/confirm', 'UserController@confirmRegistUser')->name('user.confirm');

Route::post('/user/complete', 'UserController@registUser')->name('user.complete');

Route::group(['middleware' => 'auth'], function() {
// ログアウト
    Route::get('/logout', 'UserController@logoutUser')->name('logout');

// ユーザー削除確認
    Route::get('/user/delete/confirm', 'UserController@showConfirmDeleteUser')->name('user.delete.confirm');

    Route::get('/user/delete', 'UserController@deleteUser')->name('user.delete');

// スレッド一覧画面
    Route::get('/thread/index', 'ThreadController@indexThread')->name('thread.Index');

// スレッド作成
    Route::get('/thread/create', 'ThreadController@showCreateThread')->name('thread.create.show');

    Route::post('/thread/create', 'ThreadController@createThread')->name('thread.create.send');

// スレッド削除
    Route::get('/thread/delete/confirm/{thread_id}', 'ThreadController@showThreadDeleteConfirm')->name('thread.delete.confirm');

    Route::get('/thread/delete/{thread_id}', 'ThreadController@deleteThread')->name('thread.delete');

// コメント一覧 //
    Route::get('/thread/comment/{thread_id}', 'CommentController@showCommentIndex')->name('thread.comment');

// コメント作成 //
    Route::get('/thread/comment/create/{thread_id}', 'CommentController@showCommentIndex')->name('thread.comment.create.show');

    Route::post('/thread/comment/create/{thread_id}', 'CommentController@createComment')->name('thread.comment.create.send');

// コメント編集 //
    Route::get('/thread/comment/edit/{comment_id}', 'CommentController@showEditComment')->name('thread.comment.edit.show');

    Route::post('/thread/comment/edit/', 'CommentController@editComment')->name('thread.comment.edit.send');

// コメント削除 //
    Route::get('/thread/comment/delete/confirm/{comment_id}', 'CommentController@showCommentDeleteConfirm')->name('thread.comment.delete.confirm');

    Route::post('/thread/comment/delete', 'CommentController@commentDelete')->name('thread.comment.delete');
});

