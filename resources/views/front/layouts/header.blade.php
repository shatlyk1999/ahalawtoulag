<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('front/assets/favicon.png')}}" />
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/jquery.fancybox.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/components.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/green.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/slick.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/slick-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/sweetalert2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/plugins/style.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/custom.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/simple-calendar.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('front/assets/awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
</head>
<body>

<div class="header">
    <div class="container-fluid" style="border-bottom: 1px solid #DEDEDE">
        <div class="container">
            <div class="head_top" style="padding-top:10px;">
                <div class="info_head" style="float:left;">
                    @foreach($info as $inf)
                    <p class="p18"><b><i class="fa fa-phone"></i>&nbsp;&nbsp; </b>{{$inf->phoneNumber}}<br>
                    </p>
                    @endforeach
                </div>
                <div class="lang_head" style="text-align:right;">
                    <ul role="tablist">
                        <li><a href="{{route('lang.switch', 'tm')}}"><img src="{{asset('front/assets/tm.png')}}" alt="tm"></a></li>
                        <li><a href="{{route('lang.switch', 'ru')}}"><img src="{{asset('front/assets/ru.png')}}" alt="ru"></a></li>
                        <li><a href="{{route('lang.switch', 'en')}}"><img src="{{asset('front/assets/en.png')}}" alt="en"></a></li>    
                    </ul>                
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="{{route('home')}}" class="site-logo">
            <img src="{{asset('front/assets/logo.png')}}" alt="Logo">
            <span>@lang('messages.logo')</span>
        </a>
        <a href="{{route('home')}}" class="site-logo site-nysan">
            <span>@lang('messages.logo_2022')</span>
            <img src="{{asset('front/assets/2022nysany.png')}}" class="nysan-img" alt="2022nysan">
        </a>
        <a href="javascript:void(0);" class="mobi-toggler main-nav-bar">        
            <span class="line"></span>          
        </a>
    </div>
    <div class="container">
        <div class="header-navigation font-transform-inherit scroll_spy" >
            <ul role="tablist">
                <li class="underline"><a href="{{route('home')}}">@lang('messages.home_page')</a></li>
                <li class="underline"><a href="{{route('about')}}">@lang('messages.about')</a></li>
                <li class="underline"><a href="{{route('services')}}">@lang('messages.services')</a></li>
                <li class="underline"><a href="{{route('normative')}}">@lang('messages.normative')</a></li>
                <li class="underline"><a href="{{route('news')}}">@lang('messages.news')</a></li>
                <li class="underline"><a href="{{route('contactpage')}}">@lang('messages.contact')</a></li>
            </ul>
        </div>
    </div>
</div>
    
