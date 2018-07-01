<?php $__env->startSection('content'); ?>
<style>
<style>
p.redcolor{color:red; font-size:16px;}
.spancolor{color:red;}
.help-block{color:red;}
</style>
</style>
<link rel="stylesheet" href="<?php echo e(URL::to('assets/css')); ?>/datepicker3.min.css" />
<script src="<?php echo e(URL::to('assets/js')); ?>/ui-bootstrap-tpls-0.11.0.js"></script>
<script src="<?php echo e(URL::to('assets')); ?>/croppie.js"></script>
  <link rel="stylesheet" href="<?php echo e(URL::to('assets')); ?>/croppie.css">
  
<div class="page-header">
  <h1 class="page-title font_kufi"><?php echo e(trans('app.update_details')); ?></h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li><a href="<?php echo e(URL::to('userlist')); ?>"><?php echo e(trans('app.users')); ?></a></li>
		<li><a href="<?php echo e(URL::to('show')); ?>/<?php echo e($userdata->id); ?>"><?php echo e($userdata->first_name); ?> <?php echo e($userdata->last_name); ?></a></li>
		<li class="active"><?php echo e(trans('app.edit')); ?></li>
	</ol>
  </div>
</div>
<div class="page-content" ng-app="app" ng-cloak>	
<div class="panel">
<div class="panel-body container-fluid">
<!------------------------start insert, update, delete message ---------------->
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
<ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
	<li class="active"><a class="overview" data-toggle="tab" href="#viewdata" title="View Area Data"><i class="glyphicon glyphicon-th"></i> <?php echo e(trans('app.details')); ?> </a></li>
	<li><a data-toggle="tab" href="#social_networks" title="Social Networks"><i class="fa fa-youtube"></i> <?php echo e(trans('app.social_networks')); ?> </a></li>
	<li><a data-toggle="tab" title="Auth" class="overview" href="#adddata"><i class="fa fa-lock"></i> <?php echo e(trans('app.authentication')); ?></a></li>
	<li><a data-toggle="tab" title="Image" class="overview" href="#image"><span class="glyphicon glyphicon-picture"></span> <?php echo e(trans('app.change_picture')); ?></a></li>
</ul>

<div style="clear:both;"></div><br>
<div class="tab-content">
<div id="viewdata" class="tab-pane fade in active">
<form  name="userFormmbasic" action="<?php echo e(URL::to('update',$userdata->id)); ?>"  method="POST" novalidate="">
<?php echo e(csrf_field()); ?>	
<div class="col-sm-12">
  <!-- Example Basic Form -->	              
		<div class="row">
		  <div class="form-group col-sm-6">
			<label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.first_name')); ?> <span class="spancolor">*</span> </label>
			<input type="text" class="form-control" id="first_name" ng-model="first_name" name="first_name" ng-init="first_name='<?php echo e($userdata->first_name); ?>'" placeholder="<?php echo e(trans('app.first_name')); ?>" required>
		  </div>
		  <div class="form-group col-sm-6">
			<label class="control-label" for="inputBasicLastName"><?php echo e(trans('app.last_name')); ?> <span class="spancolor">*</span> </label>
			<input type="text" class="form-control" id="last_name" name="last_name" ng-model="last_name" ng-init="last_name='<?php echo e($userdata->last_name); ?>'" placeholder="<?php echo e(trans('app.last_name')); ?>" required>
		  </div>
		</div>
		
		<div class="row">
		  <div class="form-group col-sm-6">
			<label class="control-label"><?php echo e(trans('app.select_role')); ?> <span class="spancolor">*</span></label>
			<select ng-model="role"  class="form-control" name="role" required ng-init="role = '<?php echo e($userdata->role); ?>'">
				<option value=""><?php echo e(trans('app.select_role')); ?> </option>	
				<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($view->name); ?>"><?php echo e($view->display_name); ?></option>	
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		  </div>		
		  
		  <div class="form-group col-sm-6">
			<label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.phone')); ?></label>
			<input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo e(trans('app.phone')); ?>" value="<?php echo e($userdata->phone); ?>" autocomplete="off">
		  </div>			  
		</div>
		<div class="row">			  
		  <div class="form-group col-sm-6">			  
		  <label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.date_of_birth')); ?></label>
			  <div class="input-group">
				<span class="input-group-addon">
				  <i class="icon wb-calendar" aria-hidden="true"></i>
				</span>
				<input type="text" class="form-control" name="date_of_birth" value="<?php echo e($userdata->date_of_birth); ?>" placeholder="<?php echo e(trans('app.date_of_birth')); ?>" data-plugin="datepicker">
			  </div>
			</div>			  
		  <div class="form-group col-sm-6">
			<label class="control-label"><?php echo e(trans('app.country')); ?> <span class="spancolor">*</span></label>
			<select ng-model="country"  class="form-control" name="country" required ng-init="country = '<?php echo e($userdata->country); ?>'">
				<option   value=""> <?php echo e(trans('app.select_country')); ?> </option>	
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
			  <label class="btn btn-outline btn-primary  <?php echo e((($userdata->status == 'Active')?'active': '')); ?>">
				<input type="radio" name="status" autocomplete="off"  value="Active">
				<i class="icon wb-check text-active" aria-hidden="true"></i>  <?php echo e(trans('app.active')); ?>

			  </label>
			  <label class="btn btn-outline btn-primary <?php echo e((($userdata->status == 'Inactive')?'active': '')); ?>">
				<input type="radio" name="status" autocomplete="off" value="Inactive" >
				<i class="icon wb-check text-active" aria-hidden="true"></i> <?php echo e(trans('app.inactive')); ?>

			  </label>                     
			</div>
			</div>
		  </div>
		  
		  <div class="form-group col-sm-6">
			<label class="control-label"><?php echo e(trans('app.gender')); ?></label>
			<div>
		  <div class="btn-group" data-toggle="buttons" role="group">
			  <label class="btn btn-outline btn-primary  <?php echo e((($userdata->gender == 'Male')?'active': '')); ?>">
				<input type="radio" name="gender" autocomplete="off"  value="Male">
				<i class="icon wb-check text-active" aria-hidden="true"></i>  <?php echo e(trans('app.male')); ?>

			  </label>
			  <label class="btn btn-outline btn-primary <?php echo e((($userdata->gender == 'Female')?'active': '')); ?>">
				<input type="radio" name="gender" autocomplete="off" value="Female" >
				<i class="icon wb-check text-active" aria-hidden="true"></i> <?php echo e(trans('app.female')); ?>

			  </label>                     
			</div>
			</div>
		  </div>	  
		</div>
		
		<div class="row">
			<div class="form-group col-sm-6">
			<label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.address')); ?></label>
			<textarea class="form-control" id="address" name="address" placeholder="Address" autocomplete="off"><?php echo e($userdata->address); ?></textarea>
			<!--<input type="text" class="form-control" id="address" name="address" value="<?php echo e($userdata->address); ?>" placeholder="<?php echo e(trans('app.address')); ?>" autocomplete="off">-->
		 </div>			
		  	  
		</div>	
	</div>
	
	<div style="clear:both"></div>
	<div class="form-group col-sm-6">
	<button ng-disabled="userFormmbasic.$invalid" type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"> 
		<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> <?php echo e(trans('app.update_profile_details')); ?>

		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
	</button>
	</div>
  
