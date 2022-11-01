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
        $menu_parent = 'product';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Order
@endsection
@section('title_layout')
    Order
@endsection
@section('actions_layout')
    <a href="{{route('admin.product.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List order
    </a>
@endsection
@section('title_card')
    Order
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
<div class="mt-5">
    <table class="table table-responsive">
        <thead>
          <tr>
            <th class="text-center" scope="">#</th>
            <th class="text-center" scope="">Name</th>
            <th class="text-center" scope="">Products</th>
            <th class="text-center" scope="">Status</th>
            <th class="text-center" scope="">Total Price</th>
            <th class="text-center" scope="">Update</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($orders as $item)
            <tr>
            <th class="text-center" scope="row">{{ $item->id }}</th>
            <td class="text-center">{{ $item->getUser->fullname }}</td>
            <td class="text-left">
              @foreach($item->getDetailOrders as $detail)
              <a href="{{ route('user.shop.detail',['id' => $detail->getProduct->id]) }}"><span class="text-primary">  {{ $detail->getProduct->name }}</span> </a>
              <span class="text-danger"> x{{ $detail->quantity }}</span><br>
              @endforeach
              
            </td>
            <td class="text-center">
              <span class="badge badge-{{ $item->getStt->color }}">{{ $item->getStt->name }}</span>
            </td> 
            <td class="text-right">{{number_format($item->total_price, 0, '', ',')}} VND </td>

            <form method="post" action="{{ route('admin.order.editStt') }}">
                @csrf
                <td class="text-right">
                    <input type="hidden" name='id' value="{{ $item->id }}">
                    <select class="form-control" id="exampleFormControlSelect1" name='stt_id'>
                        @foreach ($status as $itemStt)
                        <option value='{{ $itemStt->id }}' {{ ($item->stt_id==$itemStt->id ) ? 'selected' : ''}} >{{ $itemStt->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="text-right">
                    <div class="form-group d-flex justify-content-center">
                    <input class="btn-success btn" type="submit" value="Update" name="submit" id="submit">
                    </div>
                </td>
             
            </form>
            </tr>
        @endforeach
          
          
        </tbody>
      </table>
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

