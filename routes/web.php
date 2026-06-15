<?php

use App\Http\Controllers\Bank\BankBranchController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Transaksi\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Bank Routes
    Route::get('/bank/data', [BankController::class, 'index'])->name('bank.read');
    Route::get('/bank', [BankController::class, 'create'])->name('bank');
    Route::post('/bank/store', [BankController::class, 'store'])->name('bank.store');


    // Bank Branch Routes
    Route::get('/bank/branch/data', [BankBranchController::class, 'index'])->name('bankbranch.read');
    Route::get('/bank/branch', [BankBranchController::class, 'create'])->name('bankbranch');
    Route::post('/bank/branch/store', [BankBranchController::class, 'store'])->name('bankbranch.store');


    // Transaksi Routes
    Route::get('/transaksi/data', [TransaksiController::class, 'index'])->name('transaksi.read');

    Route::get('/bank/{bank}/branches', [TransaksiController::class, 'getBranches'])->name('bank.branches');

    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

    Route::get('/transaksi', [TransaksiController::class, 'create'])->name('transaksi');

    // Insentif Route
    Route::post('/transaksi/{id}/insentif', [TransaksiController::class, 'storeInsentif'])->name('transaksi.insentif');
});

require __DIR__.'/auth.php';
