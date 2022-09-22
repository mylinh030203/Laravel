<?php

namespace App\Http\Services;


use App\Models\User;

use Cookie;

class UserService
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findByuserName($userName){
        return $this->user->where('user_name', '=', $userName)->first();
    }

    public function getAll() {
        return $this->user->orderBy('id','asc')->paginate(); //limit 
    }

    public function delete($id) {
        $user = $this->user->find($id);
        $user->delete();
    }

    public function update($id, $data) {
        $this->user->where('id', $id)->update($data);
        return $this->user->find($id);
    }

    public function add($data) {
        $user = $data;
        $user->save();
    }

    // public function create($id_user, $user_name) {
    //     $useruser = new useruser();
    //     $useruser->id_user = $id_user;
    //     $useruser->id_user = $this->findByuserName($user_name)->id;
    //     $useruser->save();
    // }

    public function find($id) {
        return $this->user->find($id);
    }


    public function paginate($limit, $keywords){
        $user = $this->user;
        $user = $user->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $user->where('user_name', 'like', '%'. $keywords.'%');
            $user->orWhere('description', 'like', '%'. $keywords.'%');
        }
        return $user->paginate($limit)->withQueryString();
    }
    public function checkLogin($username, $password){
        $user = $this->user;
        if($user->where('username', '=',  $username)->where('password', '=',  $password)->first()!=null){
            return true;
        }else{
            return false;
        }
    }

}
