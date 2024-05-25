<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Middleware\AdminMiddleware;


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


Route::get('/', [EventController::class, 'index'])->name('home');;

Route::get('/about', function () {
    return view('about');
});


Route::middleware(['role:Member'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    });
    Route::get('/admin/member', [AdminController::class, 'member']);
    Route::get('/admin/analytic', [AdminController::class, 'analytic']);

});


Route::get('/event/{id}-{slug}', [EventController::class, 'detail']);
Route::post('/event-rsvp', [EventController::class, 'rsvp']);

require __DIR__.'/auth.php';
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editprofile', [ProfileController::class, 'edit'])->name('editprofile');
Route::post('/editprofile', [ProfileController::class, 'editdata']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