</form>
</div>

<!----------------- social networks ----------------->
<div id="social_networks" class="tab-pane fade">
<form  name="userFormm" action="<?php echo e(URL::to('update',$userdata->id)); ?>"  method="POST" novalidate="">
	<?php echo e(csrf_field()); ?>	
	<div class="col-md-12">
	<div class="row">
		<div class="form-group col-sm-6">			
			<label for="facebook"><i class="fa fa-google-plus"></i> Google</label>							
			<input type="text" class="form-control" id="google" name="google" placeholder="Google" value="<?php echo e($userdata->google); ?>">			
		</div>
		<div class="form-group col-sm-6">
			<label for="facebook"><i class="fa fa-facebook"></i> Facebook</label>							
			<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="<?php echo e($userdata->facebook); ?>">						
		</div>
	</div>
	<div class="row">
		<div class="form-group col-sm-6">
			<label for="twitter"> <i class="fa fa-twitter"></i> Twitter</label>			
			<input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter" value="<?php echo e($userdata->twitter); ?>">
			<input type="hidden" name="role" value="<?php echo e($userdata->role); ?>"/>
		</div>
		<div class="form-group col-sm-6">
				<label for="google_plus"><i class="fa fa-dribbble"></i> Dribbble</label>		
				<input type="text" class="form-control" id="dribbble" name="dribbble" placeholder="Dribbble" value="<?php echo e($userdata->dribbble); ?>">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-sm-6">
			<label for="google_plus"><i class="fa fa-linkedin"></i> Linkedin</label>		
			<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin" value="<?php echo e($userdata->linkedin); ?>">
		</div>
		<div class="form-group col-sm-6">
				<label for="google_plus"><i class="fa fa-skype"></i> Skype</label>		
				<input type="text" class="form-control" id="skype" name="skype" placeholder="Skype" value="<?php echo e($userdata->skype); ?>">
		</div>		
	</div>
	</div>
	<div style="clear:both"></div>
	<div class="form-group col-sm-6">
	<button ng-disabled="userFormm.$invalid" type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"> 
		<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> <?php echo e(trans('app.update_profile_details')); ?>

	<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
	</button>
	</div>
  
</form>
</div>


