<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title>فوج الفلاح  </title>
  
  <?php echo $__env->make('includes.dashdependencies.predeps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
	<style>
    .page-content {
      padding: 0px 30px;
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }
    .site-menubar {
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
    }
    .site-navbar {
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
    }
    .font_kufi {
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
      font-size: 100%;
    }
	</style>
</head>

<body class="dashboard app-mailbox">
    <?php echo $__env->make('includes.dashbars.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div id="app"> 
    <?php echo $__env->make('includes.dashbars.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Page -->
    <div class="page" style="animation-duration: 800ms; opacity: 1;">
      <router-view></router-view>
    </div>
  </div>
  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">© <?php echo e(date('Y')); ?> <a href="<?php echo e(URL::to('/')); ?>">فوج الفلاج</a></div>
    <div class="site-footer-right">
     <?php echo e(trans('app.email')); ?> <i class="red-600 wb wb-heart"></i> gov@alfalahascouts.dz 
    </div>
  </footer>


  <?php echo $__env->make('includes.dashdependencies.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- Vue.js -->
  <script src=<?php echo e(url("/assets/vue/app.js")); ?>></script>
</body>
</html>