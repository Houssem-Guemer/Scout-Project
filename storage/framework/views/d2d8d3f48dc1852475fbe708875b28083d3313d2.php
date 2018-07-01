<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title><?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_title); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  </title>
  <!-- Stylesheets -->
  <link href="<?php echo e(URL::to('assets/css')); ?>/bootstrap-fileupload.min.css" rel="stylesheet">
 
  <?php echo e(Html::style('global/css/bootstrap.min.css')); ?>  
  <?php echo e(Html::style('global/css/bootstrap-extend.min.css')); ?>

  
  <?php echo e(Html::style('assets/css/site.min.css')); ?>

  
  <!-- Plugins -->
   <?php echo e(Html::style('global/vendor/animsition/animsition.css')); ?>

   <?php echo e(Html::style('global/vendor/asscrollable/asScrollable.css')); ?>

   <?php echo e(Html::style('global/vendor/switchery/switchery.css')); ?>

   <?php echo e(Html::style('global/vendor/intro-js/introjs.css')); ?>

   <?php echo e(Html::style('global/vendor/slidepanel/slidePanel.css')); ?>

   <?php echo e(Html::style('global/vendor/jvectormap/jquery-jvectormap.css')); ?>

   <?php echo e(Html::style('assets/examples/css/dashboard/v1.css')); ?>

   <?php echo e(Html::style('assets/examples/css/dashboard/analytics.css')); ?>

   
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/ladda-bootstrap/ladda.css">
  
   <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/examples/css/uikit/buttons.css">
  <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/examples/css/uikit/dropdowns.css">
   
  <!-- Fonts -->
  <?php echo e(Html::style('global/fonts/font-awesome/font-awesome.css')); ?>

  <?php echo e(Html::style('global/fonts/weather-icons/weather-icons.css')); ?>

  <?php echo e(Html::style('global/fonts/web-icons/web-icons.min.css')); ?>

  <?php echo e(Html::style('global/fonts/brand-icons/brand-icons.min.css')); ?>

  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  
  <!------------------------new mail css-------------------->
  <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/bootstrap-markdown/bootstrap-markdown.css">
  <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/select2/select2.css">
  <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/examples/css/apps/mailbox.css">
  <!------------------------end new mail css-------------------->
  
	<style>
	.page-content {padding: 0px 30px;}
	</style>
  
  <?php echo e(Html::script('global/vendor/modernizr/modernizr.js')); ?>

  <?php echo e(Html::script('global/vendor/breakpoints/breakpoints.js')); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
  <!--<script src="<?php echo e(URL::to('assets/js')); ?>/angular.js"></script>--> 
<?php echo e(Html::style('assets/css/loaders.css')); ?>

<?php echo e(Html::style('assets/css/loaders.min.css')); ?> 
 <script>
  Breakpoints();
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
 <?php echo e(Html::script('global/vendor/jquery/jquery.js')); ?>

  </head>
