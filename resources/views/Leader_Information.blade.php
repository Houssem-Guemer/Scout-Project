<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<head>
    <title >{{ config('app.name', 'قادتنا') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .fa {
            padding-top: 10px;
            font-size: 30px;
            width: 50px;
            height: 50px;
            text-align: center;
            text-decoration: none;

        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-google {
            background: #dd4b39;
            color: white;
        }


        .fa-yahoo {
            background: #430297;
            color: white;
        }



        .fa-instagram {
            background: #125688;
            color: white;
        }


    .items{
        background: rgba(155, 250, 38, 0.82);
    }
        .items:hover{
            cursor: pointer;
            background: #007ee5;

        }
    </style>
</head>
<!-- this is the content of search page-->

   <div class="container-fluid main" style="  background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://static.pexels.com/photos/93750/pexels-photo-93750-large.jpeg');">
       @section('content')


    <div     style="height:100%;display: flex;justify-content: center;align-items: center;">



        <div  class="card align-self-center" style="width: 30%;height:80%;top: -50px;">
            <div  style="width: 100%;height: 80%">
                <div style=" width: 100%; height: 40%; display: flex;justify-content: center;align-items: center;">
                    <img src="/images/baraa.jpg" width="120" height="120" class="img-circle">

                </div>
                <div>
                    <h2 style="text-align: center;margin-top: -20px">مويات براء عبد الاله</h2>

                </div>

                <div  class="tab-content" style="margin-top: 40px">
                    <div id="personal_info" >
                    <ul  style="list-style-type: none">
                        <li class="row " style="margin-bottom: 10px">
                            <p  class="col col-6" style="text-align: right;font-size: medium;"> 21</p>
                            <p  class="col col-6" style="text-align: right;font-size: medium">العمر </p>

                        </li>
                        <li   class="row" style="margin-bottom: 10px">
                            <p  class="col col-6" style="text-align: right;font-size: medium"><span>01/01/1997</span></p>
                            <p  class="col col-6" style="text-align: right;font-size: medium">تاريخ و مكان الميلاد </p>

                        </li >
                        <li class="row" style="margin-bottom: 10px">
                            <p  class="col col-6" style="text-align: right;font-size: medium">   جامعي</p>
                            <p  class="col col-6" style="text-align: right;font-size: medium"> المستوى الدراسي  </p>
                        </li>
                        <li class="row"  style="margin-bottom: 10px">
                            <p class="col col-6" style="text-align: right;font-size: medium">  اعزب</p>
                            <p class="col col-6" style="text-align: right;font-size: medium"> الحالة الاجتماعية </p>
                        </li>
                    </ul>
                    </div>
                    <div id="scout_info" style="display:none" >
                        <ul  style="list-style-type: none">
                            <li class="row " style="margin-bottom: 10px">
                                <p  class="col col-6" style="text-align: right;font-size: medium;"> 21</p>
                                <p  class="col col-6" style="text-align: right;font-size: medium">aaaa </p>

                            </li>
                            <li   class="row" style="margin-bottom: 10px">
                                <p  class="col col-6" style="text-align: right;font-size: medium"><span>01/01/1997</span></p>
                                <p  class="col col-6" style="text-align: right;font-size: medium">تاريخ و مكان الميلاد                </p>

                            </li >
                            <li class="row" style="margin-bottom: 10px">
                                <p  class="col col-6" style="text-align: right;font-size: medium">   جامعي</p>
                                <p  class="col col-6" style="text-align: right;font-size: medium"> المستوى الدراسي  </p>
                            </li>
                            <li class="row"  style="margin-bottom: 10px">
                                <p class="col col-6" style="text-align: right;font-size: medium">  اعزب</p>
                                <p class="col col-6" style="text-align: right;font-size: medium"> الحالة الاجتماعية </p>
                            </li>
                        </ul>
                    </div>

                    <div id="achievements" style="display:none">
                        <ul  style="list-style-type: none">
                            <li class="row " style="margin-bottom: 10px">
                                <p  class="col col-6" style="text-align: right;font-size: medium;"> 21</p>
                                <p  class="col col-6" style="text-align: right;font-size: medium">aaaa </p>

                            </li>
                            <li   class="row" style="margin-bottom: 10px">
                                <p  class="col col-6" style="text-align: right;font-size: medium"><span>01/01/1997</span></p>
                                <p  class="col col-6" style="text-align: right;font-size: medium">تاريخ و مكان الميلاد                </p>

                            </li >
                            <li class="row" style="margin-bottom: 10px">
                                <p  class="col col-6" style="text-align: right;font-size: medium">   جامعي</p>
                                <p  class="col col-6" style="text-align: right;font-size: medium"> المستوى الدراسي  </p>
                            </li>
                            <li class="row"  style="margin-bottom: 10px">
                                <p class="col col-6" style="text-align: right;font-size: medium">  اعزب</p>
                                <p class="col col-6" style="text-align: right;font-size: medium"> الحالة الاجتماعية </p>
                            </li>
                        </ul>
                    </div>

                    <div id="contact" style="display:none">
                        <ul  style="list-style-type: none;">
                            <li class="row " style="margin-bottom: 10px">
                             <div class="col-lg-6">
                                 <a  href="https://www.facebook.com/baraa.mouyet" class="fa fa-facebook"></a>
                             </div>

                                <p class="col-lg-6" style="text-align: right; font-size: medium;width: 40%">Facebook</p>

                            </li>
                            <li   class="row" style="margin-bottom: 10px">
                                <div class="col-lg-6">
                                    <a href="https://www.facebook.com/baraa.mouyet" class="fa fa-twitter"></a>
                                </div>

                                <p class="col-lg-6"  style="text-align: right; font-size: medium">Twitter</p>

                            </li >
                            <li class="row" style="margin-bottom: 10px">
                                <div class="col-lg-6">
                                    <a href="https://www.facebook.com/baraa.mouyet" class="fa fa-instagram "></a>
                                </div>

                                <p class="col-lg-6"  style="text-align: right; font-size: medium">Instagram</p>
                            </li>
                            <li class="row"  style="margin-bottom: 10px">
                                <div class="col-lg-6">
                                    <a href="https://www.facebook.com/baraa.mouyet" class="fa fa-google"></a>
                                </div>

                                <p class="col-lg-6" style="text-align: right; font-size: medium">Gmail</p>
                            </li>
                            <li class="row"  style="margin-bottom: 10px">
                                <div class="col-lg-6">
                                    <a href="https://www.facebook.com/baraa.mouyet" class="fa fa-yahoo"></a>
                                </div>

                                <p class="col-lg-6" style="text-align: right; font-size: medium">Yahoo</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>


        <div style="height: 80%;margin-left: 0px;margin-top: -60px">
            <ul   style="width: 100% ;list-style-type: none;-webkit-padding-start: 5px;">
                <li  class="x items"  style="display: block;  box-sizing: border-box; padding: 5px;border: 1px solid transparent;margin-bottom: 5px;width: 150px;"  onclick="document.getElementById('personal_info').style.display='block';document.getElementById('scout_info').style.display='none';document.getElementById('achievements').style.display='none';document.getElementById('contact').style.display='none';" >
                    <p style="font-size: small" > معلومات شخصية</p>
                </li>

                <li  class=" items"   onclick="document.getElementById('personal_info').style.display='none';document.getElementById('scout_info').style.display='block';document.getElementById('achievements').style.display='none';document.getElementById('contact').style.display='none';"  style="display: block;     box-sizing: border-box;padding: 5px;border: 1px solid transparent;margin-bottom: 5px;">

                        <p style="font-size: small"> معلومات كشفية</p>

                </li>

                <li  class=" items" style="display: block;     box-sizing: border-box;padding: 5px;border: 1px solid transparent;margin-bottom: 5px;" onclick="document.getElementById('personal_info').style.display='none';document.getElementById('scout_info').style.display='none';document.getElementById('achievements').style.display='block';document.getElementById('contact').style.display='none';" >
                    <p style="font-size: small"> انجازات</p>
                </li>

                <li  class=" items " style="display: block;     box-sizing: border-box;padding: 5px;border: 1px solid transparent;margin-bottom: 5px;" onclick="document.getElementById('personal_info').style.display='none';document.getElementById('scout_info').style.display='none';document.getElementById('achievements').style.display='none';document.getElementById('contact').style.display='block';" >
                    <p style="font-size: small"> التواصل</p>
                </li>
            </ul>
        </div>



















       <!-- <div class="card" >
            <div class="card-body" style="border:1px solid black;">
                <div class="card" style="width: 25%;float: right" >
                    <div   style="width: 100%;">
                        <div class=" card" style="margin-bottom: 0px;height: 30%;display: flex;justify-content: center;align-items: center;" >
                            <img src="/images/baraa.jpg" width="120" height="120" class="img-circle">
                        </div>

                        <div class="row" style="margin: 0px ;">
                            <div class="info"  >
                                <a href="#">




                                <p style="text-align: right; ">معلومات شخصية</p>
                                </a>


                            </div>
                            <div class=" info" >

                                <a href="#">
                                <p style="text-align: right; ">معلومات كشفية</p>
                                </a>
                            </div>
                            <div class=" info">
                                <a href="#">
                                <p style="text-align: right">انجازاته الكشفية</p>
                                </a>
                            </div>
                            <div class=" info" >
                                <a href="#">
                                <p style="text-align: right">للتواصل معه</p>
                                </a>
                            </div>

                        </div>


                </div>

            </div>
                <div class="card " style="margin-right:250px;align-self: center " >
                    <div style="height: 61%; " >
                       <div>
                           <ul >
                               <li class="row" style="list-style-type: none; margin-bottom: 50px " >

                                   <h1 style="text-align: center ;width: 100%">مويات براء عبد الاله </h1>









                               </li>

                               <li   style="list-style-type: none;width: 100%;padding: 20px" >

                                   <div style="width: 100%">
                                       <h2 style="text-align: right;width: 100%">العمر </h2>
                                   </div>
                                   <div ><h2 style="text-align: right">مكان الميلاد:سطيف   </h2></div>

                               </li>
                           <!--    <li  class="row" style="list-style-type: none; text-align: right "><h2>العمر</h2></li>
                               <li  class="row" style="list-style-type: none; text-align: right"><h2>المستوى الدراسي </h2></li>
                               <li  class="row" style="list-style-type: none; text-align: right"> <h2>الحالة الاجتماعية</h2> </li>
                               <li class="row"  style="list-style-type: none; text-align: right"><h2>الحالة العائلية</h2> </li>
                               <li  class="row" style="list-style-type: none; text-align: right"><h2>الحالة العائلية</h2> </li>
                        --
                       </div>
                    </div>

                </div>
            </div>
        
        <!--   <div  style="display: flex;justify-content: center;align-items: center;">
               <img src="/images/baraa.jpg" class="img-circle" width="200" height="200"/>

           </div>
             <h2 style="text-align: center">مويات براء عبد الاله</h2>

         </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="btn-group" dir="rtl" role="rowgroup">
                <div class="btn-block" role="group">
                    <h1 style="text-align: center">
                        معلومات شخصية
                    </h1>
                </div>
                <div class="btn-block" role="group">

                    <h1 class="fa-circle" style="text-align: center" >
                        معلومات كشفية
                    </h1>
                </div>
                <div class="btn-block" role="group" >
                    <h1 style="text-align: center">
                        للتواصل مع القائد
                    </h1>
                </div>
            </div>

        </div>
        <div class="well-info">

        </div>-->


    </div>

   </div>

@endsection