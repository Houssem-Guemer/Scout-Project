<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {padding: 5px;}
</style>
<table style="width:100%">
  <thead>
	<tr>
	  <th><?php echo e(trans('app.first_name')); ?> <?php echo e(trans('app.last_name')); ?></th>
	  <th><?php echo e(trans('app.username')); ?></th>
	  <th><?php echo e(trans('app.email')); ?></th>
	  <th><?php echo e(trans('app.country')); ?></th>
	  <th><?php echo e(trans('app.phone')); ?></th>
	  <th><?php echo e(trans('app.register_date')); ?></th>
	</tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $userdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
	  <td><?php echo e($view->first_name); ?> <?php echo e($view->last_name); ?></td>
	  <td><?php echo e($view->username); ?></td>
	  <td><?php echo e($view->email); ?></td>
	  <td><?php echo e($view->country); ?></td>
	  <td><?php echo e($view->phone); ?></td>
	  <td><?php echo e($view->created_at); ?></td>
	  
	  
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>


