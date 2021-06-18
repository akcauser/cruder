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
    Route::get('cruder/builder', [BuilderController::class, 'index'])->name("cruder.builder");
    Route::get('cruder/schema_form', [BuilderController::class, 'schema_form'])->name("cruder.schema_form");
    Route::get('cruder/rollback_form', [BuilderController::class, 'rollback_form'])->name("cruder.rollback_form");

    Route::post('cruder/rollback', [BuilderController::class, 'rollback'])->name('cruder.rollback');
    Route::post('cruder/generate_from_schema', [BuilderController::class, 'schema'])->name('cruder.generate_from_schema');

    Route::post('cruder/generator', [BuilderController::class, 'generate'])->name('cruder.generate');
    Route::get('cruder/tables', [BuilderController::class, 'tables'])->name('cruder.tables');
    Route::get('cruder/models', [BuilderController::class, 'models'])->name('cruder.models');
    Route::get('cruder/tables/{table}/columns', [BuilderController::class, 'columnsByTable'])->name('cruder.columnsByTable');
    Route::get('cruder/models/{model}/columns', [BuilderController::class, 'columnsByModel'])->name('cruder.columnsByModel');
}

Route::get('cruder/github', function () {
    return redirect('https://github.com/akcauser/cruder');
})->name('cruder.github');

Route::get('cruder', function () {
    $cruders = CruderUtil::getAllCruder();
    return view('cruder::home', compact('cruders'));
})->name('cms.api_list');
