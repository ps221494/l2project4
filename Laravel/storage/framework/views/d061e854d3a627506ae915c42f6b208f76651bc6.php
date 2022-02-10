
<?php $__env->startSection('pagetitle','Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex container w-full sm:-mx-6 mb-20 mt-4">
    <div class="w-full text-center">
        <h3>Bedankt dat u bij ons heeft besteled, hier onder kunt u de detail van u bestelling zien</h3>
        <p>de voortgang van de bereiding van de pizza kan zijn:</p>
        <h4>Ontvangen, Voorbereiden, In de oven, Bezorger onderweg</h4>
    </div>

</div>

<?php if($message = Session::get('error')): ?>
<div class="p-4 mb-3 bg-yellow-400 container text-center w-full rounded">
    <p class="text-green-800"><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<div class="flex flex-col container">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <h4 class="py-4">Bestelling detail</h4>
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Quantity
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Size
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                price
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $order->orderdetial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo e($detail->pizza->pname); ?>

                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <?php echo e($detail->quantity); ?>

                            </td>

                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <?php echo e($detail->size); ?>

                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <?php echo e($detail->status); ?>

                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <?php echo e($detail->pizza->amount); ?>

                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                <form method="POST" action="<?php echo e(route('bestelling.destroy',$detail->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <input type="submit" class="px-3 py-2 bg-yellow-300 text-white text-xs font-bold uppercase rounded" value="Delete" />
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container mt-20">
    <div class="bg-gray-200 h-16 flex items-center rounded-lg">
        <h4 class="px-2">Customer Details</h4>
    </div>
    <div class="shadow border-b p-2 rounded-lg">
        <p>Name: <?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?> </p>
        <p>Adress: <?php echo e($customer->address); ?></p>
        <p>postcode: <?php echo e($customer->zipcode); ?></p>
        <p>city: <?php echo e($customer->city); ?></p>
        <p>phone: <?php echo e($customer->phone); ?> </p>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\School\leer jaar 2\Project4\l2project4\Laravel\resources\views/guest/track.blade.php ENDPATH**/ ?>