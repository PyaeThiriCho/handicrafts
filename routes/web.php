<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[App\Http\Controllers\FrontendController::class, 'index'])->name('homepage');
Route::get('/about',[App\Http\Controllers\FrontendController::class, 'about'])->name('aboutpage');
Route::get('/contact',[App\Http\Controllers\FrontendController::class, 'contact'])->name('contactpage');

Route::get('/register',[App\Http\Controllers\FrontendController::class, 'register'])->name('registerpage');
Route::get('/login',[App\Http\Controllers\FrontendController::class, 'login'])->name('loginpage');

//Backend
Route::get('/table',[App\Http\Controllers\BackendController::class, 'index'])->name('table');

Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('products', App\Http\Controllers\ProductController::class);



