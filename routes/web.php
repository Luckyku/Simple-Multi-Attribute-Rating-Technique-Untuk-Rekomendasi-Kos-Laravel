<?php

use App\Http\Controllers\KosController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\SMART;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\SmartController;
use App\Http\Controllers\UserController;
use App\Models\Komentar;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function(){
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/rekomendasi', [SmartController::class, 'index']);

// Route::get('/', function () {
//     return view('index.index');
// })->middleware('auth');
Route::get('/dashboard/check-slug', [KosController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard', KosController::class)->middleware('admin');

// Route::get('/dashboard/checkSlug', [KosController::class, 'checkSlug']);

Route::resource('/rekomendasi-kos', RekomendasiController::class)->middleware('admin');


Route::get('/data-kos', [KosController::class, 'dataKos']);
Route::resource('/data-kriteria', KriteriaController::class)->middleware('admin');

// Route::resource('/data-alternatif', AlternatifController::class)->only('index')->middleware('admin');
// Route::get('/data-perhitungan', function () {
//     return view('index.data-perhitungan');
// });
Route::resource('/users', UserController::class)->except('edit','update')->middleware('admin');


// Route::get('/data-perhitungan', [SMART::class, 'index'])->middleware('admin');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// ======== USERS INTERFACE ===========
Route::resource('/home', HomeController::class)->except('edit', 'update', 'destroy');
// Route::post('/komentar/post', [KomentarController::class, 'store'])->name('komentar.store');
Route::resource('/komentar', KomentarController::class)->except('index', 'edit', 'update', 'show', 'create')->middleware('auth');

// Route::resource('/komentar', KomentarController::class)->except('store', 'update', 'destroy', 'index')->middleware('auth');
// Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar');
