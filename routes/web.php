<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Relatif\CustomerController;
use App\Http\Controllers\Relatif\StaffController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/relatif/menu', [CustomerController::class, 'index'])->name('relatif.menu');
Route::get('/relatif/cart', [CustomerController::class, 'cart'])->name('relatif.cart');
Route::get('/relatif/login', [StaffController::class, 'login'])->name('relatif.login');
Route::get('/relatif/cashier', [StaffController::class, 'dashboard'])->name('relatif.cashier');
Route::get('/relatif/payment', [CustomerController::class, 'payment'])->name('relatif.payment');
Route::get('/relatif/orders', [CustomerController::class, 'orders'])->name('relatif.orders');


