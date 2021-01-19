<?php

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

Route::get('/', 'PostsController@index');

Auth::routes();

Route::get('/home', 'PostsController@index');

// ユーザー編集画面(ユーザー詳細よりも先に定義する必要がある。/users/{user_id}と合致してしまうため)
Route::get('/users/edit', 'UsersController@edit');
// ユーザー更新
Route::post('/users/update', 'UsersController@update');

// ユーザー詳細画面
Route::get('/users/{user_id}', 'UsersController@show');

// 投稿新規画面
Route::get('/posts/new', 'PostsController@new')->name('new');

// 投稿新規処理
Route::post('/posts','PostsController@store');

//投稿削除処理
Route::get('/postsdelete/{post_id}', 'PostsController@destroy');
