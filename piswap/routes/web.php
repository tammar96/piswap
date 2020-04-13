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

Route::resource('books', 'BookController');

Route::get('/search', function () {
    return view('welcome');
});

Route::get('/borrows', 'BorrowController@index')->name('borrows');
Route::get('/borrows/create', 'BorrowController@create')->name('borrows.create');
Route::post('/borrows/create', 'BorrowController@store')->name('borrows.store');
Route::delete('/borrows/delete/{id}', 'BorrowController@destroy')->name('borrows.destroy');
Route::get('/borrows/return', 'BorrowController@returnBookForm')->name('borrows.returnForm');



// User content
Route::resource('users', 'UserController');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update')->name('profile.update');

// Invalid url exceptions
Route::get('/notFoundHttpException', 'ErrorController@index404')->name('errors.notFoundHttpException');
Route::get('/invalidArgumentException', 'ErrorController@invalidArgumentException')->name('errors.invalidArgumentException');


Route::get('/api/user/current', 'UserController@getCurrentUserAPI');
Route::get('/api/books', 'BookController@listAPI');
Route::get('/api/books/show/{id}', 'BookController@showAPI')->name('book');
Route::post('/api/reservation/store', 'ReservationController@storeAPI');
Route::get('/api/reservation/show/{id}', 'ReservationController@showAPI')->name('reservation');
Route::get('/api/reservation/cancel/{id}', 'ReservationController@destroyAPI');

