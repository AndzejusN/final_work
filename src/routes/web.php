<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Inquiries;
use Illuminate\Http\Request;

Route::view('/', 'index');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::view('/index', 'admin.index')->name('index');
    Route::get('/register', [Admin\UserController::class, 'create'])
        ->name('register');
    Route::get('/permissions', [Admin\UserController::class, 'show'])
        ->name('permissions');
    Route::patch('/permissions/edit/{id}', [Admin\UserController::class, 'edit'])
        ->name('permissions.edit');
    Route::prefix('deregistration')->name('deregistration.')->group(function () {
        Route::get('/', [Admin\UserController::class, 'registration'])
            ->name('index');
        Route::delete('/delete/{id}', [Admin\UserController::class, 'delete'])
            ->name('delete');
    });
});

Route::get('/workplace', [Inquiries\InquiryController::class,'index'])->middleware(['auth'])->name('workplace');
Route::post('/workplace/create', [Inquiries\InquiryController::class,'create'])->middleware(['auth'])->name('workplace.create');
Route::delete('/workplace/delete', [Inquiries\InquiryController::class,'delete'])->middleware(['auth'])->name('workplace.delete');
Route::get('/workplace/products', [Inquiries\InquiryController::class,'inquiry'])->middleware(['auth'])->name('workplace.products');

require __DIR__ . '/auth.php';
