@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order">
    <div class="container">
        <div class="row">
            <div class="conseption">
                <form action="{{route('truck')}}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <input type="hidden" name="_csrf-frontend" value="I35DswVEeOaqJP38fMGwMcr81CbXb2_OJrbpSPy54WRLSBnnYykLs4dvhJQOidZCubanUOEpJ5lw0Z47xP3VEg==">
                        <label for="roles" class="yuk_agram">@lang('messages.yuk_agram')</label>
                        <div class="radiolist">
                            <label>
                                <input class="number_input" type="number" name="roles" min="0" step="1" value="number" required="required">
                                @lang('messages.tonna')
                            </label>
                        </div> 			
                    </div>
                    <div class="col-md-6">
                        <label for="name">@lang('messages.yuk_gornush')</label>
                        <br>
                        <select name="name" id="normal_y_g" required>
                            <option value="">@lang('messages.yuk_gornush')</option>
                            @foreach($normal as $n)
                                <option value="{{$n->title}}">{{$n->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <br>
                    <br>
                    <button style="margin-left:15px" type="submit" class="btn btn-primary">@lang('messages.send')</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection