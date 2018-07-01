<?php $__env->startSection('content'); ?>
<div class="page-content padding-20 container-fluid">
<style>
@media  screen and (max-width: 1200px) {
    .clearbothsub{
	clear:both !important;
	}
	.clearbothmain{
	width:100% !important;
	}
}
canvas{
        width: 95% !important;
        max-width: 100%;
        height: auto !important;
    }
</style>
<!------------------------------ Start Alert message--------------->
<div class="alert alert-primary alert-dismissible alertDismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span>
  </button>
	<?php echo e(trans('app.welcome')); ?>  <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?> !
</div>
<!-------------------------------- End alert message--------------->
				
<!-------------------------------- Start first step graph--------------->
<div class="row" data-plugin="matchHeight" data-by-row="true">
<!-- First Row -->
<div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
  <div class="widget widget-shadow">
	<div class="widget-content bg-white padding-20">
	  <button type="button" class="btn btn-floating btn-sm btn-primary">
		<i class="icon wb-users" aria-hidden="true"></i>
	  </button>
	  <span class="margin-left-15 font-weight-400 example-title"><?php echo e(trans('app.total_users')); ?></span>
	  <div class="content-text text-center margin-bottom-0">
		<i class="text-danger icon wb-triangle-up font-size-20">
				  </i>
		<span class="font-size-40 font-weight-100"><?php echo e($totaluser); ?></span>
		<p class="blue-grey-400 font-weight-100 margin-0"><?php echo e(trans('app.total_redistered_users')); ?></p>
	  </div>
	</div>
  </div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
  <div class="widget widget-shadow">
	<div class="widget-content bg-white padding-20">
	  <button type="button" class="btn btn-floating btn-sm btn-primary">
		<i class="icon wb-user-add" aria-hidden="true"></i>
	  </button>
	  <span class="margin-left-15 font-weight-400 example-title"> <?php echo e(trans('app.new_users')); ?></span>
	  <div class="content-text text-center margin-bottom-0">
		<i class="text-danger icon wb-triangle-up font-size-20">
				  </i>
		<span class="font-size-40 font-weight-100"><?php echo e($newuser); ?></span>
		<p class="blue-grey-400 font-weight-100 margin-0"><?php echo e(trans('app.new_users_this_month')); ?></p>
	  </div>
	</div>
  </div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
  <div class="widget widget-shadow">
	<div class="widget-content bg-white padding-20">
	  <button type="button" class="btn btn-floating btn-sm btn-primary">
		<i class="icon wb-eye"></i>
	  </button>
	  <span class="margin-left-15 font-weight-400 example-title"><?php echo e(trans('app.visitors')); ?></span>
	  <div class="content-text text-center margin-bottom-0">
		<i class="text-danger icon wb-triangle-up font-size-20">
				  </i>
		<span class="font-size-40 font-weight-100"><?php echo e($monthvisitor); ?></span>
		<p class="blue-grey-400 font-weight-100 margin-0"><?php echo e(trans('app.this_month_visitors')); ?></p>
	  </div>
	</div>
  </div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
  <div class="widget widget-shadow">
	<div class="widget-content bg-white padding-20">
	  <button type="button" class="btn btn-floating btn-sm btn-primary">
		<i class="icon wb-calendar" aria-hidden="true"></i>
	  </button>
	  <span class="margin-left-15 font-weight-400 example-title"><?php echo e(trans('app.visitors')); ?></span>
	  <div class="content-text text-center margin-bottom-0">
		<i class="text-danger icon wb-triangle-up font-size-20">
				  </i>
		<span class="font-size-40 font-weight-100"><?php echo e($todayvisitor); ?></span>
		<p class="blue-grey-400 font-weight-100 margin-0"><?php echo e(trans('app.today_visitors')); ?></p>
	  </div>
	</div>
  </div>
</div>
<!-- End First Row -->
</div>
<!-------------------------------- end first step graph--------------->
<!-------------------------------- start second step graph--------------->
<div class="row">
<div class="col-md-8 clearbothmain" >
<div class="widget widget-shadow widget-responsive">
<h3 class="panel-title"><?php echo e(trans('app.new_registration_history')); ?></h3>

