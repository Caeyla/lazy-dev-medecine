<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\AdminCrudController;
use \App\Http\Controllers\UserController;
// Route pour login
Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/test', 'test');
Route::view('/', 'login')->name('login');

// Trajet
Route::get('/trajet/add', [\App\Http\Controllers\TrajetController::class, 'initAddDepart']);
Route::post('trajet/performAddDepart', [\App\Http\Controllers\TrajetController::class, 'performAddDepart']);
Route::get('/trajet/list', [\App\Http\Controllers\TrajetController::class, 'list']);
Route::get('/trajet/addArrive/{trajet_id}', [\App\Http\Controllers\TrajetController::class, 'initAddArrive']);
Route::post('/trajet/performAddArrive/{trajet_id}', [\App\Http\Controllers\TrajetController::class, 'performAddArrive']);



// Echeance
Route::get('/echeance/add', [\App\Http\Controllers\EcheanceController::class, 'initAdd']);
Route::post('/echeance/performAdd', [\App\Http\Controllers\EcheanceController::class, 'performAdd']);
Route::get('/echeance/list', [\App\Http\Controllers\EcheanceController::class, 'initList']);

//pdf
Route::get('/pdf/{vehicule_id}', [\App\Http\Controllers\PdfController::class, 'generatePDF']);
// chart
Route::get('/chart', [\App\Http\Controllers\ChartController::class, 'renderChart']);
// Generalise Crud
Route::get('/list/{model}', [AdminCrudController::class, 'initList']);
Route::get('/listuser', [UserController::class, 'initList']);
Route::get('/initForm/{model}', [AdminCrudController::class, 'initInsertForm']);
Route::post('/insert/{model}', [AdminCrudController::class, 'insert']);
Route::get('/initEdit/{model}/{id}', [AdminCrudController::class, 'initUpdateForm']);
Route::post('/edit/{model}/{id}', [AdminCrudController::class, 'edit']);
Route::get('/delete/{model}/{id}', [AdminCrudController::class, 'delete']);
// End Generalise Crud

Route::prefix('login')->group(function () {
    Route::post('/', [LoginController::class, 'login']);
});


// Route pour Admin
Route::prefix('admin')->group(
    function () {
        Route::view('/', 'blank')->name('home');
    }
);
