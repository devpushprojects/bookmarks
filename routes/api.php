<?php

use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'bookmarks'], function ($router) {
    Route::get('/', [BookmarkController::class, 'index']);
    Route::get('/{id}', [BookmarkController::class, 'show']);
    Route::post('/', [BookmarkController::class, 'store']);
    Route::put('/{id}', [BookmarkController::class, 'update']);
    Route::delete('/{id}', [BookmarkController::class, 'destroy']);
});
