
<?php $__env->startSection('pagetitle','Login'); ?>
<?php $__env->startSection('content'); ?>

<?php if($message = Session::get('success')): ?>
<div class="p-4 mb-3 bg-green-400 rounded">
    <p class="text-green-800"><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php echo e($item->user->name); ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="mt-5">
    <form action="<?php echo e(route('cart.status')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="submit" class="px-6 py-2 text-white bg-green-300" value="Bestelling plaatsen" />
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\School\leer jaar 2\Project4\l2project4\project4-master\resources\views/store/pizza.blade.php ENDPATH**/ ?>