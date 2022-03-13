<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

//https://stackoverflow.com/questions/34497428/laravel-dynamic-page-title-in-navbar-brand

Route::get('welcome', function () {
    return view('welcome');
});

// Log in page / Index

Route::get('/', function () {
    return view('index', ['page_name' => 'Index page']);
});

// Admin panel

Route::get('/admin', function () {
    return view('admin', ['page_name' => 'Admin page']);
})->name('admin.index');

// Create new users / admin panel

Route::get('/registration', function () {
    return view('registration', ['page_name' => 'Registration page']);
})->name('admin.registration');

// After registration must be all action on this page ...

Route::get('/action', function () {
    return view('action', ['page_name' => 'Action page']);
})->name('action');

// Breeze dashboard ...

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
