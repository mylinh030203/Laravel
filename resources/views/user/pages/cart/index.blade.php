@extends('user.layouts.main')

@section('title')
    Cart
@endsection
@section('css')
<style>
    .sm-product{
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
@endsection

@section('onload')
    @if ($message = Session::get('success'))
        onload="onload('{{$message}}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="onload('{{$message}}' , 'danger')"
    @endif
@endsection

@section('js_custom')
<script>
    function plush(id) {
        let quantity = 1;
        console.log(quantity)
        // $.ajax({
        //     url: "http://127.0.0.1:8000/api/cart/change",
        //     type: "GET",
        //     data: [
        //         "id":2,
        //         "quantity":10
        //     ],
        //     // success: function(data) {
        //     //     console.log(data)
        //     // }
        // })   
    }
    $(document).on("click", ".changePlush", function () {
        var id = $(this).attr("data-id");
        console.log("Hello", id)
        $.ajax({
            url: "http://127.0.0.1:8000/api/cart/change",
            type: "GET",
            data: {
                id: id,
                quantity: 1
            },
            success: function(data) {
                window.location = "";
            }
        })   
    });

    $(document).on("click", ".changeSub", function () {
        var id = $(this).attr("data-id");
        console.log("Hello", id)
        $.ajax({
            url: "http://127.0.0.1:8000/api/cart/change",
            type: "GET",
            data: {
                id: id,
                quantity: -1
            },
            success: function(data) {
                window.location = "";
            }
        })   
    });
</script>
@endsection

@section('content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>
                {{-- {{ $cart }} --}}
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($cart as $item)
                            <tr>
                                <td class="cart_product_img">
                                    <a href="#"><img class="sm-product" src="{{ url($item->getProduct->URL) }}" alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5>{{ $item->getProduct->name }}</h5>
                                </td>
                                <td class="price">
                                    <span>{{number_format($item->getProduct->price, 0, '', ',')}} VND</span>
                                </td>
                                
                                <td class="qty">
                                    <div class="qty-btn d-flex">
                                        <p>Qty</p>
                                        <div class="quantity">
                                            <span class="qty-minus changeSub" data-id="{{$item->id}}" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{ $item->quantity }}">
                                            <span class="qty-plus changePlush" data-id="{{$item->id}}"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </td>
                               
                                <td class="price">
                                    <span>{{number_format($item->getProduct->price * $item->quantity, 0, '', ',')}} VND</span>
                                </td>

                                <td class="cart_product_desc">
                                    <h5>{{ $item->getSize->name }}</h5>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <form class="cart-summary" method="post" action="{{ route('user.order.create') }}">
                    @csrf
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>Total Quantity:</span> <span>{{ $totalQuantity }}</span></li>
                        <li><span>Total Money:</span><input type="hidden" name="total_price" value="{{ $totalMoney  }}"> <span>{{number_format($totalMoney, 0, '', ',')}} VND</span></li>
                    </ul>
                    @if ($cart->count() >0 )
                    <div class="cart-btn mt-100">
                        <input type="submit" class="btn amado-btn w-100" value="Checkout">
                    </div>
                    @endif
                    
                </form>
            </div>
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

      
    
@endsection