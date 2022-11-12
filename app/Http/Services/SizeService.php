<?php

namespace App\Http\Services;


use App\Models\Size;

use Cookie;

class SizeService
{
    public function __construct(Size $size)
    {
        $this->size = $size;
    }

  

    public function getAll() {
        return $this->size->orderBy('id','asc')->get(); //limit 
    }

   

    public function delete($id) {
        $size = $this->size->find($id);
        $size->delete();
    }

    public function update($id, $data) {
        $this->size->where('id', $id)->update($data);
        return $this->size->find($id);
    }

    public function add($data) {
        $size = $data;
        $size->save();
    }

    // public function create($id_size, $size_name) {
    //     $sizesize = new sizesize();
    //     $sizesize->id_size = $id_size;
    //     $sizesize->id_size = $this->findBysizeName($size_name)->id;
    //     $sizesize->save();
    // }

    public function find($id) {
        return $this->size->find($id);
    }



}
