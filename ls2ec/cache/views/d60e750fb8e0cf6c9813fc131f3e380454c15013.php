<div class="col-lg-3 col-md-4 col-12">
    <div class="position-sticky t-100">
        <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-secondary-light">
                <div class="widget-user-image">
                    <img class="rounded-circle bg-danger" src="<?php echo e(assets); ?>images/front-end-img/avatar/1.jpg" alt="User Avatar">
                </div>
                <h3 class="widget-user-username"><?php echo App::$user->getUsername(); ?> </h3>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav d-block nav-stacked fs-16" id="pills-tab23" role="tablist">

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'myboard') ? 'active' : ''); ?>" href="<?php echo e(route('myboard')); ?>">
                            <span class="me-10 icon-Book-open"><span class="path1"></span><span class="path2"></span></span><?php echo tt("My Courses"); ?>
                        </a>
                    </li>

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'managecourses') ? 'active' : ''); ?>" href="<?php echo e(route('managecourses')); ?>">
                            <span class="me-10 icon-Book"></span><?php echo tt("Managed Courses"); ?>
                        </a>
                    </li>
                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'payments') ? 'active' : ''); ?>" href="<?php echo e(route('payments')); ?>">
                            <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Payments"); ?>
                        </a>
                    </li>

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'alllabs' )? 'active' : ''); ?>" href="<?php echo e(route('alllabs')); ?>">
                            <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Labs"); ?>
                        </a>
                    </li>

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'mylabs' )? 'active' : ''); ?>" href="<?php echo e(route('mylabs')); ?>" >
                            <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span><?php echo tt("My Labs"); ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="py-10 nav-link" href="<?php echo e(route('logout')); ?>">
                            <span class="me-10 icon-Unlock"></span><?php echo tt("Logout"); ?>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="box">
            <div class="box-body">
                <div class="course-price">
                    <div class="mb-5">
                        <div class="text-dark mb-2 text-center">
                            <span class="text-dark fw-600 h1"><?php echo App::$user->getToken(); ?></span> 
                            <span class="text-muted h3 fw-normal ms-2">
                                <?php echo tt("Tokens"); ?>
                            </span> 
                        </div> 
                    </div>
                </div>	
            </div>
            <div class="box-footer">
                <ul class="nav d-block nav-stacked fs-16" id="pills-tab24" role="tablist">
                    <li class="nav-item bb-1">
                        <a type="button"  href="<?php echo e(route('purchasetoken')); ?>" class="waves-effect waves-light btn w-p100 btn-dark">
                            <?php echo tt("Purchase Tokens"); ?>
                        </a>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
    
</div><?php /**PATH C:\xampp\htdocs\ls2ec\web\views/board/sidebarboard.blade.php ENDPATH**/ ?>