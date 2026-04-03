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



