<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[App\Http\Controllers\FrontendController::class, 'index'])->name('homepage');
Route::get('/about',[App\Http\Controllers\FrontendController::class, 'about'])->name('aboutpage');
Route::get('/contact',[App\Http\Controllers\FrontendController::class, 'contact'])->name('contactpage');

//  to loop specific crafts like Pottery or Wood Carvings
Route::get('/category/{id}', [FrontendController::class, 'showCategory'])->name('frontend.category');
Route::get('/product/{id}', [FrontendController::class, 'showProduct'])->name('frontend.product.details');

//for all products
Route::get('/all-crafts', [FrontendController::class, 'allProducts'])->name('frontend.all.products');

//Cart
Route::get('/cart',[App\Http\Controllers\CartController::class, 'showcart'])->name('cartpage');

//checkstock
Route::post('/check-stock', [App\Http\Controllers\CartController::class, 'checkStock'])->name('cart.checkStock');




// Step 1: Checkout Form (Address & Payment Selection)
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');

// Step 2: The Summary (Review before final save)
Route::post('/summary', [App\Http\Controllers\CartController::class, 'summary'])->name('checkout.summary');

// Step 3: Place Order (Saves to Database)
Route::post('/place-order', [App\Http\Controllers\CartController::class, 'placeOrder'])->name('order.place');

// Step 4: Success / Slip Upload (Only for KPay/Wave)
Route::get('/order-success/{order_id}', [App\Http\Controllers\CartController::class, 'orderSuccess'])->name('order.success');
Route::post('/upload-payment', [App\Http\Controllers\CartController::class, 'uploadPayment'])->name('order.upload');



// 1. LOGIN ROUTES
// This shows the login form
Route::get('/login', [FrontendController::class, 'login'])->name('login');
// This handles the actual login attempt (POST)
Route::post('/login', [FrontendController::class, 'loginPost'])->name('login.post');

// 2. REGISTER ROUTES
// This shows the registration form
Route::get('/register', [FrontendController::class, 'register'])->name('register');
// This handles the actual registration (POST)
Route::post('/register', [FrontendController::class, 'registerPost'])->name('register.post');

// 3. LOGOUT ROUTE
Route::post('/logout', [FrontendController::class, 'logout'])->name('logout');


//Backend
Route::get('/table',[App\Http\Controllers\BackendController::class, 'index'])->name('table');

Route::resource('users', UserController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('permissions', App\Http\Controllers\PermissionController::class);


// Admin Order Management
Route::prefix('admin')->group(function () {
    Route::get('/orders', [App\Http\Controllers\OrderManagementController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [App\Http\Controllers\OrderManagementController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{id}/accept', [App\Http\Controllers\OrderManagementController::class, 'accept'])->name('admin.orders.accept');
    Route::post('/orders/{id}/decline', [App\Http\Controllers\OrderManagementController::class, 'decline'])->name('admin.orders.decline');
});