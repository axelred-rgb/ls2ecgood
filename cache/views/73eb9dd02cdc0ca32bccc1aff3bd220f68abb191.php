
    <div class="box box-default">
        <div class="fx-card-item">
            <div class="fx-card-avatar fx-overlay-1 mb-0"> <img src="<?php echo e($product->srcCover()); ?>" alt="user">
                <div class="fx-overlay scrl-up">
                    <ul class="fx-info">
                        <?php $a = 'this.id'; $id  = $product->$a?>
                        <li><a class="btn btn-outline image-popup-vertical-fit" href="<?php echo e(route("product/".$product->getId())); ?>"><?php echo tt('Quick View'); ?></a></li>
                        <?php $find = false;?>
                        <?php if(count($panier) > 0): ?>
                            <?php $__currentLoopData = $panier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($pan)): ?>
                                    <?php if($pan[2] == $product->getId()): ?>
                                        <?php $find = true;?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php if($find): ?>
                            <li><a class="btn btn-outline image-popup-vertical-fit" data-id="<?php echo e($product->getId()); ?>" href="<?php echo e(route('panier')); ?>" ><?php echo tt('My cart'); ?></a></li>
                        <?php else: ?>
                            <li><a class="btn btn-outline image-popup-vertical-fit" data-id="<?php echo e($product->getId()); ?>" href="#" onclick="app.addtocart(this)"><?php echo tt('Add to cart'); ?></a></li>
                        <?php endif; ?>


                    </ul>
                </div>
            </div>
            <div class="fx-card-content text-start mb-0">
                <div class="product-text">
                    <h4 class="box-title mb-0"><?php echo e($product->getName()); ?></h4>

                    <h4 class="pro-price text-blue"><?php echo e(round((($product->priceofsale*0.2)+$product->priceofsale),1)); ?> € </h4>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH /home/yvafrkyk/public_html/web/views/_productmodel.blade.php ENDPATH**/ ?>