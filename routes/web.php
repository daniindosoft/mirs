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

Route::get('/', 'HomeController@dashboard')->name('dashboard');

// Auth::routes();
Auth::routes(['register' => false]);


Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/mirs')->group(function () {
	Route::post('/ajukan', 'ctrlMirs@store');
	Route::post('/approved', 'ctrlMirs@approved');
	Route::get('/get/{id}', 'ctrlMirs@getSingleMirs');
});