
<?php $__env->startSection('cssimport'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(assets); ?>vendor_components/jAlert/jAlert.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .btn-cart {
            background-color: #0b8e36;
            border-color: #0b8e36;
            color: #ffffff;
            padding: 8px!important;
            border-radius:10px!important;
        }
        .btn-cart i{
            font-size: 70px;
        }
        .btn-cart:hover i{
            color: #ffffff;
        }
        .btn-cart i:hover{
            color: #ffffff;
        }
        #dot{
            background-color: #ffffff;
            border-radius: 50%;
            top: 1px;
            right: 2px;
            position: absolute;
            padding: 8px;
            color: #000000;
            border-color: #0b8e36;
            border: solid 1px #0b8e36;
        }

    </style>

    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7"
             style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white">Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->

    <?php
        $cartnumber = 0;
        if(isset($_SESSION['CART'])){
            $panier = unserialize($_SESSION['CART']);
            foreach ($panier as $pan){
                if(!is_null($pan)){
                    $cartnumber ++ ;
                }
            }
        }
        else{
            $panier = [];
            $cartnumber = 0;
        }
    ?>
    <div class="icon-bar-sticky" style="top:20%">
        <a href="<?php echo e(route('panier')); ?>" class="waves-effect waves-light btn btn-social-icon btn-cart">
            <i class="fa fa-shopping-cart "></i>
            <p id="dot" class="count"><?php echo e($cartnumber); ?></p>
        </a>
    </div>
    <section class="py-50">
        <div class="container">


            <div class="row fx-element-overlay">
                <?php $i = 0; $productnotbuy = false; ?>
                <?php $__empty_1 = true; $__currentLoopData = array_reverse($lazyloading["listEntity"]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php $i++ ?>
                    <?php $paiement = Paiement::where('user_id',App::$user->getId())->andwhere('product_id',$product->getId())->count();?>
                    <?php $prod = Productpaiement::where('paiement.user_id',App::$user->getId())->andwhere('this.product_id',$product->getId())->count();?>
                    <?php if($prod == 0 && $paiement == 0): ?>
                        <?php $productnotbuy = true;?>
                        <div class="col-12 col-xl-3 col-md-4">
                            <?php echo $__env->make('_productmodel', ["product"=>$product, "user"=>App::$user, "panier"=>$panier], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($i%4 == 0): ?>
            </div>
            <div class="row fx-element-overlay">
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="alert alert-info"><?php echo tt("Aucun produit "); ?></div>
                <?php endif; ?>
                <?php if(!$productnotbuy): ?>
                    <div class="alert alert-info"><?php echo tt("Vous possédez déjà tous les produits disponibles"); ?></div>
                <?php endif; ?>
            </div>

            <hr>
            <?php echo $__env->make("default.pagination", ["baseurl"=>'catalog/', "ll"=>$lazyloading], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsimport'); ?>
    <script type="text/javascript" src="<?php echo e(assets); ?>vendor_components/jAlert/jAlert.js"></script>

    <script type="text/javascript" src="<?php echo e(assets); ?>vendor_components/jAlert/jAlert-functions.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ls2ecgood\web\views/shop.blade.php ENDPATH**/ ?>