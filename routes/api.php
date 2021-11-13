<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TempproductController;
use App\Http\Controllers\TempProductController as ControllersTempProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class);
Route::resource('temp-products', TempProductController::class);
Route::put('temp-producted/{id}',[TempproductController::class,"update"]);
// Route::put('temp', TempProductController::class);