<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\DetailOrder;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Services\CartService;
use App\Http\Services\DetailOrderService;
use App\Http\Services\OrderService;
use App\Http\Services\StatusService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $data = [];

    public function __construct(OrderService $orderService, DetailOrderService $detailOrderService, CartService $cartService,StatusService $statusService)
    {
        $this->orderService = $orderService;
        $this->detailOrderService = $detailOrderService;
        $this->cartService = $cartService;
        $this->statusService = $statusService;
    }

    public function index()
    {
        $this->data['order'] = $this->orderService->getAll();
        $this->data['count'] = $this->cartService->countProduct();
        return view('user.pages.order.index', $this->data) ;
    }

    public function indexAdmin(Request $request)
    {
        
        $data = ['stt_id' => $request->stt_id];
        $this->orderService->update($request->id, $data);
        $this->data['status'] = $this->statusService->getAll();
        $this->data['orders'] = $this->orderService->getAllAdmin();
        return view('admin.pages.order.index', $this->data) ;
    }
    public function editStt(Request $request)
    {
        
        $data = ['stt_id' => $request->stt_id];
        $this->orderService->update($request->id, $data);
        return redirect(route('admin.order.indexAdmin')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->stt_id = 1;
        $order->total_price = $request->total_price;
        $this->orderService->add($order);
        
        $data = $this->cartService->getAll();
        foreach($data as $item){
            $detailOrder = new DetailOrder();
            $detailOrder->product_id = $item->product_id;
            $detailOrder->order_id = $order->id;
            $detailOrder->quantity = $item->quantity;
            $detailOrder->current_price	= $item->getProduct->price;
            $this->detailOrderService->add($detailOrder);
            $this->cartService->delete($item->id);
        }
        return redirect(route('user.order.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function showEdit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
