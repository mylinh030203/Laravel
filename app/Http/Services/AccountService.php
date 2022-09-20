<?php

namespace App\Http\Services;


use App\Models\Account;

use Cookie;

class AccountService
{
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function findByaccountName($accountName){
        return $this->account->where('account_name', '=', $accountName)->first();
    }

    public function getAll() {
        return $this->account->orderBy('id','asc')->paginate(); //limit 
    }

    public function delete($id) {
        $account = $this->account->find($id);
        $account->delete();
    }

    public function update($id, $data) {
        $this->account->where('id', $id)->update($data);
        return $this->account->find($id);
    }

    public function add($data) {
        $account = $data;
        $account->save();
    }

    // public function create($id_account, $account_name) {
    //     $accountAccount = new accountAccount();
    //     $accountAccount->id_account = $id_account;
    //     $accountAccount->id_account = $this->findByaccountName($account_name)->id;
    //     $accountAccount->save();
    // }

    public function find($id) {
        return $this->account->find($id);
    }


    public function paginate($limit, $keywords){
        $account = $this->account;
        $account = $account->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $account->where('account_name', 'like', '%'. $keywords.'%');
            $account->orWhere('description', 'like', '%'. $keywords.'%');
        }
        return $account->paginate($limit)->withQueryString();
    }
    public function checkLogin($username, $password){
        $account = $this->account;
        if($account->where('username', '=',  $username)->where('password', '=',  $password)->first()!=null){
            return true;
        }else{
            return false;
        }
    }

}