<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\ContentController;
use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\ServicesController;
use App\Http\Controllers\front\AgentController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserDataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

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

//Route::get('/', function () {
  //  return view('front.Content.content');
//});

/////////////////  User Routes /////////////////

Route::get('/',[ContentController::class,'index'])->name('home.main');

Route::group([], function ()
{
Route::get('/about',[AboutController::class,'index'])->name('home.about');

Route::get('/contact',[ContactController::class,'index'])->name('home.contact');

Route::get('/services',[ServicesController::class,'index'])->name('home.services');

Route::get('/agent',[AgentController::class,'index'])->name('home.agent');
});


//////////////  Admin Routes ///////////////////


Route::group(['prefix' => 'admin','middleware'=>'admin'], function ()
{
Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
});

///////// User Data Route///////////////////

Route::get('/user',[UserDataController::class,'index'])->name('user.data');

//Route::get('user/data', 'Admin\UserDataController@index')->name('user.data');

/////////////// Login and Register Routes  ////////////////

Route::get('/admin',[UserController::class,'index'])->name('login.page');

Route::post('/login',[UserController::class,'login'])->name('login');

Route::get('/register.page',[UserController::class,'showregisterform'])->name('register.page');

Route::post('/store',[UserController::class,'store'])->name('user.store');

Route::get('/logout',[UserController::class,'logout'])->name('logout');


///////////////////  Category Routes  ///////////////

Route::get('/indexCategory',[CategoryController::class,'index'])->name('index.category');
Route::get('/createCategory',[CategoryController::class,'create'])->name('create.category');

