<?php

namespace App\Http\Services;


use App\Models\TypeProduct;

use Cookie;

class TypeProductService
{
    public function __construct(TypeProduct $typeProduct)
    {
        $this->typeProduct = $typeProduct;
    }

    public function findBytypeProductName($typeProductName){
        return $this->typeProduct->where('typeProduct_name', '=', $typeProductName)->first();
    }

    public function getAll() {
        return $this->typeProduct->orderBy('id','asc')->paginate(); //limit 
    }

    public function delete($id) {
        $typeProduct = $this->typeProduct->find($id);
        $typeProduct->delete();
    }

    public function update($id, $data) {
        $this->typeProduct->where('id', $id)->update($data);
        return $this->typeProduct->find($id);
    }

    public function add($data) {
        $typeProduct = $data;
        $typeProduct->save();
    }

    // public function create($id_typeProduct, $typeProduct_name) {
    //     $typeProduct = new typeProduct();
    //     $typeProduct->id_typeProduct = $id_typeProduct;
    //     $typeProduct->id_typeProduct = $this->findBytypeProductName($typeProduct_name)->id;
    //     $typeProduct->save();
    // }

    public function find($id) {
        return $this->typeProduct->find($id);
    }


    public function paginate($limit, $keywords){
        $typeProduct = $this->typeProduct;
        $typeProduct = $typeProduct->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $typeProduct->where('typeProduct_name', 'like', '%'. $keywords.'%');
            $typeProduct->orWhere('description', 'like', '%'. $keywords.'%');
        }
        return $typeProduct->paginate($limit)->withQueryString();
    }
   
}
