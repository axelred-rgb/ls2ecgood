<?php $__env->startSection('content'); ?>
    <style>
        p, h5, span, h2, h3, h4, li{
            letter-spacing: 1px!important;
        }
    </style>

    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white"><?php echo tt("Comfirm order"); ?></h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->
    <section class="mb-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 offset-lg-4 offset-md-3" style="padding:20px">
                <div style="border:1px solid #f2f2f2; padding:10px;text-align: center; border-radius: 10px">
                    <span style="font-size: 15px; text-align: center">
                        <?php echo tt("Merci votre paiement a été pris en compte.
                            Nous espérons que vous serez entièrement satisfait de votre achat. Si vous avez des questions ou des commentaires,
                            n'hésitez pas à nous contacter."); ?> !
                    </span>
                </div>

            </div>
            <div class="col-4 offset-sm-4">
                <?php if(isset($product)): ?>
                    <button onclick="location.href='<?php echo e(route('myresources')); ?>';" type="button" style="border-radius: 10px" class="btn btn-info w-p100 mt-15"><?php echo tt("Continuer"); ?></button>
                <?php else: ?>
                    <button onclick="location.href='<?php echo e(route('myboard')); ?>';" style="border-radius: 56px" type="button" class="btn btn-info w-p100 mt-15"><?php echo tt("Continuer"); ?></button>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutnewlook', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ls2ecgood\web\views/confirmorderproduct.blade.php ENDPATH**/ ?>