<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataController;
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




//INI BUAT API
Route::middleware(['role:Member'])->group(function () {

    Route::get('/admin/member/data', [DataController::class, 'memberdata']);
    Route::get('/admin/member/data/{input}', [DataController::class, 'membersearch']);
    Route::get('/admin/event/sort/{id}', [DataController::class, 'eventsort']);
    Route::get('/admin/event/sort/{id}/{search}', [DataController::class, 'eventsortsearch']);
    Route::get('/admin/event/{id}/attendees/get/{search}', [DataController::class, 'eventdatasearch']);
    Route::get('/admin/event/{id}/attendees/get', [DataController::class, 'eventdata']);
    Route::post('/admin/update-attendance', [AdminController::class, 'updateattend']);



});




Route::get('/', [EventController::class, 'index'])->name('home');;

Route::get('/about', function () {
    return view('about');
});


Route::middleware(['role:Member'])->group(function () {
    Route::get('/admin', [AdminController::class, 'analytic']);
    Route::get('/admin/member', [AdminController::class, 'member']);
    Route::get('/admin/analytic', [AdminController::class, 'analytic']);
    Route::get('/admin/event', [AdminController::class, 'event']);
    Route::get('/admin/event/{id}', [AdminController::class, 'eventdetail']);
    Route::get('/admin/event/{id}/attendees', [AdminController::class, 'eventattendees']);


});

Route::get('/review', function () {
    return view('review');
}); 
Route::get('/event/{id}-{slug}', [EventController::class, 'detail']);
Route::get('/survey/{id}-{slug}', [SurveyController::class, 'index']);
Route::post('/event-rsvp', [EventController::class, 'rsvp']);
Route::put('/survey/submit', [SurveyController::class, 'submit']);


require __DIR__.'/auth.php';
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editprofile', [ProfileController::class, 'edit'])->name('editprofile');
Route::post('/editprofile', [ProfileController::class, 'editdata']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
