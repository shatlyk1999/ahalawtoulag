<div class="container-fluid">
    <div class="map-row">
        <div id="map"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col_cntct">
                    <div class="cntct">
                        <form method="post" id="contact-form" action="{{route('contact')}}">
                        @csrf
                        @include('front.site.contact_form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{('//api-maps.yandex.ru/2.1-dev/?lang=ru-RU&load=package.full')}}"></script>