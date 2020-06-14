@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="index.html">Giỏ hàng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Liên hệ</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container wrapper">
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                    @csrf
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        <!--REVIEW ORDER-->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Danh sách sản phẩm <div class="pull-right"><small><a class="afix-1" href="{{ route('get.list.shopping.cart') }}">Cập nhật</a></small></div>
                            </div>
                            <div class="panel-body">
                                @if(isset($products))
                                    @foreach($products as $product)
                                        <div class="form-group">
                                            <div class="col-sm-3 col-xs-3">
                                                <img class="img-responsive" width="70px" src="{{ asset(pare_url_file($product->options->avatar)) }}" />
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="col-xs-12">{{ $product->name }}</div>
                                                <div class="col-xs-12"><small>Số lượng x <span>{{ $product->qty }}</span></small></div>
                                            </div>
                                            <div class="col-sm-3 col-xs-3 text-right">
                                                <h6>{{ number_format($product->price,0,',','.') }}<span>đ</span></h6>
                                            </div>
                                        </div>
                                        <div class="form-group"><hr /></div>
                                    @endforeach
                                @endif
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Tổng tiền thanh toán</strong>
                                        <div class="pull-right"><span>{{ \Cart::subtotal() }}</span><span>đ</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Thông tin thanh toán</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="address" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Email:</strong></div>
                                    <div class="col-md-12">
                                        <input type="email" name="email" class="form-control" value="{{ get_data_user('web', 'email') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Phone:</strong></div>
                                    <div class="col-md-12">
                                        <input type="number" name="phone" class="form-control" value="{{ get_data_user('web', 'phone') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                    <div class="col-md-12">
                                        <textarea name="note" class="form-control" id="" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><button type="submit" class="btn btn-success">Xác nhận thông tin</button></div>
                                </div>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->
                        <!--CREDIT CART PAYMENT-->
                        <!--CREDIT CART PAYMENT END-->
                    </div>

                </form>
            </div>
            <div class="row cart-footer">

            </div>
        </div>
    </div>
@stop
