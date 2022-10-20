@section('title','Metrica')


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="{{asset('front/css/style_ip.css')}}" rel="stylesheet" />
    <link href="{{asset('front/assets/awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
</head>
<body style="background-color:#f1f4f8;padding-top:19px;">
<section class="content">
    <div style="width: 100%" class="container">
        <h3 class="stat_center">Статистика посещений по IP</h3>
            <div id="stat_ip">
                

                <h3 class="text-center">Сформировать за указанную дату</h3>
                <br><br>
                <div id="container" class="calendar-container" style="display: inline-block;margin-left: 20%">
                </div>
                <div class="button-reset" style="float: right;margin-right: 20%;padding-top: 100px;display: inline-block;">
                    <h1>{{date('d-m-Y', strtotime($filterDate))}}</h1>
                    <h4>
                        {{ 'Всего посещение за период -- ' . count($metrica)  }}
                    </h4>
                    <h4>
                        {{ 'Всего посетителей за период -- ' . count($ip)  }}
                    </h4>
                    <br>
                        <a href="{{route('statistica')}}">
                            <button type="submit">Сбросить фильтры</button>
                        </a>
                    </div>
           
           
                    <hr>
                <table class="get_table">
                    <thead>
                        <tr>
                            <th>IP</th>
                            <th>URL просматриваемой страницы</th>
                            <th>Время посещения</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr class="tr_first">
                                <td colspan="3">Новый посетитель.</td>
                            </tr>
                            @foreach($metrica as $m)
                            <tr>
                                <td><a href="{{$m->ip}}">{{$m->ip}}</a></td>   
                                <td><a href="{{$m->url}}">{{$m->url}}</a></td>                     
                                <td>{{$m->created_at}}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;margin-bottom:20px;">{{$metrica->links()}}</div>




</div>
</div> 
</section>
</body>


<script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('front/js/jquery.simple-calendar.js')}}"></script>
<script src="{{asset('front/js/jquery-migrate.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/back-to-top.js')}}"></script>
<script src="{{asset('front/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('front/js/layout.js')}}"></script>
<script src="{{asset('front/js/wow.min.js')}}"></script>
<script src="{{asset('front/js/slick.min.js')}}"></script>
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('front/js/jssor.slider.min.js')}}"></script>
<script src="{{asset('front/js/myscripts.js')}}"></script>
<script src="{{asset('front/js/yandexmap.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>
</html>