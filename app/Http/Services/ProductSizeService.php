<?php

namespace App\Http\Services;


use App\Models\ProductSize;

use Cookie;

class ProductSizeService
{
    public function __construct(ProductSize $productSize)
    {
        $this->productSize = $productSize;
    }

  

    public function getAll() {
        return $this->productSize->orderBy('id','asc')->get(); //limit 
    }

   

    public function delete($id) {
        $productSize = $this->productSize->find($id);
        $productSize->delete();
    }

    public function update($id, $data) {
        $this->productSize->where('id', $id)->update($data);
        return $this->productSize->find($id);
    }

    public function add($data) {
        $productSize = $data;
        $productSize->save();
    }

    // public function create($id_productSize, $productSize_name) {
    //     $productSizeproductSize = new productSizeproductSize();
    //     $productSizeproductSize->id_productSize = $id_productSize;
    //     $productSizeproductSize->id_productSize = $this->findByproductSizeName($productSize_name)->id;
    //     $productSizeproductSize->save();
    // }

    public function find($id) {
        return $this->productSize->find($id);
    }



}
