<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;



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
});

Route::get('/auth/login', function () {
    return view('/auth/login');
});

Route::get('/masyarakat/dashboard', function () {
    return view('/masyarakat/dashboard');
});

Route::get('/masyarakat/pengaduan', function () {
    return view('/masyarakat/pengaduan');
});

Route::get('/petugas/dashboard', function () {
    return view('/petugas/dashboard');
});

Route::get('/petugas/admin', function () {
    return view('/petugas/admin');
});

Route::get('/petugas/report', function () {
    return view('/petugas/report');
});



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_action'])->name('register.action');

Route::get('/masyarakat', [PengaduanController::class, 'index'])->name('masyarakat.dashboard');
Route::get('/masyarakat/create', [PengaduanController::class, 'create'])->name('masyarakat.create');
Route::post('/masyarakat/create', [PengaduanController::class, 'store'])->name('masyarakat.store');
Route::get('/masyarakat/{id}',[PengaduanController::class, 'show'])->name('masyarakat.show');

Route::get('/masyarakat/{id}/edit', [PengaduanController::class, 'edit'])->name('masyarakat.edit');
Route::put('/masyarakat/{id}/edit', [pengaduanController::class, 'update'])->name('masyarakat.update');
Route::delete('/masyarakat/{id}', [PengaduanController::class, 'delete'])->name('masyarakat.delete');

Route::get('/petugas/', [PetugasController::class, 'index'])->name('petugas.dashboard');
Route::get('/petugas/report', [PetugasController::class, 'tampilpengaduan'])->name('petugas.report');
Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
Route::put('/petugas/{id}', [PetugasController::class, 'update']);
Route::delete('/petugas/{id}/delete', [PetugasController::class, 'destroy']);