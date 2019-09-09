<!-- this is used to extend from the app layout -->

@extends('layouts.web_template')

<head>
    <link rel="stylesheet" href="/css/landing.css">
    <style>
        .carousel-item{
            opacity: 0.8;
        }
    </style>
</head>
<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    <!-- Masthead -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ul class="carousel-indicators">
                @foreach($carousels as $carousel)
                    @if($loop->index == 0)
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                    @else
                        <li data-target="#demo" data-slide-to="{{ $loop->index }}"></li>
                    @endif
                @endforeach
            </ul>
            <div class="carousel-inner">
                @foreach($carousels as $carousel)
                    @if($loop->index == 0)
                        <div class="carousel-item active" style="background-image: url('{{ asset('/images/Carousel').'/'.$carousel->image }}')">
                            <div class="carousel-caption">
                                <h3 style="position: absolute;bottom: 50px;left: 35%">{{ $carousel->description }}</h3>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item" style="background-image: url('{{ asset('/images/Carousel').'/'.$carousel->image }}')">
                            <div class="carousel-caption">
                                <h3 style="position: absolute;bottom: 50px;left: 35%">{{ $carousel->description }}</h3>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </header>
    <div class="row header" style="text-align: center;margin-top:20px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">آخر أخبارنا </h3>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey">آخر أخبارنا وآخر النشاطات في فوجنا العريق </h4>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey"> فوج الفلاح </h4>
        </div>
    </div>

    <!--start posts -->
    <div class=" mt-3 ">

            @include('includes.news_landing')

    </div>



    <div class="row header" style="text-align: center;margin-top:40px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">محطاتنا القادمة </h3>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey">محطاتنا القادمة وانشطتنا المرتقبة</h4>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey"> قريبا </h4>
        </div>
    </div>
    <div class=" mt-3 ">
        <div class="row">
            @include('includes.events_landing')
        </div>
    </div>


    <div class="row header" style="text-align: center;margin-top:40px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">مواقع كشفية </h3>
        </div>

        <div class=" mt-3 ">
            <div class="row" >
               <div class="col-md-3 card website" style="display:table-cell;margin:0 auto;padding-left:0px;padding-right: 0px">

                   <a  href="http://www.scouts-dz.org/" target="_blank">
                       <img src="/images/algerianwebsite.png" class="image" style="width:100%;height:150px"/>
                   </a>
               </div>
                <div class="col-md-3 card website" style="display:table-cell;margin:0 auto;padding-left:0px;padding-right: 0px">

                    <a  href="https://www.scout.org/ar" target="_blank">
                        <img src="/images/worldscout.png" class="image" style="width:100%;height:150px"/>
                    </a>
               </div>
                <div class="col-md-3 card website" style="display:table-cell;margin:0 auto;padding-left:0px;padding-right: 0px" >

                    <a  href="https://www.scout.org/ar/arab" target="_blank">
                        <img src="/images/arabic-region.png" class="image" style="width:100%;height:150px"/>
                    </a>

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