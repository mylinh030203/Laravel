<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use App\Http\Services\AccountService;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public $data=[];
    public function __construct(AccountService $accountService, RoleService $roleService, UserService $userService)
    {
    $this->accountservice = $accountService;
    $this->roleService = $roleService;
    $this->userService = $userService;
    }

    public function index(Request $request)
    {
        if($request->keywords == "")
            $this->data['accounts']=$this->accountservice->getAll();
        else
            $this->data['accounts'] = $this->accountservice->findkey($request->keywords);
        return view('admin.pages.account.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|unique:accounts|max:15|alpha_dash',
                'password' => 'required|min:6',
            ],
            [
                'username.required' => 'Vui lòng nhập tên tài khoản',
                'username.unique' => 'Tên tài khoản này đã tồn tại',
                'username.max' => 'Không được quá 15 ký tự',
                'username.alpha_dash' => 'Không chứa ký tự đặc biệt',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất phải 6 ký tự',
            ]
        );
        $account = new Account();
        $account->username = $request->username;
        $account->password = $request->password;
        $account->role_id = $request->role_id;
        $this->accountservice->add($account);
        $user = new User();
        $user->account_id = $account->id;
        $user->money = 0;
        $this->userService->add($user);
        return redirect(route('admin.account.index'))->with('info','Thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function delete($id=null)
    {
        $this->accountservice->delete($id);
        return $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function showCreate()
    {
        $this->data['Roles']= $this->roleService->getAll();
        return view('admin.pages.account.create',$this->data);
    }

    public function login(Request $request){
        $account = $this->accountservice->checkLogin($request->username, $request->password);
        if($account != null){
            $user = $account->getUser;
            //Login authencation
            auth()->login($user);
            if($account->getRole->role_name == "user")
                return redirect(route('user.home.index'))->with('info','Đăng nhập thành công');
            else{
                return redirect(route('admin.account.index'))->with('info','Đăng nhập thành công');
            }
        }else{
            return redirect(route('login'))->with('error','Đăng nhập thất bại');
        }
    }

    public function showEdit($id){
        $this->data['account'] = $this->accountservice->find($id);
        $this->data['role'] = $this->roleService->getAll();
        return view('admin.pages.account.edit', $this->data);
    }


    public function edit($id, Request $request)
    {
       
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $data['role_id'] = $request->role_id;
        $this->accountservice->update($id,$data);
        return redirect(route('admin.account.index'))->with('info','Cập nhật thành công');
    }

    
    public function update(UpdateAccountRequest $request, Account $account)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
