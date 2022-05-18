@extends('front.layouts.common')
@section('title', trans("messages.contact"))
@section('content')
@foreach($info as $inf)
<section class="contactpage">
    <div class="">
        <div class="container-fluid news_tit mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-30">
                            <h2 class="page-title move zoomIn uppercase"><span style="color:#116B30;">@lang('messages.contact')</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-md-6 pr-30">
                    <img src="{{asset($inf->image)}}" class="contact-img" alt="contact->image">
                </div>
                <div class="col-md-6 contatc-itmes">
                    <h2>@lang('messages.agentl')</h2>
                    <hr>
                    <h6>@lang('messages.address')</h6>
                    <p>{{ $inf->address }}</p>
                    <h6>@lang('messages.phone')</h6>
                    <p>{{$inf->phoneNumber}}</p>
                    <h6>@lang('messages.email')</h6>
                    <p>{{$inf->domain}}</p>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-top:60px;">
            <div class="map-row">
                <div id="map"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col_cntct">
                            <div class="cntct">
                                <form method="post" id="contact-form" action="{{route('contact')}}">
                                @csrf
                                @include('front\site\contact_form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
@endforeach
<script src="{{('//api-maps.yandex.ru/2.1-dev/?lang=ru-RU&load=package.full')}}"></script>

@endsection