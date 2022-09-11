<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }
    public function viewForm(){
        return view("Account.form");
    }
    public function solveForm(Request $request){
        // dd($request->all());
        return $request->username." ".$request->password;
    }
}
