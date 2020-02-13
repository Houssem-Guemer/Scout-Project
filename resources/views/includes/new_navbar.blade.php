@php

    $nav_color = 'lp';
    $nav_logo = '/images/landing_page_Logo.png';
    $solid_color = 'solidl';
    $activenavu = '';
    $activenavc = '';
    $activenavs = '';
    $activenavas = '';
    $activenavt = '';
    $activenavcp = '';
    $solid_number = "0";

if (Route::currentRouteNamed('cubs')){
    $nav_color = 'lp';
    $nav_logo = '/images/cubs-logo.png';
    $solid_color = 'solidl';
    $activenavu = 'activenav';
    $activenavc = 'activenav';
}
if (Route::currentRouteNamed('readPost')){
    $nav_color = 'spost';
    $nav_logo = '/images/landing_page_Logo.png';
    $solid_color = 'solidpost';
    $solid_number = 1;

}
if (Route::currentRouteNamed('scout')){
    $nav_color = 'lp';
    $nav_logo = '/images/scout-logo.png';
    $solid_color = 'solidl';
    $activenavu = 'activenav';
    $activenavs = 'activenav';
}

if (Route::currentRouteNamed('advanced_scout')){
     $nav_color = 'lp';
    $nav_logo = '/images/advanced_scout-logo.png';
    $solid_color = 'solidl';
    $activenavu = 'activenav';
    $activenavas = 'activenav';
}

if (Route::currentRouteNamed('traveler')){
     $nav_color = 'lp';
    $nav_logo = '/images/traveler-logo.png';
    $solid_color = 'solidl';;
    $activenavu = 'activenav';
    $activenavt = 'activenav';
}

if (Route::currentRouteNamed('captains')){
     $nav_color = 'lp';
    $nav_logo = '/images/landing_page_Logo.png';
    $solid_color = 'solidl';;
    $activenavu = 'activenav';
    $activenavcp = 'activenav';
}

@endphp
<section id="nav-bar" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
         <div class="nav-brand-container">
          <a class="navbar-brand" href="#"><img src="{{$nav_logo}}" alt="main_logo"></a>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="row ghadje" style="width:100%;padding:0;margin:0">
                <ul class="navbar-nav col-md-12" >
                   <!-- <li class="nav-item active col-md-2  topnav">
                        <a class="nav-link" href="/contact">تواصل معنا <span class="sr-only">(current)</span></a>
                    </li>-->
                    <li class="nav-item active col-md-2  topnav">
                        <a class="nav-link" href="/registration">التسجيلات <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item col-md-2 topnav">
                        <a class="nav-link" href="/team">القادة</a>
                    </li>
                    <li class="nav-item col-md-2 topnav">
                        <a class="nav-link" href="/library">مكتبتنا</a>
                    </li>
                   <!--  -->
                   <li class="nav-item dropdown col-md-2">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          الوحدات
                     </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/cubs">وحدة الاشبال</a>
                        <a class="dropdown-item" href="/scout">وحدة الكشاف</a>
                        <a class="dropdown-item" href="/advanced_scout">وحدة الكشاف المتقدم</a>
                        <a class="dropdown-item" href="/traveler">وحدة الجوالة</a>
                        <a class="dropdown-item" href="/captains">وحدة القادة</a>
                        </div>
                    </li>
                   <!--  -->
                    <li class="nav-item col-md-2 topnav">
                        <a class="nav-link" href="/news">الأخبار</a>
                    </li>
                    <li class="nav-item col-md-2 topnav">
                        <a class="nav-link disabled" href="/" tabindex="-1" aria-disabled="true">الرئيسية</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>