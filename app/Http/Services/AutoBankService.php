<?php

namespace App\Http\Services;


use App\Models\AutoBank;
use Illuminate\Support\Facades\Http;

class AutoBankService
{
    public function __construct(AutoBank $autoBank)
    {
        $this->autoBank = $autoBank;
    }

    public function findByautoBankName($autoBankName){
        return $this->autoBank->where('autoBank_name', '=', $autoBankName)->first();
    }

    public function getAll() {
        return $this->autoBank->orderBy('id','asc')->paginate(); //limit 
    }

    public function delete($id) {
        $autoBank = $this->autoBank->find($id);
        if ($autoBank == null)
            return false;
        $autoBank->delete();
        return true;
    }

    public function update($id, $data) {
        $this->autoBank->where('id', $id)->update($data);
        return $this->autoBank->find($id);
    }

    public function add($data) {
        $autoBank = $data;
        $autoBank->save();
    }

    // public function create($id_autoBank, $autoBank_name) {
    //     $autoBankautoBank = new autoBankautoBank();
    //     $autoBankautoBank->id_autoBank = $id_autoBank;
    //     $autoBankautoBank->id_autoBank = $this->findByautoBankName($autoBank_name)->id;
    //     $autoBankautoBank->save();
    // }
    public function getTransactions() {
        $response = Http::post('https://api.web2m.com/historyapiacb/Zuka030203/5563331/51E76C9A-CBAC-948C-77EF-7EF2CC75D6D8');
        return $response['transactions'];
    }

    public function find($id) {
        return $this->autoBank->find($id);
    }

   

    public function findKeywords($keywords){
        $autoBank = $this->autoBank;
        $autoBank = $autoBank->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $autoBank->where('username', 'like', '%'. $keywords.'%');
            $autoBank->orWhere('password', 'like', '%'. $keywords.'%');
        }
        return $autoBank->withQueryString();
    }

    public function findkey($keywords){
        return $this->autoBank->where('username', '=' , $keywords)->orWhere('password','=',$keywords)->paginate();
         
    }
    public function checkLogin($username, $password){
        $autoBank = $this->autoBank;
        return $autoBank->where('username', '=',  $username)->where('password', '=',  $password)->first();
    }

}
