@extends('layouts.new_template')
@section('content')
    <section class="sec1"></section>
    <div class="shape">
        <div class="bottom"></div>
        <div class="top"></div>

    </div>
    <div class="shape1">
        <div class="bottom">
            <div class="page-title">
                <h1>الأخبار</h1>
            </div>
        </div>
        <div class="top"></div>

    </div>
    </section>
    <!---->
    <section class="sec2">
        <div class="row col">
            <div class="col-md-2 news-cards-container">
                <div class="row">
                    <div class="card" style="width: 100%; margin-bottom:5%;">
                        <div class="card-header">
                            متفرقات
                        </div>
                        <ul class="list-group list-group-flush" id="elem">
                            @foreach($sidePosts as $post)
                                <li class="list-group-item" id="elem1"><a href="/posts/{{$post->post_id}}" style="color: black !important;">{{$post->post_title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class=" row">
                    <div class="card" style="width: 100%; margin-bottom:5%;">
                        <div class="card-header">
                            سجل في قائمة الأخبار
                        </div>
                        <form action="/newSubscriber" method="post">
                            {{ csrf_field() }}
                            <ul class="list-group list-group-flush">
                                <div class="row" style="max-width: 90%; margin: 5% 0% 0% 5%">
                                    <input type="email" placeholder="ادخل بريدك الالكتروني " name="email" class="form-control" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="row" style="max-width: 90%; margin: 5% 0% 5% 5%">
                                    <button type="submit" class="btn btn-cust">سجل</button>
                                </div>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class=" row">
                    <div class="card" style="width: 100%; margin-bottom:5%;">
                        <div class="card-header">
                            تواصل معنا
                        </div>
                        <ul class="list-group list-group-flush">
                            <!--Facebook-->
                            <a href="https://www.facebook.com/faleh.19/" target="_blank" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i> Facebook</a>
                            <!--Twitter-->
                            <a href="https://twitter.com/groupe_faleh_19" target="_blank" class="btn btn-tw"><i class="fab fa-twitter pr-1"></i> Twitter</a>
                            <!--Instagram-->
                            <a href="https://www.instagram.com/groupfaleh/" target="_blank" class="btn btn-ins"><i class="fab fa-instagram pr-1"></i> Instagram</a>
                            <!--Youtube-->
                            <a href="https://www.youtube.com/channel/UCvJ4gk_JufwvI9_VneFF2ZQ" target="_blank" class="btn btn-yt"><i class="fab fa-youtube pr-1"></i> Youtube</a>
                            <!--Email-->
                            <a href="/contact" target="_blank" class="btn btn-email"><i class="fas fa-envelope pr-1"></i> Email</a>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md defer-news-container ">
                <div class="row" style="margin-bottom:10%;">
                    <div class="card text-center">
                        <div class="card-body" style="padding:0;">
                            <img src="{{asset('images/PostCover/'.$currentPost->cover_image)}}" alt="{{ $currentPost->post_title }}" style="max-height:700px; border: 0;">

                        </div>
                        <div class="card-header" style="text-align: right">
                            <h3>{{ $currentPost->post_title }}</h3>
                            <h5>{{substr($currentPost->post_date, 0, 10)}}</h5>
                            @php
                                $unit_name = '';
                                if($currentPost->linked_unit == "cubs"){
                                    $unit_name = 'وحدة الاشبال';
                                }
                                if($currentPost->linked_unit == "sct"){
                                    $unit_name = 'وحدة الكشاف';
                                }
                                if($currentPost->linked_unit == "asct"){
                                    $unit_name = 'وحدة الكشاف المتقدم';
                                }
                                if($currentPost->linked_unit == "tvlr"){
                                    $unit_name = 'وحدة الجوالة';
                                }
                                if($currentPost->linked_unit == "cap"){
                                    $unit_name= 'وحدة القادة';
                                }
                            @endphp
                            <h6>{{ $unit_name }}</h6>
                        </div>
                        <div class="card-footer text-muted">
                            <p>{!! $currentPost->description !!}</p>
                        </div>

                        <ul style="    list-style-type: none;display: inherit;">
                        <li>
                        </li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"  targert="_blank" title="Facebook" class="btn btn-facebook btn-lg" style="    padding: 0;"><i class="fab fa-facebook-f " style="    padding-right: 10px;"></i> Facebook</a>

                        <li>
                        </li>
                        <a href="https://twitter.com/intent/tweet?text={{strip_tags($currentPost->post_summary)}}&amp;url={{ URL::current() }}" targert="_blank" title="Facebook" class="btn btn-facebook btn-lg" style="    padding: 0;background-color:#1DA1F2"><i class="fab fa-twitter " style="    padding-right: 10px"></i> Twitter</a>

                        </ul>



                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
@section('scripts')

@endsection
@section('styles')
    <link rel="stylesheet" href="/css/newsBig.css">
    <style>
    .eapps-social-share-buttons-item {
    /* height: 40px; */
    /* line-height: 40px; */
    /* min-width: 82px; */
    /* width: 144px; */
    display: inline-block;
    vertical-align: middle;
    position: relative;
    cursor: pointer;
    backface-visibility: hidden;
    transition: box-shadow 0.2s ease, border-color 0.2s ease, opacity 0.3s;
    text-decoration: none;
    text-align: left;
    white-space: nowrap;
    overflow: hidden;
    box-sizing: border-box;
    padding: 10px;
    font-size: 0;
}
.eapps-social-share-buttons-item-icon-container {
    display: block;
    max-width:70px !important;

    top: 0;
    bottom: 0;
    left: 0;
    padding: 12px;
    transition: all 0.2s ease;
}
.eapps-social-share-buttons-item-icon {
    display: block;
    width: 16px;
    height: 16px;
    backface-visibility: hidden;
    transition: all 0.2s ease;
}
.eapps-social-share-buttons-item-icon-container, .eapps-social-share-buttons-item-text {
    position: relative;
    z-index: 2;
}
.eapps-social-share-buttons-item-text {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    display: block;
    padding: 0 10px 0 40px;
    font-size: 15px;
    font-weight: 500;
    line-height: 20px;
    text-align: left;
    box-sizing: border-box;
    transition: all 0.2s ease;
    backface-visibility: hidden;
   
}
.btn-facebook {
	  background: #3B5998;
	  border-radius: 0;
	  color: #fff;
	  border-width: 1px;
      border-radius: 45px;
      width: 15%;
    margin: 10px;
	}
	.btn-facebook:link, .btn-facebook:visited {
	  color: #fff;
	}
	.btn-facebook:active, .btn-facebook:hover {
	  background: #263961;
	  color: #fff;
	}
  

    </style>
@endsection
@section('og')
    <meta property="og:title" content="{{ $currentPost->post_title }}" />
    <meta property="og:image" content="{{asset('images/PostCover/'.$currentPost->cover_image)}}" />
    <meta property="og:description" content="{{strip_tags($currentPost->description)}}" />
    <meta property="og:type" content="website" />
@endsection

@section('title')
    <title> {{ $currentPost->post_title }} </title>
    <meta name="description" content="{{ "Author: ".$currentPost->post_creator->getFullName()."Description: ".strip_tags($currentPost->description) }}">
    <meta name="author" content="{{$currentPost->post_creator->getFullName()}}">
@endsection
@section('icon')
    <link rel="icon" href="{{{ asset('/images/landing_page_Logo.png') }}}" >
@endsection
