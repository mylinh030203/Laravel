@extends('user.layouts.main')

@section('title')
    Order
@endsection

@section('menu')
    @php
    $menu = '';
    @endphp
@endsection
@section('css')
<style>
    a{
      font-size: 15px
    }
    a:hover{
      font-size: 18px
    }
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      height: 50%;
      width: 50%;
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
  <script type="">
      window.setTimeout( function() {
        window.location.reload();
      }, 5000);
  </script>
@endsection

@section('content')
  <img src="{{ $linkQR }}" class="center">
@endsection