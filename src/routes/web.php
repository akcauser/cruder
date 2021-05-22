<?php

use Akcauser\Cruder\Controllers\GenerateController;
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

/**
 * WEB ROUTES FOR GENERATOR BUİLDER
 */

if (env('APP_ENV') == 'local') {
    Route::get('/builder', function () {
        return view('cruder::builder');
    });

    Route::post('generator', [GenerateController::class, 'generate'])->name('cruder::generate');
}

Route::get('cruder', function () {
    return view('cms.index');
})->name('cms.index');
