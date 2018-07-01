<!-- nav-tabs -->
<ul class="site-sidebar-nav nav nav-tabs nav-justified nav-tabs-line" data-plugin="nav-tabs"
role="tablist">
  <li class="active" role="presentation">
    <a data-toggle="tab" href="#sidebar-userlist" title="<?php echo e(trans('app.users')); ?>" role="tab">
     <i class="icon wb-user" aria-hidden="true"></i>
    </a>
  </li>
  <li role="presentation">
    <a data-toggle="tab" title="<?php echo e(trans('app.activity')); ?>" href="#sidebar-activity" role="tab">
      
	   <i class="fa fa-list-alt fa-fw"></i>
    </a>
  </li>
  <li role="presentation">
    <a data-toggle="tab" title="<?php echo e(trans('app.settings')); ?>"  href="#sidebar-setting" role="tab">
      <i class="icon wb-settings" aria-hidden="true"></i>
    </a>
  </li>
</ul>

<div class="site-sidebar-tab-content tab-content">
<!-------------- sart sidebar register users --------------------->
  <div class="tab-pane fade active in" id="sidebar-userlist">
    <div>
      <div>
        <h5 class="clearfix"> <?php echo e(trans('app.recent_registered_users')); ?>  </h5>
       
        <div class="list-group">
		
         <?php $__currentLoopData = $sidebarusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		  <a class="list-group-item" href="<?php echo e(URL::to('/dashboard/scouts/accounts/show/')); ?>/<?php echo e($value->id); ?>" data-toggle="show-chat">
            <div class="media">
              <div class="media-left">
                <div class="avatar avatar-sm avatar-away">
					<?php if(!$value->image): ?>
						<img src="<?php echo e(URL::to('/images')); ?>/default.png" alt="..." />						
					<?php else: ?>
						<img src="<?php echo e(URL::to('/uploads')); ?>/<?php echo e($value->image); ?>" alt="..." />
					<?php endif; ?>
                  <i></i>
                </div>
              </div>
              <div class="media-body">
                <h4 class="media-heading"><?php echo e($value->first_name); ?> <?php echo e($value->last_name); ?></h4>
               <small><time><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->diffForHumans()); ?></time></small>
              </div>
            </div>
          </a>
		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
		<div class="list-group">
			<a class="list-group-item" href="<?php echo e(URL::to('/dashboard/scouts/accounts/')); ?>" style="background-color: #f3f7f9; border-top: 1px solid #e4eaec;">
				<div class="media">
				<div class="media-left">
					 <i class="icon wb-users" aria-hidden="true"></i>
				  </div>
				  <div class="media-body">
					<h4 class="media-heading"><?php echo e(trans('app.see_all_users')); ?> </h4>
				  </div>
				</div>
			  </a>
		</div>
		
              
      </div>
    </div>
  </div>
<!----------------------- end sidebar register user --------------------->
  
<!----------------------- Start sidebar activity --------------------->
  <div class="tab-pane fade" id="sidebar-activity">
    <div>
      <div>
        <h5><?php echo e(trans('app.recent_activity')); ?></h5>
        <ul class="timeline timeline-icon timeline-single timeline-simple timeline-feed">
         <?php $__currentLoopData = $sidebaractivity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <li class="timeline-item">
            <div class="timeline-dot bg-pink-600">
			<div class="avatar avatar-sm avatar-away">
              <img src="<?php echo e(URL::to('/uploads')); ?>/<?php echo e($value->image); ?>" alt="..." />
			  </div>
            </div>
			<div class="media-body">
                 <h4 class="media-heading"><?php echo e($value->first_name); ?> <?php echo e($value->last_name); ?></h4>
				   <small><time><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->diffForHumans()); ?></time></small>
				  <p><?php echo e($value->description); ?></p>
              </div>           
          </li>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	

        </ul>
<div class="list-group">
			<a class="list-group-item" href="<?php echo e(URL::to('/dashboard/activity/')); ?>" style="background-color: #f3f7f9; border-top: 1px solid #e4eaec;">
				<div class="media">
				<div class="media-left">
					 <i class="icon wb-chat" aria-hidden="true"></i>
				  </div>
				  <div class="media-body">
					<h4 class="media-heading"><?php echo e(trans('app.see_all_activity')); ?> </h4>
				  </div>
				</div>
			  </a>
		</div>		
      </div>
    </div>
  </div>
<!----------------------- end sidebar activity --------------------->

  <div class="tab-pane fade" id="sidebar-setting">
    <div>
      <div>
        <h5><?php echo e(trans('app.general_settings')); ?> </h5>
        <ul class="list-group">
          
		  <li class="list-group-item">
            <div class="pull-right margin-top-5">
             <p><?php echo e($sidebarsettings->app_title); ?></p>
            </div>
            <h5><?php echo e(trans('app.app_title')); ?></h5>            
          </li>
		  
		  <li class="list-group-item">
            <div class="pull-right margin-top-5">
             <p><?php echo e($sidebarsettings->app_name); ?></p>
            </div>
            <h5><?php echo e(trans('app.app_name')); ?></h5>            
          </li>
		  <li class="list-group-item">
            <div class="pull-right margin-top-5">
             <p><?php echo e($sidebarsettings->phone); ?></p>
            </div>
            <h5><?php echo e(trans('app.phone')); ?></h5>            
          </li>
		  
		  <li class="list-group-item">
            <div class="pull-right margin-top-5">
             <p><?php echo e($sidebarsettings->mobile); ?></p>
            </div>
            <h5><?php echo e(trans('app.mobile')); ?></h5>            
          </li>
          
        </ul>
      </div>
    </div>
  </div>  
<!----------------------- End sidebar general setting --------------------->
</div>
