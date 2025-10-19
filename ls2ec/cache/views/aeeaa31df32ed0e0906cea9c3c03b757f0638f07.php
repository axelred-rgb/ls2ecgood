<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("Purshase Tokens"); ?>
        </h4>
        <hr>
        
        <div class="bg-img box box-body py-50" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white"><?php echo tt("Purchase Tokens"); ?></h1>
                <div class="message"></div>		
            </div>
            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token"> 
                <div class="form-group col-xl-5 col-lg-5 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                    <select class="form-select" id="pack" style="width: 100%;" name="packtoken">
                        <option selected="selected" disabled><?php echo tt("Tokens"); ?></option>
                        <?php $__currentLoopData = $packTokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packToken): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($packToken->id); ?>"><?php echo e($packToken->nombre); ?> <?php echo tt("Tokens"); ?>  (<?php echo e($packToken->prix); ?>€) </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select> 
                </div>
                <div class="form-group col-xl-5 col-lg-4 col-12 mb-lg-0 mb-5 bg-white"> 
                    <input type="number" name="quantity" class="form-control input-lg b-0 be-1 border-light rounded-0" min="1" placeholder="<?php echo tt('quantity'); ?>">
                    <input type="hidden" name="user" value="<?php echo App::$user->getId(); ?>">
                </div>
                <div class="col-xl-2 col-lg-3 col-12 mb-0"> 
                    <button onclick="app.buyToken(this)"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Purchase"); ?></button> 
                </div>
            </div>
            
        </div>


        <h4 class="box-title mb-0">
            <?php echo tt("My purchases"); ?>
        </h4>
        <hr>
        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th><?php echo tt("Date"); ?></th>
                    <th><?php echo tt("Pack"); ?></th>
                    <th><?php echo tt("Unit price"); ?></th>
                    <th><?php echo tt("Quantity"); ?></th>
                    <th><?php echo tt("Total price"); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user_tokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user_token->date); ?></td>
                            <td><?php echo e($user_token->packtokken->getNombre()); ?></td>
                            <td>$<?php echo e($user_token->packtokken->getPrix()); ?></td>
                            <td><?php echo e($user_token->quantite); ?></td>
                            <td>$<?php echo e($user_token->quantite*$user_token->packtokken->getPrix()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>
    <script>
        $('#pack').select2();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ls2ec\web\views/board/purchasetoken.blade.php ENDPATH**/ ?>