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
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showController'])->name('Auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('Auth.loginUser');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('Auth.logout');

// Registrasi
Route::get('/register', [RegisterController::class, 'showController'])->name('Auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('Auth.registerUser');

// Dashboard Admin Routes
Route::get('/dashboard', [DashboardController::class, 'showController'])->name('Admin.dashboard');

// Book Routes
Route::prefix('Book')->group(function () {
    Route::prefix('Book')->group(function () {

        Route::get('/', [BookController::class, 'showIndexBook'])
            ->name('Admin.Book.indexBook');

        Route::get('/CreateBook', [BookController::class, 'showCreateBook'])
            ->name('Admin.Book.createBook');

        Route::post('/', [BookController::class, 'createBook'])
            ->name('Book.CreateBook');

        Route::get('/EditBook/{id}', [BookController::class, 'showEditBook'])
            ->name('Admin.Book.editBook');

        Route::put('/Update/{id}', [BookController::class, 'updateBook'])
            ->name('Book.updateBook');

        Route::delete('/Delete/{id}', [BookController::class, 'destroy'])
            ->name('Book.destroy');
    });
});

// Transaction Routes
Route::prefix('Transaction')->group(function () {
    Route::get('/', [TranscationController::class, 'showIndexTransaction'])
        ->name('Admin.Transaction.indexTransaction');
});

// Members Routes
Route::prefix('Member')->group(function () {
    Route::get('/', [MemberController::class, 'showIndexMembers'])
        ->name('Admin.Member.indexMember');

    Route::get('/CreateMember', [MemberController::class, 'showCreateMembers'])
        ->name('Admin.Member.createMember');

    Route::post('/', [MemberController::class, 'createMember'])
        ->name('Member.CreateMember');
});

// User Dashboard Routes
use App\Http\Controllers\User\DashboardUserController;



Route::prefix('user')->name('User.')->group(function () {

    Route::get('/dashboard', [DashboardUserController::class, 'showIndexUsers'])
        ->name('dashboard');

});
