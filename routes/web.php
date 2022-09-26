<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeProductController;


Route::prefix('/')->group(function(){
    
    Route::get('/',function(){
        return view('user.pages.index');
    })->name('user.login.index');
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [AccountController::class, 'login'])->name('user.login.login');
});


Route::prefix('admin')->middleware('checkAdmin')->group(function(){
    Route::prefix('role')->group(function(){
        Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
        Route::get('/create', [RoleController::class, 'showCreate'])->name('admin.role.showcreate');
        Route::post('/create', [RoleController::class, 'create'])->name('admin.role.create');
        Route::get('/edit/{id?}', [RoleController::class, 'showEdit'])->name('admin.role.showedit');
        Route::post('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::get('/delete/{id?}', [RoleController::class, 'delete'])->name('admin.role.delete');
        Route::get('/detail', [RoleAccountController::class, 'findByIdRole'])->name('admin.role.detail');
        Route::post('/detail', [RoleAccountController::class, 'add'])->name('admin.role.detail.add');
        Route::get('/detail/delete/{id}', [RoleAccountController::class, 'delete'])->name('admin.role.detail.detete');
    });
    Route::prefix('account')->group(function(){
        Route::get('/', [AccountController::class, 'index'])->name('admin.account.index');
        Route::get('/delete/{id}', [AccountController::class, 'delete'])->name('admin.account.detete');
        Route::get('/create', [AccountController::class, 'showCreate'])->name('admin.account.showcreate');
        Route::post('/create', [AccountController::class, 'create'])->name('admin.account.create');
    });
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.detete');
        Route::get('/create', [ProductController::class, 'showCreate'])->name('admin.product.showcreate');
        Route::get('/edit', [ProductController::class, 'showEdit'])->name('admin.product.showedit');
        Route::post('/create', [ProductController::class, 'create'])->name('admin.product.create');
    });
    Route::prefix('typeProduct')->group(function(){
        Route::get('/', [TypeProductController::class, 'index'])->name('admin.type_product.index');
        Route::get('/delete/{id}', [TypeProductController::class, 'delete'])->name('admin.type_product.detete');
        Route::get('/create', [TypeProductController::class, 'showCreate'])->name('admin.type_product.showcreate');
        Route::post('/create', [TypeProductController::class, 'create'])->name('admin.type_product.create');
        Route::get('/edit/{id?}', [TypeProductController::class, 'showEdit'])->name('admin.type_product.showedit');
        Route::post('/edit/{id}', [TypeProductController::class, 'edit'])->name('admin.type_product.edit');
    });

});