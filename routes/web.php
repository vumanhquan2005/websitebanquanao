<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\AuthController;
Route::get('/', function () {
    return view('frontend.home');
})->name('home');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('admin')->name('admin.')->group(function () {
    // Reports
    Route::get('/reports', function () {
        return view('backend.report.reports');
    })->name('reports.index');

    // User Management
    Route::prefix('users')->name('users.')->group(function () {
        // Đặt route myaccount lên trên trước route có tham số động
        Route::get('/myaccount', [UserController::class, 'myaccount'])->name('myaccount');

        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/api/check-email-exists', [UserController::class, 'checkEmailExists'])->name('api.checkEmailExists');
        Route::get('/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggleStatus');
    });
});




Route::prefix('admin')->group(function () {

    //  Reports
    Route::get('/reports', function () {
        return view('backend.report.reports');
    });



    // List Product
    Route::get('/products', function () {
        return view('backend.product.list');
    });
    // Create Product
    Route::get('/products/create', function () {
        return view('backend.product.create');
    });
    // Edit Product
    Route::get('/products/edit', function () {
        return view('backend.product.edit');
    });

    // List Category
    Route::get('/categories', function () {
        return view('backend.category.list');
    });
    // Create Category
    Route::get('/categories/create', function () {
        return view('backend.category.create');
    });
    // Edit Category
    Route::get('/categories/edit', function () {
        return view('backend.category.edit');
    });
});