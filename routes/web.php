<?php

use App\Http\Controllers\CoaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// Apakah sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        return view('home');
    });

    Route::resource('coa', CoaController::class);
    Route::post('coa/EditForm', [CoaController::class, 'editForm'])->name('coa.editForm');
});
