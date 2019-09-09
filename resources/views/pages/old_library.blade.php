@extends('layouts.web_template')
<head>
    <link rel="stylesheet" href="css/library.css">
    <style>
        .input-holder{
            border-radius: 50px;
            width: 450px;
            position: absolute;
            right: 28%;
            background: rgba(0,0,0,0.8);
            -webkit-transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            -moz-transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            overflow: hidden;
            height: 70px;
        }
        .input-holder>input{
            width: 100%;
            height: 50px;
            padding: 0px 70px 0 20px;
            opacity: 0;
            position: absolute;
            top: 0px;
            left: 0px;
            background: transparent;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            border: none;
            outline: none;

            font-size: 16px;
            font-weight: 400;
            line-height: 20px;
            color: #FFF;
            -webkit-transform: translate(0, 60px);
            -moz-transform: translate(0, 60px);
            transform: translate(0, 60px);
            -webkit-transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            -moz-transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            -webkit-transition-delay: 0.3s;
            -moz-transition-delay: 0.3s;
            transition-delay: 0.3s;
        }
        .input-holder>input{
            opacity: 1;
            -webkit-transform: translate(0, 10px);
            -moz-transform: translate(0, 10px);
            transform: translate(0, 10px);

        }
        .input-holder>button{
            width: 70px;
            height: 70px;
            border: none;
            border-radius: 6px;
            background: #FFF;
            padding: 0px;
            outline: none;
            position: relative;
            z-index: 2;
            float: right;
            cursor: pointer;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .input-holder>button{
            width: 50px;
            height: 50px;
            margin: 10px;
            border-radius: 30px;

        }
        input{
            -webkit-appearance: textfield;
            border: 0px solid #ccc !important;


            padding: 0px 70px 10px 20px !important;
        }



    </style>
</head>

@section('content')
    <div class="jumbotron">
        <h1 style="color: white;font-size: 100px;text-shadow: 3px 2px black;text-align: center">كتبنا</h1>
        <div class="input-holder">
            <input oninput="check()" type="text"  dir="rtl" name="search" placeholder="ابحث..." data-search>
            <button class="search-icon"  onclick="check()"><span class="fa fa-search"></span></button>
        </div>

    </div>
    <div class="container jumbotron-fluid">
        <div class="row flex-column-reverse flex-md-row filtr-container">
            @foreach($books as $book)
                <div class="col-md-4 filtr-item" data-category="{{ $book->category}}" style="margin: 0 !important;padding: 0 !important;">
                    <div class="card text-right" dir="rtl" style="margin: 0 !important;padding: 0 !important;height:550px">
                        <div class="card-header" style="padding: 0 !important;margin-bottom:120px">
                            @if( $book->picture=="")

                                <img class="card-img img-fluid" src="/images/book.jpg" alt="{{ $book->title }}" style="height:400px !important;">
                            @else
                                <img class="card-img img-fluid" src="uploads/Books/Images/{{ $book->picture }}" alt="{{ $book->title }}" style="height:400px !important;">
                                @endif
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">{{ $book->title }}</h1>
                            <div class="container">
                                <div class="row">
                                    <div class="col-8 metadata">{{ $book->category }}</div>
                                </div>
                            </div>
                            <p class="card-text" style="padding-bottom: 10px">{!! $book->description !!}</p>
                            <a class="trailer-preview "  href="uploads/Books/PDF/{{ $book->file }}" target="new" download="{{ $book->title }}.pdf">
                                <i class="fa fa-arrow-down" style="position: absolute;right: 30%;top: 30%" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="gh"></div>
        </div>
    </div>
    <script>
        var filterizd = $('.filtr-container').filterizr({
           //options object
        });
        function check(){
            setTimeout(function () { checked(); }, 1000);
        }
        function checked(){
            if(document.querySelectorAll('.filteredOut').length=={{$books->count()}}){
                $(".gh").text("الكتاب الذي تبحث عنه غير موجود");
            }else{
                $(".gh").text("");
            }
        }
    </script>
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