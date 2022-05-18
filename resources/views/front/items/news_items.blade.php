@extends('front.layouts.common')
@section('title', trans("messages.news"))
@section('content')

<section class="banner-bg-01 sub-header" style="background-color:#FDFDFD;">
    <div class="news_tit" style="background-color:#F9F9F9;margin-bottom:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-30">
                        <h2 class="page-title move zoomIn uppercase"><span style="color:#116B30;">@lang('messages.news')</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="order_1">
                @foreach($news as $item)    
                    <div class="col-md-12">
                        <div class="v-new v-new-2 event_box move fadeInUp">
                            <div class="row">
                                <a href="{{route('newsView', $item->id)}}">
                                <div class="col-md-7">
                                    <div class="v-n-item v-n-item-2">
                                        <h5 class="v-n-title v-n-title-2 uppercase">{{$item->title}}</h5>
                                        <span class="v-n-time">{{$item->date}}</span>
                                        <p class="v-n-content">{!!Str::limit($item->content,150,'...')!!}</p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <img src="{{asset($item->image)}}" alt="new-img" class="v-n-img v-n-img-2">
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div style="text-align:center;margin-bottom:20px;">{{$news->onEachSide(0)->links()}}</div>
            </div>
            <div class="col-md-4" id="order_2">
                <div id="container" class="calendar-container">
                </div>
            </div>
        </div>
    </div>
   
</section>

@endsection
