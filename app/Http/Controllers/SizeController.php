<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Http\Services\SizeService;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public $data= [];

    public function __construct(SizeService $sizeService)
    {
        $this->sizeService = $sizeService;
    }

    public function index()
    {
        $this->data['sizes'] = $this->sizeService->getAll();
        return view('admin.pages.size.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $size = new Size();
        $size->name = $request->name;
        $this->sizeService->add($size);
        return redirect(route('admin.size.index'))->with('info','Thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSizeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function showCreate()
    {
        return View('admin.pages.size.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function showEdit($id)
    {
        $this->data['Size'] = $this->sizeService->find($id);
        return view('admin.pages.size.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSizeRequest  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        
        $data['name'] = $request->name;
        $this->sizeService->update($id, $data);
        return redirect(route('admin.size.index'))->with('info','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function delete($id=null)
    {
        $this->sizeService->delete($id);
        return $id;
    }
}
