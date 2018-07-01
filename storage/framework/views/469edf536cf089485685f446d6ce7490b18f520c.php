<?php $__env->startSection('content'); ?>
    <h1><?php echo e($post->title); ?></h1>
    <p><?php echo e($post->data); ?></p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>