<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>@yield('title')</title>


    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">


    {{-- toastr --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/css/toastr.min.css">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('/user_asset/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/user_asset/style.css') }}">
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


    @yield('css')

</head>

<body @yield('onload')>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="cart-fav-search mb-10">
                <a href="#" class="search-nav">
                    <img alt="Logo" src="{{ asset('/admin/assets/media/logos/default-dark.svg') }}"
                        class="h-25px app-sidebar-logo-default" />
                </a>
            </div>
            <!-- Amado Nav -->
            @yield('menu')
            <nav class="amado-nav">
                <ul>
                    <li class="{{ $menu == 'home' ? 'active' : '' }}"><a href="{{ route('user.home.index') }}">Home</a>
                    </li>
                    <li class="{{ $menu == 'shop' ? 'active' : '' }}"><a href="{{ route('user.shop.index') }}">Shop</a>
                    </li>
                    <li class="{{ $menu == 'profile' ? 'active' : '' }}"><a
                            href="{{ route('user.order.index') }}">Order</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="{{ route('login') }}"
                    class="btn amado-btn mb-15">{{ auth()->user() != null ? auth()->user()->fullname : 'Login' }}</a>
            </div>


            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="{{ route('user.profile.index') }}"
                    class="cart-nav">{{ auth()->user() != null ? 'Xem thông tin' : '' }}</a>
                <a style="color: red" href="{{ route('user.deposit.index') }}"
                    class="cart-nav">{{ auth()->user() != null ? number_format(auth()->user()->money, 0, '', ',') : '' }}&nbsp;
                    VND</a>
                <a href="{{ route('user.cart.index') }}" class="cart-nav"><img
                        src="{{ url('user_asset/img/core-img/cart.png') }}" alt=""> Cart
                    <span>({{ $count }})</span></a>
                <a href="{{ route('user.deposit.index') }}" class="fav-nav"><img
                        src="{{ url('user_asset/img/core-img/favorites.png') }}" alt=""> Deposit</a>
                <a href="#" class="search-nav"><img src="{{ url('user_asset/img/core-img/search.png') }}"
                        alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        @yield('content')
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate
                            consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.html"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/"
                                target="_blank">Themewagon</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#footerNavContent" aria-controls="footerNavContent"
                                    aria-expanded="false" aria-label="Toggle navigation"><i
                                        class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.html">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="shop.html">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="product-details.html">Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="cart.html">Cart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{ asset('/user_asset/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('/user_asset/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('/user_asset/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('/user_asset/js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('/user_asset/js/active.js') }}"></script>
    @yield('js_custom')
</body>
<script>
    function onload(text, type) {
        if (type == "success")
            toastr.success(text)
        else if (type == "info")
            toastr.success(text)
        else if (type == "warning")
            toastr.warning(text)
        else if (type == "danger")
            toastr.error(text)
    }
</script>

</html>
