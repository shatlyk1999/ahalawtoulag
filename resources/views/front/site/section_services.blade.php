<!-- <div class="d_servic">
    <div class="container">
        <div class="row">
            <div class="title_section">
                <div class="text-center margin-bottom-20">
                    <h2 class="move zoomIn uppercase">@lang('messages.Our services')</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($serviceitems as $serviceitem)
            <div class="col-md-6 box-koimana move">
                <div class="d_b_i" style="background:url('{{asset($serviceitem->image)}}') center no-repeat;">
                    <div class="overlay">
                        <div class="d_item_1">
                            <h5 class="uppercase">{{$serviceitem->title}}</h5>
                            {!!($serviceitem->content)!!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> -->

<section class="d_servic">
    <div class="container">
        <div class="functions">
            <div class="title_section">
                <h1 style="flex: 1;text-align: center" class="move zoomIn">
                @lang('messages.Our services')</h1>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-lg-3 cards">
                    <a href="">
                        <div class="func_cards box-tomi move">
                            <div class="func_card_title ">
                                <i class="service-one__icon  fa fa-database"></i>
                            </div>
                            <h3>@lang('messages.A rich experience')</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 cards">
                    <a href="">
                        <div class="func_cards box-koimana move">
                            <div class="func_card_title">
                                <i class="service-one__icon  fa fa-shield"></i>
                            </div>
                            <h3>@lang('messages.Reliable companion')</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 cards">
                    <a href="">
                        <div class="func_cards box-koire move">
                            <div class="func_card_title">
                                <i class="service-one__icon  fa fa-life-ring"></i>
                            </div>
                            <h3>@lang('messages.Fast and convenient')</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 cards">
                    <a href="">
                        <div class="func_cards box-lara move">
                            <div class="func_card_title">
                                <i class="service-one__icon  fa fa-users"></i>
                            </div>
                            <h3>@lang('messages.Experienced drivers')</h3>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>