<?php

use Illuminate\Support\Facades\Route;
// Auth Import Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Admin Import Controllers
use App\Http\Controllers\Admin\DashboardController;

// Book Import Controllers
use App\Http\Controllers\Admin\BookController;

// Transaction Import Controllers
use App\Http\Controllers\Admin\TranscationController;

// Members Import Controllers
use App\Http\Controllers\Admin\MemberController;


// Auth Routes
Route::get('/', [LoginController::class, 'showController'])->name('Auth.login');
Route::get('/register', [RegisterController::class, 'showController'])->name('Auth.register');

// Dashboard Admin Routes
Route::get('/dashboard', [DashboardController::class, 'showController'])->name('Admin.dashboard');

// Book Routes
Route::prefix('Book')->group(function () {
    Route::get('/', [BookController::class, 'showIndexBook'])->name('Admin.Book.indexBook');
    Route::get('/CreateBook', [BookController::class, 'showCreateBook'])->name('Admin.Book.createBook');
    Route::get('/EditBook', [BookController::class, 'showEditBook'])->name('Admin.Book.editBook');
});

// Transaction Routes
Route::prefix('Transaction')->group(function () {
    Route::get('/', [TranscationController::class, 'showIndexTransaction'])->name('Admin.Transaction.indexTransaction');
});

// Members Routes
Route::prefix('Member')->group(function () {
    Route::get('/', [MemberController::class, 'showIndexMembers'])->name('Admin.Member.indexMember');
    Route::get('/CreateMember', [MemberController::class, 'showCreateMembers'])->name('Admin.Member.createMember');
});
