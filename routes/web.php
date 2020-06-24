
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

// Profile
Route::get('/profile', 'userController@profile')->name('profile_index')->middleware('roles');
Route::get('/profile_edit', 'userController@profileedit')->name('profile_edit');
Route::post('/profile_update', 'userController@profileupdate')->name('profile_update');
Route::get('/idcard_print', 'userController@profileprint')->name('profile_print');
Route::get('/forgot_password', 'Auth\ForgotPasswordController@index')->name('forgot_password_index');
Route::get('/change_password', 'Auth\ForgotPasswordController@changepassword')->name('forgot_password');
Route::get('/password_reset', 'Auth\ForgotPasswordController@logout')->name('password_reset');

Route::group(['middleware' => 'roles'], function () {
    // User
    Route::get('/user', 'userController@index')->name('user_index');
    Route::get('/user_create', 'userController@create')->name('user_create');
    Route::get('/user_save', 'userController@save')->name('user_save');
    Route::get('/user_edit', 'userController@edit')->name('user_edit');
    Route::get('/user_update', 'userController@update')->name('user_update');
    Route::get('/user_hapus', 'userController@hapus')->name('user_hapus');
    Route::get('/user_perpanjang', 'userController@perpanjang')->name('user_perpanjang');
    // Previleges
    Route::get('/previleges', 'previlegesController@index')->name('previleges_index');
    Route::get('/previleges_create', 'previlegesController@create')->name('previleges_create');
    Route::get('/previleges_save', 'previlegesController@save')->name('previleges_save');
    Route::get('/previleges_edit', 'previlegesController@edit')->name('previleges_edit');
    Route::get('/previleges_update', 'previlegesController@update')->name('previleges_update');
    Route::get('/previleges_hapus', 'previlegesController@hapus')->name('previleges_hapus');
    // Kategori
    Route::get('/kategori', 'kategoriController@index')->name('kategori_index');
    Route::get('/kategori_create', 'kategoriController@create')->name('kategori_create');
    Route::get('/kategori_save', 'kategoriController@save')->name('kategori_save');
    Route::get('/kategori_edit', 'kategoriController@edit')->name('kategori_edit');
    Route::get('/kategori_update', 'kategoriController@update')->name('kategori_update');
    Route::get('/kategori_hapus', 'kategoriController@hapus')->name('kategori_hapus');
    // Pengarang
    Route::get('/pengarang', 'pengarangController@index')->name('pengarang_index');
    Route::get('/pengarang_create', 'pengarangController@create')->name('pengarang_create');
    Route::get('/pengarang_save', 'pengarangController@save')->name('pengarang_save');
    Route::get('/pengarang_edit', 'pengarangController@edit')->name('pengarang_edit');
    Route::get('/pengarang_update', 'pengarangController@update')->name('pengarang_update');
    Route::get('/pengarang_hapus', 'pengarangController@hapus')->name('pengarang_hapus');
    // Penerbit
    Route::get('/penerbit', 'penerbitController@index')->name('penerbit_index');
    Route::get('/penerbit_create', 'penerbitController@create')->name('penerbit_create');
    Route::get('/penerbit_save', 'penerbitController@save')->name('penerbit_save');
    Route::get('/penerbit_edit', 'penerbitController@edit')->name('penerbit_edit');
    Route::get('/penerbit_update', 'penerbitController@update')->name('penerbit_update');
    Route::get('/penerbit_hapus', 'penerbitController@hapus')->name('penerbit_hapus');
});

Route::get('/buku', 'bukuController@index')->name('buku_index');
Route::get('/buku_create', 'bukuController@create')->name('buku_create');
Route::get('/buku_save', 'bukuController@save')->name('buku_save');
Route::get('/buku_edit', 'bukuController@edit')->name('buku_edit');
Route::get('/buku_update', 'bukuController@update')->name('buku_update');
Route::get('/buku_hapus', 'bukuController@hapus')->name('buku_hapus');


