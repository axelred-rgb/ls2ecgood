<?php $__currentLoopData = App::$subscription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriptions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($subscriptions->getTarget()=="e"): ?>
        <div class="col-md-4 col-12" style="margin-bottom: 20px;">
            <div class="price-table active bg-gray-100 pull-up">
                <div class="price-top bg-white">
                    <div class="price-title">
                        <h3 class="mb-15"><?php echo e($subscriptions->getName()); ?></h3>
                    </div>
                    <div class="price-prize">
					<?php
						$pricem = ($subscriptions->getY_price()*0.2)+$subscriptions->getY_price();
						$priceafricam = ($subscriptions->getY_a_price()*0.2)+$subscriptions->getY_a_price();

						$priceafricam =  number_format($priceafricam);
						$pricem = number_format($pricem);
                    ?>

                        <h2 style="font-size: 1.3rem"><?php echo e($pricem); ?> € / 5 <?php echo tt("Days"); ?></h2>



                    </div>
                    <div class="price-button">
                        <a class="btn btn-primary" target="_blank" href="https://calendly.com/claudemarcelbiyihamang"><?php echo tt("Prendre rendez vous"); ?></a>
                    </div>
                </div>

            </div>
        </div>
    <?php else: ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\ls2ecgood\web\views/learningplan.blade.php ENDPATH**/ ?>