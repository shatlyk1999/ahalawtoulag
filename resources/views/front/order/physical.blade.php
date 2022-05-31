@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="conseption">
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                </div>
            </div>
            <div class="col-md-5">

            </div>
        </div>
    </div>
</section>

@endsection