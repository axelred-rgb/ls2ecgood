
<?php $__env->startSection('content'); ?>
    <table class="order-details">
        <thead>
            <tr>
                <th class="product"><?php echo e(tt('Désignation')); ?></th>
                <th class="price"><?php echo e(tt('Session')); ?></th>
                <th class="quantity"><?php echo e(tt('Montant')); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e($designation); ?></td>
                <td><?php echo e($session); ?></td>
                <td><?php echo e($montant); ?> €2</td>
            </tr>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layoutfacturesortie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/layout/factureaffiliation.blade.php ENDPATH**/ ?>