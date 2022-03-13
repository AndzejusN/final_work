<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

//https://stackoverflow.com/questions/34497428/laravel-dynamic-page-title-in-navbar-brand

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index', ['page_name' => 'Main page']);
});

Route::get('/admin', function () {
    return view('admin', ['page_name' => 'Admin page']);
})->name('admin.index');

Route::get('/registration', function () {
    return view('registration', ['page_name' => 'Registration page']);
})->name('admin.registration');

Route::get('/action', function () {
    return view('action', ['page_name' => 'Action page']);
})->name('action');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';
