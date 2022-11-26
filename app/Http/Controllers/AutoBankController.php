<?php

namespace App\Http\Controllers;

use App\Models\AutoBank;
use App\Http\Requests\StoreAutoBankRequest;
use App\Http\Requests\UpdateAutoBankRequest;
use App\Http\Services\AutoBankService;
use Database\Seeders\AutoBankSeeder;

class AutoBankController extends Controller
{

    public $data = [];
    public function __construct(AutoBankService $autoBankService)
    {
        $this->autoBankService = $autoBankService;
    }

    public function index()
    {
        $this->data['transactions'] = collect($this->autoBankService->getTransactions());
        return view('admin.pages.autoBank.index',$this->data);
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
