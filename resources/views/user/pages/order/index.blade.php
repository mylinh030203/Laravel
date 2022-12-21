@extends('user.layouts.main')

@section('title')
    Order
@endsection

@section('menu')
    @php
        $menu = 'order';
    @endphp
@endsection

@section('css')
    <style>
        a {
            font-size: 15px
        }

        a:hover {
            font-size: 18px
        }
    </style>
@endsection

@section('onload')
    @if ($message = Session::get('success'))
        onload="onload('{{ $message }}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="onload('{{ $message }}' , 'danger')"
    @endif
    @if ($message = Session::get('info'))
        onload="onload('{{ $message }}' , 'info')"
    @endif
@endsection

@section('js_custom')
    @include('admin.includes.scripts')
@endsection

@section('content')
    <div class="mt-5">
        @foreach ($statuses as $item)
            <a class="btn btn-{{ $item->color }} btn-sm" href="?stt={{ $item->id }}">{{ $item->name }}</a>
        @endforeach
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th class="text-center" scope="">#</th>
                    <th class="text-center" scope="">Products</th>
                    <th class="text-center" scope="">Status</th>
                    <th class="text-center" scope="">Total Price</th>
                    <th class="text-center" scope="">Hủy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <th class="text-center" scope="row">{{ $item->id }}</th>
                        <td class="text-left">
                            @foreach ($item->getDetailOrders as $detail)
                                <a href="{{ route('user.shop.detail', ['id' => $detail->getProduct->id]) }}"><span
                                        class="text-primary"> {{ $detail->getProduct->name }}</span> </a>
                                <span class="text-danger"> x{{ $detail->quantity }}</span><br>
                            @endforeach

                        </td>
                        <td class="text-center">
                            <span class="badge badge-{{ $item->getStt->color }}">{{ $item->getStt->name }}</span>
                        </td>
                        <td class="text-right">{{ number_format($item->total_price, 0, '', ',') }} VND </td>
                        <td>
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <input type="hidden" value="3" name="stt_id">
                                @if ($item->getStt->id == 1 || $item->getStt->id == 2)
                                    <input type="submit" class=" btn btn-icon btn-info btn-sm" title="Hủy đơn hàng"
                                        value="❌">
                                @endif


                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
