<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

//https://stackoverflow.com/questions/34497428/laravel-dynamic-page-title-in-navbar-brand

Route::get('/', function () {
    return view('index', ['page_name' =>'Main page']);
});

Route::get('/admin', function () {
    return view('admin', ['page_name' => 'Admin page']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
