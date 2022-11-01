<?php

namespace App\Http\Services;


use App\Models\Status;

use Cookie;

class StatusService
{
    public function __construct(Status $status)
    {
        $this->status = $status;
    }

  

    public function getAll() {
        return $this->status->orderBy('id','asc')->get(); //limit 
    }

   

    public function delete($id) {
        $status = $this->status->find($id);
        $status->delete();
    }

    public function update($id, $data) {
        $this->status->where('id', $id)->update($data);
        return $this->status->find($id);
    }

    public function add($data) {
        $status = $data;
        $status->save();
    }

    // public function create($id_status, $status_name) {
    //     $statusstatus = new statusstatus();
    //     $statusstatus->id_status = $id_status;
    //     $statusstatus->id_status = $this->findBystatusName($status_name)->id;
    //     $statusstatus->save();
    // }

    public function find($id) {
        return $this->status->find($id);
    }



}
