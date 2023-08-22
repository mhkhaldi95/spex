<?php

use App\Http\Controllers\Website\AccountController;
use App\Http\Controllers\Website\BrandController;

use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CollectionController;
use App\Http\Controllers\Website\OrderController;
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
    Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');;
    Route::get('cart', [CartController::class, 'index'])->name('site.cart');;
    Route::get('cart/product-remove/{id}', [CartController::class, 'productRemove'])->name('site.cart.product-remove');;

    Route::post('orders/store', [OrderController::class, 'store'])->name('site.order.store');;

    Route::get('my-account', [AccountController::class, 'index'])->name('site.myaccount');;
    Route::post('my-account/update', [AccountController::class, 'update'])->name('site.myaccount.update');;

});

