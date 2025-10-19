
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-payments" role="tabpanel" aria-labelledby="pills-payments-tab">

        <h4 class="box-title mb-0">
            <?php echo tt("My Resources"); ?>
        </h4>
        <hr>


        <!-- Tab panes -->

        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th><?php echo tt("Product"); ?></th>
                    <th><?php echo tt("Download"); ?></th>
                    <th><?php echo tt("Date"); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $ressources = Productpaiement::where('paiement.user_id',App::$user->GetId())->get();
                    ?>
                    <?php $__currentLoopData = array_reverse($ressources); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($r->getProduct()->getName()); ?></td>
                            <td>
                                <?php echo $r->getProduct()->showDocument(); ?>

                            </td>
                            <td><?php $a='this.created_at';?><?php echo e($r->$a); ?></td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $paiements = array_reverse(App::$myressources); ?>
                    <?php $__currentLoopData = $paiements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php if(isset($reference)): ?>
                                <?php if(App::$user->getRole() == 2 || App::$user->getRole() == 3): ?>
                                    <td><?php echo e($paiement->getUser()->getFirstname()); ?> <?php echo e($paiement->getUser()->getLastname()); ?></td>
                                <?php endif; ?>
                            <?php endif; ?>
                            <td><?php echo e($paiement->getMotif()); ?></td>
                            <td>
                                <?php echo $paiement->getProduct()->showDocument(); ?>


                            </td>
                            <td><?php $a='this.created_at';?><?php echo e($paiement->$a); ?></td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/myresources.blade.php ENDPATH**/ ?>