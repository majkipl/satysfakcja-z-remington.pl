<?php

use App\Http\Controllers\BootstrapController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\ApplicationController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThxPageController;
use App\Http\Controllers\WarrantyController;
use App\Http\Middleware\VerifyCsrfTokenForFormSave;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produkty', [ProductController::class, 'index'])->name('products');
Route::get('/kolekcja-manchester-united', [CollectionController::class, 'index'])->name('collection');
Route::get('/gwarancja-i-serwis', [WarrantyController::class, 'index'])->name('warranty');
Route::get('/formularz', [FormController::class, 'index'])->name('form');
Route::get('/formularz/podziekowania/{id}', [ThxPageController::class, 'index'])->name('form.thx');
Route::post('/formularz/zapisz', [FormController::class, 'save'])->middleware(VerifyCsrfTokenForFormSave::class)->name('form.save');

Auth::routes();

Route::middleware(['auth', 'verified'])->group( function () {
    Route::get('/panel', [PanelController::class, 'index'])->name('panel');

    // isAdmin // \App\Providers\AuthServiceProvider
    Route::middleware(['can:isAdmin'])->group( function () {
        Route::get('/panel/zgloszenia', [ApplicationController::class, 'index'])->name('panel.apps');
        Route::get('/panel/zgloszenie/{application}', [ApplicationController::class, 'show'])->name('panel.show');
    });
});
