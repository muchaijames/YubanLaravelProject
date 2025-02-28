<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::post('/loginnn', [App\Http\Controllers\AuthController::class, 'loginnn'])->name('loginnn');
Route::post('/registerrr', [App\Http\Controllers\AuthController::class, 'registerrr'])->name('registerrr');
Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/customer', [App\Http\Controllers\AuthController::class, 'customer'])->name('customer');
Route::get('/customersfilter', [App\Http\Controllers\AuthController::class, 'customersfilter'])->name('customersfilter');

Route::get('/drivers', [App\Http\Controllers\AuthController::class, 'drivers'])->name('drivers');
Route::post('/driversindex', [App\Http\Controllers\AuthController::class, 'driversindex'])->name('driversindex');
Route::get('/ride', [App\Http\Controllers\AuthController::class, 'ride'])->name('ride');

Route::get('/riderequest', [App\Http\Controllers\AuthController::class, 'riderequest'])->name('riderequest');

Route::post('/storerideeddd', [App\Http\Controllers\AuthController::class, 'storeride'])->name('storerideeddd');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
