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

// Route::get('/register', 'UserController@create');
// Route::post('/register', 'UserController@store');

Route::resource('dataatlet', 'DataAtletController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');

Route::resource('dataiuran', 'DataIuranController');

Route::resource('user', 'UserController');

Route::resource('anggota', 'AnggotaController');

Route::resource('dataukt', 'DataUktController');

Route::resource('dataprestasi', 'DataPrestasiController');

Route::resource('kasmasuk', 'KasMasukController');

Route::resource('kaskeluar', 'KasKeluarController');

Route::resource('laporanatlet', 'KasKeluarController');

Route::resource('laporankas', 'KasKeluarController');

Route::resource('laporanspp', 'KasKeluarController');

Route::get('/dataprestasi', 'DataPrestasiController@index');

Route::get('/dataatlet', 'DataAtletController@index');

Route::get('/dataukt', 'DataUktController@index');

Route::get('/dataiuran', 'DataIuranController@index');

Route::get('/kasmasuk', 'KasMasukController@index');

Route::get('/kaskeluar', 'KasKeluarController@index');

Route::get('/cobak', 'DataIuranController@atlet');