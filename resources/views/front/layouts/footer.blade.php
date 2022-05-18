@foreach($info as $inf)
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 footer-t">
                <div class="footer-top">
                    <span class="site-logo">
                        <img src="{{asset('front/assets/logo.png')}}" alt="Logo">
                        <span class="agentl">@lang('messages.agentl')</span>
                    </span>
                </div>
            </div>
           <div class="footer-middle">
                <div class="col-md-4"style="margin-top:15px;">
                    <h4>@lang('messages.categories')</h4>
                    <ul role="tablist">
                        <li class=""><a href="{{route('home')}}">@lang('messages.home_page')</a></li>
                        <li class=""><a href="{{route('about')}}">@lang('messages.about')</a></li>
                        <li class=""><a href="{{route('news')}}">@lang('messages.news')</a></li>
                        <li class=""><a href="#contact">@lang('messages.services')</a></li>
                        <li class=""><a href="#contact">@lang('messages.contact')</a></li>
                    </ul>
                </div>
                <div class="col-md-4"style="margin-top:15px;">
                    <h4>@lang('messages.Phone') | @lang('messages.fax')</h4>
                    <ul role="tablist">
                        <li class="">{{$inf->phoneNumber}}</li>
                        <li class="">{{$inf->faxNumber}}</li>
                    </ul>
                    <h4 style="padding-top:10px;">@lang('messages.Phone') | @lang('messages.fax')</h4>
                    <ul role="tablist">
                        <li class="">{!!($inf->domain)!!}</li>
                    </ul>
                </div>
               <div class="col-md-4"style="margin-top:15px;">
                    <h4>@lang('messages.address')</h4>
                    <p>{{$inf->address}}</p>
                    <p style="font-size:13px;padding-top:12px;letter-spacing:0.7px;">
                        <span style="color:#B1B1B1;font-weight:bold;">Developed by:<span>
                        <span style="color:#C4C4C4;padding-left:3px;">TurkmenPortal</span>
                    </p>
                </div>
           </div>
        </div>
    </div>
</div>
@endforeach

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
</body>
</html>