<body class="dashboard app-mailbox">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
	
  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<img class="navbar-brand-logo" src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($view->logo); ?>" title="<?php echo e($view->app_name); ?>">
        
		<span class="navbar-brand-text hidden-xs"> <?php echo e($view->app_name); ?> </span>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
      </div>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
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
            <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
            role="button">
              <span class="sr-only">Toggle Search</span>
            </a>
          </li>
          
		  <li class="dropdown dropdown-fw dropdown-mega">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="fade" role="button">Mega <i class="icon wb-chevron-down-mini" aria-hidden="true"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation">
                <div class="mega-content">
                  <div class="row">
                    <div class="col-sm-4">
                      <h5>UI Kit</h5>
                      <ul class="blocks-2">
                        <li class="mega-menu margin-0">
                          <ul class="list-icons">
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/animation')); ?>">Animation</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/buttons')); ?>">Buttons</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/colors')); ?>">Colors</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/dropdowns')); ?>">Dropdowns</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/icons')); ?>">Icons</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/lightbox')); ?>">Lightbox</a>
                            </li>
                          </ul>
                        </li>
                        <li class="mega-menu margin-0">
                          <ul class="list-icons">
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/modals')); ?>">Modals</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/progressBars')); ?>">Progress</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/pricingTables')); ?>">Pricing</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/tooltip')); ?>">Tooltips</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/scrollable')); ?>">Scrollable</a>
                            </li>
                            <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                              <a href="<?php echo e(URL::to('/typography')); ?>">Typography</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-4">
                      <h5>Media
                        <span class="badge badge-success">4</span>
                      </h5>
                      <ul class="blocks-3">
                        <li>
                          <a class="thumbnail margin-0" href="javascript:void(0)">
                            <img class="width-full" src="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail margin-0" href="javascript:void(0)">
                            <img class="width-full" src="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail margin-0" href="javascript:void(0)">
                            <img class="width-full" src="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail margin-0" href="javascript:void(0)">
                            <img class="width-full" src="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail margin-0" href="javascript:void(0)">
                            <img class="width-full" src="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                        <li>
                          <a class="thumbnail margin-0" href="javascript:void(0)">
                            <img class="width-full" src="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png" alt="..." />
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-4">
                      <h5 class="margin-bottom-0">Accordion</h5>
                      <!-- Accordion -->
                      <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true"
                      role="tablist">
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                            <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion"
                            aria-expanded="false" aria-controls="siteMegaCollapseOne">
                                Collapsible Group Item #1
                              </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne"
                          role="tabpanel">
                            <div class="panel-body">
                              De moveat laudatur vestra parum doloribus labitur sentire partes, eripuit praesenti
                              congressus ostendit alienae, voluptati ornateque
                              accusamus clamat reperietur convicia albucius.
                            </div>
                          </div>
                        </div>
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingTwo" role="tab">
                            <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseTwo"
                            data-parent="#siteMegaAccordion" aria-expanded="false"
                            aria-controls="siteMegaCollapseTwo">
                                Collapsible Group Item #2
                              </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseTwo" aria-labelledby="siteMegaAccordionHeadingTwo"
                          role="tabpanel">
                            <div class="panel-body">
                              Praestabiliorem. Pellat excruciant legantur ullum leniter vacare foris voluptate
                              loco ignavi, credo videretur multoque choro fatemur
                              mortis animus adoptionem, bello statuat expediunt
                              naturales.
                            </div>
                          </div>
                        </div>
                        <div class="panel">
                          <div class="panel-heading" id="siteMegaAccordionHeadingThree" role="tab">
                            <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseThree"
                            data-parent="#siteMegaAccordion" aria-expanded="false"
                            aria-controls="siteMegaCollapseThree">
                                Collapsible Group Item #3
                              </a>
                          </div>
                          <div class="panel-collapse collapse" id="siteMegaCollapseThree" aria-labelledby="siteMegaAccordionHeadingThree"
                          role="tabpanel">
                            <div class="panel-body">
                              Horum, antiquitate perciperet d conspectum locus obruamus animumque perspici probabis
                              suscipere. Desiderat magnum, contenta poena desiderant
                              concederetur menandri damna disputandum corporum.
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Accordion -->
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li>
		  
        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" title="<?php echo e(trans('app.languages')); ?>" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
            aria-expanded="false" role="button">
           
			 <?php if(Session::get('locale_image')): ?>
			<img width="18.66" height="14" src="<?php echo e(URL::to('/')); ?>/assets/flags/<?php if(Session::get('locale_image')): ?><?php echo e(Session::get('locale_image')); ?> <?php endif; ?>"/>
			 <?php else: ?>
				 <img width="22.66" height="16" src="<?php echo e(URL::to('/')); ?>/assets/flags/america.png"/>
			  <?php endif; ?>
            </a>
			<ul class="dropdown-menu" role="menu">
			
			  <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li role="presentation">
                <a href="<?php echo e(URL::to('/LanguageController/chooser_language/')); ?>/<?php echo e($viewdata->foldername); ?>" role="menuitem">
                  <?php if(!empty($viewdata->flag_image)): ?>	<img src="<?php echo e(URL::to('assets/flags')); ?>/<?php echo e($viewdata->flag_image); ?>"  width="18.66" height="14" /> <?php endif; ?> <?php echo e($viewdata->languagename); ?>

				 
              </a>
			  </li>			
			 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </li>
          <li class="dropdown">
            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" title="<?php echo e(trans('app.my_profile')); ?>"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
              <!--  <img src="<?php echo e(URL::to('/')); ?>/global/portraits/5.jpg" alt="...">-->
			  <?php if(!empty(Auth::user()->image)): ?>				
                <img src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e(Auth::user()->image); ?>" alt="...">
			  <?php else: ?>
				   <img src="<?php echo e(URL::to('/')); ?>/images/default.png" alt="...">
				 <?php endif; ?>
                <i></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation">
                <a href="<?php echo e(URL::to('profile')); ?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo e(trans('app.my_profile')); ?></a>
              </li>
              <!--<li role="presentation">
                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
              </li>-->
			  <?php if(Auth::user()->hasRole('Admin')): ?>
              <li role="presentation">
                <a href="<?php echo e(URL::to('settings')); ?>" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i><?php echo e(trans('app.settings')); ?></a>
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
               <!-- <a href="<?php echo e(URL::to('logout')); ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> <?php echo e(trans('app.logout')); ?></a>-->
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
			   <?php if(!empty($newmessagecount)): ?><span class="badge badge-info up"><?php echo e($newmessagecount); ?></span><?php endif; ?>
              <!--<span class="badge badge-info up">3</span>-->
            </a>
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <li class="dropdown-menu-header" role="presentation">
                <h5><?php echo e(trans('app.messages')); ?></h5>
               <?php if(!empty($newmessagecount)): ?> <span class="label label-round label-info"> New <?php echo e($newmessagecount); ?></span><?php endif; ?>
              </li>
              <li class="list-group" role="presentation">
                <div data-role="container">
                  <div data-role="content">
				  <?php  $inboxnewmessages =  MessageController::inboxnewmessage()  ?>
				 
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
		  <?php if(Auth::user()->hasRole('Admin')): ?>
          <li id="toggleChat">
            <a data-toggle="site-sidebar" href="javascript:void(0)" title="<?php echo e(trans('app.sidebar')); ?>" data-url="<?php echo e(URL::to('SettingController/sidebar/')); ?>">
           
              <!--<i class="icon wb-chat" aria-hidden="true"></i>-->
			  <i class="icon wb-more-vertical" aria-hidden="true"></i>
            </a>
          </li>
		  <?php endif; ?>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
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
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
           <!-- <li class="site-menu-category">General</li>-->
          <br/>
 <!-------------- Dashboard menu --------------->			
	 <li class="site-menu-category" style="margin-top:1px; text-transform:none;font-size:16px; color:white; "><b>CRUD Example</b></li>
            <li class="site-menu-item has-sub <?php echo e(Request::is('dashboard') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.dashboard')); ?></span>
               <span class="site-menu-arrow"></span>
              </a>			  
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/dashboard')); ?>">
                    <!--<span class="site-menu-title">Dashboard</span>-->
                    <span class="site-menu-title"><?php echo e(trans('app.home')); ?></span>
                  </a>
                </li>
              </ul>
			  
            </li>
	<!-------------- Users menu --------------->	
 <?php if (\Entrust::can(['users.manage', 'users.activity'])) : ?>	
           
			<li class="site-menu-item has-sub  <?php echo e(Request::is('userlist','registration','activity') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
			  <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.users')); ?></span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
               <?php if (\Entrust::can('users.manage')) : ?> 
				<li class="site-menu-item <?php echo e(Request::is('registration') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/dashboard/scouts/accounts/register')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.add_user')); ?></span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('userlist') ? 'active' : ''); ?>">
                  <a class="animsition-link " href="<?php echo e(URL::to('userlist')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.users')); ?></span>
                  </a>
                </li>
				<?php endif; // Entrust::can ?>
				<?php if (\Entrust::can('users.activity')) : ?> 
                <li class="site-menu-item <?php echo e(Request::is('activity') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('activity')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.activity_log')); ?></span>
                  </a>
                </li>  
				<?php endif; // Entrust::can ?>
              </ul>			  
            </li>
			<?php endif; // Entrust::can ?>
	<!-------------- language menu --------------->
			 <?php if (\Entrust::can('languages.languages')) : ?>
			 <li class="site-menu-item has-sub <?php echo e(Request::is('language') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
			  <i class="site-menu-icon fa-language" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.languages')); ?></span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php echo e(Request::is('language') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL('/language')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.languages')); ?></span>
                  </a>
                </li>
              </ul>
            </li>
			<?php endif; // Entrust::can ?>
