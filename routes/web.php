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

//Pages
Route::get('/', [PagesController::class, 'home']);

Route::get('/admin', [PagesController::class, 'admin'])->middleware('admin');

//Authentication
Route::get('/register', [RegisterController::class, 'regist'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Funtion Laporan
Route::resource('/admin/laporan', LaporanController::class)->middleware('admin');

//Function Mobil
Route::resource('/admin/mobil', DataMobilController::class)->middleware('admin');

//Function User
Route::resource('/admin/user', UserController::class)->middleware('admin');

//Function Wisata
Route::get('/wisata', [WisataController::class, 'post']);
Route::get('/admin/wisata', [WisataController::class, 'index'])->middleware('admin');
Route::get('/admin/wisata/create', [WisataController::class, 'create'])->middleware('admin');
Route::get('/admin/wisata/{wisatum}', [WisataController::class, 'show'])->middleware('auth');
// Route::get('/admin/wisata/create', [WisataController::class, 'create'])->middleware('admin');

// //Function Rental
Route::get('/rental', [SewaController::class, 'index'])->name('rental');
Route::get('/rental/{mobil}', [SewaController::class, 'create'])->name('sewa-create')->middleware('auth');
Route::get('/rental/post/{mobil}', [SewaController::class, 'post'])->name('sewa-post')->middleware('auth');
Route::post('/rental/store/{mobil}', [SewaController::class, 'store'])->name('sewa-store')->middleware('auth');
// Route::resource('/rental', SewaController::class)->except('index')->middleware('auth');
// Route::get('/rental/create', RentalController::class)->middleware('auth');
// Route::post('/rental/store', RentalController::class)->middleware('auth');