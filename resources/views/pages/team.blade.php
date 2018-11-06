@extends('layouts.web_template')

<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    @php
        $card_color = '#2b53ce';
        $news_style = 'style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;"';
        $number = 0;
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
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/capStyle.css')}}"/>
        <style>
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
            .jumbotron{
                background: url("https://www.alainsamson.net/images/conferences/banniere-diriger-avec-courage.jpg") no-repeat center center;
                height: 370px;
                width: 100%;
                margin-bottom: 0px;
                border-radius: 0 !important;
                -webkit-background-size: 100% 100%;
                -moz-background-size: 100% 100%;
                -o-background-size: 100% 100%;
                background-size: 100% 100%;
            }
            .container{
                padding-top:20px
            }
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

    <div class="jumbotron" style="margin-top:80px">
        <h1 style="color: white;font-size: 100px;text-shadow: 3px 2px black;text-align: center">قادتنا</h1>
        <div class="input-holder">
            <input oninput="check()" type="text"  dir="rtl" name="search" placeholder="ابحث..." data-search>
            <button class="search-icon"  onclick="check()"><span class="fa fa-search"></span></button>
        </div>
    </div>
    <section class=" " style="background-color: #ECEFF1;width:100%;padding:20px;padding-top:60px">

        <h1 style="margin-bottom:20px;color: grey;font-size: 100px;text-shadow: 3px 2px black;text-align: center">قادة الفوج</h1>
            <div class="row active-with-click filtr-container">
                @foreach($captains as $captain)
                    <div class="col-md-4 col-sm-6 col-xs-12 filtr-item " data-category="1">
                        <article class="material-card Light-Blue ml-2">
                            <h2>
                                <span style="text-align: right">{{ $captain->profile->getFullName() }}</span>
                                <strong style="text-align: right">
                                    {{ $captain->assignedRole->getRole() }}
                                    <i class="fa fa-fw fa-star"></i>
                                </strong>
                            </h2>
                            <div class="mc-content">
                                <div class="img-container">
                                    <img class="img-fluid" style="width:100% !important" src="{{ $captain->profile->getPicture() }}">
                                </div>
                                @php
                                    $birth_date = "تاريخ الميلاد";
                                    $membership_date = "تاريخ الانضمام";
                                    $email = "البريد الالكتروني";
                                    $phone = "رقم الهاتف";
                                @endphp
                                <div class="mc-description" style="text-align: right">
                                    {{ $captain->profile->date_of_birth }} : {{ $birth_date }}
                                    <br>
                                    {{ $captain->profile->membership_date }} : {{ $membership_date }}
                                    <br>
                                <small>{{ $captain->profile->email }}</small>     : {{ $email }}
                                    <br>
                                    {{ $captain->profile->phone }} : {{ $phone }}
                                </div>

                            </div>
                            <a class="mc-btn-action" style="color: #fff;">
                                <i class="fa fa-bars" style="color:white"></i>
                            </a>
                            <div class="mc-footer">
                                <h4 class="pull-right"  dir="rtl" style="text-align: center;position: absolute;right: 10%">
                                    <button style="margin-top: -20px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $captain->scout_id }}">
                                        اقرأ اكثر
                                    </button>
                                </h4>
                                <div style="position: absolute;right:30%">
                                    <a  class="fa fa-fw fa-facebook" href="{{$captain->facebook}}"></a>
                                    <a class="fa fa-fw fa-twitter" href="{{$captain->twitter}}"></a>
                                    <a class="fa fa-fw fa-instagram" href="{{$captain->instagram}}"></a>
                                </div>


                            </div>
                        </article>
                    </div>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal{{ $captain->scout_id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$captain->profile->getFullName()}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                              <div class="row">

                                  <div class="col-md-9 col-xs-9"  style="padding-top: 20px">
                                      @if($captain->profile->first_name!="")
                                      <p style="text-align: right">
                                          <span style="float: right;padding-left:15px">: الاسم</span>
                                          <span>{{$captain->profile->first_name}}</span>
                                      </p>
                                      @endif
                                      @if($captain->profile->last_name!="")
                                      <p style="text-align: right">
                                          <span style="float: right;padding-left:15px">: اللقب</span>
                                          <span>{{$captain->profile->last_name}}</span>
                                      </p>
                                          @endif
                                      @if($captain->profile->date_of_birth!="")
                                      <p style="text-align: right">
                                          <span style="float: right;padding-left:15px">: تاريخ الازدياد</span>
                                          <span>{{$captain->profile->date_of_birth}}</span>
                                      </p>
                                              @endif

                                      @if($captain->profile->place_of_birth!="")
                                      <p style="text-align: right">
                                          <span style="float: right;padding-left:15px">: مكان الميلاد</span>
                                          <span>{{$captain->profile->place_of_birth}}</span>
                                      </p>
                                                  @endif

                                      @if($captain->profile->address!="")
                                      <p style="text-align: right">
                                          <span style="float: right;padding-left:15px">: العنوان</span>
                                          <span>{{$captain->profile->address}}</span>
                                      </p>
                                                          @endif
                                      @if($captain->profile->phone!="")
                                      <p style="text-align: right">
                                          <span style="float: right;padding-left:15px">: رقم الهاتف  </span>
                                          <span>{{$captain->profile->phone}}</span>
                                      </p>
                                         @endif

                                  </div>
                                      <div class="col-md-2 col-xs-2">
                                          @if($captain->profile->image=="")
                                          <img class="img-circle img-rounded" src="/images/default.png" height="80" width="80" style="border-radius: 50%;margin-top: 10px;margin-left: 15px"/>
                                           @else
                                          <img class="img-circle img-rounded" src="/images/Captain/{{$captain->profile->image}}" height="80" width="80" style="border-radius: 50%;margin-top: 10px;margin-left: 15px"/>
                                          @endif
                                      </div>



                              </div>
                                    @if($captain->profile->personal_info!="")
                                <div class="row">
                                    <div style="width: 100%;padding:20px">
                                        <h1 style="text-align: right;color:grey">معلومات القائد الشخصية</h1>
                                    </div>
                                    <div style="text-align:right;padding:20px">
                                        {!! $captain->profile->personal_info !!}
                                    </div>

                                </div>
                                        @endif
                                @if($captain->profile->scout_info!="")
                                <div class="row">
                                    <div style="width: 100%;padding:20px">
                                        <h1 style="text-align: right;color:grey">معلومات القائد الكشفية</h1>
                                    </div>
                                    <div  style="text-align:right;padding:20px">
                                        {!! $captain->profile->scout_info !!}
                                    </div>

                                </div>
                                        @endif

                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="gh"></div>
            </div>

    </section>
    <script>
        var filterizd = $('.filtr-container').filterizr({
           //options object
        });
        function check(){
            setTimeout(function () { checked(); }, 1000);
        }
        function checked(){
            if(document.querySelectorAll('.filteredOut').length=={{$captains->count()}}){
                $(".gh").text("القائد الذي تبحث عنه غير موجود");
            }else{
                $(".gh").text("");
            }
        }
    </script>
@endsection
@section('og')
    <meta property="og:title" content="الموقع الرسمي لفوج الفلاح" />
    <meta property="og:image" content="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/18835730_1701449486822767_2312127021052390335_n.jpg?_nc_cat=110&_nc_ht=scontent-cdg2-1.xx&oh=cd825a0c4d827b279c38b8729d706544&oe=5C4062E0" />
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