<!-------------- roles and permission  menu --------------->
		 <?php if (\Entrust::can(['roles.manage', 'permissions.manage'])) : ?>
			 <li class="site-menu-item has-sub <?php echo e(Request::is('permissions','roles') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
			  <i class="site-menu-icon fa-lock" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.roles_and_permissions')); ?></span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
			   <?php if (\Entrust::can('roles.manage')) : ?>
                <li class="site-menu-item <?php echo e(Request::is('roles') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/dashboard/roles')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.roles')); ?></span>
                  </a>
                </li>
				<?php endif; // Entrust::can ?>
				 <?php if (\Entrust::can('roles.manage')) : ?>
				<li class="site-menu-item <?php echo e(Request::is('permissions') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/dashboard/permissions')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.permissions')); ?></span>
                  </a>
                </li>
				<?php endif; // Entrust::can ?>
              </ul>
            </li>
		<?php endif; // Entrust::can ?>	
<!-------------- Message  menu --------------->
		<?php if (\Entrust::can('message.messages')) : ?>
			 <li class="site-menu-item has-sub <?php echo e(Request::is('message') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
			  <i class="site-menu-icon fa fa-envelope-o" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.messages')); ?></span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php echo e(Request::is('message') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/message')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.messages')); ?></span>
                  </a>
                </li>
              </ul>
            </li>
		<?php endif; // Entrust::can ?>		
