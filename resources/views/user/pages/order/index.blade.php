@extends('user.layouts.main')

@section('title')
    Order
@endsection
@section('css')
<style>
    img{
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
@endsection

@section('js_custom')

@endsection

@section('content')
<div class="cart-table-area section-padding-100">
<table class="table">
    <thead>
      <tr>
        <th scope="">#</th>
        <th scope="">User_id</th>
        <th scope="">Stt_id</th>
        <th scope="">Total Price</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($order as $item)
        <tr>
        <th scope="row">{{ $item->id }}</th>
        <td class="text-right">{{ $item->user_id }}</td>
        <td class="text-right">{{ $item->stt_id }}</td>
        <td class="text-right">{{ $item->total_price }} </td>
        </tr>
    @endforeach
      
      
    </tbody>
  </table>
</div>
@endsection