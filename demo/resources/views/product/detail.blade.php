@extends('layouts.app')

@section('content')
    <!-- breadcrumbs area start -->
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
                            <li class="category3"><span>{{ $productDetail->pro_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- product-details Area Start -->
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}"><img src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" alt="zo-th-1" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}"><img src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" alt="zo-th-2"></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}"><img src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" alt="ex-big-3" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h2 class="product-name"><a href="#">{{ $productDetail->pro_name }}</a></h2>
                                <div class="rating-price">
                                    <div class="pro-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                    <div class="price-boxes">
                                        <span class="new-price">{{ number_format($productDetail->pro_price,0,',','.') }}đ</span>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p>{{ $productDetail->pro_description }}</p>
                                </div>
                                <p class="availability in-stock">Availability: <span>In stock</span></p>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Quantity:</label>
                                            <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">Mua hàng</a>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="singl-share">
                                    <a href="#"><img src="{{ asset('img/single-share.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Nội dung</a></li>
                        <li class=""><a href="#messages" data-toggle="tab"> Đánh giá (1)</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                {{ $productDetail->pro_content }}
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="single-post-comments col-md-6 col-md-offset-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
@stop
