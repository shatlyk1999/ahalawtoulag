@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order order_bus">
    <div class="container">
        <div class="row">
            <h2 class="order_bus_h2">@lang('messages.order')</h2>
            <form action="{{route('order_bus')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="awtobus_yuk" value="{{$awtobus_yuk}}">
            <input type="hidden" name="fizik_yuridik" value="{{$fizik_yuridik}}">
                <div class="col-md-6" style="margin-bottom:30px">
                    <label for="name">@lang('messages.jogapkarin_ady')<br></label>
                    <input type="text" name="name" placeholder="@lang('messages.jogapkarin_ady')" class="form-control input-lg" required="required">
                </div>
                <div class="col-md-6" style="margin-bottom:30px">
                    <label for="edaraady">@lang('messages.enterprise')<br></label>
                    <input type="text" name="edaraady" placeholder="@lang('messages.enterprise')" class="form-control input-lg" required="required">
                </div>
                <div class="col-md-6" style="margin-bottom:30px">
                    <label for="email">@lang('messages.email')<br></label>
                    <input type="email" name="email" placeholder="@lang('messages.email')" class="form-control input-lg" required="required">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom:30px">
                    <label class="control-label" for="phone">@lang('messages.orderphone')</label>
                    <input type="text" id="phone" class="form-control input-lg" name="phone" placeholder="@lang('messages.phone')" aria-required="true" data-plugin-inputmask="inputmask_4e143442" aria-invalid="true" required="required">
                </div>
                <div class="col-md-6" style="margin-bottom:30px">
                    <label class="control-label" for="datetime">@lang('messages.datetime')<br></label>
                    <input type="text" class="form-control input-lg" name="datetime" id="datetimepicker" required="required">
                </div>
                <!-- <div class="col-md-6">
                    <label for="file" class="control-label"></label>
                    <input type="file" name="file" class="form-control input-lg" required="required">
                </div> -->
                <div class="col-md-6" style="margin-bottom:30px">
                    <label for="from">@lang('messages.from')<br></label>
                    <input type="text" name="from" placeholder="@lang('messages.from')" class="form-control input-lg" required="required">
                </div>
                <div class="col-md-6" style="margin-bottom:30px">
                    <label for="to">@lang('messages.to')<br></label>
                    <input type="text" name="to" placeholder="@lang('messages.to')" class="form-control input-lg" required="required">
                </div>
                <div class="col-md-6" style="margin-bottom:30px">
                    <label for="duration">@lang('messages.order_duration')<br></label>
                    <input type="number" name="duration" min="0" step="1" placeholder="@lang('messages.order_duration')" class="form-control input-lg" required="required">
                </div>
                <div class="col-md-6" style="margin-bottom:30px">
                    <label for="personNumber">@lang('messages.personNumber')<br></label>
                    <input type="number" name="personNumber" min="0" step="1" placeholder="@lang('messages.personNumber')" class="form-control input-lg" required="required">
                </div>
                <div class="col-md-6" style="margin-bottom:30px">
                    <label for="note">@lang('messages.note')</label>
                    <textarea name="note" placeholder="@lang('messages.note')" class="orderNote" required="required"></textarea>
                </div>
                <div class="col-md-12" style="text-align:center">
                    <button type="submit" class="btn btn-primary">@lang('messages.send')</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

<script src="{{asset('datetimepicker-master/jquery.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#phone").inputmask("+\\9\\93 69-99-99-99");  //статическая маска
    });
</script>
<script>
    $(document).ready(function(){
        jQuery('#datetimepicker').datetimepicker();
    });
</script>