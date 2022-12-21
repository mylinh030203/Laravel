@extends('user.layouts.main')

@section('title')
    Shop
@endsection

@section('menu')
    @php
        $menu = 'shop';
    @endphp
@endsection

@section('content')
    <div class="shop_sidebar_area">



        <!-- ##### Single Widget ##### -->
        <div class="widget catagory mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Categories</h6>

            <!--  Catagories  -->
            <div class="catagories-menu">
                <ul>
                    @foreach ($type as $item)
                        <li><a class="active" href="?idtypeProduct={{ $item->id }}">{{ $item->name }}</a></li>
                    @endforeach
                    {{-- hello
                <li class="active"><a href="#">Chairs</a></li>
                <li><a href="#">Beds</a></li>
                <li><a href="#">Accesories</a></li>
                <li><a href="#">Furniture</a></li>
                <li><a href="#">Home Deco</a></li>
                <li><a href="#">Dressings</a></li>
                <li><a href="#">Tables</a></li> --}}
                </ul>
            </div>
        </div>

    </div>

    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                        <!-- Total Products -->
                        <div class="total-products">
                            <p>Showing 1-8 0f 25</p>
                            <div class="view d-flex">
                                <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                            <div class="sort-by-date d-flex align-items-center mr-15">
                                <p>Sort by</p>
                                <form action="#" method="get">
                                    <select name="select" id="sortBydate">
                                        <option value="value">Date</option>
                                        <option value="value">Newest</option>
                                        <option value="value">Popular</option>
                                    </select>
                                </form>
                            </div>
                            <div class="view-product d-flex align-items-center">
                                <p>View</p>
                                <form action="#" method="get">
                                    <select name="select" id="viewProduct">
                                        <option value="value">12</option>
                                        <option value="value">24</option>
                                        <option value="value">48</option>
                                        <option value="value">96</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                @foreach ($products as $item)
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url($item->URL) }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url($item->URL) }}" alt="">
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">{{ number_format($item->price, 0, '', ',') }} VND</p>
                                    <a href="{{ route('user.shop.detail', ['id' => $item->id]) }}">
                                        <h6>{{ $item->name }}</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="cart">
                                        <a href="cart.html" data-toggle="tooltip" data-placement="left"
                                            title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Single Product Area -->


                <!-- Single Product Area -->
                {{-- <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src={{ url('user_asset/img/product-img/product2.jpg') }} alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="img/product-img/product3.jpg" alt="">
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="cart">
                                <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="img/product-img/product3.jpg" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="img/product-img/product4.jpg" alt="">
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                       
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="cart">
                                <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="img/product-img/product4.jpg" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="img/product-img/product5.jpg" alt="">
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                       
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="cart">
                                <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="img/product-img/product5.jpg" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="img/product-img/product6.jpg" alt="">
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                       
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="cart">
                                <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="img/product-img/product6.jpg" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="img/product-img/product1.jpg" alt="">
                    </div>

                    <!-- Product Description --> --}}
                <div class="product-description d-flex align-items-center justify-content-between">
                    <!-- Product Meta Data -->

                    <!-- Ratings & Cart -->
                    <div class="ratings-cart text-right">
                        <div class="ratings">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="cart">
                            <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img
                                    src="img/core-img/cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
@endsection
