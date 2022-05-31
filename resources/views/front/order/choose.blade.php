@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="conseption">
                    <form action="{{route('chekout')}}" method="post">
                        @csrf
                        <div class="radiolist">
                            <label>
                                <input type="radio" name="roles" value="awtobus" required="required">@lang('messages.awtobus')
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="roles" value="yuk" required="required">@lang('messages.yuk')
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