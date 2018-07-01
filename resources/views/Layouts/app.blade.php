<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">
  <title> Login Management</title>  
  <link rel="stylesheet" href="{{URL::to('/')}}/global/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/assets/css/site.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/pages/login.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="{{URL::to('/')}}/global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/ladda-bootstrap/ladda.css">

<<<<<<< HEAD
    <!-- Bootstrap -->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- below style is intended to center the logo -->
    <style type="text/css">
    .nav-link {
      text-align: center;
    }

    .navbar .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255, 255, 0.86)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
  </style>
</head>
<body>
    <div id="app">
        @include("includes.navbar")
        <main>
            @yield('content')
        </main>
    </div>
=======
  
 <script src="{{URL::to('/')}}/global/vendor/modernizr/modernizr.js"></script>
  <script src="{{URL::to('/')}}/global/vendor/breakpoints/breakpoints.js"></script>
  <script src="{{URL::to('/')}}/global/vendor/jquery/jquery.js"></script>
  <script>
  Breakpoints();
  </script>
 

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
@yield('content')
</div>

<script src="{{URL::to('/')}}/global/vendor/bootstrap/bootstrap.js"></script>
<script src="{{URL::to('/')}}/global/vendor/animsition/animsition.js"></script>
<script src="{{URL::to('/')}}/global/vendor/asscrollable/jquery.asScrollable.all.js"></script>
<script src="{{URL::to('/')}}/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="{{URL::to('/')}}/global/js/core.js"></script>
<script src="{{URL::to('/')}}/assets/js/site.js"></script>
<script src="{{URL::to('/')}}/assets/js/sections/sidebar.js"></script>
<script src="{{URL::to('/')}}/global/js/components/asscrollable.js"></script>
<script src="{{URL::to('/')}}/global/js/components/animsition.js"></script>
<script src="{{URL::to('/')}}/global/js/components/slidepanel.js"></script>
<script src="{{URL::to('/')}}/global/js/components/switchery.js"></script>
<script src="{{URL::to('/')}}/global/js/components/jquery-placeholder.js"></script>

<script src="{{URL::to('/')}}/global/vendor/ladda-bootstrap/spin.js"></script>
  <script src="{{URL::to('/')}}/global/vendor/ladda-bootstrap/ladda.js"></script>
<script src="{{URL::to('/')}}/global/js/components/ladda-bootstrap.js"></script> 
 
<script>
	(function(document, window, $) {
	'use strict';
	var Site = window.Site;
	$(document).ready(function() {
	  Site.run();
	});
	})(document, window, jQuery);

	$('.loadingclick').on('click', function() {
	var $this = $(this);
	$this.button('loading');
	setTimeout(function() {
	   $this.button('reset');
	}, 8000000);
	});
</script>  
  
>>>>>>> dashboard-test
</body>
</html>