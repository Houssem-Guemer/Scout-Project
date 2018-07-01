<?php $__env->startSection('content'); ?>
<body class="page-register layout-full page-dark">
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">
      <?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
    <div class="page-content vertical-align-middle" style="background: rgba(40, 41, 41, 0.17);">
      <div class="brand">
	  <img class="navbar-brand-logo" style="height:50px" src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($view->logo); ?>" title="Farazisoft"/>
        <h2 class="brand-text"><?php echo e($view->app_name); ?></h2>
      </div>
      <p><?php echo e(trans('app.sign_up_to_find_interesting_thing')); ?> </p>
      <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                   <?php echo e(csrf_field()); ?>				   
			<div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">                         
						<input id="username" required placeholder="<?php echo e(trans('app.username')); ?>" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>">
						<?php if($errors->has('username')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('username')); ?></strong>
							</span>
						<?php endif; ?>				  
				</div>
				<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">				   
						<input id="email" required type="email"  placeholder="<?php echo e(trans('app.email_address')); ?>" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
						<?php if($errors->has('email')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('email')); ?></strong>
							</span>
						<?php endif; ?>
				</div>
				<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">				   
						<input required id="password" placeholder="<?php echo e(trans('app.password')); ?>" type="password" class="form-control" name="password">
						<?php if($errors->has('password')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('password')); ?></strong>
							</span>
						<?php endif; ?>
				</div>

				<div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">				   
						<input required id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(trans('app.confirm_password')); ?>">
						<?php if($errors->has('password_confirmation')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('password_confirmation')); ?></strong>
							</span>
						<?php endif; ?>
				</div>
          <!--<button type="submit" class="btn btn-primary btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading.."><?php echo e(trans('app.sign_up')); ?></button>-->
        <button type="submit" class="btn btn-primary ladda-button btn-block" data-plugin="ladda" data-style="expand-left">
			  <?php echo e(trans('app.sign_up')); ?>

		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
		</form>
       <p><?php echo e(trans('app.have_account_already_lease_go_to')); ?>  <a href="<?php echo e(URL::to('/login')); ?>"><?php echo e(trans('app.sign_in')); ?></a></p>
      <footer>          
          <div class="social">           
            <a class="btn btn-icon btn-round social-facebook" href="<?php echo e(url('/redirect/facebook')); ?>">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="<?php echo e(url('/redirect/google')); ?>">
              <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a>
			 <a class="btn btn-icon btn-round social-twitter" href="<?php echo e(url('/redirect/twitter')); ?>">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
          </div>
        </footer>
    </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>