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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function(){

    //Upload Images
    Route::post('/vacancies/images', [App\Http\Controllers\VacancyController::class, 'images'])->name('vacancies.images');
    Route::post('/vacancies/borrarimagen', [App\Http\Controllers\VacancyController::class, 'borrarimagen'])->name('vacancies.borrarimagen');

    Route::get('/vacancies', [App\Http\Controllers\VacancyController::class, 'index'])->name('vacancies.index');
    Route::get('/vacancies/create', [App\Http\Controllers\VacancyController::class, 'create'])->name('vacancies.create');
    Route::post('/vacancies', [App\Http\Controllers\VacancyController::class, 'store'])->name('vacancies.store');
    Route::get('/vacancies/{vacancy}/edit', [App\Http\Controllers\VacancyController::class, 'edit'])->name('vacancies.edit');
    Route::put('/vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'update'])->name('vacancies.update');
    Route::delete('/vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'destroy'])->name('vacancies.destroy');
    Route::post('/vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'status'] )->name('vacancies.status');

    //Notifications
    Route::get('/notifications', [App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications');
});
//Home Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Categories Page
Route::get('/categories/{category}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');

Route::get('/candidates/{id}', [App\Http\Controllers\CandidateController::class, 'index'])->name('candidates.index');
Route::post('/candidates/store', [App\Http\Controllers\CandidateController::class, 'store'])->name('candidates.store');

//Search
Route::post('/search', [App\Http\Controllers\VacancyController::class, 'search'])->name('vacancies.search');
Route::get('/search/results', [App\Http\Controllers\VacancyController::class, 'results'])->name('vacancies.results');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vacancies/{vacancy}', [App\Http\Controllers\VacancyController::class, 'show'])->name('vacancies.show');


