@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="approve">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin: 65px 0 80px;">
                    <form action="{{route('order_bus')}}" method="post">
                        @csrf
                        @php
                        unset($all['_token']);
                        $all['price'] = $all['price'] * $all['duration'];
                        @endphp
                        @foreach ($all as $key => $one)
                            <input type="hidden" name="{{$key}}" value="{{$one}}">
                        @endforeach
                        <div class="list-group">
                            <ul>
                                <li class="list-group-item list-group-item-light"><b>Ady: </b>{{ $all['name'] }}</li>
                                <li class="list-group-item list-group-item-light"><b>Ulagyň barmaly senesi we sagady: </b>{{ \Carbon\Carbon::parse($all['datetime'])->format('d-m-Y H:i') }}</li>	
                                <li class="list-group-item list-group-item-light"><b>Email: </b>{{ $all['email'] }}</li>
                                <li class="list-group-item list-group-item-light"><b>Ugur: </b>{{ $all['from'].' - '.$all['to'] }}</li>
                                <li class="list-group-item list-group-item-light"><b>Telefon: </b>{{ $all['phone'] }}</li>
                                <li class="list-group-item list-group-item-light"><b>Sargydyň dowamlylygy: </b>{{ $all['duration'] }} sagat</li>
                                <li class="list-group-item list-group-item-light"><b>Adam sany: </b>{{ $all['personNumber'] }}</li>
                                <li class="list-group-item list-group-item-light"><b>Bellik: </b>{{ $all['note'] }}</li>

                                <div class="finish_price" style="margin-top: 5%">
                                    <div class="col-md-5" style="text-align: center;font-size: 24px;border-bottom: 2px solid;">
                                        <b> Jemi töleg bahasy:  {{ $all['price'] }}TMT</b>
                                    </div>
                                    <div class="col-md-5" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary">@lang('messages.approve')</button>
                                    <div>
                                </div>

                            </ul>
                            </div>
             		</form>
            </div>

        </div>
    </div>
</section>

@endsection