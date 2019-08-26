<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom css -->

    <!-- Website icon -->
@yield('icon')
<!-- Custom fonts for this template -->


    <!-- Custom styles for this template -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
    <script src="/js/ghost-typer.min.js"></script>
    <script src="{{ asset('assets/js/capJs.js') }}"></script>
    <script src="/js/jquery.filterizr.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('og')
    @yield('title')
    <link href='{{ url('/eventsFeed') }}' rel='alternate' title='RSS' type='application/rss+xml'/>
    <link href='{{ url('/postsFeed') }}' rel='alternate' title='RSS' type='application/rss+xml'/>
    <style>
        @font-face {
            font-family: "Alarabiya Font";
            src: url("/Alarabiya-Font.ttf");
        }
        *:not(.fab,.fa,.fas){
            font-family: "Alarabiya Font" !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/nav.css" />
    <link rel="stylesheet" type="text/css" href="/css/governor.css" />
    <script>
        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#edeff5",
                        "text": "#838391"
                    },
                    "button": {
                        "background": "#4b81e8"
                    }
                },
                "theme": "classic",
                "content": {
                    "message": "يستخدم هذا الموقع ملفات تعريف الارتباط لضمان حصولك على أفضل تجربة على موقعنا.",
                    "dismiss": "أقبل",
                    "link": "اقرأ أكثر"
                }
            })});
    </script>
    @yield('styles')
    <style>
        @font-face {
            font-family: "Alarabiya Font";
            src: url("/Alarabiya-Font.ttf");
        }
        *:not(.fab,.fa,.fas){
            font-family: "Alarabiya Font" !important;
        }
    </style>
</head>
<body style="overflow-x:hidden">
    @include("includes.new_navbar")
    @yield('content')
@include("includes.footer")
@yield('scripts')
</body>

</html>
