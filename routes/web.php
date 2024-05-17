<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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

Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
});

require __DIR__.'/auth.php';
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editprofile', [ProfileController::class, 'edit'])->name('editprofile');
Route::post('/editprofile', [ProfileController::class, 'editdata']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
