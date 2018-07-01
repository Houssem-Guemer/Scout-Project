<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/filament-tablesaw/tablesaw.css">
<div class="page-header">
  <h1 class="page-title font_kufi"><?php echo e(trans('app.permissions')); ?></h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li class="active"><?php echo e(trans('app.permission')); ?></li>
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
<div class="row">
<div class="col-lg-12">
<ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
	<li class="active" role="presentation"><a data-toggle="tab" href="#createpermission" aria-controls="activities" role="tab" aria-expanded="true"><i class="icon wb-lock" aria-hidden="true"></i> <?php echo e(trans('app.create_permission')); ?></a></li>
	<li role="presentation" class=""><a data-toggle="tab" href="#addpermission" aria-controls="profile" role="tab" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> <?php echo e(trans('app.add_permission')); ?></a></li>
</ul>

<div class="tab-content">
<div id="createpermission" class="tab-pane fade in active">
<form action="<?php echo e(URL::to('/dashboard/permissions/attach')); ?>" method="post" novalidate="">
<?php echo e(csrf_field()); ?>

<table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
<thead>
	<tr>
	<th data-tablesaw-priority="4" class="tablesaw-priority-4 tablesaw-cell-visible"><?php echo e(trans('app.name')); ?></th>
	<?php $i = 5; ?>
	<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<th class="text-center" data-tablesaw-priority="<?php echo e($i++); ?>"><?php echo e($role->display_name); ?></th>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<th class="text-center" data-tablesaw-priority="1"><?php echo e(trans('app.actions')); ?></th>
	</tr></thead>
<tbody>
<?php $j = 5; ?>
<?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
	<td class="tablesaw-priority-4 tablesaw-cell-visible"><?php echo e($view->display_name); ?></td>
	 <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<td class="text-center" class="tablesaw-priority-<?php echo e($j++); ?>">
		<div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
             <?php echo Form::checkbox("roles[{$role->id}][]", $view->id, $role->hasPermission($view->name)); ?>

              <label for="inputCheckbox"></label>
            </div>
			
		</td>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	<td class="text-center" class="tablesaw-priority-1">
		<a href="<?php echo e(URL::to('PermissionController/edit')); ?>/<?php echo e($view->id); ?>" class="btn btn-icon btn-info btn-outline btn-round" title="<?php echo e(trans('app.edit')); ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('app.edit')); ?>">
			<i class="icon wb-pencil" aria-hidden="true"></i>
		</a>
		 <button data-placement="top" data-original-title="<?php echo e(trans('app.delete')); ?>" rel="tooltip" title="<?php echo e(trans('app.delete')); ?>"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical" data-toggle="modal" type="button" data-href="<?php echo e(URL::to('PermissionController/destroy')); ?>/<?php echo e($view->id); ?>"><i class="icon fa-remove" aria-hidden="true"></i></button>
		
	  </td>
   </tr>		   
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		 
</tbody>
</table>
<div style="clear:both;"></div><br/>
<button type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"> 
<i class="fa fa-save"></i> <?php echo e(trans('app.save_permissions')); ?> 
<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
</button>	
</form>
<div style="clear:both;"></div>
</div>
<div id="addpermission" class="tab-pane fade"><br/>
<form name="userForm" action="permissions" method="post" novalidate="">
<?php echo e(csrf_field()); ?>

<div class="col-md-6">
<div class="form-group">
<label class="control-label"><?php echo e(trans('app.permission_name')); ?></label>
	<input type="text" class="form-control" ng-model="name" id="name" name="name" placeholder="Permission Name" required>
</div>

<div class="form-group">
	<label class="control-label"><?php echo e(trans('app.display_name')); ?></label>
	<input type="text" class="form-control" ng-model="display_name" id="display_name" name="display_name" placeholder="Display Name" required>
</div>
<div class="form-group">
	<label class="control-label"><?php echo e(trans('app.description')); ?></label>
	<textarea name="description"  ng-model="description" id="description" class="form-control"></textarea>
</div>


<div class="bs-example" data-example-id="single-button-dropdown">
<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
 <i class="fa fa-save"></i> <?php echo e(trans('app.create_permission')); ?>

 <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
</button>

</div>
</div>	



</form>
</div>
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
</div>
</div>
</div><br/>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>