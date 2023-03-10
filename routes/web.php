<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/sub_categories', SubCategoryController::class);
    Route::resource('/products', ProductController::class);
});
Auth::routes();

