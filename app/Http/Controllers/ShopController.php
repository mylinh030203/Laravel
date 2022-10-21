<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\ProductService;
use App\Http\Services\TypeProductService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public $data = [];

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;    
    }
    
    public function index()
    {
        $this->data['products'] = $this->productService->getAll();
        // return view('user.pages.shop', $this->data);
        return view('user.pages.shop.index', $this->data);
    }

    public function detail($id = null){
        $this->data['product'] = $this->productService->find($id);
        return view('user.pages.shop.detail', $this->data);
    }

}
