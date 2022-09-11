<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});

Route::get('/linh', function () {
    return "Day la Linh";
});

Route::get('/HaiZuka/id={id?}', function ($id=null) {
    return "Phan Mỹ Linh yêu Phan Đức Hải ".$id." Lần";
});

Route::post('/hai', function () {
    return "Day la phuong thuc post";
});

Route::prefix('/account')->group(function () {
    Route::get('/', [AccountController::class,"show"])->name('trangchu');
    Route::get('/add', [AccountController::class,"formCreate"])->name('account.formCreate');;
    Route::post('/add2', [AccountController::class, "create"])->name('linhdapostformnay');
    Route::get('/search', [AccountController::class,"formCreate"]);
    Route::post('/search', [AccountController::class, "search"])->name('linhdapostformnay1');
    Route::get('/edit/{id?}', [AccountController::class, "formedit"])->name('sua');
    Route::post('/edit/{id}', [AccountController::class, "edit"]);
    Route::get('/delete/{id?}', [AccountController::class, "delete"])->name('xoa');
});

// ->middleware("checkAdmin")
Route::prefix('/admin')->middleware('checkAdmin')->group(function () {
    Route::get('/', [AdminController::class,"index"]);
    Route::get('/form', [AdminController::class,"viewForm"])->name('daylaform');
    Route::post('/form', [AdminController::class,"solveForm"]);

    Route::prefix('/user')->group(function () {
        Route::get('/', [AdminController::class,"index"]);
        Route::get('/add', [AdminController::class,"index"]);
        Route::get('/edit', [AdminController::class,"index"]);
    });

});
