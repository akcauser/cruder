<?php

use Encodeurs\Cruder\Http\Controllers\BuilderController;
use Encodeurs\Cruder\Utils\CruderUtil;
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
    Route::get('cruder/builder', function () {
        return view('cruder::builder');
    })->name("cruder.builder");

    Route::post('cruder/generator', [BuilderController::class, 'generate'])->name('cruder.generate');
}

Route::get('cruder/github', function () {
    return redirect('https://github.com/akcauser/cruder');
})->name('cruder.github');

Route::get('cruder', function () {
    $cruders = CruderUtil::getAllCruder();
    return view('cms.layouts.api_list', compact('cruders'));
})->name('cms.api_list');
