<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Inquiries;
use App\Http\Controllers\Products;

Route::view('/', 'index');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::view('/index', 'admin.index')->name('index');
    Route::get('/register', [Admin\UserController::class, 'create'])->name('register');
    Route::get('/permissions', [Admin\UserController::class, 'show'])->name('permissions');
    Route::patch('/permissions/edit/{id}', [Admin\UserController::class, 'edit'])->name('permissions.edit');
    Route::prefix('deregistration')->name('deregistration.')->group(function () {
        Route::get('/', [Admin\UserController::class, 'registration'])->name('index');
        Route::delete('/delete/{id}', [Admin\UserController::class, 'delete'])->name('delete');
    });
});

Route::get('/workplace', [Inquiries\InquiryController::class,'index'])->middleware(['auth'])->name('workplace');

Route::prefix('workplace')->name('workplace.')->middleware(['auth'])->group(function (){
    Route::get('/orders', [Inquiries\InquiryController::class,'orders'])->middleware(['auth'])->name('orders');
    Route::get('/checkout', [Inquiries\InquiryController::class,'create'])->middleware(['auth'])->name('checkout');
    Route::get('/show/{id}', [Inquiries\InquiryController::class,'show'])->middleware(['auth'])->name('show');
    Route::get('/confirmation', [Inquiries\InquiryController::class,'confirmation'])->middleware(['auth'])->name('confirmation');
    Route::get('/view/{id}', [Inquiries\InquiryController::class,'view'])->middleware(['auth'])->name('view');

    Route::post('/create', [Products\ProductController::class,'create'])->middleware(['auth'])->name('create');
    Route::delete('/delete/{id}', [Products\ProductController::class,'delete'])->middleware(['auth'])->name('delete');
    Route::get('/change/{id}', [Products\ProductController::class,'change'])->middleware(['auth'])->name('change');
    Route::get('/add/{id}', [Products\ProductController::class,'add'])->middleware(['auth'])->name('add');
    Route::get('/order/{id}', [Products\ProductController::class,'order'])->middleware(['auth'])->name('order');
    Route::get('/products', [Products\ProductController::class,'index'])->middleware(['auth'])->name('products');
    Route::post('/update/{id}', [Products\ProductController::class,'update'])->middleware(['auth'])->name('update');
    Route::get('/byorder/{id}', [Products\ProductController::class,'byorder'])->middleware(['auth'])->name('byorder');
    Route::get('/ordered/{id}', [Products\ProductController::class,'ordered'])->middleware(['auth'])->name('ordered');
});

require __DIR__ . '/auth.php';
