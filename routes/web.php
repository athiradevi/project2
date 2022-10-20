<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DeliveryboyController;

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
    return view('welcome');
});


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
//Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('deliveryboy_dashboard', [DeliveryboyController::class, 'index']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('shop', [ShopController::class, 'index'])->name('shop');

//Route::get('AddToCart', 'CartController@ajaxRequest');
Route::get('AddToCart', 'CartController@ajaxRequestPost');
Route::get('/AddToCart', 'App\Http\Controllers\CartController@ajaxRequestPost');
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('qty_plus', [CartController::class, 'qty_plus'])->name('qty_plus');
Route::get('qty_minus', [CartController::class, 'qty_minus'])->name('qty_minus');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('updateuserdata', [CheckoutController::class, 'updateuserdata'])->name('updateuserdata');
Route::get('placeorder', [CheckoutController::class, 'placeorder'])->name('placeorder');
Route::get('thanks', [CheckoutController::class, 'thanks'])->name('thanks');
Route::get('orderstatus', [CheckoutController::class, 'orderstatus'])->name('orderstatus');
Route::get('updatestatus', [DeliveryboyController::class, 'updatestatus'])->name('updatestatus');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/