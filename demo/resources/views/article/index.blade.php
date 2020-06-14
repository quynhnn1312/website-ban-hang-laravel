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
                            <li class="category3"><span>Bài viết</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                @if(isset($articles))
                    <div class="col-sm-8">
                        @foreach($articles as $article)
                            <div class="article" style="padding: 10px 0;margin: 10px 0;border-bottom:1px solid #dedede;display: flex">
                                <div class="article-avatar">
                                    <a href="{{ route('get.detail.article',[$article->ar_slug,$article->id]) }}">
                                        <img width="200px" src="{{ asset(pare_url_file($article->ar_avatar)) }}" alt="">
                                    </a>
                                </div>
                                <div class="article-content" style="margin-left: 20px;width: 80%">
                                    <h2 style="font-size: 15px"><a href="{{ route('get.detail.article',[$article->ar_slug,$article->id]) }}">{{ $article->ar_name }}</a></h2>
                                    <p style="font-size: 13px">{{ $article->ar_description }}</p>
                                    <p style="font-size: 12px">Nghiem quynh <span>{{ $article->created_at }}</span></p>
                                </div>
                            </div>
                        @endforeach
                        {!! $articles->links() !!}
                    </div>
                @endif
                    <div class="col-sm-4">

                    </div>
            </div>
        </div>
    </div>
@stop
