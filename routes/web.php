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
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyLocationController;
use App\Http\Controllers\Admin\PropertyStatusController;
use App\Http\Controllers\Admin\PropertyAreaSizeController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\MainPropertyController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\PostController;

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

/////////////////  FrontEnd Routes /////////////////

//Route::get('/',[ContentController::class,'index'])->name('home.main');

Route::group([], function ()
{
Route::get('/about',[AboutController::class,'index'])->name('home.about');

Route::get('/contact',[ContactController::class,'index'])->name('home.contact');

Route::get('/services',[ServicesController::class,'index'])->name('home.services');

Route::get('/agent',[AgentController::class,'index'])->name('home.agent');
Route::get('/main',[ContentController::class,'index'])->name('home.main');

// Route to handle property filtering

Route::get('/filter',[ContentController::class,'filter'])->name('properties.filter');
});




///////// User Data Route///////////////////

Route::get('/user',[UserDataController::class,'index'])->name('user.data');

//Route::get('user/data', 'Admin\UserDataController@index')->name('user.data');

/////////////// Login and Register Routes  ////////////////

Route::get('/',[UserController::class,'index'])->name('login.page');

Route::post('/login',[UserController::class,'login'])->name('login');

Route::get('/register.page',[UserController::class,'showregisterform'])->name('register.page');

Route::post('/store',[UserController::class,'store'])->name('user.store');

Route::get('/logout',[UserController::class,'logout'])->name('logout');


//////////////  Admin Routes ///////////////////


Route::group(['prefix' => 'admin','middleware'=>'admin'], function ()
{
Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');

Route::get('/edit',[AdminDashboardController::class,'edit'])->name('admin.edit');
Route::post('/update', [AdminDashboardController::class,'update'])->name('admin.update');
Route::get('/profile', [AdminDashboardController::class,'profile'])->name('admin.profile');



///////////////////  Category Routes  ///////////////

Route::get('/indexCategory',[CategoryController::class,'index'])->name('index.category');
Route::get('/createCategory',[CategoryController::class,'create'])->name('create.category');
Route::post('/storeCategory',[CategoryController::class,'store'])->name('store.category');
Route::get('/editCategory/{id}',[CategoryController::class,'edit'])->name('edit.category');
Route::post('/updateCategory/{id}',[CategoryController::class,'update'])->name('update.Category');
Route::any('/deleteCategory/{id}',[CategoryController::class,'destroy'])->name('delete.Category');



/////////////////// Location  Routes  ///////////////

Route::get('/indexlocation',[PropertyLocationController::class,'index'])->name('index.location');
Route::get('/createlocation',[PropertyLocationController::class,'create'])->name('create.location');
Route::post('/storelocation',[PropertyLocationController::class,'store'])->name('store.location');
Route::get('/editlocation/{id}',[PropertyLocationController::class,'edit'])->name('edit.location');
Route::post('/updatelocation/{id}',[PropertyLocationController::class,'update'])->name('update.location');
Route::any('/deletelocation/{id}',[PropertyLocationController::class,'destroy'])->name('delete.location');


/////////////////// Status  Routes  ///////////////

Route::get('/indexStatus',[PropertyStatusController::class,'index'])->name('index.Status');
Route::get('/createStatus',[PropertyStatusController::class,'create'])->name('create.Status');
Route::post('/storeStatus',[PropertyStatusController::class,'store'])->name('store.Status');
Route::get('/editStatus/{id}',[PropertyStatusController::class,'edit'])->name('edit.Status');
Route::post('/updateStatus/{id}',[PropertyStatusController::class,'update'])->name('update.Status');
Route::any('/deleteStatus/{id}',[PropertyStatusController::class,'destroy'])->name('delete.Status');


/////////////////// AreaSize  Routes  ///////////////

Route::get('/indexSize',[PropertyAreaSizeController::class,'index'])->name('index.Size');
Route::get('/createSize',[PropertyAreaSizeController::class,'create'])->name('create.Size');
Route::post('/storeSize',[PropertyAreaSizeController::class,'store'])->name('store.Size');
Route::get('/editSize/{id}',[PropertyAreaSizeController::class,'edit'])->name('edit.Size');
Route::post('/updateSize/{id}',[PropertyAreaSizeController::class,'update'])->name('update.Size');
Route::any('/deleteSize/{id}',[PropertyAreaSizeController::class,'destroy'])->name('delete.Size');

/////////////////// Type  Routes  ///////////////

Route::get('/indexType',[PropertyTypeController::class,'index'])->name('index.Type');
Route::get('/createType',[PropertyTypeController::class,'create'])->name('create.Type');
Route::post('/storeType',[PropertyTypeController::class,'store'])->name('store.Type');
Route::get('/editType/{id}',[PropertyTypeController::class,'edit'])->name('edit.Type');
Route::post('/updateType/{id}',[PropertyTypeController::class,'update'])->name('update.Type');
Route::any('/deleteType/{id}',[PropertyTypeController::class,'destroy'])->name('delete.Type');



/////////////////// Post  Routes  ///////////////

Route::get('/indexPost',[PostController::class,'index'])->name('index.Post');
Route::get('/createPost',[PostController::class,'create'])->name('create.Post');
Route::post('/storePost',[PostController::class,'store'])->name('store.Post');
Route::get('/editPost/{id}',[PostController::class,'edit'])->name('edit.Post');
Route::post('/updatePost/{id}',[PostController::class,'update'])->name('update.Post');
Route::any('/deletePost/{id}',[PostController::class,'destroy'])->name('delete.Post');


/////////////////// MainProperty  Routes  ///////////////

Route::get('/indexProperty',[MainPropertyController::class,'index'])->name('index.Property');
Route::get('/createProperty',[MainPropertyController::class,'create'])->name('create.Property');
Route::post('/storeProperty',[MainPropertyController::class,'store'])->name('store.Property');
Route::get('/editProperty/{id}',[MainPropertyController::class,'edit'])->name('edit.Property');
Route::post('/updateProperty/{id}',[MainPropertyController::class,'update'])->name('update.Property');
Route::any('/deleteProperty/{id}',[MainPropertyController::class,'destroy'])->name('delete.Property');


});

Route::get('/Property',[PropertyController::class,'displayProperty'])->name('Property');




