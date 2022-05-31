@extends('front.layouts.common')
@section('title', trans("messages.order"))
@section('content')

<section class="order">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="conseption">
                    <h5>
                    Üns beriň!
                    </h5>
                    <p>Edara-kärhanalaryň we raýatlaryň dykgatyna!</p>
                    <p>
                        Aşgabatdaky ýolagçy awtoulag kärhanasy edara-kärhanalara we raýatlara her bir sagady üçin 130 manat we býujetden maliýeleşdirilýän kärhanalar üçin 80 manat töleg esasynda sargytlar boýunça awtoulag hyzmatyny ýerine ýetirýär.
                    </p>
                    Bellik:
                    <ol>
                        <li>
                            sargytlar azyndan 24 sagat öňünden edilmelidir;
                        </li>
                        <li>
                            awtoulagyň garaždan çykyp sargyt edilen ýere çenli we sargydy tamamlap garaža çenli geçen aralygy üçin goşmaça töleg alynýar;
                        </li>
                        <li>
                            sargyt üçin tölegler öňünden alynýar.
                        </li>
                    </ol>
                </div>
                <a href="{{route('choose')}}" class="chekout">@lang('messages.tanysdym')</a>
            </div>
            <div class="col-md-5">

            </div>
        </div>
    </div>
</section>

@endsection