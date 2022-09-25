@extends('admin.layouts.main')
@section('title_page')
    Create - Account - {{ config('app.name') }}
@endsection
@section('name_user')
    Name User

@endsection
@section('email_user')
@endsection

@section('role_user')
    
@endsection

@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'account';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_component')
    Account
@endsection
@section('title_layout')
    Create Account
@endsection
@section('actions_layout')
    <a href="{{route('admin.account.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Account
    </a>
@endsection
@section('title_card')
    Create Account
@endsection
@section('content_card')
    
    <form action="" method="post" enctype="multipart/form-data" class="mt-5 py-5">
        @csrf
        <div class="form-group ">
            <label for="id">Mã sản phẩm</label>
            <input type="text" class="form-control" name="id" id="id"  >
        </div>
        <div class="form-group ">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" id="name"  >
        </div>
        <div class="form-group ">
            <label for="size">Kích thước/viên</label>
            <input type="text" class="form-control" name="size" id="size">
        </div>
        <div class="form-group ">
            <label for="mass">Khối lượng</label>
            <input type="text" class="form-control" name="mass" id="mass"  >
        </div>
        <div class="form-group ">
            <label for="material">Vật liệu</label>
            <input type="text" class="form-control" name="material" id="material"  >
        </div>
        <div class="form-group ">
            <label for="price">Giá</label>
            <input type="text" class="form-control" name="price" id="price"  >
        </div>
    
        <div class="form-group">
            <label for="detail">Giới thiệu chi tiết sản phẩm</label>
            <textarea id="detail" name="detail"></textarea>
        </div>
        
            <div class="form-group">
                <label for="fileToUpload" class="custom-file-label">Image</label>
                <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" />
                </div>
        <div class="form-group d-flex justify-content-center">
            <input class="btn-success btn" type="submit" value="Upload" name="submit" id="submit">
        </div>
    
    </div>
    </form>
   
@endsection
@section('footer_card')

@endsection
@section('content_layout')
    <!--begin::Card-->
    <div class="card shadow-sm card-bordered">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title">@yield('title_card')</h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse show">
            <div class="card-body">
                @yield('content_card')
            </div>
            <div class="card-footer">
                @yield('footer_card')
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection

