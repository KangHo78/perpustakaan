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
Route::get('/catalog', 'buku_katalogController@buku_katalog')->name('buku_katalog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/latihan_crud', 'latihan_crudController@index')->name('latihan_crud');
Route::get('/latihan_crud_create', 'latihan_crudController@create')->name('latihan_crud_create');
Route::get('/latihan_crud_save', 'latihan_crudController@save')->name('latihan_crud_save');
Route::get('/latihan_crud_edit', 'latihan_crudController@edit')->name('latihan_crud_edit');
Route::get('/latihan_crud_update', 'latihan_crudController@update')->name('latihan_crud_update');
Route::get('/latihan_crud_hapus', 'latihan_crudController@hapus')->name('latihan_crud_hapus');

Route::get('/user_index', 'userController@index')->name('user_index');
Route::get('/user_create', 'userController@create')->name('user_create');
Route::get('/user_save', 'userController@save')->name('user_save');
Route::get('/user_edit', 'userController@edit')->name('user_edit');
Route::get('/user_update', 'userController@update')->name('user_update');
Route::get('/user_delete', 'userController@delete')->name('user_delete');

Route::get('/previleges_index', 'previlegesController@index')->name('previleges_index');
Route::get('/previleges_create', 'previlegesController@create')->name('previleges_create');
Route::get('/previleges_save', 'previlegesController@save')->name('previleges_save');
Route::get('/previleges_edit', 'previlegesController@edit')->name('previleges_edit');
Route::get('/previleges_update', 'previlegesController@update')->name('previleges_update');
Route::get('/previleges_delete', 'previlegesController@delete')->name('previleges_delete');
