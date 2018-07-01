<!DOCTYPE html>
<html lang="en">
<head>        
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Loginlog" content="width=device-width, initial-scale=1">
	<?php ($settings = DB::table('settings')->get()); ?>
	<title><?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_title); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></title>
	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,300,100,100italic,300italic,400italic,700,700italic">
	<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/assets_web/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/assets_web/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/assets_web/css/form-elements.css">
	<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/assets_web/ultimate-flat-social-icons/ultm-css/ultm.css">
	<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/assets_web/css/style.css">
	<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/assets_web/css/media-queries.css"> 
</head>
<body style="background:#ddd;">
<!-- Top menu -->
<nav>
	<a class="menu-top" href=""><?php echo e(trans('app.home')); ?></a>
	<a class="menu-subscribe" href=""><?php echo e(trans('app.subscribe')); ?></a>
	<a class="menu-project" href=""><?php echo e(trans('app.our_projects')); ?></a>
	<a class="menu-testimonials" href=""><?php echo e(trans('app.testimonials')); ?></a>
	<a class="menu-about-us" href=""><?php echo e(trans('app.about_us')); ?></a>
	<a class="menu-contact" href=""><?php echo e(trans('app.contact_us')); ?></a>	
	<a id="link" target="_blank" href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.login')); ?></a>	
	
	 <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right" style="margin-right: 70px;">
	  <li class="dropdown">
		<a class="dropdown-toggle" title="Languages" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
		aria-expanded="false" role="button">
		
		 <?php if(Session::get('locale_image')): ?>
		<img width="22.66" height="16" src="<?php echo e(URL::to('/')); ?>/assets/flags/<?php if(Session::get('locale_image')): ?><?php echo e(Session::get('locale_image')); ?> <?php endif; ?>"/>
		 <?php else: ?>
			 <img width="22.66" height="16" src="<?php echo e(URL::to('/')); ?>/assets/flags/america.png"/>
			 
			 <span class="flag-icon flag-icon-us"></span> 
		  <?php endif; ?>
		</a>
		<ul class="dropdown-menu" role="menu">
		  <?php ($language = DB::table('languages')->get()); ?>
		  <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <li role="presentation">
			<a class="link linklanguage"  href="<?php echo e(URL::to('/LanguageController/chooser_language/')); ?>/<?php echo e($viewdata->foldername); ?>" role="menuitem">
			  <?php if(!empty($viewdata->flag_image)): ?>	<img src="<?php echo e(URL::to('assets/flags')); ?>/<?php echo e($viewdata->flag_image); ?>"  width="18.66" height="14" /> <?php endif; ?> <?php echo e($viewdata->languagename); ?>

			 
		  </a>
		  </li>			
		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	  </li> 
	</ul>			
	<div class="hide-menu" style="float:right; right:-20px !important;">
		<a href="" rel="tooltip" data-placement="bottom" data-original-title="Hide menu">
			<i class="fa fa-bars"></i>
		</a>
	</div>
</nav>
<div class="show-menu" style="float:right; right:0px !important;">
	<a href="" rel="tooltip" data-placement="bottom" data-original-title="Show menu">
		<i class="fa fa-bars"></i>
	</a>
</div>		
<?php echo $__env->yieldContent('content'); ?>

<!-- Footer -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-7 footer-copyright">
				<p>© <?php echo e(date('Y')); ?> <a href="<?php echo e(URL::to('/')); ?>"><?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_title); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></a></p>
			</div>
			<div class="col-sm-5 footer-social">
				<a class="ultm ultm-facebook ultm-48 ultm-square ultm-gray-to-color" href=""></a>
				<a class="ultm ultm-twitter ultm-48 ultm-square ultm-gray-to-color" href=""></a>
				<a class="ultm ultm-google-plus-1 ultm-48 ultm-square ultm-gray-to-color" href=""></a>
				<a class="ultm ultm-dribbble ultm-48 ultm-square ultm-gray-to-color" href=""></a>
				<a class="ultm ultm-pinterest ultm-48 ultm-square ultm-gray-to-color" href=""></a>
			</div>
		</div>
	</div>
</footer>	
<!-- Javascript -->
<script src="<?php echo e(URL::to('/')); ?>/assets/assets_web/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/assets_web/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/assets_web/js/jquery.backstretch.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/assets_web/js/jquery.countdown.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/assets_web/twitter/jquery.tweet.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/assets_web/js/jquery.ui.map.min.js"></script>
<script src="<?php echo e(URL::to('/')); ?>/assets/assets_web/js/scripts.js"></script>
	
</body>
</html>
<script>
$('#link').click(function (e) {
    e.preventDefault();
    window.location = ($(e.currentTarget).attr("href"));
});
$('.linklanguage').click(function (e) {
    e.preventDefault();
    window.location = ($(e.currentTarget).attr("href"));
});


$('#linkdocument').click(function () {
    window.location = $("#linkdocument").attr("href");
  
});
</script>