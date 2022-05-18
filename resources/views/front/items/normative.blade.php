@extends('front.layouts.common')
@section('title', trans("messages.normative"))
@section('content')

<section class="banner-bg-01 sub-header" style="background-color:#FDFDFD;">
    <div class="news_tit" style="background-color:#F9F9F9;margin-bottom:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-30">
                        <h2 class="page-title move zoomIn uppercase">
                            <span style="color:#116B30;">@lang('messages.normative')</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($normative as $item)
            <div class="col-md-12">
                <div class="v-new event_box move fadeInUp">
                    <div class="row">
                        <div class="v-n-item">
                            <span class="v-n-time">{{$item->date}}</span>
                            <a href="{{route('newsView', $item->id)}}">
                                <h5 class="v-n-title-15 uppercase">{{$item->title}}</h5>
                            </a>
                            <p class="v-n-content">{{$item->description}}</p>
                            <a href="storage/{{$item->pdf[0]}}" class="normative-a">@lang('messages.download')</a>
                        </div>
                    <div style="text-align:center;margin-bottom:20px;">{{$normative->onEachSide(0)->links()}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
 
</section>

@endsection
