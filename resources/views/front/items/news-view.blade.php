@extends('front.layouts.common')
@section('title', trans("messages.news"))
@section('content')
<section class="banner-bg-01 sub-header" style="background-color:#FDFDFD;">
    <div class="news_tit" style="background-color:#F9F9F9;margin-bottom:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-30">
                        <h2 class="page-title move zoomIn uppercase">
                            <span style="color:#116B30;">@lang('messages.news')</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-content">
                    <h1 class="newsView-title">{{$news->title}}</h1>
                    <h4>{{$news->date}}</h4>
                    <a href="{{ asset($news->image) }}">
                        <img src="{{ asset($news->image) }}" class="about-content-img" alt="about-img">
                    </a>
                    <p class="about-content-p">{!!($news->content)!!}</p>
                </div>
            </div>
        </div>
    </div>
 
</section>

@endsection