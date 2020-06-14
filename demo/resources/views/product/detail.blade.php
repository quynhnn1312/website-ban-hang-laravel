@extends('layouts.app')

@section('content')
    <style>
        .product-tab-content
        {
            overflow: hidden;
        }
        h2 { font-size: 24px !important;}
        h3 { font-size: 20px !important;}
        h4 { font-size: 19px !important;}
        .product-tab-content img {
            margin: 0 auto;
            text-align: center;
            display: block;
            max-width: 100%;
        }
        .list-star i:hover{
            cursor: pointer;
        }
        .list-text
        {
            display: inline-block;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
        }
        .list-text::after
        {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82,184,88,0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }
        .list-star .rating-active
        {
            color: #ff9705 ;
        }
        .pro-rating .active
        {
            color: #ff9705 !important;
        }
        .fa.fa-star.active{
            color: #ff9705 !important;
        }
    </style>
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
                                <h1 class="product-name"><a href="#">{{ $productDetail->pro_name }}</a></h1>
                                <div class="rating-price">
                                    <?php
                                        $ageDetail = 0;
                                        if($productDetail->pro_total_rating)
                                        {
                                            $ageDetail =  round($productDetail->pro_total_number / $productDetail->pro_total_rating,2);
                                        }
                                    ?>
                                    <div class="pro-rating">
                                        @for($i=1; $i<=5; $i++)
                                            <a href="#"><i style="color: #999" class="fa fa-star {{ $i<$ageDetail ? 'active' : '' }}"></i></a>
                                        @endfor
                                        <span>{{ $ageDetail }}</span>
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
                        <li class="active"><a href="" data-toggle="tab">Nội dung</a></li>
                        <li class=""><a href="#" data-toggle="tab"> Đánh giá (1)</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                {{ $productDetail->pro_content }}
                            </div>
                            <div class="component-rating" style="margin: 50px 0">
                                <h3>Đánh giá sản phẩm</h3>
                                <div style="display: flex;align-items: center;border-radius: 5px;border: 1px solid #dedede" class="component-rating_content">
                                    <div style="width: 20%;position:relative;" class="rating_item">
                                        <span style="font-size: 100px;color: #ff9705;margin: 0 auto;display: block;text-align: center" class="fa fa-star"></span>
                                        <b style="position: absolute;color: #fff;font-size: 20px;top: 50%;left: 50%;transform: translate(-50%,-50%)">2.5</b>
                                    </div>
                                    <div style="width: 60%;padding: 20px" class="list_rating">
                                        @for($i = 1 ; $i<=5 ;$i++)
                                            <div style="display: flex;align-items: center" class="item_rating">
                                                    <div style="width: 10%">
                                                        {{ $i }} <span class="fa fa-star"</span>
                                                    </div>
                                                    <div style="width: 70%;margin: 0 20px 0 0">
                                                        <span style="width: 100%; height: 8px;border: 0px;background:#dedede; display: block;border-radius: 5px"><b style="width: 30%;background: #f25800;display: block;height: 100%;border-radius: 5px"></b></span>
                                                    </div>
                                                    <div style="width: 20%">
                                                        <a href="">290 đánh giá</a>
                                                    </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <div style="width: 20%">
                                        <a href="javascript:void(0)" class="js-rating-action" style="background: #288ad6;text-decoration: none;padding: 10px;border-radius: 5px;color: #fff">Gửi đánh giá của bạn</a>
                                    </div>
                                </div>
                                <div class="form-rating hide">
                                    <div style="display: flex;margin-top:15px;font-size: 15px">
                                        <p style="margin-bottom: 0">Chọn đánh giá của bạn</p>
                                            <span style="margin: 0 15px" class="list-star">
                                                @for($i=1;$i<=5;$i++)
                                                    <i class="fa fa-star" data-key="{{ $i }}"></i>
                                                @endfor
                                            </span>
                                        <span style="display: none" class="list-text"></span>
                                        <input type="hidden" value="" class="number-rating">
                                    </div>
                                    <div style="margin-top: 15px;">
                                         <textarea class="form-control" id="ra-content" cols="30" rows="3"></textarea>
                                    </div>
                                    <div style="margin-top: 15px;">
                                        <a href="{{ route('post.rating.product',$productDetail) }}" class="js-rating-product" style="background: #288ad6;padding: 5px 10px;border-radius: 5px;color: #fff;text-decoration: none" >Gửi đánh giá</a>
                                    </div>
                                </div>
                            </div>
                            <div class="component_list_rating">
                                @if(isset($ratings))
                                    @foreach($ratings as $rating)
                                        <div class="rating_item" style="margin: 15px 0">
                                            <div>
                                                <span style="font-weight: bold;color: #333;text-transform: capitalize">{{ isset($rating->user->name) ? $rating->user->name : '' }}</span>
                                                <a style="color: #2ba832" href=""><i class="fa fa-check-circle-o"></i>Đã mua hàng tại website</a>
                                            </div>
                                            <p style="margin-bottom: 0">
                                                <span>
                                                    @for($i=1 ; $i<=5;$i++)
                                                        <i class="fa fa-star {{ $i<=$rating->ra_number ? 'active' : '' }}"></i>
                                                    @endfor
                                                </span>
                                                {{ $rating->ra_content }}
                                            </p>
                                            <div>
                                                <span><i class="fa fa-clock-o"></i></span>{{ $rating->created_at }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
@stop

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {
            let listStar = $('.list-star .fa')
            const listRatingText = {
                1: 'Không thích',
                2: 'Tạm được',
                3: 'Bình thường',
                4: 'Rất tốt',
                5: 'Tuyệt vời quá',
            };
            listStar.mousemove(function () {
                let $this = $(this);
                let number = $this.attr('data-key');
                $(".number-rating").val(number)
                listStar.removeClass('rating-active')
                $.each(listStar,function(key,value){
                    if(key+1 <= number)
                    {
                        $(this).addClass('rating-active')
                    }
                })
                $('.list-text').text('').text(listRatingText[number]).show()
            })
            $('.js-rating-action').click(function () {
                if($('.form-rating').hasClass('hide'))
                {
                    $('.form-rating').addClass('active').removeClass('hide')
                }
                else
                {
                    $('.form-rating').addClass('hide').removeClass('active')
                }
            })
            $('.js-rating-product').click(function (event) {
                event.preventDefault();
                let content = $('#ra-content').val();
                let number = $('.number-rating').val();
                let url = $(this).attr('href');
                if(content && number)
                {
                    $.ajax({
                        url: url,
                        type:'POST',
                        data: {
                            r_content : content,
                            number : number
                        }
                    }).done(function(result) {
                        if(result.code == 1)
                        {
                            alert('Đánh giá sản phẩm thành công !')
                            location.reload();
                        }
                    });
                }
            })
        })
    </script>
@stop
