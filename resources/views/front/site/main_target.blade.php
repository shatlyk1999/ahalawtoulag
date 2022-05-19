@foreach($info as $inf)
<section class="section pd-75 main_target" >
    <div class="overlay"></div>
    <div class="container">
        <div class="row margin-bottom-20">
            <div class="col-lg-12 col-md-12">
                <h1 class="mb-30 uppercase move zoomIn" style="width:50%;">
                    <span>{{$inf->aboutTitle}}</span>
                </h1>
                <p class="p18 box-koimana move"  style="width:50%;text-indent:0px;">{!!Str::limit($inf->aboutCompany,540,'...')!!}</p>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- @lang('messages.Our main goal') -->
<!-- @lang('messages.our_main_goals_text') -->