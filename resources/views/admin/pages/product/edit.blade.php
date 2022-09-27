@extends('admin.layouts.main')
@section('title_page')
    Create - Account - {{ config('app.name') }}
@endsection
@section('name_user')
    @if (auth()->user() != null)
        {{ auth()->user()->fullname }}
    @endif
@endsection

@section('email_user')
@if (auth()->user() != null)
{{ auth()->user()->email }}
@endif
@endsection

@section('role_user')
    @if (auth()->user() != null)
    <span class=" my-1 text-center
    badge badge-{{auth()->user()->getAccount->getRole->color}}"> {{auth()->user()->getAccount->getRole->role_name}}</span> 
    @endif
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
    <a href="{{route('admin.product.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
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
            {{-- <label for="type_id">Mã loại sản phẩm</label>
            <select class="form-control" id="exampleFormControlSelect1" name='type_id' >  
                @foreach ($Product->getAll() as $item)
                <option value='{{ $item->id }}'>{{ $item->name }}</option>
                @endforeach
            </select> --}}
          
        </div>
        <div class="form-group ">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $Product->name }}" >
        </div>
        <div class="form-group ">
            <label for="description">Mô tả</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $Product->description }}" >
        </div>
        <div class="form-group ">
            <label for="material">Chất liệu </label>
            <input type="text" class="form-control" name="material" id="material" value="{{ $Product->material }}"  >
        </div>
        <div class="form-group ">
            <label for="origin">Xuất xứ</label>
            <input type="text" class="form-control" name="origin" id="origin" value="{{ $Product->origin }}"  >
        </div>
        <div class="form-group ">
            <label for="price">Giá</label>
            <input type="text" class="form-control" name="price" id="price" value="{{ $Product->price }}"  >
        </div>
    
            <div class="form-group">
                <label for="URL" class="custom-file-label">Image</label>
                <input type="file" class="form-control" id="URL" name="URL" />
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

