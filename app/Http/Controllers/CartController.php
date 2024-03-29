<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public $data = [];

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }

    public function index()
    {
        // dd($this->cartService->changeQuantity(1,10));
        $this->data['totalQuantity'] = $this->cartService->totalQuantity();
        $this->data['totalMoney'] = $this->cartService->totalMoney();
        $this->data['count'] = $this->cartService->countProduct();
        $this->data['cart'] = $this->cartService->getAll();
        return view('user.pages.cart.index', $this->data);
    }
    public function count(){
        
        return view('user.layouts.main', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeQuantity(Request $request)
    {
        $this->cartService->changeQuantity($request->id, $request->quantity);
        return [
            "message" => "ok",
            // "totalMoney" => $this->cartService->totalMoney()
        ];
    }

    public function add(Request $request)
    {
        // dd($request->all());

            
        if($this->cartService->checkExitProduct($request->product_id)==null){
           
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->size_id = $request->size_id;
            $this->cartService->add($cart);
            
           
        }else{
            $this->cartService->changeQuantity($this->cartService->checkExitProduct($request->product_id)->id, $request->quantity);   
        }
        return redirect(route('user.cart.index'))->with('success', "Thêm thành công");
     
    
        
    }
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
