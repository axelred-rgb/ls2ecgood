<?php $subscriptions = Subscription::where('target','=','pecb')->get();?>
<?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($subscription->getTarget()=="pecb"): ?>
        <div class="col-md-6 col-12" style="margin-bottom: 20px;">
            <div class="price-table active bg-gray-100 pull-up">
                <div class="price-top bg-white">
                    <div class="price-title">
                        <h3>
                            <?php echo e($subscription->getCompletename()); ?>

                        </h3>
                        <?php if($subscription->getType() == 3): ?>
                            <label for="" class="badge badge-success">
                                <?php echo e(tt("Avec formatieur")); ?>

                            </label> <br>
                        <?php elseif($subscription->getType() == 4): ?>
                            <label for="" class="badge badge-success">
                                <?php echo e(tt("Sans formatieur")); ?>

                            </label> <br>
                        <?php endif; ?>
                    </div>
                    <div class="price-prize">
                            <?php
                            $pricet = ($subscription->getY_price()*0.2)+$subscription->getY_price();
                            $pricem = ($subscription->getM_price()*0.2)+$subscription->getM_price();

                            $pricet =  number_format($pricet);
                            $pricem = number_format($pricem);
                            ?>
                        
                        <h2 style="font-size: 1.3rem">
                            <span style="text-decoration: line-through"> <?php echo e($pricet); ?>€</span>  <?php echo e($pricem); ?>€
                            <span>
                                <?php echo tt("TTC"); ?>
                                <?php if($subscription->getType() == 3): ?>
                                    /5 <?php echo tt('Jours'); ?>
                                <?php endif; ?>
                            </span>
                        </h2>

                    </div>
                    <div class="price-button">
                        <a class="btn btn-primary" href="<?php echo e(route('cart')); ?>?id=<?php echo e($subscription->getId()); ?>"><?php echo tt("Get It Now"); ?></a>
                    </div>
                    <div class="price-content" style="width: 100%!important;">
                        <div class="price-table-list">
                            <ul class="list-unstyled">
                                <?php if($subscription->getType() == 3): ?>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <strong>
                                             <?php echo tt("Formation théorique et pratique"); ?>
                                        </strong>
                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                    </li>
                                <?php endif; ?>
                                <?php if($subscription->getType() == 4): ?>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <strong>
                                            <?php echo tt("L'apprenant évolue à son rythme"); ?>
                                        </strong>
                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <i class="fa fa-check"></i>
                                    <strong>
                                        <?php echo tt("Support de cours"); ?>
                                    </strong>
                                    <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>
                                    <strong>
                                        <?php echo tt("Examen et certification"); ?>
                                    </strong>
                                    <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/learningplanpecb.blade.php ENDPATH**/ ?>