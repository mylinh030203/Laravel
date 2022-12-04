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
use App\Http\Services\UserService;
use App\Mail\sendMail;
use App\Models\Status;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public $data = [];

    public function __construct(OrderService $orderService, DetailOrderService $detailOrderService, CartService $cartService,StatusService $statusService, UserService $userService)
    {
        $this->orderService = $orderService;
        $this->detailOrderService = $detailOrderService;
        $this->cartService = $cartService;
        $this->statusService = $statusService;
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        if($request->stt==null)
            $this->data['order'] = $this->orderService->getAll();
        else
            $this->data['order'] = $this->orderService->findByStatusId($request->stt);
        $this->data['count'] = $this->cartService->countProduct();
        $this->data['statuses'] = $this->statusService->getAll(); 
        return view('user.pages.order.index', $this->data) ;
    }

    public function indexAdmin(Request $request)
    {
        
        $data = ['stt_id' => $request->stt_id];
        $this->orderService->update($request->id, $data);
        $this->data['status'] = $this->statusService->getAll(); 
        if($request->stt==null)
            $this->data['orders'] = $this->orderService->getAllAdmin();
        else
            $this->data['orders'] = $this->orderService->AdminFindByStatusId($request->stt);
        
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
        if($this->orderService->checkMoney($request->total_price)){
            $this->orderService->add($order);
            $this->userService->changeMoney($request->total_price);
            $data = $this->cartService->getAll();
            foreach($data as $item){
                $detailOrder = new DetailOrder();
                $detailOrder->product_id = $item->product_id;
                $detailOrder->order_id = $order->id;
                $detailOrder->quantity = $item->quantity;
                $detailOrder->current_price	= $item->getProduct->price;
                $detailOrder->size_id = $item->size_id;
                // dd($detailOrder);s
                $this->detailOrderService->add($detailOrder);
                $this->cartService->delete($item->id);
            }
            //gui mail
            Mail::to(auth()->user()->email)->send(new sendMail($order));
            return redirect(route('user.order.index'))->with('success', "Thanh toán thành công!");
        }else{
            return redirect(route('user.cart.index'))->with('error',"Tiền trong tài khoản của bạn không đủ");
        }
    }

    public function mail(){
        $order = $this->orderService->find(3);
        Mail::to('vxb40104@nezid.com')->send(new sendMail($order));
            return "hello";
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        
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
