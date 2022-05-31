@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="conseption">
                    <form action="{{route('legal')}}" method="post">
                        @csrf
                        <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
                        <div class="radiolist">
                            <label>
                                <input type="radio" name="roles" value="fiziki" required="required">@lang('messages.fiziki')
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="roles" value="yuridiki" required="required">@lang('messages.yuridiki')
                            </label>
                        </div> 			
                        <button type="submit" class="btn btn-primary">@lang('messages.send')</button>
             		</form>
                </div>
            </div>
            <div class="col-md-5">

            </div>
        </div>
    </div>
</section>

@endsection