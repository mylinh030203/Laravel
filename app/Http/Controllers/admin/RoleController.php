<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $data = [];

    protected $limit = 5;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    //request là lấy dữ liệu từ View gửi cho controller (không lấy dữ liệu từ csdl)
    public function index(Request $request){
        // dd($request->all());
        $keywords = $request->keywords;
        $listRole = $this->roleService->paginate($this->limit, $keywords);
        $this->data['roles'] = $listRole;
        return View('admin.pages.role.index', $this->data);
    }

    public function delete($id=null) {
        if ($id == null)
            return redirect(route('admin.role.index'))->with('error', 'Không tìm thấy id cần xóa');
        $this->roleService->delete($id);
        return $id;
        //index.blade.php.blade.php
    }


    public function create(Request $request) {
        $request->validate(
            [
                'role_name' => 'required|unique:roles|max:15|alpha_dash',
                'description' => 'required|min:6',
            ],
            [
                'role_name.required' => 'Vui lòng nhập tên chức vụ',
                'role_name.unique' => 'Quyền này đã tồn tại',
                'role_name.max' => 'Không được quá 15 ký tự',
                'role_name.alpha_dash' => 'Không chứa ký tự đặc biệt',
                'description.required' => 'Vui lòng nhập mô tả',
                'description.min' => 'Mô tả ít nhất phải 6 ký tự',
            ]
        );
        $data = new Role();
        $data->role_name = $request->role_name;
        $data->description = $request->description;
        $data->color = $request->color;

        $this->roleService->add($data);

        return redirect(route('admin.role.index'))->with('info', 'Thêm role thành công');
    }

    public function showCreate() {
        return view('admin.pages.role.create');
    }

    public function showEdit($id) {
        $this->data['role'] = $this->roleService->find($id);
        return view('admin.pages.role.edit', $this->data);
    }

    public function edit($id, Request $request) {
        $data = ['role_name'=>$request->role_name, 'description'=>$request->description, 'color'=>$request->color];
        $this->roleService->update($id, $data);

        return redirect(route('admin.role.index'))->with('info', 'Cập nhật thành công');
    }
}
