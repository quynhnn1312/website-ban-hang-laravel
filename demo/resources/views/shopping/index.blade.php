@extends('layouts.app')
@section('content')
<div class="our-product-area new-product">
    <div class="container">
        <div class="area-title">
            <h2>Giỏ hàng của bạn</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($products))
                    @php($i=1)
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $product->name}}</td>
                            <td>
                                <img width="80px" src="{{ asset(pare_url_file($product->options->avatar)) }}" alt="">
                            </td>
                            <td>{{ number_format($product->price,0,',','.') }}đ</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ number_format($product->qty * $product->price,0,',','.') }}</td>
                            <td>
                                <a href=""><i class="fa fa-pencil"></i> Cập nhật</a> &nbsp;
                                <a href="{{ route('delete.shopping.cart', $key) }}"><i class="fa fa-trash-o"></i> Xóa</a>
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                @endif
            </tbody>
        </table>
        <h4 class="pull-right">Tổng tiền cần thanh toán : {{ \Cart::total(0,3) }} <a class="btn btn-success" href="{{ route('get.form.pay') }}">Thanh toán</a></h4>
    </div>
</div>
@stop
