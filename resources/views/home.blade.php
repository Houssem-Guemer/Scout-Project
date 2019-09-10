@extends('layouts.new_template')
@section('content')
    <section class="home-bg-img col-md-12">
        <div >
            <h1>
                <span id="span-ani" style="height:80px;margin-bottom:50px;display: none; "></span>
              

            </h1>
            <!--  <a href="/about" style="de" class="square_btn">!...من نحن </a>-->
           
        </div>
    </section>
    <!---->
    <section class="home-cards h-100">
        <div class="row h-100 justify-content-center align-items-center ">
            <div class="card three-cards bg-light mb-3 col-md-3 " id="three-card1">
               <a href="/team">
                <div class="card-body">
                    <img src="/images/captains-logo.png" alt="">
                    <div id="card1">
                          <h1>القادة</h1>
                          <h3>تعرف على قادة الفوج</h3>
                    </div>
                </div>
              </a>
            </div>

            <div class="card three-cards middle bg-light col-md-3 " id="three-card2">
                <a href="/news">
                <div class=" card-body">
                    <img src="/images/news-logo.png" alt="">
                    <div id="card2">
                        <h1>الأخبار</h1>
                        <h3>اطلع على آخر الأخبار</h3>
                    </div>
                </div>
                </a>
             </div>
            <div class="card three-cards bg-light mb-3 col-md-3" id="three-card3">
                <a href="/library">
                   <div class=" card-body">
                    <img src="/images/library-logo.png" alt="">
                    <div id="card3">
                        <h1>المكتبة</h1>
                        <h3>يمكنك قراءة و تحميل كتبنا</h3>
                    </div>
                </div>
                </a>
           </div>
        </div>
    </section>
    <!---->
    <section class="home-separator-elems">
        <div class="row">
            <h3 class="col-md-12">الأخبار</h3>
            <h1 class="col-md-12">آخر أخبارنا وآخر النشاطات في فوجنا العريق</h1>
        </div>
        <div class="row">
            <hr width="50%">
        </div>
        <a href="/news" class="btn btn-primary btn-rounded ">كل الاخبار</a>
    </section>
    <!---->
@if(!empty($cubPost))
    <section class="home-event-2 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card card1 bg-light mb-3 col-md-6" id="event-text-card1" style="padding: 10px ">
                <div class=" card-body">
                    <h3 class="card-title">{{$cubPost->post_title}}</h3>
                    <h5>{{substr($cubPost->post_date, 0, 10)}}</h5>
                    <h6 style="font-size: 12px;">وحدة الاشبال</h6>

                    <p class="card-text" style="font-family:'scheherazade' ;font-size: 150%;">{!! $cubPost->post_summary !!}</p>
                    <div class="row">
                        <hr style="width: 50%;margin-left:25% !important; margin-right:25% !important; border-color:gray !important;">
                    </div>
                    <div class="row">
                        <a href="/posts/{{$cubPost->post_id}}" style="margin-left:42%; ">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
            <div class="
            card card2 mb-3 col-md-6">
                <div class="card-body" style=" background-image: url({{asset('images/PostCover/')}}{{"/".$cubPost->cover_image}});">
                    <div class="color-filter"></div>
                </div>
            </div>
        </div>
    </section>
@endif
    <!---->
