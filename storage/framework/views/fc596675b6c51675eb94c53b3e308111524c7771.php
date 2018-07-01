<?php $__env->startSection('content'); ?> 
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/jt-timepicker/jquery-timepicker.css">
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/examples/css/forms/advanced.css">

<style>
p.redcolor{color:red; font-size:16px;}
.spancolor{color:red;}
.help-block{color:red;}
</style>

<div class="page-header">
  <h1 class="page-title font_kufi"><?php echo e(trans('app.create_new_user')); ?></h1>
  <div class="page-header-actions">
  <ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li><a href="<?php echo e(URL::to('userlist')); ?>"><?php echo e(trans('app.users')); ?></a></li>
		<li class="active"><?php echo e(trans('app.create')); ?></li>
	</ol>
  </div>
</div>
	
<div class="page-content" ng-app="app" ng-cloak>	
<div class="panel">
<div class="panel-body container-fluid">
<!------------------------start insert, update, delete message  ---------------->
<div class="row">
<?php if(session('msg_success')): ?>
	<div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_success')); ?>

	</div>
<?php endif; ?>
<?php if(session('msg_update')): ?>
	<div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_update')); ?>

	</div>
<?php endif; ?>
<?php if(session('msg_delete')): ?>
	<div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_delete')); ?>

	</div>
<?php endif; ?>
</div>
<form  name="userForm" action="<?php echo e(URL::to('store')); ?>" ng-submit="submitForm(userForm.$valid)" novalidate  id="demo-form2" data-parsley-validate="" method="post" novalidate="">
		<?php echo e(csrf_field()); ?>

