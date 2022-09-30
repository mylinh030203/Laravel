<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\ProductService;
use App\Http\Services\TypeProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $data = [];
    public function __construct(ProductService $productService, TypeProductService $typeProductService){
        $this->productService = $productService;
        $this->typeProductService = $typeProductService;
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
        $this->data['typeProducts']= $this->typeProductService->getAll();
        
        return View('admin.pages.product.create',$this->data);
    }
    public function create(Request $request)
    {
        $product = new Product();
        $product->type_id = $request->type_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->material = $request->material;
        $product->origin = $request->origin;
        $product->price = $request->price;
        if ($request->hasFile('URL')) {
            $file = $request->URL;
            $path = $file->store('images');
            $file->move(public_path('images'), $path);
            $product->URL = $path;
        }
        $this->productService->add($product);
    return redirect(route('admin.product.index'))->with('info','Thêm thành công');
        
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
    
   
    public function showEdit($id) {
        $this->data['Product'] = $this->productService->find($id);
        $this->data['typeProduct'] = $this->typeProductService->getAll();
        return view('admin.pages.product.edit', $this->data);
    }
   
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $product =  $this->productService->find($id);
        $data['URL'] = $product->URL;

        if ($request->hasFile('URL')) {
            $file = $request->URL;
            $path = $file->store('images');
            $file->move(public_path('images'), $path);

            $data['URL'] = $path;
        }
        $data['type_id'] = $request->type_id;
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['material'] = $request->material;
        $data['origin'] = $request->origin;
        $data['price']= $request->price;
        $this->productService->update($id, $data);
        return redirect(route('admin.product.index'))->with('info','Cập nhật thành công');
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
