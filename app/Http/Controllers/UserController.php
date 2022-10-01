<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $data =[];

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){ 
        auth()->logout();
        return view('user.pages.login');
    }

    public function profile($id=null){
        $this->data['user']= $this->userService->find($id);
        return view('user.pages.profile.index', $this->data);
    }
    
  
}
