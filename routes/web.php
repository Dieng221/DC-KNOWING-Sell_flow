<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PurchaseController;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::group(['prefix' => 'sales'], function(){
    Route::get('/list', [SalesController::class, 'index'])->name('sales.list');
    Route::get('/create', [SalesController::class, 'create'])->name('sales.create');
    Route::post('/store', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/show/{id}', [SalesController::class, 'show'])->name('sales.show');
    Route::get('/edit/{id}', [SalesController::class, 'edit'])->name('sales.edit');
    Route::post('/update/{id}', [SalesController::class, 'edit'])->name('sales.update');
    Route::get('/delete/{id}', [SalesController::class, 'destroy'])->name('sales.delete');
});

Route::group(['prefix' => 'articles'], function(){
    Route::get('/list', [ArticleController::class, 'index'])->name('articles.list');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/show/{id}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/update/{id}', [ArticleController::class, 'edit'])->name('articles.update');
    Route::get('/delete/{id}', [ArticleController::class, 'destroy'])->name('articles.delete');
});

Route::group(['prefix' => 'clients'], function(){
    Route::get('/list', [ClientController::class, 'index'])->name('clients.list');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/show/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('/update/{id}', [ClientController::class, 'edit'])->name('clients.update');
    Route::get('/delete/{id}', [ClientController::class, 'destroy'])->name('clients.delete');
});

Route::group(['prefix' => 'purchases'], function(){
    Route::get('/list', [PurchaseController::class, 'index'])->name('purchases.list');
    Route::get('/create', [PurchaseController::class, 'create'])->name('purchases.create');
    Route::post('/store', [PurchaseController::class, 'store'])->name('purchases.store');
    Route::get('/show/{id}', [PurchaseController::class, 'show'])->name('purchases.show');
    Route::get('/edit/{id}', [PurchaseController::class, 'edit'])->name('purchases.edit');
    Route::post('/update/{id}', [PurchaseController::class, 'edit'])->name('purchases.update');
    Route::get('/delete/{id}', [PurchaseController::class, 'destroy'])->name('purchases.delete');
});
