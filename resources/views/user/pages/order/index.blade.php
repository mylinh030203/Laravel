@extends('user.layouts.main')

@section('title')
    Order
@endsection
@section('css')
<style>
    a{
      font-size: 15px
    }
    a:hover{
      font-size: 18px
    }
</style>
@endsection

@section('js_custom')

@endsection

@section('content')
<div class="mt-5">
<table class="table table-responsive">
    <thead>
      <tr>
        <th class="text-center" scope="">#</th>
        <th class="text-center" scope="">Name</th>
        <th class="text-center" scope="">Products</th>
        <th class="text-center" scope="">Status</th>
        <th class="text-center" scope="">Total Price</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($order as $item)
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
        </tr>
    @endforeach
      
      
    </tbody>
  </table>
</div>
@endsection