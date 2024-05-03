<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminDashboardController;
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
})->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*--------------------------------------
    ADMIN LOGIN ROUTES
------------------------------------- */
    Route::prefix('admin-home')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'adminIndex'])->name('admin.home');
    });

    Route::get('/', 'AdminDashboardController@adminIndex')->name('admin.home');

    /* --------------------------
        MAINTAINS PAGE
    -------------------------- */
    Route::get('/maintains-page/settings', 'MaintainsPageController@maintains_page_settings')->name('admin.maintains.page.settings');
    Route::post('/maintains-page/settings', 'MaintainsPageController@update_maintains_page_settings');


    /*---------------------------
        ADMIN SETTINGS
    ----------------------------*/
    Route::get('/settings', 'AdminDashboardController@admin_settings')->name('admin.profile.settings');
    Route::get('/profile-update', 'AdminDashboardController@admin_profile')->name('admin.profile.update');
    Route::post('/profile-update', 'AdminDashboardController@admin_profile_update');
    Route::get('/password-change', 'AdminDashboardController@admin_password')->name('admin.password.change');
    Route::post('/password-change', 'AdminDashboardController@admin_password_chagne');
    Route::post('/set-static-option', 'AdminDashboardController@admin_set_static_option');
    Route::post('/get-static-option', 'AdminDashboardController@admin_get_static_option');
    Route::post('/update-static-option', 'AdminDashboardController@admin_update_static_option');
    require __DIR__.'/auth.php';
