<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<head>
    <title dir="rtl">{{ config('app.name', 'قادتنا') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<!-- this is the content of search page-->
@section('content')

    <div class="container" style="margin-bottom: 5px" >
        <div class="card">
            <div class="card-body" >
<ul   >
            @for($i =0;$i<10;$i++)





                @if($i==0)
                  <li class="  row " style="margin-top: 0px;margin-right:0px;  list-style-type: none; " >
                      @else <li  class="  row" style=" list-style-type: none;  ">
            @endif
                     <div class="card   col-auto"  style="float: left; margin-bottom: 10px;margin-left: 5px"  >
                    <div  class="card-body "  >
                        <div onclick="location.href='/تعرف على قادتنا/{{1}}';" style="cursor: pointer;display: flex;justify-content: center;align-items: center;">
                            <img src="/images/baraa.jpg"   class="img-circle" width="200" height="200">
                        </div>

                        <h3 style="text-align: center"> مويات براء عبد الاله </h3>
                        <p style="text-align: center"> محافظ الفوج </p>
                    </div>

                </div>

                        <div class="card col-auto" style="float:right;margin-bottom: 10px;margin-left: 5px" >

                             <div class="card-body align-items-center" >
                                <div onclick="location.href='/تعرف على قادتنا/{{1}}';" style="cursor: pointer;display: flex;justify-content: center;align-items: center;">
                                    <img src="/images/ghadje.png"  class="img-circle" style="padding: 0px" width="200" height="200">
                                </div>



                                <h3 style="text-align: center"> عجاتي اسامة  </h3>
                                <p style="text-align: center;font-size: small"> بائع حليب </p>
                            </div>

                        </div>

                        <div class="card col-auto" style="margin-bottom: 10px;margin-left:10px;"  >
                            <div class="card-body " >
                                <div onclick="location.href='/تعرف على قادتنا/{{1}}';" style="cursor: pointer;display: flex;justify-content: center;align-items: center;">
                                    <img src="/images/sticka.jpg" class="img-circle" width="200" height="200">
                                </div>


                                <h3 style="text-align: center"> زراد حسام الدين </h3>
                                <p style="text-align: center"> مطور  </p>
                            </div>

                        </div>

                       <div class="card col-auto" style="margin-bottom: 10px;margin-left:10px;"  >
                <div class="card-body " >
                    <div onclick="location.href='/تعرف على قادتنا/{{1}}';" style="cursor: pointer;display: flex;justify-content: center;align-items: center;">
                        <img src="/images/sticka.jpg" class="img-circle" width="200" height="200">
                    </div>


                    <h3 style="text-align: center"> زراد حسام الدين </h3>
                    <p style="text-align: center"> مطور  </p>
                </div>

            </div>


                  </li>







                @endfor
</ul>
            </div>
            </div>

        </div>

    </div>
    @endsection