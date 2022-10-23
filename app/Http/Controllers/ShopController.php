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

    public function __construct(TypeProductService $typeProductService, ProductService $productService)
    {
        $this->productService = $productService;   
        $this->typeProductService = $typeProductService; 
    }
    
    public function index(Request $request)
    {
        if($request->idtypeProduct==null)
            $this->data['products'] = $this->productService->getAll();
        else{
            $this->data['products'] = $this->productService->findByIdTypeProduct($request->idtypeProduct);
        }
        $this->data['type'] = $this->typeProductService->getAll();
        // return view('user.pages.shop', $this->data);
        return view('user.pages.shop.index', $this->data);
    }

    public function detail($id = null){
        $this->data['product'] = $this->productService->find($id);
        return view('user.pages.shop.detail', $this->data);
    }

}
