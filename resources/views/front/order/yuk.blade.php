@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order"> 
<div class="container">
    <h2 class="text-center">Ýük ulaglary</h2>
    <div class="row buses">
        <div class="col-md-3">
        <div class="card">
            <form action="{{route('legal')}}" method="post">
            @csrf
            <!-- <img src="/source/img/buses/zk6122h9.jpg" class="card-img-top" alt="bus"> -->
            <div class="card-body">
            <h5 class="card-title"><b>KAMAZ-6520</b></h5> <br>
            <p class="card_p"><b>Ýük göterijiligi :</b></p>
            <span class="fl_right">20 tn agram</span><br>
            <p class="card_p"><b>Bahasy :</b></p>
            <span class="fl_right">1 sagat | 130,00 tmt </span><br>
            <input type="hidden" name="bus" value="KAMAZ-6520">
            <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
            <input type="hidden" name="fizik_yuridik" value="{{$fizik_yuridik}}">
            <p>
            <button type="submit" class="btn btn-success buses_btn">@lang('messages.choose')</button>
            </p>
            </div>
             </form>
        </div>
        </div>
        <div class="col-md-3">
        <div class="card">
        <form action="{{route('legal')}}" method="post">
            @csrf
            <div class="card-body">
            <h5 class="card-title"><b>KAMAZ-65115</b></h5> <br>
            <p class="card_p"><b>Ýük göterijiligi :</b></p>
            <span class="fl_right">15 tn agram</span><br>
            <p class="card_p"><b>Bahasy :</b></p>  
            <span class="fl_right">1 sagat | 105,00 tmt </span><br>
            <input type="hidden" name="bus" value="KAMAZ-65115">
            <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
            <input type="hidden" name="fizik_yuridik" value="{{$fizik_yuridik}}">
            <p>
            <button type="submit" class="btn btn-success buses_btn">@lang('messages.choose')</button>
            </p>
            </div>
        </form>
        </div>
        </div>
        <div class="col-md-3">
        <div class="card">
            <form action="{{route('legal')}}" method="post">
            @csrf
            <!-- <img src="/source/img/buses/zk6122h9.jpg" class="card-img-top" alt="bus"> -->
            <div class="card-body">
            <h5 class="card-title"><b>KAMAZ-65117</b></h5> <br>
            <p class="card_p"><b>Ýük göterijiligi :</b></p>
            <span class="fl_right">14 tn agram</span><br>
            <p class="card_p"><b>Bahasy :</b></p>
            <span class="fl_right">1 sagat | 115,00 tmt </span><br>
            <input type="hidden" name="bus" value="KAMAZ-65117">
            <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
            <input type="hidden" name="fizik_yuridik" value="{{$fizik_yuridik}}">
            <p>
            <button type="submit" class="btn btn-success buses_btn">@lang('messages.choose')</button>
            </p>
            </div>
             </form>
        </div>
        </div>
        <div class="col-md-3">
        <div class="card">
            <form action="{{route('legal')}}" method="post">
            @csrf
            <!-- <img src="/source/img/buses/zk6122h9.jpg" class="card-img-top" alt="bus"> -->
            <div class="card-body">
            <h5 class="card-title"><b>Mersedes Bens</b></h5> <br>
            <p class="card_p"><b>Ýük göterijiligi :</b></p>
            <span class="fl_right">27 tn agram</span><br>
            <p class="card_p"><b>Bahasy :</b></p>
            <span class="fl_right">1 sagat | 160,00 tmt </span><br>
            <input type="hidden" name="bus" value="Mersedes_Bens">
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