<?php

namespace App\Http\Services;


use App\Models\DetailOrder;

use Cookie;

class DetailOrderService
{
    public function __construct(DetailOrder $detailOrder)
    {
        $this->detailOrder = $detailOrder;
    }

  

    public function getAll() {
        return $this->detailOrder->detailOrderBy('id','asc')->paginate(); //limit 
    }

    public function delete($id) {
        $detailOrder = $this->detailOrder->find($id);
        $detailOrder->delete();
    }

    public function update($id, $data) {
        $this->detailOrder->where('id', $id)->update($data);
        return $this->detailOrder->find($id);
    }

    public function add($data) {
        $detailOrder = $data;
        $detailOrder->save();
    }

    // public function create($id_detailOrder, $detailOrder_name) {
    //     $detailOrderdetailOrder = new detailOrderdetailOrder();
    //     $detailOrderdetailOrder->id_detailOrder = $id_detailOrder;
    //     $detailOrderdetailOrder->id_detailOrder = $this->findBydetailOrderName($detailOrder_name)->id;
    //     $detailOrderdetailOrder->save();
    // }

    public function find($id) {
        return $this->detailOrder->find($id);
    }



}
