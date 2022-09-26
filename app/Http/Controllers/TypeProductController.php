<?php

namespace App\Http\Controllers;

use App\Models\TypeProduct;
use App\Http\Requests\StoreTypeProductRequest;
use App\Http\Requests\UpdateTypeProductRequest;
use App\Http\Services\TypeProductService;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    public $data = [];
    public function __construct(TypeProductService $typeProductService){
        $this->typeProductService = $typeProductService;
    }
    public function index()
    {
        $this->data['typeProducts'] = $this->typeProductService->getAll();
        return View('admin.pages.type_product.index',$this->data);
    }
    public function showCreate()
    {
       
        return view('admin.pages.type_product.create');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $typeProduct = new TypeProduct();
        $typeProduct->name = $request->typeName;
        $typeProduct->description = $request->description;
        $this->typeProductService ->add($typeProduct);
        return redirect(route('admin.type_product.index'))->with('info','Thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProduct $typeProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function showEdit($id) {
        $this->data['typeProduct'] = $this->typeProductService->find($id);
        return view('admin.pages.type_product.edit', $this->data);
    }

    public function edit($id, Request $request) {
        $data = ['name'=>$request->typeName, 'description'=>$request->description];
        // $data['name'] = $request->typeName;
        // $data['description'] = $request->description;
        $this->typeProductService->update($id, $data);

        return redirect(route('admin.type_product.index'))->with('info', 'Cập nhật thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeProductRequest  $request
     * @param  \App\Models\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeProductRequest $request, TypeProduct $typeProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function delete($id = null)
    {
        $this->typeProductService->delete($id);
        return $id;
    }
}
