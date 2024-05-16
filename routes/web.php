<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
