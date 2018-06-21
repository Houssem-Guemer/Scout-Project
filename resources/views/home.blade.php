
<head>
    <style>
    .a{
        color: black;
    }
    </style>
</head>

@extends('Layouts.web_template')
<div class="container-fluid main">


    @section('content')

    <div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner" role="listbox">
            <!-- background image should be 890x(500-600)-->
            <div class="item active background a" style="background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)), url('https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/35406393_2001873566795487_2274415969004683264_n.jpg?_nc_cat=0&_nc_eui2=AeEC2IH6mFWf6T68R0S32E6eTXhVc9yJ_pbQ0PSGHlQ0CkWM-0Zw1CstcAZbBt3a5CR06qWjRjOtxHW38doNp8VPX-M8zIWtm14fEx1ULPtz7w&oh=ce5090861033105f676f8da1cf9e6582&oe=5BB397C4');">
                <div class="covertext">
                    <div class="col-lg-10" style="float:none; margin:0 auto;">
                        <h1 class="title">اللقاء التغافري</h1>
                        <h3 class="subtitle">عيد الفطر</h3>
                    </div>
                    <div class="col-xs-12 explore">
                        <a href="#"><button type="button" class="btn btn-lg explorebtn">اقرا اكثر</button></a>
                    </div>
                </div>
            </div>
            <div class="item background b"></div>
            <div class="item background c"></div>
        </div>
    </div>



</div>
<script src='/js/jquery2.min.js'></script>
<script src='/js/bootstrap2.min.js'></script>



<script  src="js/index.js"></script>





@endsection
