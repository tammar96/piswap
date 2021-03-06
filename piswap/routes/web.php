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

Route::get('/', function () { return view('welcome'); });

// Authentication
Auth::routes();

Route::get('/search', function () {return view('welcome'); });

// Books
Route::resource('books', 'BookController');
Route::post('/update-book/{isbn}', 'BookController@updateBook')->name('books.update-book');

// Reservations
Route::resource('/reservations', 'ReservationController');
Route::post('/reservations/destroy/{id}', 'ReservationController@destroy')->name('reservations.destroy');
Route::post('/reservations/approve/{id}', 'ReservationController@approve')->name('reservations.approve');


// Borrows
Route::get('/borrows', 'BorrowController@index')->name('borrows');
Route::get('/userborrows', 'BorrowController@userindex')->name('borrows');
Route::get('/borrows/create', 'BorrowController@create')->name('borrows.create');
Route::post('/borrows/destroy/{id}', 'BorrowController@destroy')->name('borrows.destroy');
Route::post('/borrows/create', 'BorrowController@store')->name('borrows.store');
Route::post('/borrows/return/{id}', 'BorrowController@returnBookForm')->name('borrows.returnBookForm');
Route::post('/borrows/prolong/{id}', 'BorrowController@prolong')->name('borrows.prolong');
Route::post('/borrows/userprolong/{id}', 'BorrowController@userprolong')->name('borrows.userprolong');

// User
Route::resource('users', 'UserController');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile/update', 'UserController@update')->name('profile.update');
Route::post('/update-someone/{email}', 'UserController@updateSomeone')->name('users.update-someone');
Route::delete('/destroy-someone/{email}', 'UserController@destroy')->name('users.destroy');

//admin route
Route::get('/admin/{category}/{view}/{someid}', 'UserController@indexAdmin'); // is there better way to register FE routes?
Route::get('/admin/{category}/{view}', 'UserController@indexAdmin');
Route::get('/admin/{view}', 'UserController@indexAdmin');
Route::get('/admin', 'UserController@indexAdmin');

// Invalid url exceptions
Route::get('/notFoundHttpException', 'ErrorController@index404')->name('errors.notFoundHttpException');
Route::get('/invalidArgumentException', 'ErrorController@invalidArgumentException')->name('errors.invalidArgumentException');

Route::get('/api/user/current', 'UserController@getCurrentUserAPI');
Route::get('/api/books', 'BookController@listAPI');
Route::get('/api/books/show/{id}', 'BookController@showAPI')->name('book');
Route::post('/api/reservation/store', 'ReservationController@storeAPI');
Route::get('/api/reservation/show/{id}', 'ReservationController@showAPI')->name('reservation');
Route::get('/api/reservation/cancel/{id}', 'ReservationController@destroyAPI');

