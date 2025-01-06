<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
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
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'sales'], function(){
    Route::get('/list', [SaleController::class, 'index'])->name('sales.list');
    Route::get('/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/store', [SaleController::class, 'store'])->name('sales.store');
    Route::get('/show/{id}', [SaleController::class, 'show'])->name('sales.show');
    Route::get('/edit/{id}', [SaleController::class, 'edit'])->name('sales.edit');
    Route::post('/update/{id}', [SaleController::class, 'edit'])->name('sales.update');
    Route::get('/delete/{id}', [SaleController::class, 'destroy'])->name('sales.delete');
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

Route::group(['prefix' => 'articles'], function(){
    Route::get('/list', [ArticleController::class, 'index'])->name('articles.list');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/show/{id}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/update/{id}', [ArticleController::class, 'edit'])->name('articles.update');
    Route::get('/delete/{id}', [ArticleController::class, 'destroy'])->name('articles.delete');
});

Route::group(['prefix' => 'partners'], function(){
    Route::get('/list', [PartnerController::class, 'index'])->name('partners.list');
    Route::get('/create', [PartnerController::class, 'create'])->name('partners.create');
    Route::post('/store', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('/show/{id}', [PartnerController::class, 'show'])->name('partners.show');
    Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::post('/update/{id}', [PartnerController::class, 'edit'])->name('partners.update');
    Route::get('/delete/{id}', [PartnerController::class, 'destroy'])->name('partners.delete');
});

Route::group(['prefix' => 'profiles'], function(){
    Route::get('/show/{id}', [ProfileController::class, 'show'])->name('profiles.show');
    Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::post('/update/{id}', [ProfileController::class, 'edit'])->name('profiles.update');
    Route::get('/delete/{id}', [ProfileController::class, 'destroy'])->name('profiles.delete');
});
