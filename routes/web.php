<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;


Route::prefix('/')->group(function(){
    Route::get('/login', [RoleController::class, 'index'])->name('login');
});


Route::prefix('admin')->group(function(){
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

});