@extends('admin::layouts.master')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý đánh giá</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Quản lý đánh giá</li>
            </ol>
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-sm-10 mb-2 text-right">
            <a class="btn btn-sm btn-outline-success" href="{{ route('admin.get.create.category') }}"><i class="fas fa-plus"></i> Thêm mới</a>
        </div>
    </div>
@stop

@section('content')
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên TV</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Rating</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @if($ratings)
                @foreach($ratings as $rating)
                    <tr>
                        <td>{{ $rating->id }}</td>
                        <td>{{ isset($rating->user->name) ? $rating->user->name : '[N/A]'  }}</td>
                        <td>
                            <a href="{{ route('get.detail.product',[Str::slug($rating->product->pro_name, '-'), $rating->product->id]) }}" target="_blank">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N/A]'  }}</a>
                        </td>
                        <td>{{ $rating->ra_content }}</td>
                        <td>{{ $rating->ra_number }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-info" href="{{ route('admin.delete.rating',$rating->id) }}"><i class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop
