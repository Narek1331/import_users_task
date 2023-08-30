<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::group(['prefix' => 'user'], function () {
    Route::get('/',[UserController::class,'index']);
    Route::get('/rand',[UserController::class,'random']);
    Route::get('/count',[UserController::class,'count']);
    Route::post('/',[UserController::class,'store']);
});
