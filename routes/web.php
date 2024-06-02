<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QnaController;
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
    Route::get('/admin/download/rsvp/{id}', [DataController::class, 'downloadrsvp']);



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
    Route::get('/admin/event/{id}/edit', [AdminController::class, 'eventedit']);
    Route::post('/admin/event/{id}/edit', [AdminController::class, 'eventeditdata']);
    Route::get('/admin/add/event', [AdminController::class, 'addevent']);
    Route::post('/admin/add/event/draft', [AdminController::class, 'addeventdraft']);
    Route::post('/admin/add/event/create', [AdminController::class, 'addeventcreate']);
    Route::get('/admin/event/{id}/statistic', [AdminController::class, 'eventstat']);
    Route::get('/admin/event/{id}/survey', [AdminController::class, 'eventsurvey']);
    Route::get('/admin/event/{id}/qna', [AdminController::class, 'eventqna']); //YG INI QNA
    Route::post('/admin/show/qr', [AdminController::class, 'qr']);
    Route::post('/admin/add/resource/{id}', [AdminController::class, 'resource']);
    Route::post('/admin/remove/resource/{id}', [AdminController::class, 'resourcerm']);
    
    

});

Route::get('/review', function () {
    return view('review');
}); 
Route::get('/event/{id}-{slug}', [EventController::class, 'detail']);
Route::get('/survey/    ', [SurveyController::class, 'index']);
Route::post('/event-rsvp', [EventController::class, 'rsvp']);
Route::put('/survey/submit', [SurveyController::class, 'submit']);
Route::get('/event/{id}-{slug}/qna', [QnaController::class, 'view']);

require __DIR__.'/auth.php';
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editprofile', [ProfileController::class, 'edit'])->name('editprofile');
Route::post('/editprofile', [ProfileController::class, 'editdata']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
