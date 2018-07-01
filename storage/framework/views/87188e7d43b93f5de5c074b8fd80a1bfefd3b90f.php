<?php $__env->startSection('content'); ?>
<div class="page-header">
  <h1 class="page-title font_kufi"> <?php echo e(trans('app.general_settings')); ?>  </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"> <?php echo e(trans('app.home')); ?> </a></li>
		<li><a href="<?php echo e(URL::to('userlist')); ?>"> <?php echo e(trans('app.users')); ?> </a></li>
		<li class="active"> <?php echo e(trans('app.settings')); ?> </li>
	</ol>
  </div>
</div>
 
<div class="page-content" ng-app="">	
<div class="panel">
<div class="panel-body container-fluid">
<!------------------------start insert, update, delete message ---------------->
<!------------------------start insert, update, delete message ---------------->
<div class="row">
<?php if(session('msg_success')): ?>
	<div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_success')); ?>

	</div>
<?php endif; ?>
<?php if(session('msg_update')): ?>
	<div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_update')); ?>

	</div>
<?php endif; ?>
<?php if(session('msg_delete')): ?>
	<div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_delete')); ?>

	</div>
<?php endif; ?>
</div>

<div class="col-md-12">
<ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
	<li class="active" role="presentation"><a data-toggle="tab" href="#generalsetting" aria-controls="activities" role="tab" aria-expanded="true"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <?php echo e(trans('app.general_settings')); ?></a></li>
	<li role="presentation" class=""><a data-toggle="tab" href="#authentication" aria-controls="profile" role="tab" aria-expanded="false"> <i class="fa fa-lock"></i> <?php echo e(trans('app.authentication')); ?></a></li>
	<li role="presentation" class=""><a data-toggle="tab" href="#image" aria-controls="profile" role="tab" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> <?php echo e(trans('app.change_logo')); ?></a></li>
</ul>		
</div>
<div style="clear:both;"></div><br>
<div class="tab-content">
<!-------------- general setting ----------------->
<div id="generalsetting" class="tab-pane fade in active">
<?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form  name="userForm" ng-submit="submitForm(userForm.$valid)" action="<?php echo e(URL::to('/settings')); ?>"  method="POST" novalidate="">
	<?php echo e(csrf_field()); ?>			
<div class="col-lg-12">
	<div class="row">	
	 <div class="form-group col-sm-6">
		<label> <?php echo e(trans('app.app_title')); ?> </label>
		<input type="text" ng-model="app_title" value="<?php echo e($view->app_title); ?>" ng-init="app_title = '<?php echo e($view->app_title); ?>'"  name="app_title" class="form-control" required >
	</div>
	 <div class="form-group col-sm-6">
		<label> <?php echo e(trans('app.app_name')); ?> </label>
		<input type="hidden" value="<?php echo e($view->id); ?>" name="settingid"/>
		<input type="text" ng-model="app_name" value="<?php echo e($view->app_name); ?>" ng-init="app_name = '<?php echo e($view->app_name); ?>'" name="app_name" class="form-control" required>
	</div>
</div>
	
<div class="row">	
	 <div class="form-group col-sm-6">
		<label> <?php echo e(trans('app.app_email')); ?> </label>
		<input type="email" ng-model="app_email" value="<?php echo e($view->app_email); ?>" ng-init="app_email = '<?php echo e($view->app_email); ?>'"  name="app_email" class="form-control" >
	</div>
	<div class="form-group col-sm-6">
		<label> <?php echo e(trans('app.phone')); ?> </label>
		<input type="text" ng-model="phone" value="<?php echo e($view->phone); ?>" ng-init="phone = '<?php echo e($view->phone); ?>'" name="phone" class="form-control" >
	</div>
</div>

<div class="row">	
	 <div class="form-group col-sm-6">
		<label> <?php echo e(trans('app.mobile')); ?> </label>
		<input type="text" ng-model="mobile" value="<?php echo e($view->mobile); ?>" ng-init="mobile = '<?php echo e($view->mobile); ?>'" name="mobile" class="form-control" required >
	</div>					
	 <div class="form-group col-sm-6">
		<label> <?php echo e(trans('app.currency')); ?> </label>
		<input type="text" ng-model="currency" value="<?php echo e($view->currency); ?>" ng-init="currency = '<?php echo e($view->currency); ?>'" name="currency" class="form-control">
	</div>
</div>
<div class="row">	
	 <div class="form-group col-sm-12">
		<label> <?php echo e(trans('app.address')); ?> </label>
		<textarea ng-model="address"  name="address" value="<?php echo e($view->address); ?>" ng-init="address = '<?php echo e($view->address); ?>'" class="form-control" rows="3"></textarea>
	</div>	
</div>
	<div class="bs-example" data-example-id="single-button-dropdown">
		<button ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
			<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span>  <?php echo e(trans('app.update_settings')); ?>

		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
	</div>
</div>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!--------- Authenticaiton ---------->
<div id="authentication" class="tab-pane fade">
<div class="col-md-8">
<?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form  name="userFormauth" ng-submit="submitForm(userFormauth.$valid)" action="<?php echo e(URL::to('/settings')); ?>"  method="POST" novalidate="">
<?php echo e(csrf_field()); ?>	
<div class="row">	
  <div class="form-group col-sm-6">
  <label class="control-label" for="remember_me">Allow "Remember Me"? </label>
  	<input type="hidden" value="<?php echo e($view->id); ?>" name="settingid"/>
  <div>
  <div class="btn-group" data-toggle="buttons" role="group">
	  <label class="btn btn-outline btn-primary <?php echo e((($view->remember_me== 'ON')?'active': '')); ?>">
		<input type="radio" name="remember_me" autocomplete="off"  value="ON" >
		<i class="icon wb-check text-active" aria-hidden="true"></i>  ON
	  </label>
	  <label class="btn btn-outline btn-danger <?php echo e((($view->remember_me== 'OFF')?'active': '')); ?>">
		<input type="radio" name="remember_me" autocomplete="off" value="OFF" >
		<i class="icon wb-check text-active" aria-hidden="true"></i> OFF
	  </label>                     
	</div>
	</div>
