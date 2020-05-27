@extends('admin::layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý bài viết</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Quản lý bài viết</li>
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
                <button type="submit" class="btn btn-default mb-2"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên bài viết</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($articles))
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->ar_name }}</td>
                        <td>{{ $article->ar_description }}</td>
                        <td>
                            <a href="{{ route('admin.get.action.article', ['status', $article->id]) }}" class="badge {{ $article->getStatus($article->ar_status)['class'] }}">{{ $article->getStatus($article->ar_status)['name'] }}</a>
                        </td>
                        <td>{{ $article->created_at }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-info" href="{{ route( 'admin.get.update.article', $article->id ) }}"><i class="fas fa-edit"></i> Cập nhật</a> &nbsp;
                            <a class="btn btn-sm btn-outline-info" href="{{ route( 'admin.get.action.article',['delete', $article->id ?? ''] ) }}"><i class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop
