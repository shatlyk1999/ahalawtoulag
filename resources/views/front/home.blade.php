@extends('front.layouts.common')
@section('title', trans("messages.logo1"))
@section('content')


<style>
    .news{
        background-color: #ffffff;
    }
	.news_cart{
        margin-bottom: 25px;
        padding: 0 10px;
        transition: 0.2s
    }
    .news_cart_block{
        box-shadow: 0px 0px 46px 0px rgba(0,0,0,.1);
        overflow: hidden;
        transition: 0.2s
    }
    .news_cart_img, .news_cart_caption{
        border: 1px solid #e7eaf3;
        background: #fff;
        transition: 0.2s

    }
    .news_cart_img{
        overflow: hidden;
    }
    .news_cart_img img{
        transition: 0.5s
    }
    .news_cart_block:hover .news_cart_img img{
        transform: scale(1.05);

    }
    .news_cart_caption a{
        transition: 0.3s;
        color: #000;
        text-decoration: none;
    }
    .news_cart_caption a:hover{
        color: #00447D;
    }
    .news_cart_img{
        position: relative;
    }
    .news_img_overlay{
        opacity: 0;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding-top: 80px;
        padding-bottom: 20px;
        background: linear-gradient(0deg,rgba(0,0,0,.5) 0,rgba(0,0,0,0) 100%);
        text-align: center;
        color: #fff;
        transition: 0.4s;
    }
    .news_cart:hover .news_img_overlay{
        opacity: 1;
    }
    .news_img_overlay li{
        display: inline-block;
        padding: 0 6px;
    }
    .news_img_overlay .fa-heart-o:hover{
        cursor: pointer;
    }
    .news_cart h4{
    font-size: 18px;
    font-weight: 600;
    }
    .news_cart_img{
        height: 240px;
    }
    .news_cart_img img{
        height: 100%;
        width:100%;
        object-fit: cover;
    }
    .news_cart_caption{
    height: 200px;
        padding: 20px 30px 20px 30px;
        display: flex;
        flex-direction: column;
    }
    .news_cart_caption_partners h4{
        font-size: 18px;
        font-weight: 600;
        color: #000;
        text-align: center;
    }
    .news_cart_caption_partners a{
        text-decoration: none;
    }
    .news_cart_caption_partners{
    /*    height: 150px;*/
        padding: 20px 30px 20px 30px;
        display: flex;
        flex-direction: column;
    }
    .news_cart_divider{
        width: 100%;
        border: 1px solid #e7eaf3;
        margin-top: auto;
        margin-bottom: 10px;
    }
    .new_date{
        font-size: 12px;
        font-weight: 600;
        color: #b7b9bf;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>

<div class="main">
<section class="hero hero-home">
    @include('front.site.section_slider', $data)
</section>

<section id="main" style="background-color:#FDFDFD;">
    @include('front.site.section_services', $data) 
</section>

<section id="">
    @include('front.site.main_target')
</section>

<section id="news" class="news">
     @include('front.site.news', $data)
</section>

<section class="section pd-75" id="contact">
    @include('front.site.contact')
</section>

</div>

@endsection