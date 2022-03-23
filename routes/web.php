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
/*
Route::get('/', function () {
    return view('home');
});
*/

Route::get('/register', 'UserController@create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::resource('user', 'UserController');

Route::resource('anggota', 'AnggotaController');

Route::resource('dataukt', 'DataUktController');
Route::resource('dataatlet', 'DataAtletController');
Route::resource('dataprestasi', 'DataPrestasiController');

Route::get('/dataprestasi', 'DataPrestasiController@index');

Route::get('/dataatlet', 'DataAtletController@index');

Route::get('/dataukt', 'DataUktController@index');