@section('title','Metrica')
<!-- @section('title', trans("messages.statistica")) -->


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

    <div class="button-reset" style="padding-top:19px;">
    <h1>{{$filterDate}}</h1>
        <a href="{{route('statistica')}}">
            <button type="submit">Сбросить фильтры</button>
        </a>
    </div>
<hr>

<h3>Сформировать за указанную дату</h3>
    <div id="container" class="calendar-container">
    </div>
<!-- 
<form id="w1" action="{{route('statistica')}}" method="post">
    @csrf
    <input type="hidden" name="_csrf-backend" value="">
    <h3>Сформировать за указанную дату</h3>
    <div class="form-group field-count-date_ip">
        <input type="text" id="count-date_ip" name="Count[date_ip]" value="" class="hasDatepicker">
        <div class="help-block"></div>
    </div>
    <button type="submit">Отфильтровать</button>
</form> -->
<hr>

<!-- <form id="w2" action="/backend/statistics/stat/index" method="post">
<input type="hidden" name="_csrf-backend" value="ZgMJP6UtgtTFvwvMaExZZQKUVlG40nE6K7BcjV5n2IwRWzhc5lvovIntUaY5Ow4VbK0dA-nqP2pi_DHjJDKq2g==">    <h3>Сформировать за выбранный период </h3>
<div class="form-group field-count-start_time">
<label class="control-label" for="count-start_time">Начало</label>
<input type="text" id="count-start_time" name="Count[start_time]" value="01.05.2022" class="hasDatepicker">


<div class="help-block"></div>
</div>    <div class="form-group field-count-stop_time">
<label class="control-label" for="count-stop_time">Конец  </label>
<input type="text" id="count-stop_time" name="Count[stop_time]" value="18.05.2022" class="hasDatepicker">


<div class="help-block"></div>
</div>    <button type="submit">Отфильтровать</button>    </form>    <hr>

<form id="w3" action="/backend/statistics/stat/index" method="post">
<input type="hidden" name="_csrf-backend" value="ZgMJP6UtgtTFvwvMaExZZQKUVlG40nE6K7BcjV5n2IwRWzhc5lvovIntUaY5Ow4VbK0dA-nqP2pi_DHjJDKq2g==">    <h3>Сформировать по определенному IP</h3>
<div class="form-group field-count-ip required">
<label class="control-label" for="count-ip">IP</label>
<input type="text" id="count-ip" name="Count[ip]" value="127.0.0.1" size="20" aria-required="true">

<div class="help-block"></div>
</div>    <button type="submit">Отфильтровать</button>    </form>    <hr>

<h3>Черный список IP</h3>
<p>Под черным списком понимаются IP, по которым не нужна статистика, например IP администратора сайта.
Поисковые боты отфильтровываются специальной функцией и попасть в общую статистику не должны.
<br>По данным IP статистика не будет сохраняться с момента добавления в черный список.</p>

<h4>Сейчас в черном списке:</h4><table>
<tbody><tr class="tr_small">
<td>Черный список пуст.</td>        </tr>
</tbody></table>
<br>

<form id="w4" action="/backend/statistics/stat/index" method="post">
<input type="hidden" name="_csrf-backend" value="ZgMJP6UtgtTFvwvMaExZZQKUVlG40nE6K7BcjV5n2IwRWzhc5lvovIntUaY5Ow4VbK0dA-nqP2pi_DHjJDKq2g==">    <div class="form-group field-count-ip required">
<label class="control-label" for="count-ip">IP</label>
<input type="text" id="count-ip" name="Count[ip]" value="127.0.0.1" size="20" aria-required="true">

<div class="help-block"></div>
</div>
<div class="form-group field-count-comment">
<label class="control-label" for="count-comment">Комментарий</label>
<input type="text" id="count-comment" name="Count[comment]" size="20">

<div class="help-block"></div>
</div>
<div class="form-group field-count-add_black_list">

<input type="hidden" id="count-add_black_list" class="form-control" name="Count[add_black_list]" value="1">

<div class="help-block"></div>
</div>    <button type="submit">Добавить в черный список</button>    </form>    <br>

<form id="w5" action="/backend/statistics/stat/index" method="post">
<input type="hidden" name="_csrf-backend" value="ZgMJP6UtgtTFvwvMaExZZQKUVlG40nE6K7BcjV5n2IwRWzhc5lvovIntUaY5Ow4VbK0dA-nqP2pi_DHjJDKq2g==">    <div class="form-group field-count-ip required">
<label class="control-label" for="count-ip">IP</label>
<input type="text" id="count-ip" name="Count[ip]" value="127.0.0.1" size="20" aria-required="true">

<div class="help-block"></div>
</div>    <div class="form-group field-count-del_black_list">

<input type="hidden" id="count-del_black_list" class="form-control" name="Count[del_black_list]" value="1">

<div class="help-block"></div>
</div>    <button type="submit">Удалить из черного списка</button>    </form>    <hr>

<h3>Статистика по поисковым роботам за последний месяц</h3>
<div id="p0" data-pjax-container="" data-pjax-timeout="1000">    <form id="w6" action="/backend/statistics/stat/index" method="post" data-pjax="">
<input type="hidden" name="_csrf-backend" value="ZgMJP6UtgtTFvwvMaExZZQKUVlG40nE6K7BcjV5n2IwRWzhc5lvovIntUaY5Ow4VbK0dA-nqP2pi_DHjJDKq2g==">    <div class="form-group field-bot-get_bot_stat">

<input type="hidden" id="bot-get_bot_stat" class="form-control" name="Bot[get_bot_stat]" value="1">

<div class="help-block"></div>
</div>    <button type="submit">Сформировать</button>    </form>    </div>    <hr>

<h3>Очистка базы данных <span class="font_min">(старше 90 дней)</span></h3>
<div id="p1" data-pjax-container="" data-pjax-timeout="1000">    <form id="w7" action="/backend/statistics/stat/index" method="post" data-pjax="">
<input type="hidden" name="_csrf-backend" value="ZgMJP6UtgtTFvwvMaExZZQKUVlG40nE6K7BcjV5n2IwRWzhc5lvovIntUaY5Ow4VbK0dA-nqP2pi_DHjJDKq2g==">    <div class="form-group field-count-del_old">

<input type="hidden" id="count-del_old" class="form-control" name="Count[del_old]" value="1">

<div class="help-block"></div>
</div>    <button type="submit">Удалить старые данные</button>    </form>    </div> -->
</div>            </div> 
</section>
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="stat">
                    <table>
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
                </div>
            </div>
        </div>
    </div> -->
</body>


<script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
<!-- <script src="{{asset('front/js/jquery.min.js')}}"></script> -->
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