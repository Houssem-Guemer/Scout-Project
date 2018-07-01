<?php $__env->startSection('content'); ?>
<div class="page-header">
  <h1 class="page-title font_kufi"><?php echo e(trans('app.language_update')); ?>	</h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
	   <li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li><a href="<?php echo e(URL::to('language')); ?>"><?php echo e(trans('app.language')); ?></a></li>
		<li class="active"><?php echo e($foldername); ?></li>
	</ol>
  </div>
</div>

 <div class="page-content" ng-app="">	
<div class="panel">
<div class="panel-body container-fluid">
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

<form  name="userForm" action="<?php echo e(URL::to('LanguageController/update/lang')); ?>" ng-submit="submitForm(userForm.$valid)" novalidate  id="demo-form2" data-parsley-validate="" action="store" class="form-horizontal form-label-left" method="post" novalidate="">
	<?php echo e(csrf_field()); ?>	
<div class="col-lg-12"> 
	   <table class="table table-striped">
		<thead> 
			<tr> 							
				<th style="width:50%"><?php echo e(trans('app.index_name')); ?> </th>
				<th style="width:50%"><?php echo e(trans('app.change_able')); ?> </th>							
			</tr> 
		</thead>
		<tbody> 
		<?php $__currentLoopData = $language_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr> 							 
				<td><?php echo e($key); ?></td>							
				<td>
					<input type="hidden" name="language_key[]" class="form-control" value="<?php echo e($key); ?>"/>
					<input type="text" name="language_value[]" class="form-control" value="<?php echo e($value); ?>"/>							
				</td> 							
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="hidden" value="<?php echo e($foldername); ?>" name="foldername"/>
		</tbody>		
	</table>
	<button type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"> 
	<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> <?php echo e(trans('app.language_update')); ?> </button>
	<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
  </div>
			<!------------------ user authentication ------------------>	
</form>
<div style="clear:both;"></div>
</div>
<!-- /.row -->
</div>
</div><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>