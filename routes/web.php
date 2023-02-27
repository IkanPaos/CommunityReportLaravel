<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;



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
    return view('/auth/login');
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

// Route::get('/petugas/masyarakat', function () {
//     return view('/petugas/masyarakat');
// });

Route::get('/petugas/admin', function () {
    return view('/petugas/admin');
});

Route::get('/petugas/report', function () {
    return view('/petugas/report');
});



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_action'])->name('register.action');

Route::get('/masyarakat', [PengaduanController::class, 'index'])->name('masyarakat.dashboard')->middleware(['auth','only-masyarakat']);
Route::get('/masyarakat/create', [PengaduanController::class, 'create'])->name('masyarakat.create')->middleware(['auth','only-masyarakat']);
Route::post('/masyarakat/create', [PengaduanController::class, 'store'])->name('masyarakat.store')->middleware(['auth','only-masyarakat']);
Route::get('/masyarakat/{id}',[PengaduanController::class, 'show'])->name('masyarakat.show')->middleware(['auth','only-masyarakat']);

Route::get('/masyarakat/{id}/edit', [PengaduanController::class, 'edit'])->name('masyarakat.edit')->middleware(['auth','only-masyarakat']);
Route::put('/masyarakat/{id}/edit', [pengaduanController::class, 'update'])->name('masyarakat.update');
Route::delete('/masyarakat/{id}', [PengaduanController::class, 'delete'])->name('masyarakat.delete');

Route::get('/petugas/', [PetugasController::class, 'index'])->name('petugas.dashboard')->middleware(['auth','only-petugas']);
Route::get('/petugas/report', [PetugasController::class, 'tampilpengaduan'])->name('petugas.report')->middleware(['auth','only-petugas']);
Route::get('/petugas/admin', [PetugasController::class, 'tampiladmin'])->name('petugas.admin')->middleware(['auth','only-petugas']);
Route::get('/petugas/masyarakat', [PetugasController::class, 'tampilmasyarakat'])->name('petugas.masyarakat')->middleware(['auth','only-petugas']);
Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit')->middleware(['auth','only-petugas']);
Route::put('/petugas/{id}', [PetugasController::class, 'update']);
Route::delete('/petugas/{id}/delete', [PetugasController::class, 'destroy'])->name('delete.report');
Route::delete('/petugas/{id}/deleteadmin', [PetugasController::class, 'deleteadmin']);
Route::delete('/petugas/{nik}/deletemasyarakat', [PetugasController::class, 'deletemasyarakat']);


Route::get('/tanggapan/{id}', [TanggapanController::class, 'create'])->name('tanggapan.create');
Route::post('/tanggapan', [PetugasController::class, 'store'])->name('tanggapan.store');

Route::get('/print-pdf', [PengaduanController::class, 'printPdf'])->name('print.pdf');



