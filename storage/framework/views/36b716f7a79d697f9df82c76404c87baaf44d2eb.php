<?php $__env->startSection('content'); ?>
<style>
canvas{
	width: 95% !important;
	max-width: 100%;
	height: auto !important;
}
</style>
<div class="page-content padding-20 container-fluid">
<!------------------------------ Start Alert message--------------->
<div class="alert alert-primary alert-dismissible alertDismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span>
  </button>
 <?php echo e(trans('app.welcome')); ?>  <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?> !
</div>
<!-------------------------------- End alert message--------------->
	
<!-------------------------------- start second step graph--------------->
<div class="row">
<div class="col-md-12">
<div class="widget widget-shadow widget-responsive">
<h3 class="panel-title"><?php echo e(trans('app.user_activity_last_3_weeks')); ?></h3>

<canvas id="buyers" width="990" height="400"></canvas>       
<script>
	// line chart data
	var buyerData = {				
		labels : [<?php foreach($todayvisitor as $view){ echo '"'.$view['datet'].'",'; } ?>],		
		datasets : [
		{
			fillColor : "rgba(172,194,132,0.4)",
			strokeColor : "#ACC26D",
			pointColor : "#fff",
			pointStrokeColor : "#9DB86D",
			data : [<?php foreach($todayvisitor as $view){ echo (($view['countdata'])?$view['countdata']."," : "0,"); } ?>]
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

</div>
 <!-------------------------------- end second step graph---------------> 		
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>