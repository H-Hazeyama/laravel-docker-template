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

Route::get('/todo', 'TodoController@index')->name('todo.index'); // 一覧画面
Route::get('/todo/create', 'TodoController@create')->name('todo.create'); // 新規作成画面へ
Route::post('/todo', 'TodoController@store')->name('todo.store'); // 新規作成処理へ
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show'); // 詳細画面
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit'); // 編集処理へ
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update'); // 更新処理へ