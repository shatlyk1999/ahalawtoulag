@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="conseption">
                    <form action="{{route('budget')}}" method="post">
                        @csrf
                        <input type="hidden" name="_csrf-frontend" value="I35DswVEeOaqJP38fMGwMcr81CbXb2_OJrbpSPy54WRLSBnnYykLs4dvhJQOidZCubanUOEpJ5lw0Z47xP3VEg=="> 		
                        <div class="radiolist">
                            <label>
                                <input type="radio" name="roles" value="byujet" required="required">@lang('messages.byujet')
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="roles" value="byujet_dal" required="required">@lang('messages.byujet_dal')
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