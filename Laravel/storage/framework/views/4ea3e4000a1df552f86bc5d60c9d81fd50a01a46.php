
<?php $__env->startSection('title'); ?>
<?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(Auth::check() && !Auth::user()->hasRole("klant")): ?>
<p>je bent ingeloged</p>
<?php else: ?>
<a href="<?php echo e(route('bestelling.index')); ?>" class="p-2 h-10 text-lg text-gray-700 dark:text-gray-500 ">Mijn Bestelling</a>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\School\leer jaar 2\Project4\l2project4\Laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>