Route::get('/rak_buku', 'rak_bukuController@index')->name('rak_buku_index');
Route::get('/rak_buku_create', 'rak_bukuController@create')->name('rak_buku_create');
Route::get('/rak_buku_save', 'rak_bukuController@save')->name('rak_buku_save');
Route::get('/rak_buku_edit', 'rak_bukuController@edit')->name('rak_buku_edit');
Route::get('/rak_buku_update', 'rak_bukuController@update')->name('rak_buku_update');
Route::get('/rak_buku_hapus', 'rak_bukuController@hapus')->name('rak_buku_hapus');
Route::get('/rak_buku_get_kode', 'rak_bukuController@get_kode')->name('rak_buku_get_kode');

Route::get('/rak_buku_dt_save', 'rak_bukuController@save_dt')->name('rak_buku_dt_save');
Route::get('/rak_buku_dt_delete', 'rak_bukuController@deletes_dt')->name('rak_buku_dt_delete');

Route::get('/fakultas', 'fakultasController@index')->name('fakultas_index');
Route::get('/fakultas_create', 'fakultasController@create')->name('fakultas_create');
Route::get('/fakultas_save', 'fakultasController@save')->name('fakultas_save');
Route::get('/fakultas_edit', 'fakultasController@edit')->name('fakultas_edit');
Route::get('/fakultas_update', 'fakultasController@update')->name('fakultas_update');
Route::get('/fakultas_hapus', 'fakultasController@hapus')->name('fakultas_hapus');


// peminjaman
Route::get('/transaksi_peminjaman', 'transaksi_peminjamanController@index')->name('transaksi_peminjaman_index');
Route::get('/transaksi_peminjaman_create', 'transaksi_peminjamanController@create')->name('transaksi_peminjaman_create');
Route::get('/transaksi_peminjaman_save', 'transaksi_peminjamanController@save')->name('transaksi_peminjaman_save');
Route::get('/transaksi_peminjaman_edit', 'transaksi_peminjamanController@edit')->name('transaksi_peminjaman_edit');
Route::get('/transaksi_peminjaman_update', 'transaksi_peminjamanController@update')->name('transaksi_peminjaman_update');
Route::get('/transaksi_peminjaman_hapus', 'transaksi_peminjamanController@hapus')->name('transaksi_peminjaman_hapus');
Route::get('/transaksi_peminjaman_get_data_buku', 'transaksi_peminjamanController@get_data_buku')->name('transaksi_peminjaman_get_data_buku');
Route::get('/transaksi_peminjaman_get_data_buku_remove', 'transaksi_peminjamanController@get_data_buku_remove')->name('transaksi_peminjaman_get_data_buku_remove');


Route::get('/transaksi_pengembalian', 'transaksi_pengembalianController@index')->name('transaksi_pengembalian_index');
Route::get('/transaksi_pengembalian_create', 'transaksi_pengembalianController@create')->name('transaksi_pengembalian_create');
Route::get('/transaksi_pengembalian_save', 'transaksi_pengembalianController@save')->name('transaksi_pengembalian_save');
Route::get('/transaksi_pengembalian_edit', 'transaksi_pengembalianController@edit')->name('transaksi_pengembalian_edit');
Route::get('/transaksi_pengembalian_update', 'transaksi_pengembalianController@update')->name('transaksi_pengembalian_update');
Route::get('/transaksi_pengembalian_hapus', 'transaksi_pengembalianController@hapus')->name('transaksi_pengembalian_hapus');
Route::get('/transaksi_pengembalian_get_data_peminjaman', 'transaksi_pengembalianController@get_data_peminjaman')->name('transaksi_pengembalian_get_data_peminjaman');
Route::get('/transaksi_pengembalian_get_data_pengembalian', 'transaksi_pengembalianController@get_data_pengembalian')->name('transaksi_pengembalian_get_data_pengembalian');
