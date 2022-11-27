<?php

namespace App\Http\Services;


use App\Models\Bank;

use Cookie;

class BankService
{
    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    

    public function getAll() {
        
        return $this->bank->orderBy('id','asc')->get(); //limit 
    }

    public function getFirst() {
        
        return $this->bank->orderBy('id','asc')->first(); //limit 
    }

    public function delete($id) {
        $bank = $this->bank->find($id);
        $bank->delete();
    }

    public function update($id, $data) {
        $this->bank->where('id', $id)->update($data);
        return $this->bank->find($id);
    }

    
    public function find($id) {
        return $this->bank->find($id);
    }


    public function add($data) {
        $bank = $data;
        $bank->save();
    }

}
