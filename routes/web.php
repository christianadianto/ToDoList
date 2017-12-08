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

Route::get('/insert_task', 'TaskController@view_insert');

Route::get('/', 'TaskController@index');

Route::get('/view_detail/{id}','TaskController@view_detail');

Route::get('/manage_task','TaskController@index_manage');

Route::post('/insert', 'TaskController@insert');

Route::delete('/delete_task', 'TaskController@delete');

Route::put('/update_task', 'TaskController@update');
