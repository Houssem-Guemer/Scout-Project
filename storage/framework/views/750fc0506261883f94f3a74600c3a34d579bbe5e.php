<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="margin-bottom: 0px" >
    <div   style="width: 100%" >
        <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
              <?php if(auth()->guard()->guest()): ?>
                <a type="button" class="btn btn-primary " href="/login" style="font-size: medium"><?php echo e(__('ساحة الكشاف')); ?> <span class="carret"></span></a>
              <?php else: ?>
                <!-- User Profile Snippet (When Logged In)
                SUGGESTION: in later stages, this part should be snipped out of the collapsed navbar
                      and represented with the user's icon.
                      @hzerrad
                  -->
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <?php echo e(Auth::user()->profile->getFullName()); ?><span class="caret"></span>
                      </a>

                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">
                             <?php echo e(__('ملف شخصي')); ?>

                         </a>
                         
                         <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>"

                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          <?php echo e(__('تسجيل الخروج')); ?>

                      </a>

                      <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                      </div>
                  </li>
              <?php endif; ?>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto"  >
                <li class="nav-item">
                    <!-- this is the about link -->
                    <a class="nav-link <?php echo e(Route::currentRouteNamed('about') ? 'active' : ''); ?>" href="/about" style="font-size: medium;margin-right: 8px;margin-left: 8px">تعرف علينا</a>
                </li>
                <!-- this is the groups dropdown button -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: medium;margin-right: 8px;margin-left: 8px">الأفواج</a>
                    <div class="dropdown-menu align-items-center" aria-labelledby="dropdown04">
                        <table >
                            <tr>
                                <td>
                                    <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                    <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#" >الكشاف</a>
                                </td>

                                <td>
                                    <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                    <a class="dropdown-item align-items-center" style="text-align:center ;font-size: large" href="#">الأشبال</a>
                                </td>


                            </tr>
                            <tr >
                                <td>
                                    <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                    <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#">الجوالة</a>
                                </td>
                                <td >
                                    <img src="/images/motakadim.png" width="20" height="20" style="margin-left: 30px; position: center">
                                    <a class="dropdown-item align-items-center" style="text-align:center ;font-size: large" href="#">المتقدم</a>
                                </td>
                            </tr>
                            <tr>

                                <td></td>

                                <td style="margin: 50%">
                                    <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                    <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#">القادة</a>
                                </td>
                                <td>
                            </tr>
                        </table>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(trans('app.languages')); ?><span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php ($language = DB::table('languages')->get()); ?>
                        <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item link linklanguage"  href="<?php echo e(URL::to('/LanguageController/chooser_language/')); ?>/<?php echo e($viewdata->foldername); ?>" role="menuitem">
                                    <?php if(!empty($viewdata->flag_image)): ?>
                                        <img src="<?php echo e(URL::to('assets/flags')); ?>/<?php echo e($viewdata->flag_image); ?>"  width="18.66" height="14" />
                                    <?php endif; ?>
                                    <?php echo e($viewdata->languagename); ?>

                                </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- this is the news link -->
                    <a class="nav-link" href="#" style="font-size: medium;margin-right: 8px;margin-left: 8px">الأخبار</a>
                </li>
                <li class="nav-item">
                    <!-- this is the index link -->
                    <a class="nav-link <?php echo e(Route::currentRouteNamed('index') ? 'active' : ''); ?>" href="/" style="font-size: medium">الرئيسية</a>
                </li>
                <li class="nav-item" ><a class="nav-link" href="/" style="font-size: medium;margin-right: 8px;margin-left: 8px"><img src="/uploads/1528370100.png" width="35" height="35"></img></a></li>
            </ul>
        </div>
    </div>
</nav>