<canvas id="buyers" width="580" height="350px" ></canvas>      
<?php $a=0; $b=0; $c=0; $d=0; $e=0; $f=0; $g=0; $h=0; $i = 0;$j= 0; $k=0; $l=0; ?> 
<script>
	// line chart data
	var buyerData = {
		labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
		datasets : [
		{
			fillColor : "rgba(172,194,132,0.4)",
			strokeColor : "#ACC26D",
			pointColor : "#fff",
			pointStrokeColor : "#9DB86D",
			data : [<?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '01'): ?><?php echo e($value->count); ?> <?php ($a += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($a)): ?><?php echo e($a); ?> <?php endif; ?>,
			<?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '02'): ?> <?php echo e($value->count); ?>  <?php ($b += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($b)): ?><?php echo e($b); ?> <?php endif; ?>,
			<?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '03'): ?> <?php echo e($value->count); ?>  <?php ($c += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($c)): ?><?php echo e($c); ?> <?php endif; ?>,
			<?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '04'): ?> <?php echo e($value->count); ?>  <?php ($d += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($d)): ?><?php echo e($d); ?> <?php endif; ?>,
            <?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '05'): ?> <?php echo e($value->count); ?>  <?php ($e += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($e)): ?><?php echo e($e); ?> <?php endif; ?>,
            <?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '06'): ?> <?php echo e($value->count); ?>  <?php ($f += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($f)): ?><?php echo e($f); ?> <?php endif; ?>,
            <?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '07'): ?> <?php echo e($value->count); ?>  <?php ($g += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($g)): ?><?php echo e($g); ?> <?php endif; ?>,
            <?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '08'): ?> <?php echo e($value->count); ?>  <?php ($h += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($h)): ?><?php echo e($h); ?> <?php endif; ?>,
            <?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '09'): ?> <?php echo e($value->count); ?>  <?php ($i += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($i)): ?><?php echo e($i); ?> <?php endif; ?>,
            <?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '10'): ?> <?php echo e($value->count); ?>  <?php ($j += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($j)): ?><?php echo e($j); ?> <?php endif; ?>,
            <?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '11'): ?> <?php echo e($value->count); ?>  <?php ($k += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($k)): ?><?php echo e($k); ?> <?php endif; ?>,
            <?php $__currentLoopData = $graphregister; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($value->month == '12'): ?> <?php echo e($value->count); ?>  <?php ($l += $value->count); ?> <?php endif; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(empty($l)): ?><?php echo e($l); ?> <?php endif; ?>,
			]
		}
	]
	}
	// get line chart canvas
	var buyers = document.getElementById('buyers').getContext('2d');
	// draw line chart
	new Chart(buyers).Line(buyerData);
	// pie chart data
	var pieData = [
		{
			value: 20,
			color:"#878BB6"
		},		
		{
			value : 40,
			color : "#4ACAB4"
		},
		{
			value : 10,
			color : "#FF8153"
		},
		{
			value : 30,
			color : "#FFEA88"
		}
	];
	// pie chart options
	var pieOptions = {
		 segmentShowStroke : false,
		 animateScale : true
	}          
   
	//new Chart(income).Bar(barData);
</script>
</div>

</div>
<div class="col-lg-4 clearbothsub">
<div class="widget widget-shadow widget-responsive" style="height: 420px;">
  <!-- Panel Followers -->
  <div class="panel" id="followers">
	<div class="panel-heading">
	<h3 class="panel-title">
		<?php echo e(trans('app.latest_registrations')); ?> <a href="<?php echo e(URL::to('/dashboard/scouts/accounts')); ?>" class="pull-right"><button class="btn btn-outline btn-primary btn-round btn-xs"><?php echo e(trans('app.view_all')); ?></button> </a>
	  </h3>
	</div>
	<div class="panel-body">
	  <ul class="list-group list-group-dividered list-group-full">
		<?php $__currentLoopData = $recentuser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li class="list-group-item">
		  <div class="media">
			<div class="media-left">
			  <a class="avatar <?php echo e(Auth::user()->id == $value->id ? 'avatar-online' : 'avatar-away'); ?> " href="<?php echo e(URL::to('/dashboard/scouts/accounts/show')); ?>/<?php echo e($value->id); ?>">
			    <?php if(!$value->image): ?>				 
					<img src="<?php echo e(URL::to('/images')); ?>/default.png" alt="">
			    <?php else: ?>
					<img src="<?php echo e(URL::to('/uploads')); ?>/<?php echo e($value->image); ?>" alt="">
				 <?php endif; ?>
				<i></i>
			  </a>
			</div>
			
			<div class="media-body">
			  <div class="pull-right">
				<em class="badge">
			      <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->diffForHumans()); ?>

		     </em>
			  </div>
			  <div>
				<a href="<?php echo e(URL::to('/dashboard/scouts/accounts/show')); ?>/<?php echo e($value->id); ?>"><span><strong><?php echo e($value->first_name); ?> <?php echo e($value->last_name); ?></strong></span></a>
			  </div>			  
			</div>
		  </div>
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
	  </ul>	 
	</div>
  </div>
  <!-- End Panel Followers -->
</div>
</div>
</div>
 <!-------------------------------- end second step graph---------------> 		
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>