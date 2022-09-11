<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    
    //ORM
    public $data = [];

    public function index()
    {
        //
    }

    public function formCreate()
    {
        $this->data['a'] = 10;
        return view('Account/form');
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|min:6|unique:accounts',
                'password' => 'required'
            ],
            [
                'username.required' => 'Phải nhập username',
                'username.min' => 'Ít nhất phải 6 ký tự',
                'username.unique' => 'Tên đã được sử dụng',
                'password.required' => 'Phải nhập password',
            ]
    );
        $username = $request->username;
        $password = $request->password;

        $account = new Account();
        $account->username = $username;
        $account->password = $password;

        $account->save();
        // dd($account);
        return redirect(route('trangchu'))->with('thongbao', 'Thêm thành công');
        // return $request;
    }

    public function search(Request $request)
    {
        $keyword = $request->kw;
        if ($keyword == null)
            return Account::all();
        return Account::where('username', 'like', '%'.$keyword.'%')
        ->orwhere('id', 'like', '%'.$keyword.'%')
        ->orwhere('password', 'like', '%'.$keyword.'%')
        ->get();
    }

    public function store(StoreAccountRequest $request)
    {
        //
    }

    public function show(Request $request)
    {
        // dd($request->all());
        $keyword = $request->keyword;
        $accounts = Account::where('username', 'like', '%'.$keyword.'%')->orwhere('password', 'like', '%'.$keyword.'%')->get();
       
        $this->data['user'] = '123';
        $this->data['danhsach'] = $accounts;
        return view('Account.index', $this->data);
    }

    public function formedit($id)
    {
        $accountf = Account::find($id);
        $this->data['sua'] = $accountf;
        return view('Account.edit', $this->data);
    }
    public function edit($id, Request $request)
    {
        // dd($request->all());
        $account = Account::find($id);
        $newUsername = $request->username;
        $newPassword = $request->password;
        $account->update(['username'=>$newUsername, 'password'=>$newPassword]);

        return redirect(route('trangchu'))->with('thongbao', 'sửa thành công');
    }
    public function delete($id)
    {
        $account = Account::find($id);
        // dd($account);
        $account->delete();
        return redirect(route('trangchu'))->with('thongbao', 'Xóa thành công');
    }
}
