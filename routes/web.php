<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\DashboradController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'logincheck']);
Route::get('/register', [RegisterController::class, 'register']);


Route::post('/register', [RegisterController::class, 'savedata']);


Route::post('/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('/fetch-cities', [DropdownController::class, 'fetchCity']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Your protected routes go here
    Route::get('/dashboard', [DashboradController::class, 'dashboard']);
    Route::post('/dashboard', [DashboradController::class, 'dashboardupdate']);
});