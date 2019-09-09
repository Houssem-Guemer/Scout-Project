@extends('layouts.web_template')

<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    @php
        $card_color = '#2b53ce';
        $news_style = 'style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;"';

       if (Route::currentRouteNamed('cubs')){
           $card_color = '#ffd700';
           $news_style = 'style="background-image: linear-gradient(to bottom right, #FDEB71, #F8D800); radius: 5px;"';
       }
       if (Route::currentRouteNamed('scout')){
           $card_color = '#00cc00';
           $news_style = 'style="background-image: linear-gradient(to bottom right, #FFF720, #3CD500); radius: 5px;"';
       }

       if (Route::currentRouteNamed('advanced_scout')){
           $card_color = '#701700';
           $news_style = 'style="background-image: linear-gradient(to bottom right, #F05F57, #360940); radius: 5px;"';
       }

       if (Route::currentRouteNamed('traveler')){
           $card_color = '#ee2c2c';
           $news_style = 'style="background-image: linear-gradient(to bottom right, #FEB692, #EA5455); radius: 5px;"';
       }
    @endphp
    <head>
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css')}}"/>
        <style>
            .btn-light{
                position: absolute;
                bottom:0px;
                left:10%;
                background: #f2f2f2;
                border-radius: 4px;
                box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);

                font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

            }
            .post-description-container{
                text-align: right;
            }
            .post-content{
                padding-top:35px !important;
            }
            .post-header>h5>span:first-child{
                padding: 5px;
                border-radius: 4px;
                color:white;
                font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

            }
            .post-header>h5>span:nth-child(2){
                padding: 5px;
                margin-right: 5px;
                color:grey;
                font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

            }
            .post-image{
                width: 100%;
                height: 270px;
                margin-top: 25px;
                border-radius: 4px;
            }
            .post-title>h2{
                margin-top:20px;
                margin-bottom:20px;
                font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

            }
            .post-summary{
                margin-top:10px;
                margin-bottom:10px;
                font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

            }
            .post-summary>p{
                color: #444444;
                font-weight: 400;
                text-align: right;
                font-size: 12pt;
                margin: 0;
                margin-bottom: 15px;
                line-height: 29px;
                height: 87px;
                overflow: hidden;
            }
            .btn-outline-primary.btn-custom {
                color: #2b53ce !important;
                background-color: transparent;
                background-image: none;
                border-color: #2b53ce !important;;
            }

            .btn-outline-primary.btn-custom:hover {
                color: #fff !important;
                background-image: linear-gradient(to bottom right, #52E5E7, #130CB7);
                border-color: #ffffff !important;;
            }

            .btn-outline-primary.btn-custom:focus, .btn-outline-primary.btn-custom.focus {
                box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1);
            }

            .btn-outline-primary.btn-custom.disabled, .btn-outline-primary.btn-custom:disabled {
                color: #fff !important;;
                background-color: transparent;
            }

            .btn-outline-primary.btn-custom:not(:disabled):not(.disabled):active, .btn-outline-primary.btn-custom:not(:disabled):not(.disabled).active,
            .show > .btn-outline-primary.btn-custom.dropdown-toggle {
                color: #fff !important;
                background-image: linear-gradient(to bottom right, #52E5E7, #130CB7) !important;;
            }

            .btn-outline-primary.btn-custom:not(:disabled):not(.disabled):active:focus, .btn-outline-primary.btn-custom:not(:disabled):not(.disabled).active:focus,
            .show > .btn-outline-primary.btn-custom.dropdown-toggle:focus {
                box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1);
            }
            .card-img span {
                position:absolute;
                top: 5%;
                right: 0%;
                background: #2b53ce !important;;
                padding: 6px;
                color: #fff !important;;
                font-size: 12px;
                border-radius: 4px;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;

            }
            .card-img span h4{
                color: #ffffff;
                font-size: 12px;
                margin:0;
                padding:10px 5px;
                line-height: 0;
            }

            .owl-prev, .owl-next {
                background-image: linear-gradient(to bottom right, #52E5E7, #130CB7) !important;
                opacity: 0;
            }

            .flip-clock-label {
                font-size: 40px !important;
                color: white !important;
                text-shadow: 3px 2px black !important;
            }
        </style>
    </head>

    <!-- Owl Carousel 1 -->
    <div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
    @php
        $i=0;
    @endphp
    @foreach($events as $event)
        <!-- ARTICLE -->
            <article class="article thumb-article">
                <div class="article-img">
                    <img style="background-image: url('{{asset('images/EventImages/'.$event->event_image)}}');background-position: center;background-repeat: no-repeat;background-size:cover; height: 100%;" src="/images/cover.png" alt="{{$event->title}}">
                </div>
                <div class="article-body" align="right">
                    <ul class="article-info">
                        <li class="article-type" ><i class="fa fa-camera"></i></li>
                        <li class="article-category" ><a style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;" href="#">{{ $event->type }}</a></li>
                    </ul>
                    <h2 class="article-title"><a href="/events/{{$event->event_id}}">{{$event->title}}</a></h2>
                    <ul class="article-meta">
                        <li>{{$event->event_time, 0, 10}} <i class="fa fa-clock-o"></i></li>
                    </ul>
                </div>
                <div class="clock{{ $event->event_id }}c" style="width: auto;zoom: 0.6;position: absolute;left: 75px;top: 500px">
                    @php
                        $earlier = new DateTime();
                        $later = new DateTime(substr($event->event_time, 0, 10));
                        $diff = $later->diff($earlier)->format("%a");
                    @endphp
                    @if($diff == 0)
                        <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;">سيتم هاذا النشاط اليوم</h1>
                    @endif
                    @if($diff == 1)
                        <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;"> سيتم هاذا النشاط غدا </h1>
                    @endif
                    @if($diff == 2)
                        <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;"> سيتم هاذا النشاط بعد يومين </h1>
                    @endif
                    @if($diff > 2 && $diff <= 10)
                            <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;"> سيتم هاذا النشاط بعد  {{ $diff }} ايام </h1>
                    @endif
                    @if($diff > 10)
                        <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;"> سيتم هاذا النشاط بعد  {{ $diff }} يوم </h1>
                    @endif
                </div>
            </article>
            <!-- /ARTICLE -->
            @php
                $i++;
            @endphp
            @if($i==3)
                @break
            @endif
        @endforeach
    </div>
    <!-- /Owl Carousel 1 -->
    <div class="card shadow m-lg-5" id="style-1" >
        <div class="card-header">
            <h3 class="center text-center" style="color: #ffffff;">نشاطاتنا القادمة</h3>
        </div>
        <div class="container-fluid border" align="right">
            <div class="btn-group-toggle btn-group-block" data-toggle="buttons">
                <label class="btn btn-outline-secondary category-button" data-filter = "القادة">
                    <input type="radio" name="options" id="option2"  autocomplete="off">القادة
                </label>

                <label class="btn btn-outline-secondary category-button" data-filter = "الجوالة">
                    <input type="radio" name="options" id="option2"  autocomplete="off">الجوالة
                </label>

                <label class="btn btn-outline-secondary category-button" data-filter = "المتقدم">
                    المتقدم<input type="radio" name="options" id="option2"  autocomplete="off">المتقدم
                </label>

                <label class="btn btn-outline-secondary category-button" data-filter = "الكشاف">
                    <input type="radio" name="options" id="option2"  autocomplete="off">الكشاف
                </label>

                <label class="btn btn-outline-secondary category-button" data-filter = "الاشبال">
                    <input type="radio" name="options" id="option2"  autocomplete="off">الاشبال
                </label>

                <label class="btn btn-outline-secondary category-button active" data-filter = "allu">
                    <input type="radio" name="options" id="option1"  autocomplete="off" checked> كل الوحدات
                </label>
            </div>
        </div>

        <div class="container mt-3 center" >
            <div class="row">
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="card-deck">
                            @if($events->count()>0)
                                @foreach($events as $event)
                                    <div class="col-md-12 allu {{ $event->unit }} mb-3">
                                        <div class="row" dir="rtl">

                                            <div class="col-md-6">
                                                <div class="post-thumbnail">
                                                    <img style="filter: blur(2px);" class="post-image" src="{{asset('images/EventImages/')}}{{"/".$event->event_image}}"  width="100%" height="100%" alt="{{$event->title}}">
                                                    @php
                                                        $earlier = new DateTime();
                                                        $later = new DateTime(substr($event->event_time, 0, 10));
                                                        $diff = $later->diff($earlier)->format("%a");
                                                    @endphp
                                                    @if($diff == 0)
                                                        <h3 class="" style="font-size: 35px;color: white;text-shadow: 3px 2px black;position: absolute;top: 50%;left: 50px;">سيتم هاذا النشاط اليوم</h3>
                                                    @endif
                                                    @if($diff == 1)
                                                        <h3 class="" style="font-size: 35px;color: white;text-shadow: 3px 2px black;position: absolute;top: 50%;left: 50px;"> سيتم هاذا النشاط غدا </h3>
                                                    @endif
                                                    @if($diff == 2)
                                                        <h3 class="" style="font-size: 35px;color: white;text-shadow: 3px 2px black;position: absolute;top: 50%;left: 50px;"> سيتم هاذا النشاط بعد يومين </h3>
                                                    @endif
                                                    @if($diff > 2 && $diff <= 10)
                                                        <h3 class="" style="font-size: 35px;color: white;text-shadow: 3px 2px black;position: absolute;top: 50%;left: 50px;"> سيتم هاذا النشاط بعد  {{ $diff }} ايام </h3>
                                                    @endif
                                                    @if($diff > 10)
                                                        <h3 class="" style="font-size: 35px;color: white;text-shadow: 3px 2px black;position: absolute;top: 50%;left: 50px;"> سيتم هاذا النشاط بعد  {{ $diff }} يوم </h3>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class=" post-content col-md-6">
                                                <div class="post-description-container">
                                                    <div class="post-header">
                                                        <h5>
                                <span style="background: #7d7d8e;">
                                    {{ $event->type }}
                                </span>
                                                            <span dir="rtl">
                                    <i class="fa fa-clock-o"></i>
                                                                {{substr($event->event_time, 0, 10)}}
                                </span>
                                                        </h5>

                                                    </div>
                                                    <div>
                                                        <div class="post-title">
                                                            <h2>
                                                                {{$event->title}}
                                                            </h2>
                                                        </div>
                                                        <div class="post-summary">
                                                            {!! $event->description !!}
                                                        </div>
                                                        <small class="card-subtitle text-right float-right" style="color: grey"></small>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="btn btn-light " style="float:left;margin-top: 15px">
                                                        <a href="/events/{{$event->event_id}}" target="_blank" style="text-decoration: none">اقرأ المزيد</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('og')
    <meta property="og:title" content="الموقع الرسمي لفوج الفلاح" />
    <meta property="og:image" content="{{{ asset('/images/rss_image.png') }}}" />
    <meta property="og:description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة" />
    <meta property="og:type" content="website" />
@endsection

@section('title')
    <title> الموقع الرسمي لفوج الفلاح </title>
    <meta name="description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة">
@endsection
@section('icon')
    <link rel="icon" href="{{{ asset('/images/landing_page_Logo.png') }}}" >
@endsection