<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiMainController;
use App\Http\Controllers\Api\ApiImageController;
use App\Http\Controllers\Api\FilterSearchController;
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

Route::get('image',[ApiImageController::class,'getAllimages'])->name('api.image');


Route::get('location',[FilterSearchController::class,'getLocation'])->name('api.Location');
Route::get('size',[FilterSearchController::class,'getSize'])->name('api.size');
Route::get('post',[FilterSearchController::class,'getPost'])->name('api.post');
Route::get('category',[FilterSearchController::class,'getCategory'])->name('api.category');
Route::get('type',[FilterSearchController::class,'getType'])->name('api.type');

Route::get('post/{id}',[FilterSearchController::class,'getAllPosts'])->name('api.post');

//Route::get('location/{id}',[FilterSearchController::class,'getAlllocation'])->name('api.location');

Route::get('properties',[FilterSearchController::class,'getPropertiesByFilters'])->name('api.properties');

//Route::get('propertiesCategoryandType',[FilterSearchController::class,'getPropertiesByFiltersCategoryandType'])->name('api.propertiesCategoryandType');




