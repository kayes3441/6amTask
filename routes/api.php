<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ApiAuthController;

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

//Task 2

Route::post('login',[ApiAuthController::class,'login']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    //Category controller
    Route::resource('category', CategoryController::class);

    Route::get('logout',[ ApiAuthController::class,'logout']);
});
