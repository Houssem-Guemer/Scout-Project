@extends('layouts.new_template')

<head>
    <style>
        * {
            box-sizing: border-box;
            
        }
        body{
            background-color:#3E5064!important;
        }
         .contact-us{
             background-color:#607A93!important;
             margin-bottom:150px;
             padding-bottom:150px !important;
             border-radius:25px;
             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
        0 2px 10px 0 rgba(0, 0, 0, 0.19);

        }

        .lb{
            color:#fff !important;
            padding-right:25px;
            font-weight:bolder;
        }

        /* Style inputs */
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
            border-radius:50px;
            background-color:#D5EAFF;
            
            
        }

        textarea{
            height:150px;
        }

         input[type=text]:hover, select:hover, textarea:hover{
           border-width:1;
           border-color:#25598D;
        }


        input[type=submit] {
            background-color: #fff;
            color: #607A93;
            border: none;
            cursor: pointer;
            text-align:center;
            font-weight:bolder;
            border-radius:50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
        0 2px 10px 0 rgba(0, 0, 0, 0.19);        
        }
    
        input[type=submit]:hover {
            background-color: #2F88E1;
            color:#fff;
        }

        .submit-button{
            margin-top:50px;
             position: absolute;
             left: 50%;
             transform: translateX(-50%);
            width:200px;
        }
       
        /* Create two columns that float next to eachother */
        .column {   
            width: 100%;
            margin-top: 6px;
           
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
        .contact-us {
    max-width: 1307px !important;
}
    </style>
</head>

@section('content')
    <div class="mb-3" style="height: 100px;"></div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('result'))
        <div class="alert alert-success">
            <ul>
                <li>لقد تم الاستلام بنجاح</li>
            </ul>
        </div>
    @endif
<div class="container contact-us">
    <div  style="text-align:center ; color:#FFF;font-weight:bold;padding:50px">
        <h2>تواصل معنا</h2>
    </div>
    <div class="row">
        <div class="col-lg-6">
  <!--  -->
        <div class="column">
            <div style="width:100%;height:500px;">
                <div class="mapouter"><div class="gmap_canvas"><iframe  style="margin-right:100px" width="650" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Cite%20Yahiaoui&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href=""></a></div><style>.mapouter{text-align:right;height:500px;width:500px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width: 742px;}</style></div>
            </div>
        </div>
        <!--  -->
        </div>
      
        <div class="col-lg-6">
<!--  -->
        <div class="column">
            <form action="/contactForm" method="post">
                {{ csrf_field() }}
                <label class="float-right lb" for="fname" style="text-align:right;color: black">اللقب</label>
                <input type="text" style="text-align:right;" id="fname" required name="name" placeholder="لقبك">
                <label class="float-right lb" for="lname" style="text-align:right;color: black">الاسم</label>
                <input type="text" style="text-align:right;color: black" id="lname" required name="surname" placeholder="اسمك">
                <label class="float-right lb" for="subject" style="text-align:right;color: black">الموضوع</label>
                <textarea id="subject" style="text-align:right;color: black" required name="message" placeholder="اكتب هنا ..." style="height:170px"></textarea>
                <div class="row">
         <div class="col-lg-12">
  <input class="btn submit-button" type="submit" value="ارسل">
         </div>
          
        </div>
            </form>
        </div>
        <!--  -->
       
        </div>
        
    </div>
    
    
</div>

<!-- Initialize Google Maps -->
<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(51.508742,-0.120850);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 12};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
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