<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inquiries;

Route::get('/workplace', [Inquiries\InquiryController::class,'index'])->middleware(['auth'])->name('workplace');

Route::prefix('workplace')->name('workplace.')->middleware(['auth'])->group(function (){
    Route::get('/orders', [Inquiries\InquiryController::class,'orders'])->middleware(['auth'])->name('orders');
    Route::get('/checkout', [Inquiries\InquiryController::class,'create'])->middleware(['auth'])->name('checkout');
    Route::get('/show/{id}', [Inquiries\InquiryController::class,'show'])->middleware(['auth'])->name('show');
    Route::get('/confirmation', [Inquiries\InquiryController::class,'confirmation'])->middleware(['auth'])->name('confirmation');
    Route::get('/view/{id}', [Inquiries\InquiryController::class,'view'])->middleware(['auth'])->name('view');
    Route::get('/total', [Inquiries\InquiryController::class,'total'])->middleware(['auth'])->name('total');
    Route::get('/all/{id}', [Inquiries\InquiryController::class,'all'])->middleware(['auth'])->name('all');
});
