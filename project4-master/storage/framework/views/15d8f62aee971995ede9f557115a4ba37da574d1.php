
<?php $__env->startSection('pagetitle','Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="py-10 px-20 flex justify-between">
    <div class="bg-gray-100 dark:bg-slate-800 p-4 rounded-3xl w-1/4 px-6 text-lg">
        <h2 class=" text-3xl text-center">Basis gegevens</h2>

        <div class="mt-4">
            <span class="font-bold">Naam:</span> <br>
        </div>

        <div class="mt-4">
            <span class="font-bold">E-mailadres:</span> <br>
        </div>

        <div class="mt-4">
            <span class="font-bold">Adres:</span> <br>
        </div>

        <div class="mt-4">
            <span class="font-bold">Postcode:</span> <br>
        </div>

        <div class="mt-4">
            <span class="font-bold">Status:</span> <br>
        </div>

        <div class="mt-4">
            <span class="font-bold">Opmerking:</span> <br>
        </div>
    </div>

    <div class="w-4/6">
        <table class="w-full mt-4 text-left">
            <thead>
                <tr>
                    <th>Afbeelding</th>
                    <th>Pizza</th>
                    <th>Aantal</th>
                    <th>Prijs</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b-2 border-t-2 border-yellow-500 border-opacity-40">
                    <td class="py-2"><img src="img/pizza_home_page_background.png" alt="" class="mx-auto" ></td>
                    <td class="text-yellow-500 font-bold py-2">
                        <div class="mb-2"></div>
                        <span class="bg-yellow-400 text-base text-black font-bold px-3 py-1 rounded-3xl mr-1 mb-2 inline-block">
                           </span>
                       
                    </td>
                    <td class="py-2"></td>
                    <td class="py-2"></td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-between items-center">
            <div>
                
            </div>

            <div class="text-right mt-4">
                <span class="font-bold">Totaal</span>
                <h1 class="text-4xl font-extrabold"></h1>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\School\leer jaar 2\Project4\l2project4\project4-master\resources\views/guest/bestellingKlant.blade.php ENDPATH**/ ?>