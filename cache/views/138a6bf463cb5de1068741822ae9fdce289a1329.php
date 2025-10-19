<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("Give tokens"); ?>
        </h4>
        <hr>

        <div class="bg-img box box-body py-50" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white"><?php echo tt("Give tokens"); ?></h1>			
            </div>
            <div class="message"></div>
            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token"> 
                <div class="form-group col-xl-5 col-lg-5 col-12 mb-lg-0 mb-5 bg-white ser-slt"> 
                    <select class="form-select" id="pack" style="width: 100%;" name="user">
                        <option selected="selected" disabled><?php echo tt("Users"); ?></option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->getId()); ?>"><?php echo e($user->getFirstName()); ?> <?php echo e($user->getLastName()); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select> 
                </div>
                <div class="form-group col-xl-5 col-lg-4 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                    <input type="number" name="quantity" class="form-control input-lg b-0 be-1 border-light rounded-0" min="1" value="1" placeholder="<?php echo tt('quantity'); ?>">
                </div>
                <div class="col-xl-2 col-lg-3 col-12 mb-0"> 
                    <button onclick="app.giveToken(this)"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Give"); ?></button>
                </div>
                <div id="payment"></div>
            </div>				
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>
    <script>
        $('select').select2();
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ls2ecgood\web\views/board/givetoken.blade.php ENDPATH**/ ?>