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
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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