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

// Routes for handling authentication, e.g. register/login/reset pwd,...
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Routes for handling URLs which are not list in this file
Route::get('/notFoundHttpException', 'ErrorController@index404')->name('errors.notFoundHttpException');
Route::get('/invalidArgumentException', 'ErrorController@invalidArgumentException')->name('errors.invalidArgumentException');

