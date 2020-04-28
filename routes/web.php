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
Route::get('/buku_katalog', 'buku_katalogController@buku_katalog')->name('buku_katalog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/latihan_crud', 'latihan_crudController@index')->name('latihan_crud');
Route::get('/latihan_crud_create', 'latihan_crudController@create')->name('latihan_crud_create');
Route::get('/latihan_crud_save', 'latihan_crudController@save')->name('latihan_crud_save');
Route::get('/latihan_crud_edit', 'latihan_crudController@edit')->name('latihan_crud_edit');
Route::get('/latihan_crud_update', 'latihan_crudController@update')->name('latihan_crud_update');
Route::get('/latihan_crud_hapus', 'latihan_crudController@hapus')->name('latihan_crud_hapus');



