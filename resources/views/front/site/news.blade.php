<!-- <div class="container">
    <div class="row text-center margin-bottom-20 margin-top-10">
        <div class="col-md-12">
            <h2 class="move zoomIn uppercase" style="visibility: visible; animation-name: zoomIn;">@lang('messages.news')</h2>
        </div>
    </div>
    <div class="row">
        @foreach($news as $item)
            <div class="col-lg-4 col-xs-12 mb-50 event_box move fadeInUp">
                <a class="institution-link" href="{{route('newsView', $item->id)}}">
                    <article class="grid-blog-post">
                        <div class="post-thumbnail">
                            <img class="img100 w-100 zoom" src="public/{{$item->image}}" alt="">
                        </div>
                        <div class="post-content">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            <h2>{{$item->title}}</h2>
                            <p style="position: absolute;top: 10px;color: green;">{{$item->created_at->format('Y-m-d')}}</p>
                        </div>
                    </article>
                </a>
            </div>
        @endforeach
    </div>
</div> -->




<div class="container">
    <div class="row text-center margin-bottom-20 margin-top-10">
        <div class="col-md-12">
            <h2 class="move zoomIn uppercase" style="visibility: visible; animation-name: zoomIn;">@lang('messages.news')</h2>
        </div>
    </div>
    <div class="row">
        @foreach($news as $item)
        <div class="col-md-12">
            <div class="v-new event_box move fadeInUp">
                <div class="row">
                    <div class="col-md-7">
                        <div class="v-n-item">
                            <span class="v-n-time">{{$item->date}}</span>
                            <a href="{{route('newsView', $item->id)}}">
                                <h5 class="v-n-title uppercase">{{$item->title}}</h5>
                            </a>
                            <p class="v-n-content">{!!Str::limit($item->content,150,'...')!!}</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset($item->image)}}" alt="new-img" class="v-n-img">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>