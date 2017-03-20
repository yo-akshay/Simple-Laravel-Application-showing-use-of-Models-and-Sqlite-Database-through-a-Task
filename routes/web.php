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
    return view('task');
});

Route::get('/create_task', function () {
    return view('create_task');
});

Route::get('/decide', "Task_Controller@decide");

Route::get('/insert', "Task_Controller@insert");

Route::get('/update', "Task_Controller@update");

Route::get('/del', "Task_Controller@del");
