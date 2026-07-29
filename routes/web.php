<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/about', [FrontendController::class, 'about'])->name('aboutpage');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contactpage');

// Category & Product browsing
Route::get('/category/{id}', [FrontendController::class, 'showCategory'])->name('frontend.category');
Route::get('/product/{id}', [FrontendController::class, 'showProduct'])->name('frontend.product.details');
Route::get('/all-crafts', [FrontendController::class, 'allProducts'])->name('frontend.all.products');

// Cart & Checkout
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showcart'])->name('cartpage');
Route::post('/check-stock', [App\Http\Controllers\CartController::class, 'checkStock'])->name('cart.checkStock');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::post('/summary', [App\Http\Controllers\CartController::class, 'summary'])->name('checkout.summary');
Route::post('/place-order', [App\Http\Controllers\CartController::class, 'placeOrder'])->name('order.place');
Route::get('/order-success/{order_id}', [App\Http\Controllers\CartController::class, 'orderSuccess'])->name('order.success');
Route::post('/upload-payment', [App\Http\Controllers\CartController::class, 'uploadPayment'])->name('order.upload');

// AUTH ROUTES
Route::get('/login', [FrontendController::class, 'login'])->name('login');
Route::post('/login', [FrontendController::class, 'loginPost'])->name('login.post');
Route::get('/register', [FrontendController::class, 'register'])->name('register');
Route::post('/register', [FrontendController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [FrontendController::class, 'logout'])->name('logout');

// ADMIN BACKEND ROUTES (Protected by admin guard)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/table', [App\Http\Controllers\BackendController::class, 'index'])->name('table');

    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);

    // Products & Restock
    Route::resource('products', ProductController::class);
    Route::put('/products/{id}/restock', [ProductController::class, 'restock'])->name('products.restock');

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    // Admin Order Management
    Route::prefix('admin')->group(function () {
        Route::get('/orders', [App\Http\Controllers\OrderManagementController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders/{id}', [App\Http\Controllers\OrderManagementController::class, 'show'])->name('admin.orders.show');
        Route::post('/orders/{id}/accept', [App\Http\Controllers\OrderManagementController::class, 'accept'])->name('admin.orders.accept');
        Route::post('/orders/{id}/decline', [App\Http\Controllers\OrderManagementController::class, 'decline'])->name('admin.orders.decline');
    });
});