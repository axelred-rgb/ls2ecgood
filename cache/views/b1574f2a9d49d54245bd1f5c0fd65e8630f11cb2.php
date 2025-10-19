
<?php $__env->startSection('content'); ?>
<table class="order-details" style="width: 100%!important;">
    <thead>
    <tr>
        <th style="width: 33%!important;" class="product"><?php echo e(tt('Désignation')); ?></th>
        <th style="width: 33%!important;" class="price"><?php echo e(tt('Quantite')); ?></th>
        <th style="width: 33%!important;" class="price"><?php echo e(tt('Prix')); ?> </th>
    </thead>
    <tbody>
    <?php if($paiement->getProduct()->getId()): ?>
        <tr>
            <td><?php echo e($paiement->getMotif()); ?></td>
            <td>1</td>
            <td><?php echo e($paiement->getProduct()->getPriceofsale()); ?> €</td>

        </tr>
    <?php else: ?>
    <?php $productpaiements = Productpaiement::where('this.paiement_id',$paiement->getId())->get();?>
        <?php $__currentLoopData = $productpaiements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($p->getProduct()->getName()); ?></td>
                <td>1</td>
                <td><?php echo e($p->getProduct()->getPriceofsale()); ?> €</td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

        <tr>
            <th  class="description" colspan="2" style="text-align: center">
                <?php echo e(tt("Total HT")); ?>

            </td>
            <td > <?php echo e($price); ?> €</td>
        </tr>
        <tr>
            <th  class="description" colspan="2"  style="text-align: center">
                <?php echo e(tt("TVA")); ?> (20%)
            </td>
            <td> <?php echo e($tva); ?> €</td>
        </tr>
        <tr>
            <th  class="description" colspan="2"  style="text-align: center">
                <?php echo e(tt("Total TTC")); ?>

            </th>
            <td > <?php echo e($ttc); ?> €</td>
        </tr>

    </tbody>

</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layoutfacture', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/layout/facture.blade.php ENDPATH**/ ?>