<html lang="en">

<head>
</head>
<?php echo $__env->make('layouts/parts.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="">
    <?php echo $__env->make('layouts/parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('layouts/parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\School\leer jaar 2\Project4\l2project4\project4-master\resources\views/layouts/master.blade.php ENDPATH**/ ?>