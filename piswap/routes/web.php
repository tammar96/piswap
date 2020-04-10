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


Route::resource('books', 'BookController');
//Route::get('/books', 'BookController@index')->name('book');
//Route::get('/books/{id}', 'BookController@show')->name('book');

//Route::get('/profile', 'ProfileController@show')->name('profile');
//Route::get('/book/list', 'BookController@list')->name('profile');
//Route::get('/user/list', 'ProfileController@show')->name('profile');
//Route::get('/book/add', 'BookController@show')->name('profile');
//Route::get('/book/borrow/{id}', 'BorrowController@show')->name('profile');
//Route::get('/user/rentals', 'RentalsController@show')->name('profile');
//Route::get('/admin/rentals', 'RentalsController@show')->name('profile');

Route::get('/notFoundHttpException', 'ErrorController@index404')->name('errors.notFoundHttpException');
Route::get('/invalidArgumentException', 'ErrorController@invalidArgumentException')->name('errors.invalidArgumentException');