<div class="row row-lg">
	<div class="col-sm-8" style="border-right: 1px dotted #ddd;">
	  <!-- Example Basic Form -->	              
			<div class="row">
			<div class="col-sm-12">
			<p class="font-size-20 blue-grey-700">User Details</p>
			</div>
			  <div class="form-group col-sm-6">
				<label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.first_name')); ?><span class="spancolor">*</span> </label>
				<input type="text" class="form-control" id="first_name" ng-model="first_name" name="first_name" ng-init="first_name='<?php echo e(old('first_name')); ?>'" placeholder="<?php echo e(trans('app.first_name')); ?>" required>
			  </div>
			  <div class="form-group col-sm-6">
				<label class="control-label" for="inputBasicLastName"><?php echo e(trans('app.last_name')); ?><span class="spancolor">*</span> </label>
				<input type="text" class="form-control" id="last_name" name="last_name" ng-model="last_name" ng-init="last_name='<?php echo e(old('last_name')); ?>'" placeholder="<?php echo e(trans('app.last_name')); ?>" required>
			  </div>
			</div>
			
			<div class="row">			  
			  
			 <div class="form-group col-sm-6">
				<label class="control-label"><?php echo e(trans('app.select_role')); ?> <span class="text-danger">*</span></label>
				<select ng-model="role"  class="form-control" name="role" required ng-init="role = '<?php echo e(old('role')); ?>'">
					<option value=""><?php echo e(trans('app.select_role')); ?> </option>	
					<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($view->name); ?>"><?php echo e($view->display_name); ?></option>	
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			  </div>
			  <div class="form-group col-sm-6">
				<label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.phone')); ?></label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo e(trans('app.phone')); ?>" value="<?php echo e(old('phone')); ?>" autocomplete="off">
			  </div>			  
			</div>
			<div class="row">			  
			  <div class="form-group col-sm-6">			  
			  <label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.date_of_birth')); ?></label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>" placeholder="<?php echo e(trans('app.date_of_birth')); ?>" data-plugin="datepicker">
                  </div>
                </div>			  
			  <div class="form-group col-sm-6">
				<label class="control-label"><?php echo e(trans('app.country')); ?> <span class="spancolor">*</span></label>
				<select ng-model="country"  class="form-control" name="country" required ng-init="country = '<?php echo e(old('country')); ?>'">
					<option value=""><?php echo e(trans('app.select_country')); ?> </option>	
					<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($data->nicename); ?>"><?php echo e($data->nicename); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			  </div>			  
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
				<label class="control-label"><?php echo e(trans('app.status')); ?></label>
			  <div>
			  <div class="btn-group" data-toggle="buttons" role="group">
				  <label class="btn btn-outline btn-primary  <?php echo e(((old('status')== 'Active')?'active': '')); ?> <?php echo e((empty(old('status'))?'active': '')); ?>">
					<input type="radio" name="status" autocomplete="off"  value="Active"  checked="">
					<i class="icon wb-check text-active" aria-hidden="true"></i>  <?php echo e(trans('app.active')); ?>

				  </label>
				  <label class="btn btn-outline btn-primary <?php echo e(((old('status')== 'Inactive')?'active': '')); ?>">
					<input type="radio" name="status" autocomplete="off" value="Inactive" <?php echo e(((old('status') == 'Inactive')?'checked' : '')); ?> >
					<i class="icon wb-check text-active" aria-hidden="true"></i> <?php echo e(trans('app.inactive')); ?>

				  </label>                     
				</div>
				</div>					
			  </div>
			  
			  
				<div class="form-group col-sm-6">
				<label class="control-label"><?php echo e(trans('app.gender')); ?></label>
			  <div>
			  <div class="btn-group" data-toggle="buttons" role="group">
				  <label class="btn btn-outline btn-primary  <?php echo e(((old('gender')== 'Male')?'active': '')); ?> <?php echo e((empty(old('gender'))?'active': '')); ?>">
					<input type="radio" name="gender" autocomplete="off"  value="Male"  checked="">
					<i class="icon wb-check text-active" aria-hidden="true"></i>  <?php echo e(trans('app.male')); ?>

				  </label>
				  <label class="btn btn-outline btn-primary <?php echo e(((old('gender')== 'Female')?'active': '')); ?>">
					<input type="radio" name="gender" autocomplete="off" value="Female" <?php echo e(((old('gender') == 'Female')?'checked' : '')); ?> >
					<i class="icon wb-check text-active" aria-hidden="true"></i> <?php echo e(trans('app.female')); ?>

				  </label>                     
				</div>
				</div>
					
			  </div>
			  
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
				<label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.address')); ?></label>
				<textarea class="form-control" id="address" name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(trans('app.address')); ?>" autocomplete="off"></textarea>
				<!--<input type="text" class="form-control" id="address" name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(trans('app.address')); ?>" autocomplete="off">-->
			 </div>
			  
			</div>
	  
	</div>
	<div class="col-sm-4">
	  <!-- Example Basic Form Without Label -->
	      <div class="col-sm-12 row">
			<p class="font-size-20 blue-grey-700">Login Details</p>
			</div>          
		<div class="form-group">
		  <label class="control-label" for="inputBasicEmail"><?php echo e(trans('app.email_address')); ?> <span class="spancolor">*</span></label>
		  <input type="email" class="form-control" ng-model="email" ng-init="email='<?php echo e(old('email')); ?>'" required id="email" name="email" placeholder="<?php echo e(trans('app.email_address')); ?>" autocomplete="off">
		 <p class="help-block" ng-show="userForm.email.$error.email"> Not valid email!</p>
		 <?php if($errors->has('email')): ?>
		  <span class="help-block">
		   <strong><?php echo e($errors->first('email')); ?></strong>
		  </span>
		 <?php endif; ?>
		</div>
		 <div class="form-group">
		  <label class="control-label" for="username"><?php echo e(trans('app.username')); ?> <span class="spancolor">*</span></label>
		  <input type="text" class="form-control" id="username" ng-model="username" ng-init="username='<?php echo e(old('username')); ?>'" required  name="username" placeholder="<?php echo e(trans('app.username')); ?>" minlength="6" autocomplete="off">
			<p ng-show="userForm.username.$error.minlength" class="help-block">Minimum 6 character</p>
			<?php if($errors->has('username')): ?>
		  <span class="help-block">
		   <strong><?php echo e($errors->first('username')); ?></strong>
		  </span>
		 <?php endif; ?>
		</div>
		
		<div class="form-group">
		<label class="control-label" for="inputBasicPassword"> <?php echo e(trans('app.password')); ?> <span class="spancolor">*</span></label>
			<input type="password" class="form-control"  ng-model="password" placeholder="<?php echo e(trans('app.password')); ?>" name="password" required="required" ng-init="password = '<?php echo e(old('password')); ?>'" ng-minlength="6"/>
			<div ng-if="userForm.password.$touched || userForm">                    
				<p ng-show="userForm.password.$error.minlength" class="help-block">Minimum 6 character</p>
			</div>
		</div>
		<div class="form-group">
		<label class="control-label" for="inputBasicPassword"><?php echo e(trans('app.confirm_password')); ?> <span class="spancolor">*</span></label>
			<input type="password" class="form-control"  name="confirm_password" ng-model="confirm_password" ng-init="confirm_password = '<?php echo e(old('confirm_password')); ?>'" placeholder="<?php echo e(trans('app.confirm_password')); ?>" match-password="password" required >
			<div ng-if="userForm.confirm_password.$touched || userForm">                    
				<p ng-show="userForm.confirm_password.$error.matchPassword && !userForm.confirm_password.$error.required" class="help-block">Confirm password didn't match</p>
			</div>
		</div>
			
	</div>
	<div style="clear:both"></div>
	<div class="form-group col-sm-6">
	<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
			<i class="fa fa-save"></i>  <?php echo e(trans('app.create_an_account')); ?>

		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
	
	</div>
  </div>
</form> 
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div><br/>
		
<script>
var app = angular.module('app', []);

app.directive("matchPassword", function () {
    return {
        require: "ngModel",
        scope: {
            otherModelValue: "=matchPassword"
        },
        link: function(scope, element, attributes, ngModel) {

            ngModel.$validators.matchPassword = function(modelValue) {
                return modelValue == scope.otherModelValue;
            };

            scope.$watch("otherModelValue", function() {
                ngModel.$validate();
            });
        }
    };
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>