<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $data = [];
    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }
    public function index()
    {
        $this->data['products'] = $this->productService->getAll();
        return view('admin.pages.product.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreate()
    {
        return View('admin.pages.product.create');
    }
    public function create(Request $request)
    {
        if ($request->hasFile('fileToUpload')) {
            $file = $request->fileToUpload;
            $path = $file->store('images');
            $file->move(public_path('images'), $path);
        }
        return "<img src='/".$path."'>";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showEdit(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id=null)
    {
        $this->productService->delete($id);
        return $id;
    }
}