<!-------------- Settings  menu --------------->
		<?php if (\Entrust::can('settings.general')) : ?>
			 <li class="site-menu-item has-sub <?php echo e(Request::is('settings') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
			  <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.settings')); ?></span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php echo e(Request::is('settings') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/settings')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.general_settings')); ?></span>
                  </a>
                </li>
              </ul>
            </li>			
         <?php endif; // Entrust::can ?>	
     
	 <li class="site-menu-category" style="text-transform:none;font-size:16px; color:white;"><b>Basic Elements</b></li>
		<li class="site-menu-item has-sub <?php echo e(Request::is('buttons','dropdowns','icons','tooltip','modals','tabsAccordions','imagesDes','badgesLabels','progressBars','carousel','typography','colors') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                <span class="site-menu-title">Basic UI</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">               
                <li class="site-menu-item <?php echo e(Request::is('buttons') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/buttons')); ?>">
                    <span class="site-menu-title">Buttons</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('dropdowns') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/dropdowns')); ?>">
                    <span class="site-menu-title">Dropdowns</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('icons') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/icons')); ?>">
                    <span class="site-menu-title">Icons</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('tooltip') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/tooltip')); ?>">
                    <span class="site-menu-title">Tooltip &amp; Popover</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('modals') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/modals')); ?>">
                    <span class="site-menu-title">Modals</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('tabsAccordions') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/tabsAccordions')); ?>">
                    <span class="site-menu-title">Tabs &amp; Accordions</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('imagesDes') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/imagesDes')); ?>">
                    <span class="site-menu-title">Images</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('badgesLabels') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/badgesLabels')); ?>">
                    <span class="site-menu-title">Badges &amp; Labels</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('progressBars') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/progressBars')); ?>">
                    <span class="site-menu-title">Progress Bars</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('carousel') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/carousel')); ?>">
                    <span class="site-menu-title">Carousel</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('typography') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/typography')); ?>">
                    <span class="site-menu-title">Typography</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('colors') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/colors')); ?>">
                    <span class="site-menu-title">Colors</span>
                  </a>
                </li>
              </ul>
            </li>
	<!----------- end basic ui ------------->		
		
