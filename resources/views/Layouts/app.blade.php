<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
  </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @guest
                        <button type="button" id="login-drop-down" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" href="{{ route('login') }}">{{ __('ساحة الكشاف') }} <span class="carret"></span></button>
                          <ul class="dropdown-menu dropdown-menu-left mt-2 bg-secondary">
                             <li class="px-3 py-2">
                               <!-- this is the login form -->
                                    @include('includes.loginWindow')
                              </li>
                          </ul>
                      @else
                        <!-- User Profile Snippet (When Logged In)
                        SUGGESTION: in later stages, this part should be snipped out of the collapsed navbar
                              and represented with the user's icon.
                              @hzerrad
                          -->
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="btn alert-heading alert-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->getFullName() }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('تسجيل الخروج') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li> <a class="nav-link">عنوان</a> </li>
                        <li> <a class="nav-link">عنوان</a> </li>
                        <li> <a class="nav-link">عنوان</a> </li>
                        <li> <a class="nav-link">عنوان</a> </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 content">
            @yield('content')
        </main>
    </div>
</body>
</html>
