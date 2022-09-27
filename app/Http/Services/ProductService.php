<?php

namespace App\Http\Services;


use App\Models\Product;

use Cookie;

class ProductService
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function findByProductName($productName){
        return $this->Product->where('product_name', '=', $productName)->first();
    }

    public function getAll() {
        return $this->product->orderBy('id','asc')->paginate(); //limit 
    }

    public function delete($id) {
        $product = $this->product->find($id);
        $product->delete();
    }

    public function update($id, $data) {
        $this->product->where('id', $id)->update($data);
        return $this->product->find($id);
    }

    public function add($data) {
        $product = $data;
        $product->save();
    }

    // public function create($id_Product, $Product_name) {
    //     $ProductProduct = new ProductProduct();
    //     $ProductProduct->id_Product = $id_Product;
    //     $ProductProduct->id_Product = $this->findByProductName($Product_name)->id;
    //     $ProductProduct->save();
    // }

    public function find($id) {
        return $this->product->find($id);
    }


    public function paginate($limit, $keywords){
        $Product = $this->Product;
        $Product = $Product->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $Product->where('Product_name', 'like', '%'. $keywords.'%');
            $Product->orWhere('description', 'like', '%'. $keywords.'%');
        }
        return $Product->paginate($limit)->withQueryString();
    }
    public function checkLogin($username, $password){
        $Product = $this->Product;
        return $Product->where('username', '=',  $username)->where('password', '=',  $password)->first();
    }

}
