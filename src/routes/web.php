<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Inquiries;
use App\Http\Controllers\Products;

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
Route::post('/workplace/create', [Products\ProductController::class,'create'])->middleware(['auth'])->name('workplace.create');
Route::delete('/workplace/delete/{id}', [Products\ProductController::class,'delete'])->middleware(['auth'])->name('workplace.delete');
Route::get('/workplace/change/{id}', [Products\ProductController::class,'change'])->middleware(['auth'])->name('workplace.change');
Route::get('/workplace/add/{id}', [Products\ProductController::class,'add'])->middleware(['auth'])->name('workplace.add');
Route::get('/workplace/products', [Products\ProductController::class,'index'])->middleware(['auth'])->name('workplace.products');
Route::post('/workplace/update/{id}', [Products\ProductController::class,'update'])->middleware(['auth'])->name('workplace.update');
Route::get('/workplace/checkout', [Inquiries\InquiryController::class,'create'])->middleware(['auth'])->name('workplace.checkout');
Route::get('/workplace/show/{id}', [Inquiries\InquiryController::class,'show'])->middleware(['auth'])->name('workplace.show');
Route::get('/workplace/confirmation', [Inquiries\InquiryController::class,'confirmation'])->middleware(['auth'])->name('workplace.confirmation');
Route::get('/workplace/view/{id}', [Inquiries\InquiryController::class,'view'])->middleware(['auth'])->name('workplace.view');

require __DIR__ . '/auth.php';
