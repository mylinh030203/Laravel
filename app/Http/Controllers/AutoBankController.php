<?php

namespace App\Http\Controllers;

use App\Models\AutoBank;
use App\Http\Requests\StoreAutoBankRequest;
use App\Http\Requests\UpdateAutoBankRequest;
use App\Http\Services\AutoBankService;
use App\Http\Services\CartService;
use App\Http\Services\BankService;
use Database\Seeders\AutoBankSeeder;

class AutoBankController extends Controller
{

    public $data = [];
    public function __construct(AutoBankService $autoBankService, CartService $cartService, BankService $bankService)
    {
        $this->autoBankService = $autoBankService;
        $this->cartService = $cartService;
        $this->bankService = $bankService;
    }

    public function index()
    {
        $this->data['transactions'] = collect($this->autoBankService->getTransactions());
        return view('admin.pages.autoBank.index',$this->data);
    }

    public function indexDeposit()
    {
        $bank = $this->bankService->getFirst();
        $number = $bank->number;
        $shortName = $bank->shortName;
        $description = "USER".auth()->user()->id;
        $this->data['count'] = $this->cartService->countProduct();
        $this->data['linkQR'] = "https://api.vietqr.io/".$shortName."/".$number."/10000/".$description."/vietqr_net_2.jpg";
        $id = ($this->autoBankService->solveTransaction());
        if(auth()->user()->id == $id){
            return redirect(route('user.home.index'))->with('success','Nạp tiền thành công');
        }
        return view('user.pages.deposit.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAutoBankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAutoBankRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AutoBank  $autoBank
     * @return \Illuminate\Http\Response
     */
    public function show(AutoBank $autoBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutoBank  $autoBank
     * @return \Illuminate\Http\Response
     */
    public function edit(AutoBank $autoBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAutoBankRequest  $request
     * @param  \App\Models\AutoBank  $autoBank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAutoBankRequest $request, AutoBank $autoBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutoBank  $autoBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutoBank $autoBank)
    {
        //
    }
}