<!------- Start stacture ------------->	
			<li class="site-menu-item has-sub <?php echo e(Request::is('alerts','ribbon','pricingTables','overlay','cover','timeline','step','chat') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-plugin" aria-hidden="true"></i>
                <span class="site-menu-title">Structure</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php echo e(Request::is('alerts') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/alerts')); ?>">
                    <span class="site-menu-title">Alerts</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('ribbon') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/ribbon')); ?>">
                    <span class="site-menu-title">Ribbon</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('pricingTables') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/pricingTables')); ?>">
                    <span class="site-menu-title">Pricing Tables</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('overlay') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/overlay')); ?>">
                    <span class="site-menu-title">Overlay</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('cover') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/cover')); ?>">
                    <span class="site-menu-title">Cover</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('timeline') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/timeline')); ?>">
                    <span class="site-menu-title">Timeline</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('step') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/step')); ?>">
                    <span class="site-menu-title">Step</span>
                  </a>
                </li>                
                <li class="site-menu-item <?php echo e(Request::is('chat') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/chat')); ?>">
                    <span class="site-menu-title">Chat</span>
                  </a>
                </li>                
              </ul>
            </li>	
<!------- End stacture  ------------->	

	
<!------- Start Forms  ------------->	
		<li class="site-menu-item has-sub <?php echo e(Request::is('general','material','layouts','wizard','validation','masks','imageCropping','fileUploads') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-library" aria-hidden="true"></i>
                <span class="site-menu-title">Forms</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php echo e(Request::is('general') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/general')); ?>">
                    <span class="site-menu-title">General Elements</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('material') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/material')); ?>">
                    <span class="site-menu-title">Material Elements</span>
                  </a>
                </li>               
                <li class="site-menu-item <?php echo e(Request::is('layouts') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/layouts')); ?>">
                    <span class="site-menu-title">Form Layouts</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('wizard') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/wizard')); ?>">
                    <span class="site-menu-title">Form Wizard</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('validation') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/validation')); ?>">
                    <span class="site-menu-title">Form Validation</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('masks') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/masks')); ?>">
                    <span class="site-menu-title">Form Masks</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('imageCropping') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/imageCropping')); ?>">
                    <span class="site-menu-title">Image Cropping</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('fileUploads') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/fileUploads')); ?>">
                    <span class="site-menu-title">File Uploads</span>
                  </a>
                </li>
              </ul>
            </li>
<!------- End Forms  ------------->	

<!------- Start Tables  ------------->
		<li class="site-menu-item has-sub <?php echo e(Request::is('basicTables','responsiveTable','editableTable','jsgrid') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                <span class="site-menu-title">Tables</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php echo e(Request::is('basicTables') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/basicTables')); ?>">
                    <span class="site-menu-title">Basic Tables</span>
                  </a>
                </li>
               
                <li class="site-menu-item <?php echo e(Request::is('responsiveTable') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/responsiveTable')); ?>">
                    <span class="site-menu-title">Responsive Tables</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('editableTable') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/editableTable')); ?>">
                    <span class="site-menu-title">Editable Tables</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('jsgrid') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/jsgrid')); ?>">
                    <span class="site-menu-title">jsGrid</span>
                  </a>
                </li>                
              </ul>
            </li>
<!------- End Tables  ------------->
	
<!------- Start Pages  ------------->
         <li class="site-menu-item has-sub <?php echo e(Request::is('error400','error500','faq','gallery','invoice','searchResult','profiledemo') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                <span class="site-menu-title">Pages</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item has-sub">
                  <a href="javascript:void(0)">
                    <span class="site-menu-title">Errors</span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                    <li class="site-menu-item <?php echo e(Request::is('error400') ? 'active' : ''); ?>">
                      <a class="animsition-link" href="<?php echo e(URL::to('/error400')); ?>">
                        <span class="site-menu-title">400</span>
                      </a>
                    </li>                    
                    <li class="site-menu-item <?php echo e(Request::is('error500') ? 'active' : ''); ?>">
                      <a class="animsition-link" href="<?php echo e(URL::to('/error500')); ?>">
                        <span class="site-menu-title">500</span>
                      </a>
                    </li>                    
                  </ul>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('faq') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/faq')); ?>">
                    <span class="site-menu-title">FAQ</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('gallery') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/gallery')); ?>">
                    <span class="site-menu-title">Gallery</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('searchResult') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/searchResult')); ?>">
                    <span class="site-menu-title">Search Result</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('invoice') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/invoice')); ?>">
                    <span class="site-menu-title">Invoice</span>
                  </a>
                </li>
                
                <li class="site-menu-item <?php echo e(Request::is('profiledemo') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/profiledemo')); ?>">
                    <span class="site-menu-title">Profile</span>
                  </a>
                </li>                
              </ul>
            </li>	
<!------- End pages  ------------->	
<!----------- Start Advanced ui ------------->	
			<li class="site-menu-item has-sub <?php echo e(Request::is('animation','lightbox','scrollable','rating','toastr','sortableNestable','bootboxSweetalert') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                <span class="site-menu-title">Advanced UI</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">                
                <li class="site-menu-item <?php echo e(Request::is('animation') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/animation')); ?>">
                    <span class="site-menu-title">Animation</span>
                  </a>
                </li>               
                <li class="site-menu-item <?php echo e(Request::is('lightbox') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/lightbox')); ?>">
                    <span class="site-menu-title">Lightbox</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('scrollable') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/scrollable')); ?>">
                    <span class="site-menu-title">Scrollable</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('rating') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/rating')); ?>">
                    <span class="site-menu-title">Rating</span>
                  </a>
                </li>                
                <li class="site-menu-item <?php echo e(Request::is('toastr') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/toastr')); ?>">
                    <span class="site-menu-title">Toastr</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('sortableNestable') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/sortableNestable')); ?>">
                    <span class="site-menu-title">Sortable &amp; Nestable</span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('bootboxSweetalert') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/bootboxSweetalert')); ?>">
                    <span class="site-menu-title">Bootbox &amp; Sweetalert</span>
                  </a>
                </li>
              </ul>
            </li>	
<!------- end advanced ui ------------->			
<!------- Start Widgets  ------------->
		<li class="site-menu-item has-sub <?php echo e(Request::is('social') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
                <i class="site-menu-icon wb-extension" aria-hidden="true"></i>
                <span class="site-menu-title">Widgets</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">  
                <li class="site-menu-item <?php echo e(Request::is('social') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/social')); ?>">
                    <span class="site-menu-title">Social Widgets</span>
                  </a>
                </li>                
              </ul>
            </li>	
<!------- End Widgets  ------------->
	
          </ul>
        </div>
      </div>
    </div>
    <div class="site-menubar-footer">
	<a href="<?php echo e(URL::to('profileEdit')); ?>" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo e(trans('app.edit_profile')); ?>">
       <i class="icon wb-pencil" aria-hidden="true"></i>
      </a>
       <?php if(Auth::user()->hasRole('Admin')): ?>
	  <a href="<?php echo e(URL::to('settings')); ?>" class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="<?php echo e(trans('app.settings')); ?>">
        <span class="icon wb-settings" aria-hidden="true"></span>
      </a>
	  <?php else: ?>
	  <a class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="">
        &nbsp;
      </a>
	  <?php endif; ?>
      <a href="<?php echo e(url('/logout')); ?>"
			onclick="event.preventDefault();
					 document.getElementById('logout-form').submit();" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo e(trans('app.logout')); ?>">
			<span class="icon wb-power" aria-hidden="true"></span>
		</a>
		<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
			<?php echo e(csrf_field()); ?>

		</form>
    </div>
  </div>
<!-------------------- logo click menu---------------->
  <div class="site-gridmenu">
    <div>
      <div>
        <ul>
		 <li>
            <a href="<?php echo e(URL::to('/dashboard')); ?>">
              <i class="icon wb-dashboard"></i>
              <span><?php echo e(trans('app.dashboard')); ?></span>
            </a>
          </li>
		  <?php if (\Entrust::can('users.manage')) : ?>
		  <li>
            <a href="<?php echo e(URL::to('userlist')); ?>">
              <i class="icon wb-users" aria-hidden="true"></i>
              <span><?php echo e(trans('app.users')); ?></span>
            </a>
          </li>
		  <?php endif; // Entrust::can ?>
		  <?php if (\Entrust::can('languages.languages')) : ?>
		   <li>
            <a href="<?php echo e(URL::to('language')); ?>">
            <i class="icon fa-language" aria-hidden="true"></i>			
             
              <span><?php echo e(trans('app.languages')); ?></span>
            </a>
          </li>
		   <?php endif; // Entrust::can ?>
		   <?php if (\Entrust::can('message.messages')) : ?>
          <li>
            <a href="<?php echo e(URL::to('message')); ?>">
              <i class="icon wb-envelope"></i>
              <span><?php echo e(trans('app.messages')); ?></span>
            </a>
          </li> 
			 <?php endif; // Entrust::can ?>
			 <?php if (\Entrust::can('permissions.manage')) : ?>
          <li>
            <a href="<?php echo e(URL::to('permissions')); ?>">
              <i class="icon wb-lock"></i>
              <span><?php echo e(trans('app.permissions')); ?></span>
            </a>
          </li>
          <?php endif; // Entrust::can ?>
		  <?php if (\Entrust::can('settings.general')) : ?>
          <li>
            <a href="<?php echo e(URL::to('settings')); ?>">
              <i class="icon wb-settings" aria-hidden="true"></i>
              <span><?php echo e(trans('app.settings')); ?></span>
            </a>
          </li>
         <?php endif; // Entrust::can ?>
		
        </ul>
      </div>
    </div>
  </div>
  <!-- Page -->
 
 <maindd>
<div class="loadersjew">
	<div class="loaderjew"><div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div></div>
	<!--<div class="loaderjew"><div class="line-scale-party"><div></div><div></div><div></div><div></div></div></div>-->
	<!--<div class="loader"><div class="line-scale-pulse-out"><div></div><div></div><div></div><div></div><div></div></div></div>
	<div class="loader"><div class="line-scale-pulse-out-rapid"><div></div><div></div><div></div><div></div><div></div></div></div>-->
	</div>
</maindd>

  <div class="page" style="animation-duration: 800ms; opacity: 1;">
   <!-- page content -->
   
	<?php echo $__env->yieldContent('content'); ?>
	<!-- /page content -->
  </div>
  <!-- End Page -->
  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">© <?php echo e(date('Y')); ?> <a href="<?php echo e(URL::to('/')); ?>"><?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></a></div>
    <div class="site-footer-right">
     <?php echo e(trans('app.email')); ?> <i class="red-600 wb wb-heart"></i>  <?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_email); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
  </footer>
 <!-- Core  -->  
  
   <?php echo e(Html::script('global/vendor/bootstrap/bootstrap.js')); ?>

   <?php echo e(Html::script('global/vendor/animsition/animsition.js')); ?>

   <?php echo e(Html::script('global/vendor/asscroll/jquery-asScroll.js')); ?>

   <?php echo e(Html::script('global/vendor/mousewheel/jquery.mousewheel.js')); ?>

   <?php echo e(Html::script('global/vendor/asscrollable/jquery.asScrollable.all.js')); ?>

   <?php echo e(Html::script('global/vendor/ashoverscroll/jquery-asHoverScroll.js')); ?>

   
  <!-- Plugins -->
  <?php echo e(Html::script('global/vendor/switchery/switchery.min.js')); ?>

  <?php echo e(Html::script('global/vendor/intro-js/intro.js')); ?>

  <?php echo e(Html::script('global/vendor/screenfull/screenfull.js')); ?>

  <?php echo e(Html::script('global/vendor/slidepanel/jquery-slidePanel.js')); ?>

  <?php echo e(Html::script('global/vendor/skycons/skycons.js')); ?>

  <?php echo e(Html::script('global/vendor/aspieprogress/jquery-asPieProgress.min.js')); ?>

  <?php echo e(Html::script('global/vendor/jvectormap/jquery.jvectormap.min.js')); ?>

  <?php echo e(Html::script('global/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js')); ?>

  <?php echo e(Html::script('global/vendor/matchheight/jquery.matchHeight-min.js')); ?>

  <!-- Scripts -->
   <?php echo e(Html::script('global/js/core.js')); ?>

   <?php echo e(Html::script('assets/js/site.js')); ?>

   <?php echo e(Html::script('assets/js/sections/menu.js')); ?>

   <?php echo e(Html::script('assets/js/sections/menubar.js')); ?>

   <?php echo e(Html::script('assets/js/sections/gridmenu.js')); ?>

   <?php echo e(Html::script('assets/js/sections/sidebar.js')); ?>

   <?php echo e(Html::script('global/js/configs/config-colors.js')); ?>

   <?php echo e(Html::script('assets/js/configs/config-tour.js')); ?>

   <?php echo e(Html::script('global/js/components/asscrollable.js')); ?>

   <?php echo e(Html::script('global/js/components/animsition.js')); ?>

   <?php echo e(Html::script('global/js/components/slidepanel.js')); ?>

   <script src="<?php echo e(URL::to('/')); ?>/global/vendor/filament-tablesaw/tablesaw.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/filament-tablesaw/tablesaw-init.js"></script>
  
    <script src="<?php echo e(URL::to('/')); ?>/global/vendor/ladda-bootstrap/spin.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/ladda-bootstrap/ladda.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/js/components/ladda-bootstrap.js"></script> 
 
  <?php echo e(Html::script('global/js/components/switchery.js')); ?>

   <?php echo e(Html::script('global/js/components/matchheight.js')); ?>

   <?php echo e(Html::script('global/js/components/jvectormap.js')); ?>

    <script src="<?php echo e(URL::to('/')); ?>/global/vendor/jquery-ui/jquery-ui.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-tmpl/tmpl.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-load-image/load-image.all.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-file-upload/jquery.fileupload.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-file-upload/jquery.fileupload-process.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-file-upload/jquery.fileupload-image.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-file-upload/jquery.fileupload-audio.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-file-upload/jquery.fileupload-video.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-file-upload/jquery.fileupload-validate.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-file-upload/jquery.fileupload-ui.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/dropify/dropify.min.js"></script>
  
	<script src="<?php echo e(URL::to('/')); ?>/global/vendor/asprogress/jquery-asProgress.js"></script>
   <script src="<?php echo e(URL::to('/')); ?>/global/vendor/asrange/jquery-asRange.min.js"></script>
   <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/uikit/icon.js"></script>
   <script src="<?php echo e(URL::to('assets/js')); ?>/bootstrap-fileupload.min.js"></script>
   
   <script src="<?php echo e(URL::to('/')); ?>/global/vendor/owl-carousel/owl.carousel.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/slick-carousel/slick.js"></script>
    <!-- New for mail box -->
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/select2/select2.min.js"></script> 
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/bootstrap-markdown/bootstrap-markdown.js"></script>
 <script src="<?php echo e(URL::to('/')); ?>/global/vendor/webui-popover/jquery.webui-popover.min.js"></script>
  
  
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/filterable.js"></script>
  <!--<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/pages/gallery.js"></script>-->
  
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/toolbar/jquery.toolbar.min.js"></script>
   <script src="<?php echo e(URL::to('/')); ?>/global/js/components/webui-popover.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/toolbar.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/uikit/tooltip-popover.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/magnific-popup/jquery.magnific-popup.js"></script>
 <script src="<?php echo e(URL::to('/')); ?>/global/vendor/raty/jquery.raty.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/toastr/toastr.js"></script>
   <script src="<?php echo e(URL::to('/')); ?>/global/vendor/html5sortable/html.sortable.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/nestable/jquery.nestable.js"></script>

  
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/bootbox/bootbox.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/select2.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/plugins/action-btn.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/plugins/selectable.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/selectable.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/material.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/bootbox.js"></script>
  
 <script src="<?php echo e(URL::to('/')); ?>/assets/js/app.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/apps/mailbox.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/input-group-file.js"></script> 
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/asprogress.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/uikit/progress-bars.js"></script> 
<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/pages/faq.js"></script>

  <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/advanced/animation.js"></script>
   <script src="<?php echo e(URL::to('/')); ?>/global/js/components/magnific-popup.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/advanced/lightbox.js"></script>
 <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/advanced/scrollable.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/raty.js"></script>
   <script src="<?php echo e(URL::to('/')); ?>/global/js/components/toastr.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/global/js/components/html5sortable.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/nestable.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/tasklist.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/global/js/components/bootstrap-sweetalert.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/advanced/bootbox-sweetalert.js"></script>
 
 <script src="<?php echo e(URL::to('/')); ?>/global/vendor/jquery-wizard/jquery-wizard.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/vendor/formvalidation/formValidation.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/vendor/formvalidation/framework/bootstrap.js"></script>
   <script src="<?php echo e(URL::to('/')); ?>/global/js/components/jquery-wizard.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/forms/wizard.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/forms/validation.js"></script>
 <script src="<?php echo e(URL::to('/')); ?>/global/vendor/formatter-js/jquery.formatter.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/formatter-js.js"></script> 
<script src="<?php echo e(URL::to('/')); ?>/global/vendor/cropper/cropper.min.js"></script>  
 <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/forms/image-cropping.js"></script>
      
 
  <script src="<?php echo e(URL::to('/')); ?>/global/js/components/dropify.js"></script>
   <script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/forms/uploads.js"></script>
   
   
   <script type="text/javascript">	
	/* tab storage */
	$(function() { 
		// for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			// save the latest tab; use cookies if you like 'em better:
			localStorage.setItem('lastTab', $(this).attr('href'));
		});

		// go to the latest tab, if it exists:
		var lastTab = localStorage.getItem('lastTab');
		if (lastTab) {
			$('[href="' + lastTab + '"]').tab('show');
		}
	});

	/* Activity info */
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();   
	});
	</script>
  <div class="modal fade modal-3d-flip-vertical exampleNiftyFlipVertical" id="exampleNiftyFlipVertical" aria-hidden="true"
  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title"><?php echo e(trans('app.delete_confirm')); ?></h4>
		</div>
		<div class="modal-body">
		  <p> <?php echo e(trans('app.are_you_sure_delete_user')); ?></p>
		
		  
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default margin-0" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
		  <a class="btn btn-danger btn-ok"><?php echo e(trans('app.yes_delete_him')); ?></a>
		</div>
	  </div>
	</div>
  </div>
  <!-- End Modal -->
  <script>
  $('.exampleNiftyFlipVertical').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});	
	/* for loading button */
	$('.loadingclick').on('click', function() {
		var $this = $(this);
	  $this.button('loading');
		setTimeout(function() {
		   $this.button('reset');
	   }, 22000);
	});
  $("[rel='tooltip']").tooltip();
	
