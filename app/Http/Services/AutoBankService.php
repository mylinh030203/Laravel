<?php

namespace App\Http\Services;

use App\Http\Services\BankService;
use App\Http\Services\UserService;
use App\Models\AutoBank;
use Illuminate\Support\Facades\Http;

class AutoBankService
{
    public function __construct(AutoBank $autoBank, BankService $bankService, UserService $userService)
    {
        $this->autoBank = $autoBank;
        $this->bankService = $bankService;
        $this->userService = $userService;
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
        $bank = $this->bankService->getFirst();
        $password = $bank->password;
        $number = $bank->number;
        $token = $bank->token;
        $response = Http::post('https://api.web2m.com/historyapiacb/'.$password.'/'.$number.'/'.$token);
        return $response['transactions'];
    }
    public function getIdFromDescription($description) {
        
        $pos = strpos($description, "USER");
        $id = "";
        for ($i = $pos + 4; $i < strlen($description); $i++)
            if (is_numeric($description[$i]))
                $id .= $description[$i];
            else
                break;
        return $id;
    }

    public function solveTransaction(){
        $transactions = $this->getTransactions();
        $id_new = "";
        foreach($transactions as $item){
            if($item['type']=="IN"){
                $description = $item['description']; 
                if(str_contains($description, 'USER')){
                    $id = $this->getIdFromDescription($description); 
                    if($this->checkTransaction($item['transactionNumber']) && is_numeric($id)){
                        $autoBank = new AutoBank();
                        $autoBank->user_id = $id;
                        $autoBank->amount = $item['amount'];
                        $autoBank->transactionNumber = $item['transactionNumber'];
                        $this->add($autoBank);
                        $this->userService->changeMoney(-$autoBank->amount);
                        $id_new = $id;
                    }
                }         
            }
            return $id_new;
        }
    }

    public function checkTransaction($transactionNumber){
       return($this->autoBank->where('transactionNumber','=',$transactionNumber)->first()==null) ;
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
