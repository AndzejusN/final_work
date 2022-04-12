<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

require __DIR__ . '/admin.php';
require __DIR__ . '/product.php';
require __DIR__ . '/inquiry.php';
require __DIR__ . '/auth.php';
