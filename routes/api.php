<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiMainController;
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


Route::post('Login',[ApiUserController::class,'login'])->name('api.login');

//Route::post('login', 'UserController@loginb');

Route::post('Register',[ApiUserController::class,'store'])->name('api.register');


Route::get('main',[ApiMainController::class,'getAlldata'])->name('api.main');

