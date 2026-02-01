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
use App\Http\Controllers\Admin\TransactionController;

// Members Import Controllers
use App\Http\Controllers\Admin\MemberController;

// User Dashboard Routes
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\BorrowBookController;
use App\Http\Controllers\User\HistoryController;


// Route untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showController'])->name('Auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('Auth.loginUser');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('Auth.logout');

// Registrasi
Route::get('/register', [RegisterController::class, 'showController'])->name('Auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('Auth.registerUser');

// Route untuk Admin (Sudah Login & Role Admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('Admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showIndexAdmin'])
        ->name('dashboard');
});

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
    Route::get('/', [TransactionController::class, 'showIndexTransaction'])
        ->name('Admin.Transaction.indexTransaction');
    Route::post('/', [TransactionController::class, 'store'])
        ->name('Admin.Transaction.store');
    Route::put('/transaction/{id}/return', [TransactionController::class, 'returnBook'])
    ->name('Admin.Transaction.returnBook');
    Route::post('/transaction/again', [TransactionController::class, 'storeAgain'])
        ->name('Admin.Transaction.storeAgain');
});

// Members Routes
Route::prefix('Member')->group(function () {
    Route::get('/', [MemberController::class, 'showIndexMembers'])
        ->name('Admin.Member.indexMember');
    Route::get('/CreateMember', [MemberController::class, 'showCreateMembers'])
        ->name('Admin.Member.createMember');
    Route::post('/', [MemberController::class, 'createMember'])
        ->name('Member.CreateMember');
    Route::get('/EditMember/{id}', [MemberController::class, 'editMember'])
        ->name('Admin.Member.editMember');
    Route::put('/Update/{id}', [MemberController::class, 'updateMember'])
        ->name('Admin.Member.updateMember');
    Route::delete('/Delete/{id}', [MemberController::class, 'destroy'])
        ->name('Member.destroy');
});

// Route untuk Member (Sudah Login & Role Member)
Route::middleware(['auth', 'role:member'])->prefix('user')->name('User.')->group(function () {
    Route::get('/dashboard', [DashboardUserController::class, 'showIndexUsers'])
        ->name('dashboard');
     Route::get('/borrow-book', [BorrowBookController::class, 'showIndexBorrow'])
        ->name('borrowBook');
    Route::get('/history', [HistoryController::class, 'showIndexHistory'])
        ->name('history');
});
