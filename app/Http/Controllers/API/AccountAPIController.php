<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\AccountService;
use App\Models\Account;

class AccountAPIController extends Controller
{
    public function __construct(AccountService $accountService){
        $this->accountService = $accountService;
    }
    public $data = [];
    public function index(){
       $data = $this->accountService->getAll();
        return $data;
    }

    public function find($id = null){
        $data = $this->accountService->find($id);
        
        if ($data != null) {
            return [
                'message' => 'ok',
                'data' => $data
            ];
        }else{
            return [
                'message' => 'error',  
            ];
        }    
     }

    public function delete($id = null){
        $data = $this->accountService->delete($id);
        if ($data ) {
            return [
                'message' => 'ok',
                
            ];
        }else{
            return [
                'message' => 'error',  
            ];
        }    
    }

    public function add(Request $request){
        $account = new Account();
        $account->username = $request->username;
        $account->password = $request->password;
        $account->role_id = $request->role_id;
        $this->accountService->add($account);
        return [
            'message' =>"ok",
            'data'=> $account
        ];
        // return $request;
    }
    
}
