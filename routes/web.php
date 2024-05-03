<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*--------------------------------------
    Frontend Routes
------------------------------------- */

Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index')->name('homepage');
Route::get('/about', 'App\Http\Controllers\Frontend\FrontendController@showAboutPage')->name('frontend.about');
Route::get('/programs', 'App\Http\Controllers\Frontend\FrontendController@showProgramsPage')->name('frontend.programs');
Route::get('/services', 'App\Http\Controllers\Frontend\FrontendController@showServicesPage')->name('frontend.services');
Route::get('/blogs', 'App\Http\Controllers\Frontend\FrontendController@showBlogsPage')->name('frontend.blogs');
Route::get('/team', 'App\Http\Controllers\Frontend\FrontendController@showTeamPage')->name('frontend.team');
Route::get('/volunteers', 'App\Http\Controllers\Frontend\FrontendController@showVolunteersPage')->name('frontend.volunteers');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
