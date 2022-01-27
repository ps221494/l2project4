<div>
    <?php if($message = Session::get('success')): ?>
    <div class="p-4 mb-3 bg-green-400 rounded">
        <p class="text-green-800"><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <h3 class="text-3xl text-bold">

        Total <?php echo e(Cart::getTotalQuantity()); ?> Cart
    </h3>
    <div class="flex-1">
        <table class="w-full text-sm lg:text-base" cellspacing="0">
            <thead>
                <tr class="h-12 uppercase">
                    <th class="hidden md:table-cell"></th>
                    <th class="text-left">Name</th>
                    <th class="pl-5 text-left lg:text-right lg:pl-0">
                        <span class="lg:hidden" title="Quantity">Qtd</span>
                        <span class="hidden lg:inline">Quantity</span>
                    </th>
                    <th class="hidden text-right md:table-cell"> price</th>
                    <th class="hidden text-right md:table-cell"> Remove </th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="hidden pb-4 md:table-cell">
                        <a href="#">
                            <img src="img/pizza.png" alt="" class="w-20 rounded" alt="Thumbnail">
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <p class="mb-2 md:ml-4"><?php echo e($item['name']); ?></p>
                        </a>
                    </td>
                    <td class="justify-center mt-6 md:justify-end md:flex">
                        <div class="h-10 w-28">
                            <div class="relative flex flex-row w-full h-8">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cart-update', ['item' => $item])->html();
} elseif ($_instance->childHasBeenRendered($item['id'])) {
    $componentId = $_instance->getRenderedChildComponentId($item['id']);
    $componentTag = $_instance->getRenderedChildComponentTagName($item['id']);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($item['id']);
} else {
    $response = \Livewire\Livewire::mount('cart-update', ['item' => $item]);
    $html = $response->html();
    $_instance->logRenderedChild($item['id'], $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>
                        </div>
                    </td>
                    <td class="hidden text-right md:table-cell">
                        <span class="text-sm font-medium lg:text-base">
                            $<?php echo e($item['price']); ?>

                        </span>
                    </td>
                    <td class="hidden text-right md:table-cell">
                        <a href="#" class="px-4 py-2 text-white bg-red-600" wire:click.prevent="removeCart('<?php echo e($item['id']); ?>')">x</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <div>
            Total: $<?php echo e(Cart::getTotal()); ?>

        </div>
        <div class="mt-5">
            <a href="/" class="px-6 py-2 text-white bg-green-300">Back to shop</a>
        </div>
        <div class="mt-5">
            <form action="<?php echo e(route('cart.pizza')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="submit" class="px-6 py-2 text-white bg-green-300" value="Bestelling plaatsen" />
            </form>
        </div>

    </div>
</div><?php /**PATH C:\School\leer jaar 2\Project4\l2project4\project4-master\resources\views/livewire/cart-list.blade.php ENDPATH**/ ?>