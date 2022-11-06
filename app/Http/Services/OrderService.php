<?php

namespace App\Http\Services;


use App\Models\Order;

use Cookie;

class OrderService
{
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

  

    public function getAll() {
        return $this->order->orderBy('id','asc')->where('user_id','=',auth()->user()->id)->get(); //limit 
    }
    public function findByStatusId($id) {
        return $this->order->orderBy('id','asc')->where('user_id','=',auth()->user()->id)->where('stt_id','=',$id)->get(); //limit 
    }

    public function AdminFindByStatusId($id) {
        return $this->order->orderBy('id','asc')->where('stt_id','=',$id)->get(); //limit 
    }

    public function getAllAdmin() {
        return $this->order->orderBy('id','asc')->get(); //limit 
    }

    public function delete($id) {
        $order = $this->order->find($id);
        $order->delete();
    }

    public function update($id, $data) {
        $this->order->where('id', $id)->update($data);
        return $this->order->find($id);
    }

    public function add($data) {
        $order = $data;
        $order->save();
    }

    // public function create($id_order, $order_name) {
    //     $orderorder = new orderorder();
    //     $orderorder->id_order = $id_order;
    //     $orderorder->id_order = $this->findByorderName($order_name)->id;
    //     $orderorder->save();
    // }

    public function find($id) {
        return $this->order->find($id);
    }
    public function checkMoney($totalMoney){
        $user = auth()->user();
        return($user->money>=$totalMoney);
    }

    



}
