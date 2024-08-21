<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionController;

Route::prefix('transactions')->group(function () {
    Route::post('/transfer', [TransactionController::class, 'sendPayment'])->name('transactions.store');
});