<?php

use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [BookController::class, 'showHomePage'])->name('showHomePage');

Route::get('/category/{id}', [BookController::class, 'findProductByCategory'])->name('searh-book-by-category');

Route::match(['get', 'post'], '/search-book', [BookController::class, 'findProductByName'])->name('searh-book-by-name');

Route::get('product-detail/{id}', [BookController::class, 'getBookDetail'])->name('product-detail');

Route::match(['get', 'post'], 'sign-up', [AuthController::class, 'getRegister'])->name('register');

Route::match(['get', 'post'], 'login', [AuthController::class, 'getLogin'])->name('login');

Route::middleware(['CheckLogin'])->group(function () {
    Route::get('logout', [AuthController::class, 'doLogOut'])->name('logout');

    Route::get('my-profile', [BookController::class, 'showProfile'])->name('show-profile');

    Route::get('my-cart', [CartController::class, 'showMyCart'])->name('show-cart');

    Route::get('my-cart/deliverling', [CartController::class, 'showDeliveRingOrder'])->name('show-deleverling');
    
    Route::get('my-cart/delivered', [CartController::class, 'showOrderHistory'])->name('show-delivered');

    Route::match(['get', 'post'],'add-to-cart/{id}', [BookController::class, 'addToCart'])->name('addToCart');

    Route::match(['get', 'post'],'remove-from-card/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
    
    Route::match(['get', 'post'],'update-profile', [AuthController::class, 'updateProfile'])->name('updateProfile');

    Route::get('my-orders', [OrderController::class, 'myOrder'])->name('show-orders');

    Route::match(['get', 'post'],'add-to-order/{id}', [CartController::class, 'addToOrder'])->name('addToOder');

    Route::match(['get', 'post'],'cancel-order/{id}', [CartController::class, 'unConfirmOrder'])->name('unConfirmOrder');

    Route::match(['get', 'post'],'post-comment/{id}', [CommentController::class, 'postMyComment'])->name('post-comment');

});
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminBookController::class, 'adminDashBoard'])->name('admin');

    Route::get('/delivering', [AdminBookController::class, 'adminDashBoardDeliveringOrder'])->name('admin-delivering');

    Route::get('/delivered', [AdminBookController::class, 'adminDashBoardDeliveredOrder'])->name('admin-delivered');

    Route::match(['get', 'post'],'/update-status/{id}/{status}', [AdminBookController::class, 'updateStatusOrder'])->name('update-status');
    
    
});
