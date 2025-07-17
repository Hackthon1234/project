<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'index']);
Route::get('/viewproduct/{id}',[PagesController::class, 'viewProduct'])->name('viewproduct');
Route::get('/categoryproducts/{catid}',[PagesController::class, 'categoryproducts'])->name('categoryproducts');
Route::get('/search', [PagesController::class, 'search'])->name('search');

Route::middleware('auth')->group(function(){
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('/mycart', [CartController::class, 'mycart'])->name('mycart');
    Route::get('/cart/{id}/delete', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/checkout/{cartid}', [PagesController::class, 'checkout'])->name('checkout');
    //order
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/store-esewa/{cartid}', [OrderController::class, 'storeEsewa'])->name('order.esewa');
    Route::get('/myorders', [PagesController::class, 'myorders'])->name('myorders');
    Route::post('/orders/{orderid}/cancel', [OrderController::class, 'cancelorder'])->name('order.cancel');
});

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'isadmin'])->name('dashboard');
Route::middleware(['auth', 'isadmin'])->group(function(){

Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/{id}/update',[CategoryController::class,'update'])->name('categories.update');
Route::get('/categories/{id}/delete',[CategoryController::class,'destroy'])->name('categories.destroy');

Route::get('/product',[ProductController::class,'index'])->name('products.index');
Route::get('/product/create',[ProductController::class,'create'])->name('products.create');
Route::post('/product/store',[ProductController::class,'store'])->name('products.store');
Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::post('/product/{id}/update',[ProductController::class,'update'])->name('products.update');
Route::get('/product/{id}/delete',[ProductController::class,'destroy'])->name('products.destroy');

Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/orders/{orderid}/status/{status}/', [OrderController::class, 'updateStatus'])->name('orders.status');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
