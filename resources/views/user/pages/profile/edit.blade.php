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
<style>
    img{
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>

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
    User
@endsection
@section('title_layout')
    Edit User
@endsection
@section('actions_layout')
    {{-- <a href="{{route('admin.account.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Account
    </a> --}}
@endsection
@section('title_card')
    Edit User
@endsection
@section('content_card')
    <form action="" method="post">
        @csrf
        <div class="form-group ">
            <img src="{{ URL($users->URL )}}"><br>
          
        </div>
        <div class="form-group ">
            <label for="name">Fullname</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $users->fullname }}" >
        </div>
        <div class="form-group ">
            <label for="birthday">Birthday</label>
            <input type="datetime" class="form-control" name="birthday" id="birthday" value="{{ $users->birthday }}" >
        </div>
        <div class="form-group ">
            <label for="gender">Gender </label>
            <input type="text" class="form-control" name="gender" id="gender" value="{{ $users->gender }}"  >
        </div>
        <div class="form-group ">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $users->email }}"  >
        </div>
        <div class="form-group ">
            <label for="phone">Phone</label>
            <input type="phone" class="form-control" name="phone" id="phone" value="{{ $users->phone }}"  >
        </div>
        <div class="form-group ">
            <label for="address">Address </label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $users->address }}"  >
        </div>

            <div class="form-group">
                <label for="URL" class="custom-file-label">Avata</label>
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

