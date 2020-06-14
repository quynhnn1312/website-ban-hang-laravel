@extends('admin::layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý liên hệ</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Quản lý liên hệ</li>
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
            <th scope="col">Tiêu đề</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Email</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($contacts))
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->c_title }}</td>
                    <td>{{ $contact->c_name }}</td>
                    <td>{{ $contact->c_content }}</td>
                    <td>{{ $contact->c_email }}</td>
                    <td>
                        <a href="{{ route('admin.action.contact', ['status', $contact->id]) }}" class="badge {{ $contact->getStatus($contact->c_status)['class'] }}">{{ $contact->getStatus($contact->c_status)['name'] }}</a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{ route( 'admin.update.contact', $contact->id ) }}"><i class="fas fa-edit"></i> Cập nhật</a> &nbsp;
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
