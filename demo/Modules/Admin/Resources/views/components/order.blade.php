@if($orders)
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
        @if(isset($orders))
            @php($i=1)
            @foreach($orders as $key => $order)
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                        <a href="{{ route('get.detail.product',[Str::slug($order->product->pro_name, '-'), $order->product->id]) }}" target="_blank">
                            {{ isset($order->product->pro_name) ? $order->product->pro_name : '' }}
                        </a>
                    </td>
                    <td>
                        <img width="80px" src="{{ isset($order->product->pro_avatar) ? asset(pare_url_file($order->product->pro_avatar)) : '' }}" alt="">
                    </td>
                    <td>{{ number_format($order->or_price,0,',','.') }} Vnđ</td>
                    <td>{{ $order->or_qty }}</td>
                    <td>{{ number_format($order->or_qty * $order->or_price,0,',','.') }} Vnđ</td>
                    <td>
                        <a href=""><i class="fa fa-trash-o"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endif
