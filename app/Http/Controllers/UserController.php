<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){ 
        auth()->logout();
        return view('user.pages.login');
    }
    
  
}
