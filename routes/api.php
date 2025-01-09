<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PurchaseController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('register', [AuthController::class, 'registerAPI']);
Route::post('login', [AuthController::class, 'loginAPI']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('logout', [AuthController::class, 'logoutAPI']);

    Route::group(['prefix' => 'sales'], function(){
        Route::get('/list', [SaleController::class, 'indexAPI']);
        Route::get('/list/partners/{partner}', [SaleController::class, 'salePartnerAPI']);
        Route::post('/store', [SaleController::class, 'storeAPI']);
        Route::get('/show/{sale}', [SaleController::class, 'showAPI']);
        Route::patch('/update/{sale}', [SaleController::class, 'updateAPI']);
        Route::delete('/delete/{sale}', [SaleController::class, 'destroyAPI']);
    });

    Route::group(['prefix' => 'purchases'], function(){
        Route::get('/list', [PurchaseController::class, 'indexAPI']);
        Route::get('/list/partners/{partner}', [PurchaseController::class, 'purchasePartnerAPI']);
        Route::post('/store', [PurchaseController::class, 'storeAPI']);
        Route::get('/show/{purchase}', [PurchaseController::class, 'showAPI']);
        Route::patch('/update/{purchase}', [PurchaseController::class, 'updateAPI']);
        Route::delete('/delete/{purchase}', [PurchaseController::class, 'destroyAPI']);
    });

    Route::group(['prefix' => 'articles'], function(){
        Route::get('/list', [ArticleController::class, 'indexAPI']);
        Route::post('/store', [ArticleController::class, 'storeAPI']);
        Route::get('/show/{article}', [ArticleController::class, 'showAPI']);
        Route::patch('/update/{article}', [ArticleController::class, 'updateAPI']);
        Route::delete('/delete/{article}', [ArticleController::class, 'destroyAPI']);
    });

    Route::group(['prefix' => 'partners'], function(){
        Route::get('/list', [PartnerController::class, 'indexAPI']);
        Route::post('/store', [PartnerController::class, 'storeAPI']);
        Route::get('/show/{partner}', [PartnerController::class, 'showAPI']);
        Route::patch('/update/{partner}', [PartnerController::class, 'updateAPI']);
        Route::delete('/delete/{partner}', [PartnerController::class, 'destroyAPI']);
    });

    // /api/sales/list => liste des ventes
    // /api/sales/store => création de vente
    // /api/sales/show/{id} => affichage de vente spécifique
    // /api/sales/update/{id} => mise à jour de vente spécifique
    // /api/sales/delete/{id} => suppression de vente spécifique

    // /api/purchases/list => liste des achats
    // /api/purchases/store => création de achat
    // /api/purchases/show/{id} => affichage de achat spécifique
    // /api/purchases/update/{id} => mise à jour de achat spécifique
    // /api/purchases/delete/{id} => suppression de achat spécifique

    // /api/articles/list => liste des articles
    // /api/articles/store => création de article
    // /api/articles/show/{id} => affichage de article spécifique
    // /api/articles/update/{id} => mise à jour de article spécifique
    // /api/articles/delete/{id} => suppression de article spécifique

    // /api/clients/list => liste des clients
    // /api/clients/store => création de client
    // /api/clients/show/{id} => affichage de client spécifique
    // /api/clients/update/{id} => mise à jour de client spécifique
    // /api/clients/delete/{id} => suppression de client spécifique

    // /api/partners/list => liste des partners
    // /api/partners/store => création de partner
    // /api/partners/show/{id} => affichage de partner spécifique
    // /api/partners/update/{id} => mise à jour de partner spécifique
    // /api/partners/delete/{id} => suppression de partner spécifique

    // /api/purchases/list => liste des ventes
    // /api/purchases/store => création de vente
    // /api/purchases/show/{id} => affichage de vente spécifique
    // /api/purchases/update/{id} => mise à jour de vente spécifique
    // /api/purchases/delete/{id} => suppression de vente spécifique

});


