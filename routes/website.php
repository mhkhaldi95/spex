<?php

use App\Http\Controllers\Website\BrandController;

use App\Http\Controllers\Website\CollectionController;
use App\Http\Controllers\Website\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('site.brands.index');
});

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', [BrandController::class, 'index'])->name('site.brands.index');;
    Route::get('/{id}/collections', [BrandController::class, 'collections'])->name('site.brands.collections');;
});
Route::group(['prefix' => 'collections'], function () {
    Route::get('/{id}/products', [CollectionController::class, 'products'])->name('site.collections.products');;
});
Route::group(['prefix' => 'products'], function () {
    Route::get('/{id}/show', [ProductController::class, 'show'])->name('site.products.show');;
});
Route::group(['middleware' => ['auth:sanctum']], function () {

});