<!--------------------------- Auth update ------------------->
<div id="adddata" class="tab-pane fade">
<form name="userForm" id="userForm" ng-submit="submitForm(userForm.$valid)" action="<?php echo e(URL::to('authentication')); ?>/<?php echo e($userdata->id); ?>" method="post" novalidate="novalidate">
  <?php echo e(csrf_field()); ?>	
<div class="col-md-6">

<div class="form-group">
		  <label class="control-label" for="inputBasicEmail"><?php echo e(trans('app.email_address')); ?> <span class="spancolor">*</span></label>
		  <input type="email" class="form-control" ng-model="email" ng-init="email='<?php echo e($userdata->email); ?>'" required id="email" name="email" placeholder="<?php echo e(trans('app.email_address')); ?>" autocomplete="off">
		 <p class="help-block" ng-show="userForm.email.$error.email"> Not valid email!</p>
		 <?php if($errors->has('email')): ?>
		  <span class="help-block">
		   <strong><?php echo e($errors->first('email')); ?></strong>
		  </span>
		 <?php endif; ?>
		</div>
		 <div class="form-group">
		  <label class="control-label" for="username"><?php echo e(trans('app.username')); ?> <span class="spancolor">*</span></label>
		  <input type="text" class="form-control" id="username" ng-model="username" ng-init="username ='<?php echo e($userdata->username); ?>'" required  name="username" placeholder="<?php echo e(trans('app.username')); ?>" minlength="6" autocomplete="off">
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
		<div class="bs-example" data-example-id="single-button-dropdown">
	<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
		<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> <?php echo e(trans('app.update_auth_details')); ?>

		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
	</button>
</div>
</div>

</form>
</div>

<!----------------------start image tab--------------------------->
<div id="image" class="tab-pane fade">
<div class="col-lg-6">
<!-----------image crop------->
	
	<div class="panel panel-default">	
	  <div class="panel-body">
			<div id="upload-demo-i" style="background:#a8aeb1; border-radius:7px; width:300px;padding:30px;height:300px;">
			<?php if(!empty($userdata->image)): ?>
					<img src="<?php echo e(URL::to('uploads')); ?>/<?php echo e($userdata->image); ?>">						
					<?php else: ?>
						<?php if($userdata->gender == 'Female'): ?>
							<img src="<?php echo e(URL::to('images/female.png')); ?>">							
						<?php else: ?>
							<img src="<?php echo e(URL::to('images/default.png')); ?>">						  
						<?php endif; ?>							
					<?php endif; ?>						
			
			<!--<img src="uploads/1479725799.PNG"/>-->
			<div style="clear:both;"></div><br/>
			 <button type="button"  class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-camera"></i>
			Change Photo  </button>
			</div>
	  </div>
	</div>
	<br/>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
	  		<div class="col-md-4 text-center">
				<div id="upload-demo" style="width:350px"></div>
	  		</div><br/>
			<div style="clear:both;"></div>
	  		<div class="col-md-12" id="uploadimage">
				<strong><i class="fa fa-upload"></i> <?php echo e(trans('app.select_image')); ?> <input type="file" id="upload"></strong>			
	  		</div>
			<div style="clear:both;"></div>
	  		
			<div class="col-md-10" id="saveCancenimage" style="display:none;">				
				<div class="col-md-8">				
				<button class="btn btn-primary upload-result"><i class="fa fa-upload" aria-hidden="true"></i> <?php echo e(trans('app.update_picture')); ?></button>
				<button class="btn btn-danger pull-right cancelbutton" id="cancelbutton"><?php echo e(trans('app.remove')); ?></button>
				</div>
				
	  		</div>
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
        </div>
      </div>
      
    </div>
  </div>
<!-----------end image crop------->	
<!----------------------end image tab--------------------------->
</div>
<!-- /.row -->
</div>
</div>
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div><br/>
<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
			//alert(123);
			$("#uploadimage").hide();
			$("#saveCancenimage").show();
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			//url: "<?php echo e(URL::to('upload')); ?>/<?php echo e($userdata->id); ?>",
			url: "<?php echo e(URL::to('upload')); ?>/<?php echo e($userdata->id); ?>",
			 //data: {_token: CSRF_TOKEN},
			type: "POST",
			data: {"image":resp, '_token': CSRF_TOKEN},
			success: function (data) {
				console.log(data);
				html = '<img src="' + resp + '" />';
				$("#upload-demo-i").html(html);
			}
		});
	});
});

$(document).ready(function(){	
	$("#cancelbutton").click(function(){
		//console.log(123);
		$("#uploadimage").show();
		$("#saveCancenimage").hide();
		$('.cr-image').attr('src', '');
	});
	$(".upload-result").click(function(){
		setTimeout(function () { 
		location.reload(1); 
		//setInterval(auto_refresh, 3000);
		}, 3000);
	});
});
//("#cancelbutton")
</script>

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