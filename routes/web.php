<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/vacancies', [App\Http\Controllers\VacancyController::class, 'index'])->name('vacancies.index');
    Route::get('/vacancies/create', [App\Http\Controllers\VacancyController::class, 'create'])->name('vacancies.create');
    Route::post('/vacancies', [App\Http\Controllers\VacancyController::class, 'store'])->name('vacancies.store');
    Route::post('/vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'status'] )->name('vacancies.status');

    //Upload Images
    Route::post('/vacancies/images', [App\Http\Controllers\VacancyController::class, 'images'])->name('vacancies.images');
    Route::post('/vacancies/borrarimagen', [App\Http\Controllers\VacancyController::class, 'borrarimagen'])->name('vacancies.borrarimagen');

    //Notifications
    Route::get('/notifications', [App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications');
});

Route::get('/candidates/{id}', [App\Http\Controllers\CandidateController::class, 'index'])->name('candidates.index');
Route::post('/candidates/store', [App\Http\Controllers\CandidateController::class, 'store'])->name('candidates.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'show'])->name('vacancies.show');
