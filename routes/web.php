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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profile');
Route::get('/form-daftar', 'HomeController@formdaftar');
Route::get('/list-pasien', 'HomeController@listpasien');
Route::post('/tambah-pasien', 'HomeController@tambahpasien');
Route::get('/tambah-data-pasien/{id}', 'HomeController@tambahdatapasien');
Route::put('/proses-tambah-data/{id}', 'HomeController@prosestambahdata');
Route::get('/hapus-data/{id}', 'HomeController@hapusdata');
Route::get('/proses-data/{id}', 'HomeController@prosesdata');
Route::get('/detail-data/{id}', 'HomeController@detaildata');
