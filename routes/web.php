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

    Route::get('/banque', [\App\Http\Controllers\Settings\BanqueController::class, 'index'])->name('banque');
    Route::get('/banque/add', [\App\Http\Controllers\Settings\BanqueController::class, 'addForm'])->name('banque.add-form');
    Route::post('/banque/add', [\App\Http\Controllers\Settings\BanqueController::class, 'add'])->name('banque.add-form');
    Route::get('/banque/edit/{banque}', [\App\Http\Controllers\Settings\BanqueController::class, 'editForm'])->name('banque.edit-form');
    Route::post('/banque/edit/{banque}', [\App\Http\Controllers\Settings\BanqueController::class, 'edit'])->name('banque.edit-form');
    Route::delete('/banque/edit/{banque}', [\App\Http\Controllers\Settings\BanqueController::class, 'delete'])->name('banque.delete');

    Route::get('/base', [\App\Http\Controllers\Settings\BaseController::class, 'index'])->name('base');
    Route::get('/base/add', [\App\Http\Controllers\Settings\BaseController::class, 'addForm'])->name('base.add-form');
    Route::post('/base/add', [\App\Http\Controllers\Settings\BaseController::class, 'add'])->name('base.add-form');
    Route::get('/base/edit/{base}', [\App\Http\Controllers\Settings\BaseController::class, 'editForm'])->name('base.edit-form');
    Route::post('/base/edit/{base}', [\App\Http\Controllers\Settings\BaseController::class, 'edit'])->name('base.edit-form');
    Route::delete('/base/edit/{base}', [\App\Http\Controllers\Settings\BaseController::class, 'delete'])->name('base.delete');

    Route::get('/typedossier', [\App\Http\Controllers\Settings\TypedossierController::class, 'index'])->name('typedossier');
    Route::get('/typedossier/add', [\App\Http\Controllers\Settings\TypedossierController::class, 'addForm'])->name('typedossier.add-form');
    Route::post('/typedossier/add', [\App\Http\Controllers\Settings\TypedossierController::class, 'add'])->name('typedossier.add-form');
    Route::get('/typedossier/edit/{typedossier}', [\App\Http\Controllers\Settings\TypedossierController::class, 'editForm'])->name('typedossier.edit-form');
    Route::post('/typedossier/edit/{typedossier}', [\App\Http\Controllers\Settings\TypedossierController::class, 'edit'])->name('typedossier.edit-form');
    Route::delete('/typedossier/edit/{typedossier}', [\App\Http\Controllers\Settings\TypedossierController::class, 'delete'])->name('typedossier.delete');

    Route::get('/statutmatrimonial', [\App\Http\Controllers\Settings\StatutmatrimonialController::class, 'index'])->name('statutmatrimonial');
    Route::get('/statutmatrimonial/add', [\App\Http\Controllers\Settings\StatutmatrimonialController::class, 'addForm'])->name('statutmatrimonial.add-form');
    Route::post('/statutmatrimonial/add', [\App\Http\Controllers\Settings\StatutmatrimonialController::class, 'add'])->name('statutmatrimonial.add-form');
    Route::get('/statutmatrimonial/edit/{statutmatrimonial}', [\App\Http\Controllers\Settings\StatutmatrimonialController::class, 'editForm'])->name('statutmatrimonial.edit-form');
    Route::post('/statutmatrimonial/edit/{statutmatrimonial}', [\App\Http\Controllers\Settings\StatutmatrimonialController::class, 'edit'])->name('statutmatrimonial.edit-form');
    Route::delete('/statutmatrimonial/edit/{statutmatrimonial}', [\App\Http\Controllers\Settings\StatutmatrimonialController::class, 'delete'])->name('statutmatrimonial.delete');


});


