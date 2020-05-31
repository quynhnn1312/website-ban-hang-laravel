@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng ký</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="customer-login my-account">
                        <form method="post" action="" class="login">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng ký</h2>
                                <p class="form-row form-row-wide">
                                    <label for="username">Họ tên <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="name" value="">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" value="">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">Password <span class="required">*</span></label>
                                    <input class="input-text" type="password" name="password" id="password">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="phone">Số điện thoại <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="phone" value="">
                                </p>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="login" value="Đăng ký">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
