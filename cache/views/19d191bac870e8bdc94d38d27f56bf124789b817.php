
<?php $__env->startSection('content'); ?>


    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white"><?php echo tt("Wall of Fame"); ?></h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->

    <section class="py-50">
        <div class="container">
            <div class="row">


                <div class="col-12 col-lg-4">
                    <div class="box ribbon-box">
                        <div hidden="true"  class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                        <div class="box-header no-border p-0">
                            <a href="#">
                                <img class="img-fluid" src="<?php echo e(__front); ?>images/alloffame.png" alt="">
                            </a>
                        </div>
                        <div class="box-body">
                            <div class="text-center">

                                <h3 class="my-10"><a href="#">Bernard KABEYA</a></h3>
                                <h6 class="user-info mt-0 mb-10 text-fade">Certifié Cisco CCNP</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="box ribbon-box">
                        <div hidden="true"  class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                        <div class="box-header no-border p-0">
                            <a href="#">
                                <img class="img-fluid" src="<?php echo e(__front); ?>images/alloffame.png" alt="">
                            </a>
                        </div>
                        <div class="box-body">

                            <div class="text-center">
                                <h3 class="my-10"><a href="#">Moke Sym's Joseph</a></h3>
                                <h6 class="user-info mt-0 mb-10 text-fade">Certifié Fortinet NSE4</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="box ribbon-box">
                        <div hidden="true" class="ribbon-two ribbon-two-primary"><span>22023</span></div>
                        <div class="box-header no-border p-0">
                            <a href="#">
                                <img class="img-fluid" src="<?php echo e(__front); ?>images/alloffame.png" alt="">
                            </a>
                        </div>
                        <div class="box-body">

                            <div class="text-center">
                                <h3 class="my-10"><a href="#">Traore Arrounan</a></h3>
                                <h6 class="user-info mt-0 mb-10 text-fade">Certifié Fortinet NSE4 - NSE7</h6>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-12 col-lg-4">
                    <div class="box ribbon-box">
                        <div hidden="true"  class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                        <div class="box-header no-border p-0">
                            <a href="#">
                                <img class="img-fluid" src="<?php echo e(__front); ?>images/alloffame.png" alt="">
                            </a>
                        </div>
                        <div class="box-body">
                            <div class="text-center">

                                <h3 class="my-10"><a href="#">Christophe GUE</a></h3>
                                <h6 class="user-info mt-0 mb-10 text-fade">Certifié Fortinet NSE4</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/walloffame.blade.php ENDPATH**/ ?>