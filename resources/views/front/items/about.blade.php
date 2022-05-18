@extends('front.layouts.common')
@section('title', trans("messages.about"))
@section('content')
@foreach($info as $inf)
<section class="banner-bg-01 sub-header" style="background-color:#FDFDFD;">
    <div class="news_tit" style="background-color:#F9F9F9;margin-bottom:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-30">
                        <h2 class="page-title move zoomIn uppercase">
                            <span style="color:#116B30;">{{$inf->aboutTitle}}</span>
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
                    <p class="about-content-p">{!!($inf->aboutCompany)!!}</p>
                    <img src="{{ asset($inf->image) }}" class="about-content-img" alt="about-img">
                </div>
            </div>
        </div>
    </div>
 
</section>
@endforeach

@endsection