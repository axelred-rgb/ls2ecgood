
<?php $__env->startSection('content'); ?>
    <table class="order-details">
        <thead>
        <tr>
            <th class="product"><?php echo e(tt('Désignation')); ?></th>
            <th class="price"><?php echo e(tt('Prix unitaire')); ?></th>
            <th class="price"><?php echo e(tt('Réduction')); ?></th>
            <?php if($paiement->getNbremonth() == 0): ?>
                <th class="quantity"><?php echo e(tt('Détails')); ?></th>
            <?php else: ?>
                <th class="quantity"><?php echo e(tt('Durée')); ?></th>
            <?php endif; ?>
            <th class="quantity"><?php echo e(tt('Prix')); ?></th>

        </tr>
        </thead>
        <tbody>
        <?php if($paiement->getCountry() == 'France'): ?>
            <tr>

                <td><?php echo e($paiement->getMotif()); ?></td>
                <td><?php echo e($priceunitmois); ?></td>
                <td><?php echo e($paiement->getReduction()); ?>%</td>
                <?php if($paiement->getNbremonth() == 0): ?>
                    <td><?php echo e($paiement->getDetails()); ?></td>
                <?php else: ?>
                    <td><?php echo e($paiement->getNbremonth()); ?> mois</td>
                <?php endif; ?>
                <td><?php echo e($paiement->getPrice()); ?> €</td>
            </tr>

            </tbody>
            <tfoot>
                <tr class="no-borders">
                    <td class="no-borders">
                        <div class="customer-notes">
                        </div>
                    </td>
                    <td class="no-borders">
                        <div class="customer-notes">
                        </div>
                    </td>
                    <td class="no-borders">
                        <div class="customer-notes">
                        </div>
                    </td>
                    <td class="no-borders" colspan="2">
                        <table class="totals">
                            <tfoot>
                            <tr class="cart_subtotal">
                                <td class="no-borders"></td>
                                <td class="no-borders"></td>
                                <td class="no-borders"></td>
                                <th class="description"><?php echo e(tt("Total HT")); ?></th>
                                <td class="price"><span class="totals-price"><span class="amount"><?php echo e($paiement->getPrice()); ?> €</span></span></td>
                            </tr>
                            <tr class="cart_subtotal">
                                <td class="no-borders"></td>
                                <td class="no-borders"></td>
                                <td class="no-borders"></td>
                                <th class="description"><?php echo e(tt("TVA")); ?> (20%)</th>
                                <td class="price"><span class="totals-price"><span class="amount"><?php echo e($paiement->getTva()); ?> €</span></span></td>
                            </tr>
                            <tr class="order_total">
                                <td class="no-borders"></td>
                                <td class="no-borders"></td>
                                <td class="no-borders"></td>
                                <th class="description"><?php echo e(tt("Total TTC")); ?></th>
                                <td class="price"><span class="totals-price"><span class="amount"><?php echo e($paiement->getMontant()); ?> €</span></span></td>
                            </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
            </tfoot>
        <?php else: ?>
            <tr>

                <td><?php echo e($paiement->getMotif()); ?></td>
                <?php $priceee = $paiement->getUnitprice('check')*1.2;?>
                <td><?php echo e($priceee); ?>  €</td>
                <td><?php echo e($paiement->getReduction()); ?>%</td>
                <?php if($paiement->getNbremonth() == 0): ?>
                    <td><?php echo e($paiement->getDetails()); ?></td>
                <?php else: ?>
                    <td><?php echo e($paiement->getNbremonth()); ?> mois</td>
                <?php endif; ?>
                <td><?php echo e($paiement->getPrice() + $paiement->getTva()); ?> €</td>
            </tr>

            </tbody>
            <tfoot>
                <tr class="no-borders">
                    <td class="no-borders">
                        <div class="customer-notes">
                        </div>
                    </td>
                    <td class="no-borders">
                        <div class="customer-notes">
                        </div>
                    </td>
                    <td class="no-borders">
                        <div class="customer-notes">
                        </div>
                    </td>
                    <td class="no-borders" colspan="2">
                        <table class="totals">
                            <tfoot>
                                <tr class="order_total">
                                    <td class="no-borders"></td>
                                    <td class="no-borders"></td>
                                    <td class="no-borders"></td>
                                    <th class="description"><?php echo e(tt("Total TTC")); ?></th>
                                    <td class="price"><span class="totals-price"><span class="amount"><?php echo e($paiement->getMontant()); ?> €</span></span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
            </tfoot>
        <?php endif; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layoutfacture', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/layout/facturecours.blade.php ENDPATH**/ ?>