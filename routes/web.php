<?php

use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\RestaurantCategoryController;
use App\Http\Controllers\Admin\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
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
Route::view('home','home')->middleware(['verified']);
Route::view('map','map.map')->name('map');

Route::prefix('admin')->middleware(['admin'])->name('admin')->group(function(){
    Route::resource('user', UserController::class);
    Route::resource('restaurant/category',RestaurantCategoryController::class);
    Route::resource('restaurant',RestaurantController::class);
    Route::resource('food/category',FoodCategoryController::class);
    Route::resource('food',FoodController::class);
  

});