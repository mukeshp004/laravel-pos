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


Route::post('login', 'Api\V1\Admin\LoginController@authenticated');

Route::middleware('auth:sanctum')->group(function () {

    Route::namespace('Api\V1\Admin')->group(function () {


        Route::get('products/search', 'ProductController@search');

        Route::apiResources([
            'categories' => 'CategoryController',
            'products' => 'ProductController',
            'purchases' => 'PurchaseController',
            'suppliers' => 'SupplierController',
        ]);
    });
});
