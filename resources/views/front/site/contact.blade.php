 <!-- <div class="container"> -->
    <!-- <div class="row mb-40"> -->
    
        <!-- <div class="col-md-12 col-sm-12">
            <div class="content-page content-contact">
                <div class="mb-30">
                    <h2 class="page-title move slideInLeft" style="visibility: visible; animation-name: slideInLeft;"><span>Habarlaşmak üçin</span></h2>
                </div>
                <div class="row mb-60 move slideInUp" style="visibility: visible; animation-name: slideInUp;">
                   
                    <div class="col-sm-6">
                        <div class="contact-widget-wrap">
                            <div class="widget-content mt-40">
                                <p class="p18"><strong>Ahal welaýatynyň Gökdepe etrabynyň Gökdepe şäheriniň A.Annanyýazow köçesiniň 48-nji jaýy </strong></p>
                                <p class="p18"><strong>E-poçta:</strong>  
                                    <a href="mailto:info@ahalawtoulag.com.tm">info@ahalawtoulag.com.tm</a>
                                </p>
                                <p class="p18"><b><i class="fa fa-phone"></i>&nbsp;&nbsp; </b>(+993 132) 4-09-06<br>
                                </p>
                                <p class="p18"><b><i class="fa fa-fax"></i>&nbsp;&nbsp;</b> (+993 132) 4-09-06<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="bg-green quick-form-box">
                            <h4 class="mb-20">BIZE HAT ÝOLLAŇ</h4>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
     
    <!-- </div> -->

<!-- </div> -->
<div class="container-fluid">
    <div class="map-row">
        <div id="map"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col_cntct">
                    <div class="cntct">
                        <form method="post" id="contact-form" action="{{route('contact')}}">
                        @csrf
                        @include('front\site\contact_form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{('//api-maps.yandex.ru/2.1-dev/?lang=ru-RU&load=package.full')}}"></script>