<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('configuration')->name('configuration.')->group(function (){

    Route::get('/annee', [\App\Http\Controllers\Settings\AnneeController::class, 'index'])->name('annee');
    Route::get('/annee/add', [\App\Http\Controllers\Settings\AnneeController::class, 'addForm'])->name('annee.add-form');
    Route::post('/annee/add', [\App\Http\Controllers\Settings\AnneeController::class, 'add'])->name('annee.add-form');
    Route::get('/annee/edit/{annee}', [\App\Http\Controllers\Settings\AnneeController::class, 'editForm'])->name('annee.edit-form');
    Route::post('/annee/edit/{annee}', [\App\Http\Controllers\Settings\AnneeController::class, 'edit'])->name('annee.edit-form');
    Route::delete('/annee/edit/{annee}', [\App\Http\Controllers\Settings\AnneeController::class, 'delete'])->name('annee.delete');


});
