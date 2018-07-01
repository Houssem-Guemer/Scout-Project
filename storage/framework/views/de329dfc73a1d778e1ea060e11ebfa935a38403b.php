<!-- Top Navigation Bar -->	
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
        <div class="navbar-header">
              <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided" data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
              </button>
    
              <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
              </button>
    
              <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                <?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img class="navbar-brand-logo" src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($view->logo); ?>" title="<?php echo e($view->app_name); ?>">
                    <span class="navbar-brand-text hidden-xs"> <?php echo e($view->app_name); ?> </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
              </div>
    
              <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search" data-toggle="collapse">
                <span class="sr-only">Toggle Search</span>
                <i class="icon wb-search" aria-hidden="true"></i>
              </button>
        </div>
    
        <div class="navbar-container container-fluid">
              <!-- Navbar Collapse -->
              <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">
                      <li class="hidden-float" id="toggleMenubar">
                        <a data-toggle="menubar" href="#" role="button">
                              <i class="icon hamburger hamburger-arrow-left">
                                  <span class="sr-only">Toggle menubar</span>
                                  <span class="hamburger-bar"></span>
                            </i>
                        </a>
                      </li>
                      <li class="hidden-xs" id="toggleFullscreen">
                        <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                              <span class="sr-only">Toggle fullscreen</span>
                        </a>
                      </li>
                      <li class="hidden-float">
                        <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search" role="button">
                              <span class="sr-only">Toggle Search</span>
                        </a>
                      </li>
                </ul> <!-- End Navbar Toolbar -->
    
                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                      <li class="dropdown">
                        <a class="dropdown-toggle" title="<?php echo e(trans('app.languages')); ?>" 
                           data-toggle="dropdown" href="javascript:void(0)" 
                           data-animation="scale-up"aria-expanded="false" 
                           role="button">
               
                            <?php if(Session::get('locale_image')): ?>
                                <img width="18.66" height="14" 
                                src="<?php echo e(URL::to('/')); ?>/assets/flags/<?php if(Session::get('locale_image')): ?><?php echo e(Session::get('locale_image')); ?> <?php endif; ?>"/>
                            <?php else: ?>
                                 <img width="22.66" height="16" src="<?php echo e(URL::to('/')); ?>/assets/flags/america.png"/>
                              <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                
                              <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li role="presentation">
                                <a href="<?php echo e(URL::to('/LanguageController/chooser_language/')); ?>/<?php echo e($viewdata->foldername); ?>" 
                                    role="menuitem">
    
                                      <?php if(!empty($viewdata->flag_image)): ?>	
                                      <img src="<?php echo e(URL::to('assets/flags')); ?>/<?php echo e($viewdata->flag_image); ?>"  
                                      width="18.66" height="14" /> 
                                      <?php endif; ?> 
                                      <?php echo e($viewdata->languagename); ?>

                     
                                  </a>
                                  </li>			
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" 
                        href="#" aria-expanded="false" 
                        title="<?php echo e(trans('app.my_profile')); ?>" data-animation="scale-up" 
                        role="button">
    
                          <span class="avatar avatar-online">
                              <!--  <img src="<?php echo e(URL::to('/')); ?>/global/portraits/5.jpg" alt="...">-->
                                <!-- insert user image instead -->
                                  <img src="<?php echo e(URL::to('/')); ?>/images/default.png" alt="...">
                              </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                      <li role="presentation">
                        <a href="<?php echo e(URL::to('profile')); ?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo e(trans('app.my_profile')); ?></a>
                      </li>
    
                           <?php if(Auth::user()->hasRole('gov')): ?>
                        <li role="presentation">
                        <a href="<?php echo e(URL::to('settings')); ?>" role="menuitem">
                          <i class="icon wb-settings" aria-hidden="true"></i>
                          <?php echo e(trans('app.settings')); ?>

                        </a>
                      </li>
                           <?php endif; ?>
    
                    <li class="divider" role="presentation"></li>
                    <li role="presentation">
                           <a href="<?php echo e(url('/logout')); ?>"
                                     onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                     <?php echo e(trans('app.logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                 <?php echo e(csrf_field()); ?>

                            </form>
                    </li>
                </ul>
              </li>
              
              <li class="dropdown">
                <a data-toggle="dropdown" href="javascript:void(0)" title="<?php echo e(trans('app.messages')); ?>" aria-expanded="false"
                data-animation="scale-up" role="button">
                  <i class="icon wb-envelope" aria-hidden="true"></i>
                       <?php 
                           use App\Http\Controllers\MessageController;
                            $newmessagecount =  MessageController::messagecount()			 
                         ?>
                         <?php if(!empty($newmessagecount)): ?>
                   <span class="badge badge-info up"><?php echo e($newmessagecount); ?></span>
                   <?php endif; ?>
                  
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                  <li class="dropdown-menu-header" role="presentation">
                    <h5><?php echo e(trans('app.messages')); ?></h5>
                   <?php if(!empty($newmessagecount)): ?>
                   <span class="label label-round label-info">New <?php echo e($newmessagecount); ?></span>
                   <?php endif; ?>
                  </li>
                  <li class="list-group" role="presentation">
                    <div data-role="container">
                      <div data-role="content">
                                <?php  
                          $inboxnewmessages =  MessageController::inboxnewmessage()
                        ?>
                     
                       <?php $__currentLoopData = $inboxnewmessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="list-group-item" href="<?php echo e(URL::to('/inboxDetails')); ?>/<?php echo e($view->id); ?>/<?php echo e($view->replay_id ? $view->replay_id : $view->id); ?>" role="menuitem">
                          <div class="media">
                            <div class="media-left padding-right-10">
                              <span class="avatar avatar-sm avatar-online">
                                <img src="<?php echo e(URL::to('/')); ?>/<?php echo e((!empty($view->receiveMessage->image)?'uploads' :'images')); ?>/<?php echo e((!empty($view->receiveMessage->image)?$view->receiveMessage->image :'default.png')); ?>" alt="..." />
                               
                              </span>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading"><?php echo e($view->receiveMessage->first_name); ?> <?php echo e($view->receiveMessage->last_name); ?></h6>
                              <div class="media-meta">
                                <time datetime="2016-06-17T20:22:05+08:00"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $view->created_at)->diffForHumans()); ?></time>
                              </div>
                              <div class="media-detail"><?php echo e((!empty($view->subject))? $view->subject : trans('app.replay_message')); ?></div>
                            </div>
                          </div>
                        </a>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                      </div>
                    </div>
                  </li>
                  <li class="dropdown-menu-footer" role="presentation">
                    <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                      <i class="icon wb-settings" aria-hidden="true"></i>
                    </a>
                    <a href="<?php echo e(URL::to('/message')); ?>" role="menuitem">
                        <?php echo e(trans('app.see_all_messages')); ?> 
                      </a>
                  </li>
                </ul>
              </li>
                  <?php if(Auth::user()->hasRole('gov')): ?>
              <li id="toggleChat">
                <a data-toggle="site-sidebar" href="javascript:void(0)" title="<?php echo e(trans('app.sidebar')); ?>" data-url="<?php echo e(URL::to('SettingController/sidebar/')); ?>">
                         <i class="icon wb-more-vertical" aria-hidden="true"></i>
                </a>
              </li>
                  <?php endif; ?>
            </ul><!-- End Navbar Toolbar Right -->
          </div><!-- End Navbar Collapse -->
    
          <!-- Site Navbar Seach -->
          <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search" action="<?php echo e(URL::to('userlist')); ?>">
              <div class="form-group">
                <div class="input-search">
                  <i class="input-search-icon wb-search" aria-hidden="true"></i>
                  <input type="text" class="form-control" name="search" placeholder="<?php echo e(trans('app.search_for_users')); ?>">
                  <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
                </div>
              </div>
            </form>
          </div><!-- End Site Navbar Seach -->
        </div>
      </nav> <!-- End of Top Navigation Bar -->