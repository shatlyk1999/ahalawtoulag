@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order"> 
<div class="container">
    <h2 class="text-center">Awtobuslar</h2>
    <div class="row buses">
        <div class="col-md-4">
        <div class="card">
            <form action="{{route('legal')}}" method="post">
            @csrf
            <!-- <img src="/source/img/buses/zk6122h9.jpg" class="card-img-top" alt="bus"> -->
            <div class="card-body">
            <h5 class="card-title"><b>Hundaý New Super Aero Citi</b></h5> <br>
            <p class="card_p"><b>Orun sany :</b></p>
            <span class="fl_right">27 orun</span><br>
            <p class="card_p"><b>Bahasy :</b></p>
            @if ($fizik_yuridik == 'bus_byujet')
            <span class="fl_right">1 sagat | 80,00 tmt </span><br>
            @else
            <span class="fl_right">1 sagat | 130,00 tmt </span><br>
            @endif
            <input type="hidden" name="bus" value="hunday">
            <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
            <input type="hidden" name="fizik_yuridik" value="{{$fizik_yuridik}}">
            <p>
            <button type="submit" class="btn btn-success buses_btn">@lang('messages.choose')</button>
            </p>
            </div>
             </form>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card">
        <form action="{{route('legal')}}" method="post">
            @csrf
            <div class="card-body">
            <h5 class="card-title"><b>Iran-Hodro 0-457</b></h5> <br>
            <p class="card_p"><b>Orun sany :</b></p>
            <span class="fl_right">34 orun</span><br>
            <p class="card_p"><b>Bahasy :</b></p>
            @if ($fizik_yuridik == 'bus_byujet')
            <span class="fl_right">1 sagat | 70,00 tmt </span><br>
            @else
            <span class="fl_right">1 sagat | 110,00 tmt </span><br>
            @endif
            <input type="hidden" name="bus" value="iran">
            <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
            <input type="hidden" name="fizik_yuridik" value="{{$fizik_yuridik}}">
            <p>
            <button type="submit" class="btn btn-success buses_btn">@lang('messages.choose')</button>
            </p>
            </div>
        </form>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card">
        <form action="{{route('legal')}}" method="post">
            @csrf
            <div class="card-body">
            <h5 class="card-title"><b>PAZ-32054</b></h5> <br>
            <p class="card_p"><b>Orun sany :</b></p>
            <span class="fl_right">23 orun</span><br>
            <p class="card_p"><b>Bahasy :</b></p>
            @if ($fizik_yuridik == 'bus_byujet')
            <span class="fl_right">1 sagat | 50,00 tmt </span><br>
            @else
            <span class="fl_right">1 sagat | 85,00 tmt </span><br>
            @endif
            <input type="hidden" name="bus" value="paz">
            <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
            <input type="hidden" name="fizik_yuridik" value="{{$fizik_yuridik}}">
            <p>
            <button type="submit" class="btn btn-success buses_btn">@lang('messages.choose')</button>
            </p>
            </div>
            </form>
        </div>
        </div>
        
    </div>
</div>
</section>

@endsection