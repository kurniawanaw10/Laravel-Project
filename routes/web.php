<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataMobilController;

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
Route::get('/wisata', [PagesController::class, 'wisata']);
Route::get('/ulasan', [PagesController::class, 'ulasan']);
Route::get('/register', [RegisterController::class, 'regist'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/admin', [PagesController::class, 'admin'])->middleware('admin');
Route::get('/admin/datawisata', [PagesController::class, 'datawisata']);
Route::get('/admin/laporan', [PagesController::class, 'laporan']);

//Function Mobil
Route::resource('/admin/mobil', DataMobilController::class)->middleware('admin');

//Function User
Route::resource('/admin/user', UserController::class)->middleware('admin');

// //Function Rental
Route::get('/rental', [SewaController::class, 'index'])->name('rental');
Route::get('/rental/{id}', [SewaController::class, 'create'])->name('sewa-create');
Route::post('/rental/post', [SewaController::class, 'post'])->name('sewa-post');
Route::post('/rental/store', [SewaController::class, 'store'])->name('sewa-store');
// Route::resource('/rental', SewaController::class)->except('index')->middleware('auth');
// Route::get('/rental/create', RentalController::class)->middleware('auth');
// Route::post('/rental/store', RentalController::class)->middleware('auth');
// Route::get('/rental/create', RentalController::class)->middleware('auth');
// Route::get('/rental/create', RentalController::class)->middleware('auth');