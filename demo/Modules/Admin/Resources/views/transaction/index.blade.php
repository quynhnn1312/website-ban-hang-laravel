@extends('admin::layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý đơn hàng</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Quản lý đơn hàng</li>
            </ol>
        </div>
        <!-- /.col -->
    </div>
@stop

@section('content')
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @if($transactions)
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ isset($transaction->user->name) ? $transaction->user->name : '[N/A]'  }}</td>
                    <td>{{ $transaction->tr_adress}}</td>
                    <td>{{ $transaction->tr_phone}}</td>
                    <td>{{ number_format($transaction->tr_total,0,',','.') }}đ</td>
                    <td>
                        @if($transaction->tr_status == 1)
                            <a href="#" class="badge badge-success">Đã xử lý</a>
                        @else
                            <a href="{{ route('admin.get.active.transaction',$transaction->id) }}" class="badge badge-secondary">Chờ xử lý</a>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{ route( 'admin.get.action.transaction' ,['delete', $transaction->id] ) }}"><i class="fas fa-trash-alt"></i> Xóa</a>
                        <a class="btn btn-sm btn-outline-info js-order-item" data-id="{{ $transaction->id }}" href="{{ route( 'admin.get.view.order' ,$transaction->id) }}"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết mã đơn hàng #<b class="transaction_id"></b> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="md-content">

                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $(function () {
            $('.js-order-item').click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $('.transaction_id').text('').text($this.attr('data-id'))
                $('#modal-lg').modal('show')

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if(data)
                        {
                            $('#md-content').html(data)
                        }
                    },
                    error: function(error) {}
                }, );
            })
        })
    </script>
@stop