</div>

<div class="form-group col-sm-6">
  <label class="control-label" for="forget_password">Forgot Password  </label>
  <div>
  <div class="btn-group" data-toggle="buttons" role="group">
	  <label class="btn btn-outline btn-primary  <?php echo e((($view->forget_password== 'ON')?'active': '')); ?>">
		<input type="radio" name="forget_password" autocomplete="off"  value="ON" >
		<i class="icon wb-check text-active" aria-hidden="true"></i>  ON
	  </label>
	  <label class="btn btn-outline btn-danger <?php echo e((($view->forget_password== 'OFF')?'active': '')); ?>">
		<input type="radio" name="forget_password" autocomplete="off" value="OFF" >
		<i class="icon wb-check text-active" aria-hidden="true"></i> OFF
	  </label>                     
	</div>
	</div>
</div>
</div>

<div class="row">	
  <div class="form-group col-sm-6">
  <label class="control-label" for="notify_signup">Notify Administrators when user signs up? </label>
  <div>
  <div class="btn-group" data-toggle="buttons" role="group">
	  <label class="btn btn-outline btn-primary  <?php echo e((($view->notify_signup== 'ON')?'active': '')); ?>">
		<input type="radio" name="notify_signup" autocomplete="off"  value="ON" >
		<i class="icon wb-check text-active" aria-hidden="true"></i>  ON
	  </label>
	  <label class="btn btn-outline btn-danger <?php echo e((($view->notify_signup== 'OFF')?'active': '')); ?>">
		<input type="radio" name="notify_signup" autocomplete="off" value="OFF" >
		<i class="icon wb-check text-active" aria-hidden="true"></i> OFF
	  </label>                     
	</div>
	</div>
</div>

<div class="form-group col-sm-6">
  <label class="control-label" for="re_capcha">Google reCAPTCHA </label>
  <div>
  <div class="btn-group" data-toggle="buttons" role="group">
	  <label class="btn btn-outline btn-primary <?php echo e((($view->re_capcha== 'ON')?'active': '')); ?>">
		<input type="radio" name="re_capcha" autocomplete="off"  value="ON" >
		<i class="icon wb-check text-active" aria-hidden="true"></i>  ON
	  </label>
	  <label class="btn btn-outline btn-danger <?php echo e((($view->re_capcha== 'OFF')?'active': '')); ?>">
		<input type="radio" name="re_capcha" autocomplete="off" value="OFF" >
		<i class="icon wb-check text-active" aria-hidden="true"></i> OFF
	  </label>                     
	</div>
	</div>
</div>
</div>
<div class="bs-example" data-example-id="single-button-dropdown">
<button type="submit" ng-disabled="userFormauth.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
	<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> <?php echo e(trans('app.update_authentication')); ?>

	<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
</button>
</div>
 </form>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<!----------------------start image tab--------------------------->
<div id="image" class="tab-pane fade">
<div class="col-lg-6">
<?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>				 
	<form role="form" action="<?php echo e(URL::to('SettingController/upload')); ?>/<?php echo e($view->id); ?>" method="post" enctype="multipart/form-data" novalidate="novalidate">
		  <?php echo e(csrf_field()); ?>		 
		  <div class="col-md-8" style="border:1px solid rgba(128, 128, 128, 0.08);; padding:15px; ">
			<div class="form-group" >
				<label class="example-title"><?php echo e(trans('app.choose_logo')); ?></label>
					<div class="fileupload fileupload-new" data-provides="fileupload" >
						<label id="class_userfile" class="error" for="userfile"></label>
						<!--<div class="fileupload-new " style="width: 200px; height: 150px;">
						<img src="">
						</div>-->
						<?php if(!empty($view->logo)): ?>											
						<img class="img-circle img-bordered img-bordered-orange fileupload-new " width="170" height="170" src="<?php echo e(URL::to('uploads')); ?>/<?php echo e($view->logo); ?> " alt="...">
						<?php else: ?>
							<img class="img-circle img-bordered img-bordered-orange fileupload-new " width="170" height="170" src="<?php echo e(URL::to('/images/default.png')); ?>" alt="...">					
						<?php endif; ?>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height:20px;"></div>
						<div>
						<span class="btn btn-light-grey btn-file"><span class="fileupload-new btn btn-default"><i class="fa fa-picture-o "></i> <?php echo e(trans('app.select_image')); ?> </span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> <?php echo e(trans('app.change')); ?></span>
						<input type="file" name="logo" class="userfile" id="uploadImage" onchange="PreviewImage();">
						
						</span>
						<a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
						<i class="fa fa-times"></i> <?php echo e(trans('app.remove')); ?>

						</a>
					  </div>															  
					</div>
				</div> 
			<div style="clear:both"></div>
		<button type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
			<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> <?php echo e(trans('app.update_settings')); ?>

			<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
		</div>		
	</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<!----------------------end image tab--------------------------->  
</div>
<div style="clear:both;"></div>
</div>
<!-- /.row -->
</div>
</div><br/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>