@if(!empty($scoutPost))
    <section class="home-event-2 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card card2  mb-3 col-md-6">
                <div class="card-body" style=" background-image: url({{asset('images/PostCover/')}}{{"/".$scoutPost->cover_image}});">
                    <div class="color-filter"></div>
                </div>
            </div>
            <div class="card card1 bg-light mb-3 col-md-6" id="event-text-card2" style="padding: 10px ">
                <div class=" card-body">
                    <h3 class="card-title">{{$scoutPost->post_title}}</h3>
                    <h5>{{substr($scoutPost->post_date, 0, 10)}}</h5>
                    <h6 style="font-size: 12px;">وحدة الكشاف</h6>

                    <p class="card-text" style="font-family:'scheherazade' ;font-size: 150%;">{!! $scoutPost->post_summary !!}</p>
                    <div class="row">
                        <hr style="width: 50%;margin-left:25% !important; margin-right:25% !important; border-color:gray !important;">
                    </div>
                    <div class="row">
                        <a href="/posts/{{$scoutPost->post_id}}" style="margin-left:42%; ">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
    <!---->
    <section class="home-separator-elems">

        <div class="row">
            <hr width="50%">
        </div>

    </section>
    <!---->
    <section class="home-event-3">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                @if(!empty($ascoutPost))
                <div class="row h-100">
                    <div class="card event-card1 bg-light mb-3 col-md-12">
                        <div class="card-body" style=" background-image: url({{asset('images/PostCover/')}}{{"/".$ascoutPost->cover_image}});">
                          <a href="/posts/{{$ascoutPost->post_id}}">
                            <div class="color-filter"></div>
                            <div class="side-filter1"></div>
                            <div class="card-title">
                                <h2>{{$ascoutPost->post_title}}</h2>
                                <h4> {{substr($ascoutPost->post_date, 0, 10)}} </h4>
                                <h6> وحدة المتقدم </h6>

                            </div>
                            <p class="card-text">{!! $ascoutPost->post_summary !!}</p>
                          </a>
                        </div>
                    </div>
                </div>
                @endif
                @if(!empty($travelerPost))
                <div class="row h-100">
                    <div class="card bg-light event-card1 mb-3 col-md-12">
                        <div class="card-body" style=" background-image: url({{asset('images/PostCover/')}}{{"/".$travelerPost->cover_image}});">
                          <a href="/posts/{{$travelerPost->post_id}}">
                            <div class="color-filter"></div>
                            <div class="side-filter1"></div>
                            <div class="card-title">
                                <h2>{{$travelerPost->post_title}} </h2>
                                <h4>{{substr($travelerPost->post_date, 0, 10)}} </h4>
                                <h6> وحدة الجوالة </h6>

                            </div>
                            <p class="card-text">{!! $travelerPost->post_summary !!}</p>
                          </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @if(!empty($capPost))
            <div class="col-md-6">
                <div class="row h-100 ">
                    <div class="card bg-light event-card2 mb-3 col-md-12">
                        <div class="card-body" style=" background-image: url({{asset('images/PostCover/')}}{{"/".$capPost->cover_image}});">
                         <a href="/posts/{{$capPost->post_id}}">
                            <div class="color-filter"></div>
                            <div class="side-filter2"></div>
                            <div class="card-title">
                                <h2>{{$capPost->post_title}}</h2>
                                <h4> {{substr($capPost->post_date, 0, 10)}} </h4>
                                <h6> وحدة القادة </h6>
                            </div>
                            <p class="card-text">{!! $capPost->post_summary !!}</p>
                         </a>
                      </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>


    <section class="governor container-fluid">
        <div class="row w-100 p-0 m-0">
            <div class="container-one col-md-6 col-sm-12 col-lg-6 p-0 m-0 text-center"><h6 dir="rtl">  الموقع الشخصي للسيد محافظ الفوج القائد براء عبد الإله مويات مختص إعلام آلي  عضو المجلس الولائي والمفوضية الوطنية للعلاقات الدولية، كاتب من أجل المتعة، مختص اعلام الي

            <br>- أحد الشباب الواعد الكشافة الإسلامية الجزائرية - 

            <br> <div style="margin-right:18%;margin-left:18%;margin-top:20px"><span style="font-size:20px;">"إن العمل في فوج الفلاح - هذه المدرسة العريقة - هو فخر ما بعده فخر و قبل كل شيء فإن الإنتماء لهذا الكيان العظيم هو إنتماء لتاريخ مجيد ومستقبل واعد ."<span></div> 


