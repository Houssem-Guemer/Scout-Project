@extends('layouts.web_template')

<!-- this is the content of our about page  ,
    all of the page content must be inside the content section -->
@section('content')
    <style>
        p,span,h1,b{
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

        }
        h1{
            font-size: 60px !important;
            color:#1859AD
        }
        span{
            color: #1859AD;
        }
        b{
            color: #1859AD;
        }
        .subject-title{
         color:red;
            font-size: 30px;
        }
        .captains{
            font-size: 18px;
        }
        .card{
            background-color: #00B0F0;
        }
        .card>*{
            color:white;

        }
    </style>
<div>
    <div class="mb-3" style="height: 100px"></div>
    <div >
       <h1 style="text-align: center;">
            <span style="text-align: center;" >
           <img src="/images/faleh-logo.png" width="100" height="100"/>
       </span>
           فوج الفلاح
       </h1>
    </div>
    <div style="width: 100%;margin-top:100px">
        <div class="row" dir="rtl">
            <div class="col-md-6 col-xs-12">
                <div style="width:65%;margin-right:20%">
                    <p style="text-align: right;padding-right:40px;" class="subject-title">المولد و النشأة</p>

                    <div class="card" style="border-radius: 10px;">

                         <p style="padding:10px;text-align: right">
                             كانت انظلاقة الفوج سنة 1990 تحت مسمى الشهيد <b>الخير ثابت </b>    فبعد فترة من انعقاد مؤتمر الانبعاث سنة  1989 عرفت ولاية سطيف مولد 5 أفواج، وقد كان مقر الفوج يقع في حي طانجة الشعبي و بالضبط في دار الشباب شخشوخ الزيتوني وكان الفوج آنذاك بقيادة المحافظ  <b>بن سليم عبد الغني </b> 20 سنة و القائد  <b>نور الدين رزازقي </b> وقد شهدت الانطلاقة العديد من العوائق و الصعوبات
                         </p>
                        <img  src="/images/image2.png" width="100" height="100" class="pull-left" style="position: absolute;left:0px;
  z-index: 2;  margin-top: -80px"/>
                    </div>
                </div>
                <div>
                    <p style="text-align:center" class="subject-title">سبب التسمية</p>
                    <div style="border:0.5px solid grey">
                        <p style="line-height: 70px;text-align:right;padding:10px;font-size: large">
                            تم تغيير اسم الفوج أواخر سنة 1991 لاعتبارين الأول تيمنا بأول فوج تم اعتماده على مستوى الوطن الحبيب من طرف الشهيد القائد محمد بوراس و الاعتبار الثاني مو تكرار لفظ الفلاح في الآذان خمس مرات في اليوم

                        </p>

                    </div>
                </div>
                <div>

                    <p>
                        <span class="subject-title">معسكرات تدريب القادة</span>

                        <img src="/images/image5.png" width="200" height="150"/>
                        <img src="/images/image4.png" width="200" height="150"/>
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xs-12" dir="rtl">
                <div>
                    <p class="subject-title" style="text-align: right">
                        بعض اطاراتنا

                        <img src="/images/image1.png" width="200" height="100"/>
                    </p>
                    <p class="captains" style="text-align: right" class="">أدت سياسة الفوج المتبعة في تكوين الإطارات الى بروز العديد من أبناء الفوج في كثير من المجالات نذكر منهم: </p>
                    <p style="text-align: right"><span style="text-align: right"> - القائد يوسف بيود</span> دكتور في الفيزياء بجامعة كندا </p>
                    <p style="text-align: right"><span style="text-align: right"> - القائد مراد الزبير</span> مهندس في المحروقات بسلطنة عمان </p>
                    <p style="text-align: right"><span style="text-align: right"> - القائد أسامة لعوامري</span> دكتور في الاعلام الآلي بجامعة غرونوبل </p>
                    <p style="text-align: right"><span style="text-align: right"> - القائد قيرواني أمين</span> دكتور في علم الاجتماع </p>
                    <p style="text-align: right"><span style="text-align: right"> - القائد داود علي  بيود</span> دكتور في علم الفقه المقارن بجامعة اسطنبول</p>
                    <p style="text-align: right"><span style="text-align: right"> - القائد عنان عبد الرؤوف</span> دكتور في الطب تخصص تصوير بالأشعة السينية  </p>
                    <p style="text-align: right"><span style="text-align: right"> - القائد عليوات عبد المالك</span> دكتور في طب الأطفال </p>
                    <p style="text-align: right"><span style="text-align: right"> - القائد خالد زيغمي </span> دكتور في اللغة العربية </p>

                </div>
                <p style="text-align: center" class="subject-title">رؤيتنا</p>
                <div class="card" style="border-radius: 10px;width: 40%;text-align: center;display: table;margin:0 auto">
                    <p style="padding:10px;text-align: center">
                        تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة
                        <img  src="/images/image3.png" width="100" height="100" class="pull-right" style="position: absolute;right:-50px;
  z-index: 2;  margin-top: -25px"/>
                        <img  src="/images/faleh-logo.png" width="50" height="50" class="pull-left" style="position: absolute;left:0px;
  z-index: 2;  margin-top: 0px"/>
                    </p>
                </div>

            </div>

        </div>

    </div>
    <hr style="height: 10px;background-color: grey;margin-top: 40px">
    <footer style="margin-top: 20px">
        <img src="/images/about-footer.png" style="width: 100%;height:150px"/>
    </footer>
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