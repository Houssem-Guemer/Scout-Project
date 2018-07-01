<?php $__env->startSection('content'); ?>
<?php if(count($posts) > 0): ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="well">
            <h3><a href="/viewPost/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h3>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($posts->links()); ?>

<?php else: ?>
    no posts
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>