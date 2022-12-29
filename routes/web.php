<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\DataMobilController;
use App\Http\Controllers\LaporanController;

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
//Authentication
Route::get('/register', [RegisterController::class, 'regist'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Pages
Route::get('/', [PagesController::class, 'home']);
Route::get('/riwayat', [PagesController::class, 'riwayat'])->middleware('auth');
Route::get('/pengaturan', [PagesController::class, 'pengaturan'])->name('pengaturan')->middleware('auth');
Route::get('/pengaturan/{id}/edit', [PagesController::class, 'edit'])->middleware('auth');
Route::put('/pengaturan/{id}', [PagesController::class, 'update'])->name('update-data')->middleware('auth');
Route::post('/riwayat/{upload}', [PagesController::class, 'upload'])->name('upload-bukti')->middleware('auth');
Route::get('/admin', [PagesController::class, 'admin'])->middleware('admin');
Route::get('/riwayat/receipt/{id}', [PagesController::class, 'cetak'])->name('cetak-innvoice')->middleware('auth');


//Funtion Laporan
// Route::get('/laporan/cetak-form', [LaporanController::class, 'cetakform'])->name('cetak-transaksi')->middleware('admin');
Route::get('/laporan/cetak-laporan', [LaporanController::class, 'print'])->name('cetak-laporan')->middleware('admin');
Route::get('/admin/laporan/{id}', [LaporanController::class, 'show'])->name('show-laporan')->middleware('admin');
// Route::get('/admin/laporan/{user_nama?}', [LaporanController::class, 'search'])->name('search')->middleware('admin');
Route::resource('/admin/laporan', LaporanController::class)->middleware('admin');

//Function Mobil
Route::resource('/admin/mobil', DataMobilController::class)->middleware('admin');

//Function User
Route::resource('/admin/user', UserController::class)->middleware('admin');

//Function Wisata
Route::get('/wisata', [WisataController::class, 'post']);
Route::get('/wisata/{wisata}', [WisataController::class, 'show'])->middleware('auth');
Route::get('/admin/wisata', [WisataController::class, 'index'])->name('wisata-index')->middleware('admin');
Route::get('/admin/wisata/create', [WisataController::class, 'create'])->name('wisata-create')->middleware('admin');
Route::post('/admin/wisata/store', [WisataController::class, 'store'])->name('wisata-store')->middleware('admin');
Route::get('/admin/wisata/{wisata}/edit', [WisataController::class, 'edit'])->middleware('admin');
// Route::resource('/admin/wisata', WisataController::class)->middleware('admin');

// //Function Rental
Route::get('/rental', [SewaController::class, 'index'])->name('rental');
Route::get('/rental/pick', [SewaController::class, 'pick'])->name('sewa-mobil')->middleware('auth');
Route::get('/rental/{mobil}', [SewaController::class, 'create'])->name('sewa-create')->middleware('auth');
Route::get('/rental/post/{mobil}', [SewaController::class, 'post'])->name('sewa-post')->middleware('auth');
Route::post('/rental/store/{mobil}', [SewaController::class, 'store'])->name('sewa-store')->middleware('auth');
// Route::resource('/rental', SewaController::class)->except('index')->middleware('auth');
// Route::get('/rental/create', RentalController::class)->middleware('auth');
// Route::post('/rental/store', RentalController::class)->middleware('auth');