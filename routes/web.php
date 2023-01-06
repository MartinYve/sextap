<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LogoutController;
use App\Models\Product;
use GuzzleHttp\Middleware;

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
    $products = Product::latest()->get();
    $variable = "active" ;  
    return view('home' , compact("products" , "variable"));
})->name('home');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::resource('products', ProductController::class)->Middleware('auth');