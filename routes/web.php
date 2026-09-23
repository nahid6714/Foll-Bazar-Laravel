<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/shop', [WebsiteController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [WebsiteController::class, 'product'])->name('product');
Route::get('/login', fn () => app(WebsiteController::class)->auth('login'))->name('login');
Route::get('/register', fn () => app(WebsiteController::class)->auth('register'))->name('register');
Route::get('/cart', [WebsiteController::class, 'cart'])->name('cart');
Route::get('/checkout', [WebsiteController::class, 'checkout'])->name('checkout');
Route::get('/track', [WebsiteController::class, 'track'])->name('track');
Route::get('/complaint', [WebsiteController::class, 'complaint'])->name('complaint');
Route::get('/wishlist', [WebsiteController::class, 'wishlist'])->name('wishlist');