/* for message timeout */
$(document).ready(function(){	
	 $(".alertDismissible").fadeTo(3000, 800).slideUp(1000, function(){
       $(".alertDismissible").slideUp(1000);
	   });
});
</script>
<script src="<?php echo e(URL::to('/')); ?>/global/js/components/owl-carousel.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/uikit/carousel.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/js/components/table.js"></script> 

<script src="<?php echo e(URL::to('/')); ?>/global/vendor/editable-table/mindmup-editabletable.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/vendor/editable-table/numeric-input-example.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/js/components/editable-table.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/tables/editable.js"></script>

<script src="<?php echo e(URL::to('/')); ?>/global/vendor/jsgrid/jsgrid.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/tables/jsgrid-db.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/tables/jsgrid.js"></script>

 <!----------- for datepicker ------------->
<script src="<?php echo e(URL::to('/')); ?>/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/vendor/jt-timepicker/jquery.timepicker.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/vendor/datepair-js/datepair.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/vendor/datepair-js/jquery.datepair.min.js"></script>

<script src="<?php echo e(URL::to('/')); ?>/global/js/components/bootstrap-datepicker.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/js/components/jt-timepicker.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/global/js/components/datepair-js.js"></script>
<!--<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/forms/advanced.js"></script> -->
    
  <!--<div class="loader-fb"></div>-->
<script>
 $(window).load(function() {		
  $(".loadersjew").fadeOut("slow");;
 });
</script>
   
</body>
</html>








