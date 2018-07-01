<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/examples/css/pages/profile.css">
<div class="page-header">
  <h1 class="page-title font_kufi"><?php echo e(trans('app.profile_details')); ?></h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li class="active"><?php echo e($userdata->first_name); ?> <?php echo e($userdata->last_name); ?></li>
	</ol>
  </div>
</div>

<div class="page-content container-fluid page-profile">
  <div class="row">
	<div class="col-md-3">
	  <!-- Page Widget -->
	  <div class="widget widget-shadow text-center">
		<div class="widget-header">
		  <div class="widget-header-content">
			<a class="avatar avatar-lg" href="javascript:void(0)">
			<?php if(!empty($userdata->image)): ?>
				<img class="img-responsive img-circle" src="<?php echo e(URL::to('uploads')); ?>/<?php echo e($userdata->image); ?>" width="170" height="170"  />
			<?php else: ?>
				<?php if($userdata->gender == 'Female'): ?>
					<img class="img-responsive img-circle" src="<?php echo e(URL::to('images/female.png')); ?>" width="170" height="170"  />	
				<?php else: ?>
				<img class="img-responsive img-circle" src="<?php echo e(URL::to('images/default.png')); ?>" width="170" height="170"  />
				<?php endif; ?>
			<?php endif; ?>
			</a>
			<h4 class="profile-user"><?php echo e($userdata->first_name); ?> <?php echo e($userdata->last_name); ?></h4>
		   <p class="profile-job"><?php echo e(trans('app.role')); ?> - <?php echo e($userdata->role); ?></p>               
			<div class="profile-social">
			   <a class="icon bd-google-plus" target="_blank" href="<?php echo e($userdata->google); ?>"></a>
			  <a class="icon bd-facebook" target="_blank" href="<?php echo e($userdata->facebook); ?>"></a>			 
			  <a class="icon bd-twitter" target="_blank" href="<?php echo e($userdata->twitter); ?>"></a>
			  <a class="icon bd-dribbble" target="_blank" href="<?php echo e($userdata->dribbble); ?>"></a>
			  <a class="icon bd-linkedin" target="_blank" href="<?php echo e($userdata->linkedin); ?>"></a>
			 
			</div>
		  </div>
		</div>
		
	  </div>
	  <!-- End Page Widget -->
	</div>
	
	
	<div class="col-md-9">
	  <!-- Panel -->
	  <div class="panel">
		<div class="panel-body nav-tabs-animate nav-tabs-horizontal">
		<!------------------------start insert, update, delete message ---------------->
			<div class="col-lg-12">
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
			<a class="btn btn-icon btn-info btn-outline btn-round pull-right" href="<?php echo e(URL::to('profileEdit')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(trans('app.edit_user')); ?>" ><i class="icon wb-pencil" aria-hidden="true"></i> </a>
				
		  <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
			<li class="" role="presentation"><a data-toggle="tab" href="#activities" aria-controls="activities" role="tab" aria-expanded="false">Activities </a></li>
			<li role="presentation" class=""><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-expanded="false">Profile</a></li>
			<li role="presentation"><a data-toggle="tab" href="#messages" aria-controls="messages" role="tab" aria-expanded="true"><?php echo e(trans('app.message')); ?> <?php if(!empty($messagecount)): ?><span class="badge badge-danger"><?php echo e($messagecount); ?></span><?php endif; ?> </a></li>
			<li class="dropdown" role="presentation" style="display: none;">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
				<span class="caret"></span>Menu </a>
			  <ul class="dropdown-menu" role="menu">
				<li role="presentation" style="display: none;"><a data-toggle="tab" href="#activities" aria-controls="activities" role="tab">Activities <span class="badge label-danger">5</span></a></li>
				<li role="presentation" style="display: none;"><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab">Profile</a></li>
				<li role="presentation"><a data-toggle="tab" href="#messages" aria-controls="messages" role="tab">Messages</a></li>
			  </ul>
			</li>
		  </ul>
		  <div class="tab-content">
