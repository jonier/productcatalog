<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('category', 'category')
    ->middleware(['auth', 'verified'])
    ->name('category');    

Route::view('product', 'product')
    ->middleware(['auth', 'verified'])
    ->name('product');    

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
