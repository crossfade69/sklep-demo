<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Category routes
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{category:slug}/{subcategory:slug}', [CategoryController::class, 'showSubcategory'])->name('subcategory.show');


// Product routes
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

// Lista życzeń
Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])
    ->middleware('auth')
    ->name('wishlist.add');

Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])
    ->middleware('auth')
    ->name('wishlist.remove');


// Authentication routes
Auth::routes(['register' => true]); // Wyłącz rejestrację jeśli nie potrzebna

// Login override (jeśli potrzebne)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Dodaj tę linię w sekcji tras
Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'account'])->name('account');
    Route::get('/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/details', [AccountController::class, 'details'])->name('account.details');
    Route::get('/addresses', [AccountController::class, 'addresses'])->name('account.addresses');
    Route::get('/wishlist', [AccountController::class, 'wishlist'])->name('account.wishlist');

});