<!------------- Activity tab ------------->
			<div class="tab-pane animation-slide-left" id="activities" role="tabpanel">
			  <table class="table table-hover table-details">
				<thead>
					<tr>
						<th><?php echo e(trans('app.ip_address')); ?></th>
						<th><?php echo e(trans('app.message')); ?></th>
						<th><?php echo e(trans('app.log_time')); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $useractivity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($value->ip_address); ?></td>
						<td><?php echo e($value->description); ?></td>
						<td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->diffForHumans()); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 </tbody>
			</table>
			 <?php echo e($useractivity->appends(Request::only('search'))->links()); ?>

			</div>
			
<!------- Profile tab------------->
			<div class="tab-pane animation-slide-left" id="profile" role="tabpanel">
			<table class="table table-hover table-details">
				<thead>
					<tr>
						<th rowspan="4"><?php echo e(trans('app.contact_informations')); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo e(trans('app.email')); ?></td>
						<td><a href="#"><?php echo e($userdata->email); ?></a></td>
					</tr>  
					<tr>
						<td><?php echo e(trans('app.username')); ?></td>
						<td><a href="#"><?php echo e($userdata->username); ?></a></td>
					</tr>                        
				 </tbody>
			</table>
			<p style="border-bottom:1px dashed green;"></p>

			<table class="table table-hover dataTable table-striped width-full dtr-inline">
				<thead>
				<tr>
					<th rowspan="4"><?php echo e(trans('app.additional_informations')); ?></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td><?php echo e(trans('app.country')); ?></td>
					<td><?php echo e($userdata->country); ?></td>
				</tr>
				<tr>
					<td><?php echo e(trans('app.gender')); ?></td>
					<td><?php echo e($userdata->gender); ?></td>
				</tr>
				<tr>
					<td><?php echo e(trans('app.phone')); ?></td>
					<td><?php echo e($userdata->phone); ?></td>
				</tr>
				
				
				<tr>
					<td><?php echo e(trans('app.date_of_birth')); ?></td>
					<td><?php echo e($userdata->date_of_birth); ?></td>
				</tr>
				<tr>
					<td><?php echo e(trans('app.status')); ?></td>
					<td><?php echo e($userdata->status); ?></td>
				</tr>
				<tr>
					<td><?php echo e(trans('app.address')); ?></td>
					<td><?php echo e($userdata->address); ?></td>
				</tr>
				
				</tbody>
			</table>
			</div>
			
<!------- Message tab------------->
			<div class="tab-pane animation-slide-left " id="messages" role="tabpanel">
			 <ul class="list-group">
				<?php $__currentLoopData = $receivemessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
				<li class="list-group-item">
			 
				 <div class="media">
					<div class="media-left">
					  <a class="avatar" href="<?php echo e(URL::to('/inboxDetails')); ?>/<?php echo e($view->id); ?>/<?php echo e($view->replay_id ? $view->replay_id : $view->id); ?>">
						<img class="img-responsive" src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($view->receiveMessage->image); ?>" alt="...">
					  </a>
					</div>
					<!--<?php echo e(print_r($receivemessage)); ?>-->
					
					<div class="media-body">
					<a href="<?php echo e(URL::to('/inboxDetails')); ?>/<?php echo e($view->id); ?>/<?php echo e($view->replay_id ? $view->replay_id : $view->id); ?>">
					  <h4 class="media-heading"><?php echo e($view->receiveMessage->first_name); ?> <?php echo e($view->receiveMessage->last_name); ?>

					  </a>
						
					  </h4>
					  <small><?php echo e($view->updated_at); ?></small>
					  <div class="profile-brief">
					  <?php if($view->status == 0): ?>
			<span class="label label-round label-info"><?php echo e(trans('app.new')); ?></span>
			<?php endif; ?>
			  <?php echo e(((!empty($view->subject))? $view->subject : trans('app.replay_message'))); ?>

					  
					  </div>
					</div>
					
					
				  </div>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
			  </ul>
   <?php echo e($receivemessage->appends(Request::only('search'))->links()); ?>

			</div>
		  </div>
		</div>
	  </div>
	  <!-- End Panel -->
	</div>
  </div>
</div><br/>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>