@extends('admin::layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý danh mục</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Quản lý danh mục</li>
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
                <th scope="col">Tên danh mục</th>
                <th scope="col">Title Seo</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($categories))
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->c_name }}</td>
                        <td>{{ $category->c_title_seo }}</td>
                        <td>
                            <a href="{{ route('admin.get.action.category', ['status', $category->id]) }}" class="badge {{ $category->getStatus($category->c_active)['class'] }}">{{ $category->getStatus($category->c_active)['name'] }}</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-info" href="{{ route( 'admin.get.update.category', $category->id ) }}"><i class="fas fa-edit"></i> Cập nhật</a> &nbsp;
                            <a class="btn btn-sm btn-outline-info" href="{{ route( 'admin.get.action.category' ,['delete', $category->id ?? ''] ) }}"><i class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop
