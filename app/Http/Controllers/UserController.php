<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Http\Services\AccountService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $data =[];

    public function __construct(UserService $userService, AccountService $accountService){
        $this->userService = $userService;
        $this->accountService = $accountService;
    }

    public function index(){ 
        auth()->logout();
        return view('user.pages.login');
    }

    public function profile($id=null){
        if($id == null && auth()->user()!=null)
            $id = auth()->user()->id;
        $this->data['user']= $this->userService->find($id);
        return view('user.pages.profile.index', $this->data);
    }
    
    public function showEdit($id){
        $this->data['users'] = $this->userService->find($id);
        $this->data['account'] = $this->accountService->getAll();
        if($id!=auth()->user()->id){
            return redirect(route('user.profile.index', ['id' => auth()->user()->id]))->with('warning','Bạn không có quyền sửa'); 
        }
        return view('user.pages.profile.edit', $this->data);
    }

    public function edit($id, Request $request)
    {
        $users =  $this->userService->find($id);
        $data['fullname'] = $request->name;
        $data['birthday'] = $request->birthday;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone']= $request->phone;
        $data['URL'] = $users->URL;

        if ($request->hasFile('URL')) {
            $file = $request->URL;
            $path = $file->store('images');
            $file->move(public_path('images'), $path);

            $data['URL'] = $path;
        }
        
        
        $data['address']= $request->address;
        // dd($request->all());
        $this->userService->update($id, $data);
        return redirect(route('user.profile.index', ['id' => $id]))->with('info','Cập nhật thành công');
    }
  
}
