
<?php $__env->startSection('pagetitle','Login'); ?>
<?php $__env->startSection('content'); ?>

<div class="container px-6 mx-auto h-screen">
    
    <div class="flex justify-center my-6">
        
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <?php if($message = Session::get('success')): ?>
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800"><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
            <?php if($message = Session::get('error')): ?>
            <div class="p-4 mb-3 bg-yellow-400 rounded">
                <p class="text-green-800"><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
            <h3 class="text-3xl text-bold">Cart List</h3>
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Name</th>
                            <th class="pl-5 text-left lg:text-left lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                            </th>
                            <th class="hidden text-left md:table-cell"> Update</th>
                            <th class="hidden text-right md:table-cell"> Remove </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                    <img src="img/pizza_home_page_background.png" alt="" class="w-20 rounded" alt="Thumbnail">
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    <p class="mb-2 md:ml-4"><?php echo e($item->name); ?></p>

                                </a>
                            </td>
                            <form action="<?php echo e(route('cart.update')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <td class="justify-center mt-6  md:flex">
                                    <div class="h-10 w-28">
                                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                        <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>" class="w-16 rounded" />
                                    </div>
                                </td>
                                <td class=" text-left">
                                    <div class="h-10 w-28">
                                        <button type="submit" class="rounded px-4 py-2  text-white bg-blue-500">update</button>
                                    </div>
                                </td>
                            </form>
                            <td class="hidden text-right md:table-cell">
                                <form action="<?php echo e(route('cart.remove')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($item->id); ?>" name="id">
                                    <button class="px-4 py-2 text-white bg-red-600 rounded">x</button>
                                </form>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
                <div>
                    Total: $<?php echo e(Cart::getTotal()); ?>

                </div>
                <div>
                    <div class="py-4">
                        <a href="guest" class="px-6 py-2 text-white bg-yellow-400 rounded">Back To Shop</a>
                    </div>
                </div>
                <div>
                    <div class="py-4">
                        <a href="<?php echo e(route('guest.create')); ?>" class="px-3 py-2 bg-green-300 text-white text-xs font-bold uppercase rounded">Volgende </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\School\leer jaar 2\Project4\l2project4\project4-master\resources\views/cart.blade.php ENDPATH**/ ?>