@extends('admin::layouts.master')

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cập nhật danh mục</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Cập nhật danh mục</li>
            </ol>
        </div>
        <!-- /.col -->
    </div>
@stop

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            @include('admin::category.form')
        </div>
    </div>

@stop
