<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');
Route::get('/team', function () {
    return view('frontend_view.team');
})->name('team');
Route::get('/about', function () {
    return view('frontend_view.about');
})->name('about');
Route::get('/catalog', 'buku_katalogController@buku_katalog')->name('buku_katalog');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/user', 'userController@index')->name('user_index');
Route::get('/user_save', 'userController@save')->name('user_save');
Route::get('/user_edit', 'userController@edit')->name('user_edit');
Route::get('/user_update', 'userController@update')->name('user_update');
Route::get('/user_hapus', 'userController@hapus')->name('user_hapus');

Route::get('/profile', 'userController@profile')->name('profile_index');

Route::get('/previleges', 'previlegesController@index')->name('previleges_index');
Route::get('/previleges_create', 'previlegesController@create')->name('previleges_create');
Route::get('/previleges_save', 'previlegesController@save')->name('previleges_save');
Route::get('/previleges_edit', 'previlegesController@edit')->name('previleges_edit');
Route::get('/previleges_update', 'previlegesController@update')->name('previleges_update');
Route::get('/previleges_hapus', 'previlegesController@hapus')->name('previleges_hapus');

Route::get('/kategori', 'kategoriController@index')->name('kategori_index');
Route::get('/kategori_create', 'kategoriController@create')->name('kategori_create');
Route::get('/kategori_save', 'kategoriController@save')->name('kategori_save');
Route::get('/kategori_edit', 'kategoriController@edit')->name('kategori_edit');
Route::get('/kategori_update', 'kategoriController@update')->name('kategori_update');
Route::get('/kategori_hapus', 'kategoriController@hapus')->name('kategori_hapus');

Route::get('/pengarang', 'pengarangController@index')->name('pengarang_index');
Route::get('/pengarang_create', 'pengarangController@create')->name('pengarang_create');
Route::get('/pengarang_save', 'pengarangController@save')->name('pengarang_save');
Route::get('/pengarang_edit', 'pengarangController@edit')->name('pengarang_edit');
Route::get('/pengarang_update', 'pengarangController@update')->name('pengarang_update');
Route::get('/pengarang_hapus', 'pengarangController@hapus')->name('pengarang_hapus');

Route::get('/penerbit', 'penerbitController@index')->name('penerbit_index');
Route::get('/penerbit_create', 'penerbitController@create')->name('penerbit_create');
Route::get('/penerbit_save', 'penerbitController@save')->name('penerbit_save');
Route::get('/penerbit_edit', 'penerbitController@edit')->name('penerbit_edit');
Route::get('/penerbit_update', 'penerbitController@update')->name('penerbit_update');
Route::get('/penerbit_hapus', 'penerbitController@hapus')->name('penerbit_hapus');

Route::get('/rak_buku', 'rak_bukuController@index')->name('rak_buku_index');
Route::get('/rak_buku_create', 'rak_bukuController@create')->name('rak_buku_create');
Route::get('/rak_buku_save', 'rak_bukuController@save')->name('rak_buku_save');
Route::get('/rak_buku_edit', 'rak_bukuController@edit')->name('rak_buku_edit');
Route::get('/rak_buku_update', 'rak_bukuController@update')->name('rak_buku_update');
Route::get('/rak_buku_hapus', 'rak_bukuController@hapus')->name('rak_buku_hapus');
