<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    // 'middleware' => 'auth:sanctum'
], function () {
    Route::group(['prefix' => 'sales'], function(){
        // Route::get('/list', [SaleController::class, 'index'])->name('sales.list');
        // Route::get('/create', [SaleController::class, 'create'])->name('sales.create');
        Route::post('/store', [SaleController::class, 'storeAPI'])->name('sales.store');
        // Route::get('/show/{id}', [SaleController::class, 'show'])->name('sales.show');
        // Route::get('/edit/{id}', [SaleController::class, 'edit'])->name('sales.edit');
        // Route::post('/update/{id}', [SaleController::class, 'edit'])->name('sales.update');
        // Route::get('/delete/{id}', [SaleController::class, 'destroy'])->name('sales.delete');
    });

    Route::group(['prefix' => 'purchases'], function(){
        // Route::get('/list', [PurchaseController::class, 'index'])->name('purchases.list');
        // Route::get('/create', [PurchaseController::class, 'create'])->name('purchases.create');
        Route::post('/store', [PurchaseController::class, 'storeAPI'])->name('purchases.store');
        // Route::get('/show/{id}', [PurchaseController::class, 'show'])->name('purchases.show');
        // Route::get('/edit/{id}', [PurchaseController::class, 'edit'])->name('purchases.edit');
        // Route::post('/update/{id}', [PurchaseController::class, 'edit'])->name('purchases.update');
        // Route::get('/delete/{id}', [PurchaseController::class, 'destroy'])->name('purchases.delete');
    });

    Route::group(['prefix' => 'articles'], function(){
        // Route::get('/list', [ArticleController::class, 'index'])->name('articles.list');
        // Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/store', [ArticleController::class, 'storeAPI'])->name('articles.store');
        // Route::get('/show/{id}', [ArticleController::class, 'show'])->name('articles.show');
        // Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
        // Route::post('/update/{id}', [ArticleController::class, 'edit'])->name('articles.update');
        // Route::get('/delete/{id}', [ArticleController::class, 'destroy'])->name('articles.delete');
    });

    Route::group(['prefix' => 'clients'], function(){
        // Route::get('/list', [ClientController::class, 'index'])->name('clients.list');
        // Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/store', [ClientController::class, 'storeAPI'])->name('clients.store');
        // Route::get('/show/{id}', [ClientController::class, 'show'])->name('clients.show');
        // Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
        // Route::post('/update/{id}', [ClientController::class, 'edit'])->name('clients.update');
        // Route::get('/delete/{id}', [ClientController::class, 'destroy'])->name('clients.delete');
    });
});


