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
    Route::get('/register', [Admin\UserController::class,'create'])
        ->middleware(['auth'])->name('admin.register');
    Route::get('/permissions', [Admin\UserController::class, 'show'])
        ->middleware(['auth'])->name('admin.permissions');
    Route::patch('/permissions/edit/{id}', [Admin\UserController::class, 'edit'])
        ->middleware(['auth'])->name('admin.permissions.edit');
    Route::delete('/permissions/delete', [Admin\UserController::class, 'delete'])
        ->middleware(['auth'])->name('admin.permissions.delete');
});


Route::get('/workplace', function () {
    return view('workplace');
})->middleware(['auth'])->name('workplace');

require __DIR__ . '/auth.php';
