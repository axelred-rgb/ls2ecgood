
<?php $__env->startSection('content'); ?>

    <style>
        .blink {
            animation: blinker 1.5s linear infinite;
            color: #0b8e36;
            font-weight: bold;
            font-size: 25px;
        }
        @keyframes  blinker {
            50% { opacity: 0; }
        }
        .blink-one {
            animation: blinker-one 1s linear infinite;
        }
        @keyframes  blinker-one {
            0% { opacity: 0; }
        }
        .blink-two {
            animation: blinker-two 1.4s linear infinite;
        }
        @keyframes  blinker-two {
            100% { opacity: 0; }
        }
        .labelvideo{
            margin-top: 10px;


        }
    </style>

    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white"><?php echo tt("Pricing"); ?></h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->

    <section style="margin-bottom:50px">
        <div class="container">
            <div class="row" >
                <div class="col-12" >
                    <h3 style="text-align: center">
                        <?php echo tt('Comment effectuer le paiement'); ?>
                    </h3>
                </div>

                <div class="col-sm-12">
                    <div style="position: relative; padding-top: 40%;"><iframe src="https://iframe.mediadelivery.net/embed/32653/fd127992-145d-4294-8676-39c2ea714aa5?autoplay=false" loading="lazy" style="border: none; position: absolute; top: 0; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" allowfullscreen="true"></iframe></div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">


            <div class="row justify-content-center">
                <ul class="nav nav-tabs justify-content-center bb-0 mb-10" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tableau1" role="tab"><?php echo tt("PARTICULIER"); ?></a> </li>
                    <li class="nav-item" hidden="true"> <a class="nav-link" data-bs-toggle="tab" href="#tableau2" role="tab"><?php echo tt("ENTREPRISE"); ?></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tableau3" role="tab"><?php echo tt("PECB"); ?></a> </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="tableau1" role="tabpanel">

                    <div class="row mt-30">
                        <?php $__currentLoopData = App::$subscription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriptions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($subscriptions->getTarget()=="i"): ?>
                                <div class="col-md-4 col-sm-12">
                                    <?php if($subscriptions->getType()==1): ?>
                                        <div class="price-table active bg-gray-100 pull-up">
                                            <?php else: ?>
                                                <div class="price-table bg-gray-100">
                                                    <?php endif; ?>
                                                    <?php if($subscriptions->getOnlyname() == 'annuel'): ?>
                                                        <div class="price-top bg-white">
                                                            <div class="price-title">
                                                                <h3 class="mb-15"><?php echo e($subscriptions->getCompletename()); ?></h3>
                                                            </div>
                                                            <div class="col-12">


                                                            </div>
                                                            <div class="price-prize">
                                                                <?php
                                                                    $pricem = ($subscriptions->getM_price()*0.2)+$subscriptions->getM_price();
                                                                    $pricet = ($subscriptions->getY_price()*0.2)+$subscriptions->getY_price();
                                                                //$pricem = number_format($pricem);
                                                                ?>

                                                                <h2 style="font-size: 1.3rem"> <span style="text-decoration: line-through"><?php echo e($pricet); ?> €</span> <?php echo e($pricem); ?> € <span><?php echo tt("TTC"); ?> <?php echo tt('avec'); ?> <?php echo e($subscriptions->getRedu()); ?>% <?php echo tt('de réduction'); ?> (<?php echo tt('recommandé'); ?>).</span></h2>
                                                                <?php if($subscriptions->getGift() !== "0"): ?>
                                                                    <label class="blink"><?php echo tt('PROMO NOEL'); ?></label>
                                                                <?php endif; ?>

                                                                <hr>

                                                            </div>
                                                            <div class="price-button">
                                                                <a class="btn btn-primary" href="<?php echo e(route('cart')); ?>?id=<?php echo e($subscriptions->getId()); ?>"><?php echo tt("Get It Now"); ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="price-content">
                                                            <div class="price-table-list">
                                                                <ul class="list-unstyled">
                                                                    <li style="text-transform: uppercase;">
                                                                        <i class="fa fa-check"></i>
                                                                        <strong>
                                                                            <?php echo e($subscriptions->getToken()); ?> <?php echo tt(" Jetons pour accéder aux labs (32h de pratique)"); ?>
                                                                        </strong>
                                                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                                                    </li>
                                                                    <li> <i class="fa fa-check"></i> <?php echo tt("CCNA 200-301"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
                                                                    <li><i class="fa fa-check" ></i> <?php echo tt("CCNP 350-401 ENCOR"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("NSE4"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("NSE7"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("CYBERSECUTITY"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li style="text-transform: uppercase;"><i class="fa fa-check"></i> <?php echo tt("Accès au groupe privé Facebook"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php elseif($subscriptions->getOnlyname() == 'trimestriel'): ?>
                                                        <div class="price-top bg-white">
                                                            <div class="price-title">
                                                                <h3 class="mb-15"><?php echo e($subscriptions->getCompletename()); ?></h3>
                                                            </div>
                                                            <div class="col-12">

                                                            </div>
                                                            <div class="price-prize">
                                                                <?php
                                                                $pricem = ($subscriptions->getM_price()*0.2)+$subscriptions->getM_price();
                                                                $pricet = ($subscriptions->getY_price()*0.2)+$subscriptions->getY_price();

                                                                //$pricem = number_format($pricem);
                                                                ?>
                                                                <h2 style="font-size: 1.3rem"> <span style="text-decoration: line-through"><?php echo e($pricet); ?> €</span> <?php echo e($pricem); ?> € <span><?php echo tt("TTC"); ?> <?php echo tt('avec'); ?> <?php echo e($subscriptions->getRedu()); ?>% <?php echo tt('de réduction'); ?> .</span></h2>
                                                                <!--<label class="blink"><?php echo tt('BLACK FRIDAY'); ?> -40%</label>-->
                                                                <hr>

                                                            </div>
                                                            <div class="price-button">
                                                                <a class="btn btn-primary" href="<?php echo e(route('cart')); ?>?id=<?php echo e($subscriptions->getId()); ?>"><?php echo tt("Get It Now"); ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="price-content">
                                                            <div class="price-table-list">
                                                                <ul class="list-unstyled">
                                                                    <li style="text-transform: uppercase;">
                                                                        <i class="fa fa-check"></i>
                                                                        <strong>
                                                                            <?php echo e($subscriptions->getToken()); ?> <?php echo tt("Jetons pour accéder aux labs (8h de pratique)"); ?>
                                                                        </strong>
                                                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                                                    </li>
                                                                    <li> <i class="fa fa-check"></i> <?php echo tt("CCNA 200-301"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
                                                                    <li><i class="fa fa-check" ></i> <?php echo tt("CCNP 350-401 ENCOR"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("NSE4"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("NSE7"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("CYBERSECUTITY"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li style="text-transform: uppercase;"><i class="fa fa-check"></i> <?php echo tt("Accès au groupe privé Facebook"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php elseif($subscriptions->getOnlyname() == 'mensuel'): ?>
                                                        <div class="price-top bg-white">
                                                            <div class="price-title">
                                                                <h3 class="mb-15"><?php echo e($subscriptions->getCompletename()); ?></h3>
                                                            </div>
                                                            <div class="price-prize">
                                                                <?php
                                                                $pricem = ($subscriptions->getM_price()*0.2)+$subscriptions->getM_price();

                                                                $pricem = number_format($pricem);
                                                                ?>
                                                                <h2 style="font-size: 1.3rem"> <?php echo e($pricem); ?> € <span><?php echo tt("TTC"); ?>.</span></h2>
                                                                <hr>
                                                                

                                                                

                                                            </div>
                                                            <div class="price-button">
                                                                <a class="btn btn-primary" href="<?php echo e(route('cart')); ?>?id=<?php echo e($subscriptions->getId()); ?>"><?php echo tt("Get It Now"); ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="price-content">
                                                            <div class="price-table-list">
                                                                <ul class="list-unstyled">
                                                                    <li style="text-transform: uppercase;">
                                                                        <i class="fa fa-check"></i>
                                                                        <strong>
                                                                            <?php echo e($subscriptions->getToken()); ?> <?php echo tt("Jetons pour accéder aux labs (3h de pratique)"); ?>
                                                                        </strong>
                                                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                                                    </li>
                                                                    <li> <i class="fa fa-check"></i> <?php echo tt("CCNA 200-301"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
                                                                    <li><i class="fa fa-check" ></i> <?php echo tt("CCNP 350-401 ENCOR"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("NSE4"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("NSE7"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> <?php echo tt("CYBERSECUTITY"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li style="text-transform: uppercase;"><i class="fa fa-check"></i> <?php echo tt("Accès au groupe privé Facebook"); ?> <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                        </div>
                                    <?php else: ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </div>
                    </div>

                    <div class="tab-pane" id="tableau2" role="tabpanel">
                        <div class="row mt-30">
                            <?php echo $__env->make('learningplan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="tableau3" role="tabpanel">
                        <div class="row mt-30">
                            <?php echo $__env->make('learningplanpecb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/pricingtest.blade.php ENDPATH**/ ?>