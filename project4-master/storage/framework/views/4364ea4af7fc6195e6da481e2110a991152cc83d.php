
<?php $__env->startSection('pagetitle','Login'); ?>
<?php $__env->startSection('content'); ?>

<!--left section with pizzas-->
<div class="container grid sm:grid-cols-4 grid-col-1 grid-row-5 gap-x-5 ">
    <div class="sm:col-span-3 w-full">
        <div class="w-full">
            <?php if($message = Session::get('error')): ?>
            <div class="p-4 mb-3 bg-yellow-400 rounded">
                <p class="text-green-800"><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
            <div class="text-left">
                <h1 class="font-sans text-5xl text h-14">Pizza menu</h1>
            </div>
            <div class="relative h-full grid grid-cols-2 gap-x-5">
                <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="h-52">
                    <div class="h-full">
                        <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="w-1/3 bg-cover flex items-center"><a href="<?php echo e(route('guest.show',$pizza->id)); ?>"><img src="img/pizza_home_page_background.png" alt="" /></a></div>
                            <div class="w-2/3 p-2">
                                <h1 class="text-gray-900 font-bold text-2xl"><?php echo e($pizza->name); ?></h1>
                                <p class="mt-2 text-gray-600 text-sm"><?php echo e($pizza->description); ?></p>
                                <select class="rounded w-full">
                                    <option value="(25)cm">(25)cm NY style</option>
                                    <option value="(30)cm">(30)cm NY style</option>
                                    <option value="(35)cm">(35)cm NY style</option>
                                </select>
                                <div class="flex item-center justify-between mt-3">
                                    <h1 class="text-gray-700 font-bold text-xl">€</h1>
                                    <form action="<?php echo e(route('cart.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($pizza->id); ?>" />
                                        <input type="hidden" name="name" value="<?php echo e($pizza->name); ?>" />
                                        <input type="hidden" name="price" value="12.42" />
                                        <input type="hidden" name="quantity" value="1" />
                                        <input type="submit" class="px-3 py-2 bg-green-300 text-white text-xs font-bold uppercase rounded" value="Add to Card" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>


    <!--right section pizza cart-->
    <div class="hidden sm:block rounded bg-white shadow-lg p-2 min-h-screen">
        <div class="h-full h-80 ">
            <div class="p-2">
                <h1 class="text-gray-900 font-bold text-2xl"> Bestelling</h1>
            </div>
            <div>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="">
                    <div class="px-2 mt-3 flex justify-between">
                        <h1 class="text-gray-500 font-bold text-xl"><?php echo e($item->quantity); ?> X PIZZA <?php echo e($item->name); ?></h1>
                        <h1 class="text-gray-500 font-bold text-xl">€<?php echo e($item->price); ?></h1>
                    </div>
                    <div>
                        <form action="<?php echo e(route('guest.destroy',$item->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="hidden" value="<?php echo e($item->id); ?>" name="id">
                            <button class="px-6 py-1 text-white bg-gray-600 rounded">verwijderen</button>
                        </form>
                    </div>
                    <div>
                        <p class="mt-3 text-gray-600 text-base">(25)cm ny style</p>
                    </div>
                    <div></div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="px-2 mt-16 flex justify-between">
                    <h1 class="text-gray-700 font-bold text-xl"> TOTAAL</h1>
                    <h1 class="text-gray-700 font-bold text-xl">€ $<?php echo e(Cart::getTotal()); ?></h1>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="<?php echo e(route('guest.create')); ?>" class="px-3 py-2 bg-green-300 text-white text-xs font-bold uppercase rounded">Volgende </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\School\leer jaar 2\Project4\l2project4\project4-master\resources\views/guest/index.blade.php ENDPATH**/ ?>