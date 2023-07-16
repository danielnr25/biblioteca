<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PassportAuthController;
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


Route::post("register", [PassportAuthController::class, "register"]);
Route::post("login", [PassportAuthController::class, "login"]);

Route::middleware('auth:api')->group(function () {
    Route::get("users", [PassportAuthController::class, "index"]);
    Route::get("users/{id}", [PassportAuthController::class, "show"]);
    Route::post("logout", [PassportAuthController::class, "logout"]);
    Route::apiResource("customers", CustomerController::class);
    Route::apiResource("books", BookController::class);
    Route::apiResource("orders",OrderController::class);
});

Route::apiResource("customers", CustomerController::class);
Route::apiResource("books", BookController::class);
Route::apiResource("orders",OrderController::class);

