<?php

use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\PortController as AdminPortController;
use App\Http\Controllers\admin\PortRefController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\client\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CKEditorController;
use App\Http\Controllers\admin\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthenticationController::class, 'login']);
Route::post('/login', [AuthenticationController::class, 'postLogin']);
Route::get('/logout', [AuthenticationController::class, 'logout']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/dog', [HomeController::class, 'dogPort']);
Route::get('/cat', [HomeController::class, 'catPort']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/policy', [HomeController::class, 'policy']);
Route::get('/port', [HomeController::class, 'port']);
Route::get('/port/{slug}', [HomeController::class, 'portDetail']);
Route::post('/ckEditor', [CKEditorController::class, 'upload'])->name('ckEditor');
Route::get('/autocomplete-search', [HomeController::class, 'autocompleteSearch']);
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', [AccountController::class, 'index']);
    Route::get('/report', [ReportController::class, 'index']);
    Route::get('/report-detail', [ReportController::class, 'detail']);
    Route::resource('account', AccountController::class);
    Route::resource('category', AdminCategoryController::class);
    // Route::resource('product', ProductController::class);
    Route::resource('port', AdminPortController::class);
    Route::get('/port/hightlight/{id}',[ AdminPortController::class,'hightlight']);
    Route::resource('portRef', PortRefController::class);
    Route::post('/uploadImage',[AdminPortController::class,'imageUpload']);
});



