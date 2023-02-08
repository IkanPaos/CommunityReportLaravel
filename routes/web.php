<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;

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
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('register', [MasyarakatController::class, 'register'])->name('register');
Route::post('register', [MasyarakatController::class, 'register_action'])->name('register.action');
Route::get('login', [MasyarakatController::class, 'login'])->name('login');
Route::post('login', [MasyarakatController::class, 'login_action'])->name('login.action');
Route::get('logout', [MasyarakatController::class, 'logout'])->name('logout');
