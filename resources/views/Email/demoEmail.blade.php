@component('mail::message')
<!-- {{ config('app.name') }} -->


@if(isset($mailData['fizik_yuridik']))
   'Roly: ' {{$mailData['fizik_yuridik']}}
@endif
<br>
@if(isset($mailData['name']))
    'Jogapkarin ady: ' {{$mailData['name']}}
@endif
<br>
@if(isset($mailData['edaraady']))
    'Edaranyn ady: ' {{$mailData['edaraady']}}
@endif
<br>
@if(isset($mailData['email']))
    'Email: ' {{$mailData['email']}}
@endif
<br>
@if(isset($mailData['phone']))
    'Telefon belgisi: ' {{$mailData['phone']}}
@endif
<br>
@if(isset($mailData['from']))
    'Nireden: ' {{$mailData['from']}}
@endif
<br>
@if(isset($mailData['to']))
    'Nira: ' {{$mailData['to']}}
@endif
<br>
@if(isset($mailData['datetime']))
    'Barmaly senesi we wagty: ' {{$mailData['datetime']}}
@endif
<br>
@if(isset($mailData['duration']))
    'Sargydyn dowamlylygy: ' {{$mailData['duration']}}
@endif
<br>
@if(isset($mailData['personNumber']))
    'Adam sany: ' {{$mailData['personNumber']}}
@endif
<br>
@if(isset($mailData['yuk_gornush']))
    'Yukun gornusi: ' {{$mailData['yuk_gornush']}}
@endif
<br>
@if(isset($mailData['yuk_agram']))
    'Yukun agramy: ' {{$mailData['yuk_agram']}} 'tonna'
@endif
<br>
@if(isset($mailData['price']))
    'Tölegi: ' {{$mailData['price']}} 'manat'
@endif
<br>
@if(isset($mailData['note']))
    'Bellik: ' {{$mailData['note']}}
@endif
<br>


@endcomponent
