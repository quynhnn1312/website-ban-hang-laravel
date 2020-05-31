@extends('admin::layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý thành viên</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Quản lý thành viên</li>
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
            <th scope="col">Tên hiển thị</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($users))
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <img width="150px" src="{{ asset(pare_url_file($user->avatar)) }}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-info" href=""><i class="fas fa-edit"></i> Cập nhật</a> &nbsp;
                            <a class="btn btn-sm btn-outline-info" href=""><i class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop
