<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShoeController::class, 'index'])->name('home');

Route::get('shoes/{shoe:id}', [ShoeController::class, 'show']);
Route::get('shoes/{shoe:id}/addToCart', [ShoeController::class, 'store']);
Route::get('/placeShoe', [ShoeController::class, 'showPlacing']);
Route::post('/addNewOffer', [ShoeController::class, 'create']);

Route::get('/yourCart', [ShoeController::class, 'showCart']);
Route::get('/{shoe:id}/removeFromCart', [ShoeController::class, 'removeFromCart']);

Route::get('/orderHistory', [OrderController::class, 'index']);
Route::post('/placeOrder', [OrderController::class, 'store']);


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});

// API
Route::get('api/', [ShoeController::class, 'apiIndex']);
Route::get('api/shoe/{shoe:id}', [ShoeController::class, 'apiShow']);
Route::get('api/orders', [OrderController::class, 'apiIndex']);