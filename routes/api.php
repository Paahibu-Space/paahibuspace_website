<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Stories
    Route::get('/stories', [App\Http\Controllers\Api\V1\StoryController::class, 'index']);
    Route::get('/stories/{slug}', [App\Http\Controllers\Api\V1\StoryController::class, 'show']);
    Route::get('/stories/type/{type}', [App\Http\Controllers\Api\V1\StoryController::class, 'byType']);

    // Team
    Route::get('/team', [App\Http\Controllers\Api\V1\TeamController::class, 'index']);
    Route::get('/team/category/{category}', [App\Http\Controllers\Api\V1\TeamController::class, 'byCategory']);

    // Partners
    Route::get('/partners', [App\Http\Controllers\Api\V1\PartnerController::class, 'index']);

    // Impact Stats
    Route::get('/impact-stats', [App\Http\Controllers\Api\V1\ImpactStatController::class, 'index']);

    // Blog
    Route::get('/blog', [App\Http\Controllers\Api\V1\BlogController::class, 'index']);
    Route::get('/blog/{slug}', [App\Http\Controllers\Api\V1\BlogController::class, 'show']);
    Route::get('/blog/category/{category}', [App\Http\Controllers\Api\V1\BlogController::class, 'byCategory']);
    Route::get('/blog/tag/{tag}', [App\Http\Controllers\Api\V1\BlogController::class, 'byTag']);

    // Public Metadata (for dynamic frontend dropdowns)
    Route::get('/meta/story-types', [App\Http\Controllers\Api\V1\MetaController::class, 'storyTypes']);
    Route::get('/meta/programs', [App\Http\Controllers\Api\V1\MetaController::class, 'programs']);
    Route::get('/meta/blog-categories', [App\Http\Controllers\Api\V1\MetaController::class, 'blogCategories']);
});
