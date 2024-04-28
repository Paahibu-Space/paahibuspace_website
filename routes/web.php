<?php

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