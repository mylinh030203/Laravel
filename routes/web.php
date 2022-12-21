<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\API\TestAPIController;
use App\Http\Controllers\AutoBankController;
use App\Http\Controllers\ProductSizeController;


Route::prefix('/')->group(function(){
    
    Route::get('/',[ShopController::class, 'home'])->name('user.home.index');
    Route::prefix('/shop')->group(function(){
        Route::get('/', [ShopController::class, 'index'])->name('user.shop.index');
        Route::get('/detail/{id?}',[ShopController::class, 'detail' ])->name('user.shop.detail');
        
        
    });

    Route::get('/test',[OrderController::class, 'mail' ]);
    Route::middleware('auth')->prefix('/cart')->group(function(){
        Route::get('/', [CartController::class, 'index'])->name('user.cart.index');
        Route::post('/add',[CartController::class, 'add' ])->name('user.cart.add');
        Route::post('/addOrder',[OrderController::class, 'create' ])->name('user.order.create');
        
    });

    Route::middleware('auth')->prefix('/order')->group(function(){
        Route::get('/', [OrderController::class, 'index'])->name('user.order.index');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('user.order.detete');
        Route::post('/', [OrderController::class, 'editStt'])->name('user.order.editStt');
    });

    Route::prefix('/login')->group(function(){ 
        Route::get('/', [UserController::class, 'index'])->name('login');
        Route::post('/', [AccountController::class, 'login'])->name('user.login.login');
        
    }); Route::prefix('/register')->group(function(){ 
        Route::get('/', [UserController::class, 'showRegister'])->name('register');
        Route::post('/', [AccountController::class, 'register'])->name('user.register.register');
    });
   

    Route::prefix('/profile')->group(function(){
       Route::get('/{id?}', [UserController::class, 'profile'])->name('user.profile.index'); 
       Route::get('edit/{id?}', [UserController::class, 'showEdit'])->name('user.profile.showedit');
       Route::post('edit/{id?}', [UserController::class, 'edit'])->name('user.profile.edit');
    });
    Route::prefix('/testAPI')->group(function(){
        Route::get('/', [TestAPIController::class, 'index'])->name('user.APITest.index'); 
        Route::post('/', [TestAPIController::class, 'search'])->name('user.APITest.search'); 
        
     });
     Route::prefix('deposit')->middleware('auth')->group(function(){
        Route::get('/', [AutoBankController::class, 'indexDeposit'])->name('user.deposit.index');
    });

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
    Route::prefix('auto-bank')->group(function(){
        Route::get('/', [AutoBankController::class, 'index'])->name('admin.autoBank.index');
    });
 
    Route::prefix('account')->group(function(){
        Route::get('/', [AccountController::class, 'index'])->name('admin.account.index');
        Route::get('/delete/{id}', [AccountController::class, 'delete'])->name('admin.account.detete');
        Route::get('/create', [AccountController::class, 'showCreate'])->name('admin.account.showcreate');
        Route::post('/create', [AccountController::class, 'create'])->name('admin.account.create');
        Route::get('/edit/{id?}', [AccountController::class, 'showEdit'])->name('admin.account.showedit');
        Route::post('/edit/{id}', [AccountController::class, 'edit'])->name('admin.account.edit');
    });
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.detete');
        Route::get('/create', [ProductController::class, 'showCreate'])->name('admin.product.showcreate');
        Route::get('/edit/{id?}', [ProductController::class, 'showEdit'])->name('admin.product.showedit');
        Route::post('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
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

    Route::prefix('order')->group(function(){
        Route::get('/', [OrderController::class, 'indexAdmin'])->name('admin.order.indexAdmin');
        // Route::get('/delete/{id}', [TypeProductController::class, 'delete'])->name('admin.type_product.detete');
        // Route::get('/create', [TypeProductController::class, 'showCreate'])->name('admin.type_product.showcreate');
        // Route::post('/create', [TypeProductController::class, 'create'])->name('admin.type_product.create');
        // Route::get('/edit/{id?}', [TypeProductController::class, 'showEdit'])->name('admin.order.showedit');
        Route::post('/', [OrderController::class, 'editStt'])->name('admin.order.editStt');
    });

    Route::prefix('size')->group(function(){
        Route::get('/', [SizeController::class, 'index'])->name('admin.size.index');
        Route::get('/delete/{id}', [SizeController::class, 'delete'])->name('admin.size.detete');
        Route::get('/create', [SizeController::class, 'showCreate'])->name('admin.size.showcreate');
        Route::post('/create', [SizeController::class, 'create'])->name('admin.size.create');
        Route::get('/edit/{id?}', [SizeController::class, 'showEdit'])->name('admin.size.showedit');
        Route::post('/edit/{id}', [SizeController::class, 'edit'])->name('admin.size.edit');
    });
    Route::prefix('product_size')->group(function(){
        Route::get('/', [ProductSizeController::class, 'index'])->name('admin.product_size.index');
        Route::get('/delete/{id}', [ProductSizeController::class, 'delete'])->name('admin.product_size.detete');
        Route::get('/create', [ProductSizeController::class, 'showCreate'])->name('admin.product_size.showcreate');
        Route::post('/create', [ProductSizeController::class, 'create'])->name('admin.product_size.create');
        // Route::get('/edit/{id?}', [SizeController::class, 'showEdit'])->name('admin.size.showedit');
        // Route::post('/edit/{id}', [SizeController::class, 'edit'])->name('admin.size.edit');
    });

});