</h6>
                       <a class=" website-link" href="https://baraemouyet.wixsite.com/barae" style="font-weight: bold;text-decoration:none;"> <i class="arrow arrow-left"></i> الموقع الشخصي</a>
            </div>
            <div class="container_two col-md-6 col-sm-12 col-lg-6 p-0 m-0">
                <div class="row w-100 m-0 p-0">
                    <div class="col-md-1 col-sm-12 p-0 m-0">
                        <div class="headerDivider"></div>
                    </div>
                    <div class="profile-img col-md-11 col-sm-12 p-0 m-0">
                        <img src="images/RAsset_5.png" alt="governor">
                    </div>
                </div>



            </div>
        </div>
    </section>
    

    <!---->
    <!--<section class="home-separator-elems">
        <div class="row">
            <h3 class="col-md-12">الأخبار</h3>
            <h1 class="col-md-12">آخر أخبارنا وآخر النشاطات في فوجنا العريق</h1>
        </div>
        <div class="row">
            <hr width="50%">
        </div>-->
       <!-- <a href="/events" class="btn btn-primary btn-rounded">كل الاخبار</a>-->
    <!--</section>
    <section class="home-grid">
        @if(!empty($events[0]))
        <div class="row" style="width:100%;margin: 0;">
            <div class="col grid-image" style="background-image:url({{asset('images/EventImages/')}}{{"/".$events[0]->event_image}});">

            </div>
            <div class="col grid-text" id="grid-text-one">
                <div class=" card-body" style="margin-top:10%">
                    <h3 class="card-title">{{$events[0]->post_title}}</h3>
                    <h5>{{substr($events[0]->event_time, 0, 10)}}</h5>
                    @php
                        $unit_name = '';
                        if($events[0]->linked_unit == "cubs"){
                            $unit_name = 'وحدة الاشبال';
                        }
                        if($events[0]->linked_unit == "sct"){
                            $unit_name = 'وحدة الكشاف';
                        }
                        if($events[0]->linked_unit == "asct"){
                            $unit_name = 'وحدة الكشاف المتقدم';
                        }
                        if($events[0]->linked_unit == "tvlr"){
                            $unit_name = 'وحدة الجوالة';
                        }
                        if($events[0]->linked_unit == "cap"){
                            $unit_name= 'وحدة القادة';
                        }
                    @endphp
                    <h6 style="font-size: 12px;">{{$unit_name}}</h6>

                    <p class="card-text" style="font-family:'scheherazade' ;font-size: 135%;">{!! substr($events[0]->description,0,500) !!}...</p>
                    <div class="row">
                        <hr style="width: 50%;margin-left:25% !important; margin-right:25% !important; ">
                    </div>
                    <div class="row">
                        <a href="/events/{{$events[0]->event_id}}" style="margin-left:42%; ">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(!empty($events[1]))
        <div class=" row" style="width:100%;margin :0 ;">
            <div class="col grid-text" id="grid-text-one">
                <div class=" card-body" style="margin-top:10%">
                    <h3 class="card-title">{{$events[1]->post_title}}</h3>
                    <h5>{{substr($events[1]->event_time, 0, 10)}}</h5>
                    @php
                        $unit_name = '';
                        if($events[1]->linked_unit == "cubs"){
                            $unit_name = 'وحدة الاشبال';
                        }
                        if($events[1]->linked_unit == "sct"){
                            $unit_name = 'وحدة الكشاف';
                        }
                        if($events[1]->linked_unit == "asct"){
                            $unit_name = 'وحدة الكشاف المتقدم';
                        }
                        if($events[1]->linked_unit == "tvlr"){
                            $unit_name = 'وحدة الجوالة';
                        }
                        if($events[1]->linked_unit == "cap"){
                            $unit_name= 'وحدة القادة';
                        }
                    @endphp
                    <h6 style="font-size: 12px;">{{$unit_name}}</h6>

                    <p class="card-text" style="font-family:'scheherazade' ;font-size: 135%;">{!! substr($events[1]->description,0,500) !!}...</p>
                    <div class="row">
                        <hr style="width: 50%;margin-left:25% !important; margin-right:25% !important; ">
                    </div>
                    <div class="row">
                        <a href="/events/{{$events[1]->event_id}}" style="margin-left:42%; ">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
            <div class="col grid-image " style="background-image:url({{asset('images/EventImages/')}}{{"/".$events[1]->event_image}});">

            </div>
        </div>
        @endif
    </section>-->
    <!---->
    <!-- <section class="captains-section">
      <div class="row col-md-6">
        <div class="container" style="margin-left:20%; margin-top:5%;">
          <div class="card" style="width: 70%; position:absolute;">
            <div class="card-body">
              <div class="circle" style="background-image:url(../weekly-imgg.png);"></div>
              <h5 class="card-title">Card title</h5>
              <p class="card-text">وحدة
                الكشاف كل يوم
                جمعة رفقة قادتها
                ناشدة
                التميز
                وسالكة لطريقه حيث يعرف
                نشاطها حيوية وثراء يميزها ذاتها
                ويجعلها من الوحدات التي يعول عليها كثيــرا
                كعادتها تلتقي وحدة الكشاف كل يوم جمعة رفقة قادتها ناشدة التميز وسالكة لطريقه حيث يعرف نشاطها حيوية وثراء
                يميزها ذاتها
                ويجعلها من ارلوحدات التي يعول عليها كثيــرا.</p>
            </div>
          </div>
        </div>
        <div class="container" style="margin-left:15%; margin-top:5%;">
          <div class="card" style="width: 70%; position:absolute;">
            <div class="card-body">
              <div class="circle" style="background-image:url(../weekly-imgg.png);"></div>
              <h5 class="card-title">Card title</h5>
              <p class="card-text">وحدة
                الكشاف كل يوم
                جمعة رفقة قادتها
                ناشدة
                التميز
                وسالكة لطريقه حيث يعرف
                نشاطها حيوية وثراء يميزها ذاتها
                ويجعلها من الوحدات التي يعول عليها كثيــرا
                كعادتها تلتقي وحدة الكشاف كل يوم جمعة رفقة قادتها ناشدة التميز وسالكة لطريقه حيث يعرف نشاطها حيوية وثراء
                يميزها ذاتها
                ويجعلها من ارلوحدات التي يعول عليها كثيــرا.</p>
            </div>
          </div>
        </div>
        <div class="container" style="margin-left:10%; margin-top:5%;">
          <div class="card" style="width: 70%; position:absolute;">
            <div class="card-body">
              <div class="circle" style="background-image:url(../weekly-imgg.png);"></div>
              <h5 class="card-title">Card title</h5>
              <p class="card-text">وحدة
                الكشاف كل يوم
                جمعة رفقة قادتها
                ناشدة
                التميز
                وسالكة لطريقه حيث يعرف
                نشاطها حيوية وثراء يميزها ذاتها
                ويجعلها من الوحدات التي يعول عليها كثيــرا
                كعادتها تلتقي وحدة الكشاف كل يوم جمعة رفقة قادتها ناشدة التميز وسالكة لطريقه حيث يعرف نشاطها حيوية وثراء
                يميزها ذاتها
                ويجعلها من ارلوحدات التي يعول عليها كثيــرا</p>
            </div>
          </div>
        </div>

      </div>


    </section> -->
    <!---->
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#span-ani").ghosttyper({

                messages:[],
                timeWrite:150,
                timeDelete:120,
                timePause:1000

            });

        });
    </script>

    <script>

        $(document).ready(function(){
            $(window).scroll(function ()
            {
                fadeIO();

            });
        });




        function fadeIO(){
            var wScroll= $(window).scrollTop();

            $('.home-bg-img').css('background-postition','center '+(wScroll *0.75)+'px');

            //  $('#three-card2').css('opacity',(wScroll*0.005));


            $('#event-text-card1').css('left', -30+(wScroll*0.025)+'em');
            $('#event-text-card2').css('right', -35 + (wScroll * 0.025) + 'em');

            if(wScroll>1200){
                  $('#event-text-card1').css('left', 5+'em');
            }
            if(wScroll>1800){
                  $('#event-text-card2').css('right',  0+ 'em');

            }

            if((wScroll>150) && (wScroll<400)){

                $("#three-card1").addClass('animated fadeInDown');
                $("#three-card2").addClass('animated zoomIn');
                $("#three-card3").addClass('animated fadeInDown');


            }
            if((wScroll>2700)&&(wScroll<3900)){
                
                $("#grid-text-one").addClass('animated bounceInLeft ');
            }

            if ((wScroll > 3300) && (wScroll < 4900))
            {
                
                $("#grid-text-two").addClass('animated bounceInRight ');
            }




            $(".grid-image").on({

                mouseenter: function ()
                {
                    $(this).addClass('animated pulse ');
                },
                mouseleave: function ()
                {
                    $(this).removeClass('animated pulse ');
                }
            });
            console.log(wScroll);







// $(".three-cards.card1").fadeToggle(1000);

        }
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="/css/main.css">
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