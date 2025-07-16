<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    //  Reports
    Route::get('/reports', function () {
        return view('backend.report.reports');
    });

    // List User
    Route::get('/users', function () {
        return view('backend.user.list');
    });
    // Create User 
    Route::get('/users/create', function () {
        return view('backend.user.create');
    });
    // Edit User 
    Route::get('/users/edit', function () {
        return view('backend.user.edit');
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