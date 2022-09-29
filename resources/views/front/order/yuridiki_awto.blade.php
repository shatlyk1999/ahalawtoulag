@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')
<section class="order">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="conseption">
                    <form action="{{route('awto')}}" method="post">
                        @csrf
                        <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
                        <div class="radiolist">
                            <label>
                                <input type="radio" name="roles" value="bus_byujet" required="required">@lang('messages.budgetary')
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="roles" value="bus_byujet_dal" required="required">@lang('messages.non-budgetary')
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