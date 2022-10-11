<?php

use App\Http\Controllers\API\AccountAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function(){

    Route::prefix('/account')->group(function(){
       Route::get('/', [AccountAPIController::class, 'index'])->name('API.Account.index'); 
       Route::get('/{id?}', [AccountAPIController::class, 'find'])->name('API.Account.find');
       Route::get('/delete/{id?}', [AccountAPIController::class, 'delete'])->name('API.Account.delete');
       Route::post('/create', [AccountAPIController::class, 'add'])->name('API.Account.add');
    });
});
