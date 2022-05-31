@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="conseption">
                    @lang('messages.order_ahalawtoulag')
                </div>
                <a href="{{route('choose')}}" class="chekout">@lang('messages.tanysdym')</a>
            </div>
            <div class="col-md-5">

            </div>
        </div>
    </div>
</section>

@endsection