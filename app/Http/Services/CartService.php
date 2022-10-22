<?php

namespace App\Http\Services;


use App\Models\Cart;

use Cookie;

class CartService
{
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    

    public function getAll() {
        return $this->cart->orderBy('id','asc')->where('user_id','=',auth()->user()->id)->get(); //limit 
    }

    public function delete($id) {
        $cart = $this->cart->find($id);
        $cart->delete();
    }

    public function update($id, $data) {
        $this->cart->where('id', $id)->update($data);
        return $this->cart->find($id);
    }

    public function add($data) {
        $cart = $data;
        $cart->save();
    }

    // public function create($id_cart, $cart_name) {
    //     $cartcart = new cartcart();
    //     $cartcart->id_cart = $id_cart;
    //     $cartcart->id_cart = $this->findBycartName($cart_name)->id;
    //     $cartcart->save();
    // }

    public function find($id) {
        return $this->cart->find($id);
    }


    public function paginate($limit, $keywords){
        $cart = $this->cart;
        $cart = $cart->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $cart->where('cart_name', 'like', '%'. $keywords.'%');
            $cart->orWhere('description', 'like', '%'. $keywords.'%');
        }
        return $cart->paginate($limit)->withQueryString();
    }
    public function checkLogin($username, $password){
        $cart = $this->cart;
        return $cart->where('username', '=',  $username)->where('password', '=',  $password)->first();
    }

}
