<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products;

Route::prefix('workplace')->name('workplace.')->middleware(['auth'])->group(function (){
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
