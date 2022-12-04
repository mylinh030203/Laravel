@extends('user.layouts.main')

@section('title')
    Home
@endsection

@section('menu')
    @php
    $menu = 'home';
    @endphp
@endsection

@section('onload')
    @if ($message = Session::get('success'))
        onload="onload('{{$message}}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="onload('{{$message}}' , 'danger')"
    @endif
@endsection

@section('content')
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/1.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    
                </div>
            </a>
        </div>

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/2.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    
                </div>
            </a>
        </div>
        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/4.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                   
                </div>
            </a>
        </div>
        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/5.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    
                </div>
            </a>
        </div>
        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/6.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    
                </div>
            </a>
        </div>
        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/7.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                 
                </div>
            </a>
        </div>
        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/8.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                </div>
            </a>
        </div>
        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/3.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                </div>
            </a>
        </div>
        <!-- Single Catagory -->
        {{-- <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ url('/user_asset/img/bg-img/9.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                </div>
            </a>
        </div> --}}
    </div>
</div>
@endsection