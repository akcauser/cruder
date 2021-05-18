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

Route::get('/example', function () {
    return view('cruder::example');
});

Route::get('/builder', function () {
    return view('cruder::builder');
});
Route::get('/builder2', function () {
    return view('cruder::builder2');
});

Route::get('/home', function () {
    return view('cruder::layouts/home_layout');
});

Route::get('/ex', function () {
    return view('cruder::layouts/app');
});

Route::post('generator', [GenerateController::class, 'generate'])->name('cruder.generate');

Route::get('', function () {
    return view('cms.index');
})->name('cms.index');
