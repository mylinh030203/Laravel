<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use App\Http\Services\ProductService;
use App\Http\Services\ProductSizeService;
use App\Http\Services\SizeService;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    public $data =[];
    public function __construct(ProductSizeService $productSizeService, ProductService $productService, SizeService $sizeService)
    {
        $this->productService = $productService;
        $this->productSizeService = $productSizeService;
        $this->sizeService = $sizeService;
    }
    public function index()
    {
        $this->data['ProductSize'] = $this->productSizeService->getAll();
        return view('admin.pages.product_size.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $productSize = new ProductSize();
        $productSize->product_id = $request->name;
        $productSize->size_id = $request->size;
        $this->productSizeService->add($productSize);
        return redirect(route('admin.product_size.index'))->with('info','Thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSizeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function showCreate(ProductSize $productSize)
    {
       $this->data['Product'] = $this->productService->getAll();
       $this->data['Size'] = $this->sizeService->getAll();
       return view('admin.pages.product_size.create',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    // public function showEdit($id)
    // {
    //     $this->data['product'] = $this->productService->getAll();
    //     $this->data['size'] = $this->sizeService->getAll();
    //     return view('admin.pages.product_size.edit',$this->data);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductSizeRequest  $request
     * @param  \App\Models\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductSizeRequest $request, ProductSize $productSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function delete($id=null)
    {
        $this->productSizeService->delete($id);
        return $id;
    }
}
