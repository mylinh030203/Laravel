@extends('admin.layouts.main')
@section('title_page')
    Home - {{ config('app.name') }}
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
        $menu_parent = 'role1';
        $menu_child = 'edit';
    @endphp
@endsection
@section('title_component')
    Home
@endsection
@section('title_layout')
    Home
@endsection
@section('actions_layout')
    <a href="{{route('admin.role.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Role
    </a>
@endsection
@section('title_card')
    Home
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
<form action="" method="POST">
    @csrf
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="PTHH">PTHH</label>
    <input type="text" id="PTHH" class="form-control" name="PTHH" value =" H2  +O2 = H2O"/>
    
    @isset( $pthh )
        {{ $pthh }}
    @endisset
    @error('PTHH')
        <span class="text-bold text-italic text-danger">{{$message}}</span>
     @enderror
    </div>


    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Search</button>

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

