<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->group(function (){
    Route::get('/index', function () {return view('admin.index');})
        ->middleware(['auth'])->name('admin.index');
    Route::get('/register', function () {return view('admin.registration');})
        ->middleware(['auth'])->name('admin.register');
    Route::get('/permissions', [Admin\PermissionController::class, 'show'])
        ->middleware(['auth'])->name('admin.permissions');
    Route::post('/permissions/edit', [Admin\PermissionController::class, 'edit'])
        ->middleware(['auth'])->name('admin.permissions.edit');
});


Route::get('/workplace', function () {
    return view('workplace');
})->middleware(['auth'])->name('workplace');

require __DIR__ . '/auth.php';
