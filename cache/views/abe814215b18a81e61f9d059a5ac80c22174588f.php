
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-payments" role="tabpanel" aria-labelledby="pills-payments-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("All payments"); ?>
        </h4>
        <hr>


        <!-- Tab panes -->

        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th><?php echo tt("Souscription"); ?></th>
                    <th><?php echo tt("Montant"); ?></th>
                    <th><?php echo tt("Reduction"); ?></th>
                    <th><?php echo tt("Code promo"); ?></th>
                    <?php if(App::$user->getRole() == 2 || App::$user->getRole() == -2): ?>
                        <th><?php echo tt("User"); ?></th>
                    <?php endif; ?>
                    <th><?php echo tt("Date"); ?></th>
                    <th><?php echo tt("Date expiration"); ?></th>
                    <th><?php echo tt("Invoice"); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $paiements = array_reverse(Paiement::select('*')->whereIsNull("this.product_id")->__getAll());

                ?>
                <?php $__currentLoopData = $paiements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $typepaiement = 'subscription';?>
                    <?php if($paiement->getNbremonth() == 0): ?>
                            <?php $typepaiement = 'produit';?>
                    <?php endif; ?>
                    <tr>
                        <td><?php echo e($paiement->getMotif()); ?></td>
                        <td><?php echo e($paiement->getMontant()); ?> €</td>
                        <td><?php echo e($paiement->getReduction()); ?>%</td>
                        <td><?php echo e($paiement->getCodepromo()); ?></td>

                        <?php if(App::$user->getRole() == 2 || App::$user->getRole() == -2): ?>
                            <td><?php echo e($paiement->getUser()->getFirstname()); ?> <?php echo e($paiement->getUser()->getLastname()); ?></td>
                        <?php endif; ?>
                        <td><?php $a='this.created_at';?><?php echo e($paiement->$a); ?></td>
                        <td>
                            <?php
                            $your_date = strtotime($paiement->$a);
                            $effectiveDate = date('Y-m-d', strtotime("+" . $paiement->getNbremonth() . " months", $your_date));?>
                            <?php echo e($effectiveDate); ?>

                        </td>
                        <td>
                            <?php if($typepaiement == 'subscription'): ?>
                                <a class="btn btn-sm btn-success" href="<?php echo e(route('invoice')); ?>?id=<?php echo e($paiement->getId()); ?>"  id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-download"></i></a><br>

                                <a target="__blank" href="<?php echo e(__front); ?>document/formulaire_retractation.pdf"><?php echo tt('Formulaire de retractation'); ?></a><br>
                                <a target="__blank" href="<?php echo e(__front); ?>document/CGV.pdf"><?php echo tt('CGV LS2EC'); ?></a>
                            <?php else: ?>
                                <a class="btn btn-sm btn-success" href="<?php echo e(route('invoiceproduct')); ?>?id=<?php echo e($paiement->getId()); ?>"  id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-download"></i></a><br>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/allpayments.blade.php ENDPATH**/ ?>