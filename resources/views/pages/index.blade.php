<!-- this is used to extend from the app layout -->
@extends('layouts.app')
<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100% ;height:360px;margin-bottom:10px; text-align: center; position:center ">
        <!-- Indicators -->
        <ol class="carousel-indicators" >
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="{{ asset('images/img.jpg') }}" alt="وحدة الاشبال" style="width:100%;height:360px">
                <div class="carousel-caption">
                    <h1 class="textalign" style="color:black">وحدة الاشبال</h1>
                    <h5 class="textalign" style="color:black">سرب اشبال الاقصى</h5>
                </div>
            </div>

            <div class="item">
                <img src="{{ asset('images/img2.jpg') }}" alt="وحدة الكشاف" style="width:100%;height:360px">
                <div class="carousel-caption">
                    <h1 class="textalign" style="color:black">وحدة الكشاف</h1>
                    <h5 class="textalign" style="color:black">وحدة الكشاف شعارنا قوة...أخوة...فتوة</h5>
                </div>
            </div>

            <div class="item">
                <img src="{{ asset('images/img3.jpg') }}" alt="وحدة المتقدم" style="width:100%;height:360px">
                <div class="carousel-caption">
                    <h1 class="textalign" style="color:black">وحدة المتقدم</h1>
                    <h5 class="textalign" style="color:black" >دائما همة و نشاط</h5>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container-fluid row mx-auto">
        <div class="card col-md-4 col-sm-4 col-xs-6 py-4 my-2">
            <div class="card-body">
                <h1 class="card-title" style="text-align: center"> وحدة المتقدم</h1></br>
                <p class="card-text" style="font-size: 15px;text-align: center">دائما همة و نشاط</p></br>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">للاطلاع على المزيد</a>
                    </div>
            </div>
        </div>

        <div class="card col-md-4 col-sm-4 col-xs-6 mx-auto py-4 my-2">
            <div class="card-body" style="align-items: center">
                <h1 class="card-title" style="text-align: center">وحدة الكشاف</h1>
            </br>
                <p class="card-text " style="font-size: 15px;text-align: center">وحدة الكشاف شعارنا قوة...أخوة...فتوة</p>
            </br>
            <div class="text-center">
                <a href="#" class="btn btn-primary " >للاطلاع على المزيد</a>
            </div>

            </div>
        </div>
        <div class="card col-md-4 col-sm-4 col-xs-6 py-4 my-2">
            <div class="card-body">
                <h1 class="card-title" style="text-align: center">وحدة الاشبال</h1></br>
                <p class="card-text" style="font-size: 15px;text-align: center">سرب اشبال الاقصى</p></br>
                <div class="text-center">
                    <a href="#" class="btn btn-primary" >للاطلاع على المزيد</a>
                </div>                
            </div>
        </div>
    </div>







    </div>

@endsection
