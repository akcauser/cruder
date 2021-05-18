<?php


/**
 * WEB ROUTES FOR GENERATOR BUİLDER
 */

use Illuminate\Support\Facades\Route;

if (env('APP_ENV') == 'local') {
    Route::get('/builder', function () {
        return view('cruder::builder');
    });

    Route::post('generator', [GenerateController::class, 'generate'])->name('cruder.generate');
}
