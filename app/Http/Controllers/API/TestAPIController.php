<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestAPIController extends Controller
{
    public $data = [];
    public function index(){
        return view('user.pages.APITest.index');
    }
    public function search(Request $request){
        $response = Http::post('https://api-balance-chemical-equations.herokuapp.com/api/v1/pthh', [
            'pthh' => $request->PTHH
        ])->json();
        $this->data['pthh'] = $response['result']['text'];
        return view('user.pages.APITest.index', $this->data);
    }
}
