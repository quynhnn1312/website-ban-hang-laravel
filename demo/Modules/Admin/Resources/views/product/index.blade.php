@extends('admin::layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý sản phẩm</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Quản lý sản phẩm</li>
            </ol>
        </div>
        <!-- /.col -->
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-2">
            <form class="form-inline" action="" >
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control mb-2 mr-sm-2" name="name" value="{{ \Request::get('name') }}"  placeholder="Nhập tên sản phẩm ...">
                </div>
                <div class="form-group">
                    <select class="form-control  mb-2 mr-sm-2" name="cate" id="">
                        <option value="">Danh mục</option>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : "" }} >{{ $category->c_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-default mb-2"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Loại sản phẩm</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Nổi bật</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($products))
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        {{ $product->pro_name }}
                        <ul style="padding-left: 16px">
                            <li><span><i class="fas fa-dollar-sign"></i> </span><span>12.000.000</span></li>
                            <li><span><i class="fas fa-dollar-sign"></i> </span><span>0%</span></li>
                        </ul>
                    </td>
                    <td>{{ isset($product->category->c_name) ? $product->category->c_name : [N\A] }}
                    <td>
                        <a href="{{ route('admin.get.action.product', ['active', $product->id]) }}"class="badge {{ $product->getStatus($product->pro_active)['class'] }}">{{ $product->getStatus($product->pro_active)['name'] }}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.get.action.product', ['hot', $product->id]) }}" class="badge {{ $product->getHot($product->pro_hot)['class'] }}">{{ $product->getHot($product->pro_hot)['name'] }}</a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{ route( 'admin.get.update.product', $product->id ) }}"><i class="fas fa-edit"></i> Cập nhật</a> &nbsp;
                        <a class="btn btn-sm btn-outline-info" href="{{ route( 'admin.get.action.product' ,['delete', $product->id ?? ''] ) }}"><i class="fas fa-trash-alt"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
