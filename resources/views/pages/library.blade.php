@extends('layouts.new_template')
@section('content')
<head>
 <style>
  .page-footer{
      display:none;
  }
 </style>
</head>

    <!--boby background image filtred-->
    <div class="bg-filter" style="background-image:url('images/book.jpg') !important ">
    </div>
    <!------  ---------->
    <div class="wrapper" style="margin-top:20%"> 
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 col-sm-12 " ontouchstart="this.classList.toggle('hover');">
                    <div class="container">
                        <div class="front" style="background-image: url('uploads/Books/Images/{{ $book->picture }}')">
                            <div class="inner">
                                <p>فوج الفلاح</p>
                                <span>{{ $book->title }}</span>
                            </div>
                        </div>
                        <div class="back">
                            <div class="inner">
                                <p>{!! substr(strip_tags($book->description),0,250)."..." !!}</p>
                                <!--here u can put a download btn like circle one, or u can make the whole card clicable-->

                                <!--  -->
                                 <a href="uploads/Books/PDF/{{ $book->file }}" target="new" download="{{ $book->title }}.pdf" class="btn-download">
                                      <svg width="22px" height="16px" viewBox="0 0 22 16">
                                          <path
                                              d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15"
                                          id="check"></path>
                                          <polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out"></polyline>
                                          <path d="M8,1 L8,11" class="svg-out"></path>
                                    </svg>
                                </a>
                                <!--  -->
                             
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
@section('scripts')
     <script>
 $(".btn-download").click(function ()
        {
            $(this).toggleClass("downloaded");
        });
</script>


@endsection
@section('styles')
    <link rel="stylesheet" href="/css/library-test.css">
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