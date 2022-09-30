@extends('admin.layouts.main')
@section('title_page')
    {{ config('app.name') }}
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
        $menu_parent = 'type_product';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    List Type product
@endsection
@section('title_layout')
    List Type product
@endsection
@section('actions_layout')
    <a href="{{route('admin.account.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> Danh sách loại sản phẩm
    </a>
@endsection
@section('title_card')
Danh sách loại sản phẩm
@endsection

@section('onload')
    @if ($message = Session::get('info'))
        onload="abc('{{$message}}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="abc('{{$message}}' , 'danger')"
    @endif
@endsection

@section('content_card')
    

    
    {{-- <a href="{{route('admin.role.showcreate')}}" class="btn btn-primary mb-2">Thêm vai trò</a> --}}
    @if(!empty($success))
        <h6 class="alert alert-info"> {{$success}}</h6>
    @endif

    <table class="table search-table-outter">
        <thead>
        @if(!$typeProducts->isEmpty())
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Description</th>
                <th>&nbsp;</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @forelse ($typeProducts as $item)
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row">{{$item->id}}</th>
                
                <th class="align-middle text-center" scope="row">{{$item->name}}</th>
                <th class="align-middle text-center" scope="row">{{$item->description}}</th>
                
                <td class="align-center justify-content-center">
                    
                    <a href="{{route('admin.type_product.showedit')}}/{{$item->id}}" class="btn btn-icon btn-success btn-sm btn-icon-md btn-circle mx-1"
                       title="Sửa">
                        <i class="fa fa-edit"></i>
                    </a>
                    <span class="btn btn-icon btn-danger delete-btn btn-sm btn-icon-md btn-circle mx-1"
                          data-toggle="tooltip" data-placement="top" data-id="{{$item->id}}" title="Xóa">
                                    <i class="fa fa-trash"></i>
                    </span>
                </td>
            </tr>
        @empty
            <h1 class="text-light text-center">Không có dữ liệu</h1>
        @endforelse

        </tbody>
    </table>
    <div class="d-flex justify-content-center text-dark">
        {{$typeProducts->links()}}
    </div>
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

