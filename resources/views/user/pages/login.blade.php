@extends('admin.layouts.main')
@section('actions_layout')

@endsection
@section('title_card')
Login
@endsection

@section('css_custom')


@endsection
@section('menu')
    @php
        $menu_parent = 'account';
        $menu_child = 'login';
    @endphp
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
<div class="row d-flex justify-content-center align-items-center">
    <div class="col col-lg-6">
    <form>
        <!-- Email input -->
        <div class="form-outline mb-4">
        <input type="email" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
        </div>
    
        <!-- Password input -->
        <div class="form-outline mb-4">
        <input type="password" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
        </div>
    
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
        <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
            <label class="form-check-label" for="form2Example31"> Remember me </label>
            </div>
        </div>
    
        <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
        </div>
        </div>
    
        <!-- Submit button -->
        <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>
    
        <!-- Register buttons -->
        <div class="text-center">
        <p>Not a member? <a href="#!">Register</a></p>
        <p>or sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
        </button>
    
        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
        </button>
    
        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
        </button>
    
        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
        </button>
        </div>
    </form>
    </div>
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