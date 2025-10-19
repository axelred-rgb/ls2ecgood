<header class="top-bar">
    <div class="topbar">

        <div class="container">
            <div class="row justify-content-end">

                <div class="col-lg-6 col-12 xs-mb-10">
                    <div class="topbar-call text-center text-lg-end topbar-right">
                        <ul class="list-inline d-lg-flex justify-content-end">
                            <li class="me-10 ps-10 lng-drop">
                                <select class="header-lang-bx selectpicker" onchange="window.location.href = __env+this.value">
                                    <option  value="<?php echo e(App::$lang->getIso_code()); ?>" >
                                        <?php echo e(App::$lang->getName()); ?>

                                    </option>

                                    <?php $__currentLoopData = Dvups_lang::otherLangs(local()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang->getIso_code()); ?>" >

                                            <?php echo e($lang->getName()); ?>


                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </li>
                            <?php if(App::$user->getId()): ?>
                                <li class="me-10 ps-10"><a href="<?php echo e(route('myboard')); ?>"><i class="text-white fa fa-user d-md-inline-block d-none"></i> <?php echo tt("Account"); ?></a></li>
                                <li class="me-10 ps-10"><a href="<?php echo e(route('logout')); ?>"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> <?php echo tt("Logout"); ?></a></li>
                            <?php else: ?>
                                <li class="me-10 ps-10"><a href="<?php echo e(route('register')); ?>"><i class="text-white fa fa-user d-md-inline-block d-none"></i> <?php echo tt("Register"); ?></a></li>
                                <li class="me-10 ps-10"><a href="<?php echo e(route('login')); ?>"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> <?php echo tt("Login"); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav hidden class="nav-white nav-transparent">
        <div class="nav-header">
            <a href="<?php echo e(route('home')); ?>" class="brand" style="">
                <img src="<?php echo e(assets); ?>images/logo-training.png" alt=""/>
            </a>
            <button class="toggle-bar">
                <span class="ti-menu"></span>
            </button>
        </div>
        <ul class="menu">
            <li>
                <a href="<?php echo e(route('home')); ?>"><?php echo tt("Home"); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('about')); ?>"><?php echo tt("About"); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('walloffame')); ?>"><?php echo tt("Wall of fame"); ?></a>
            </li>
            <li class="dropdown">
                <a href="#"><?php echo tt("Training"); ?></a>
                <ul class="dropdown-menu">
                    <?php $__currentLoopData = App::$academies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="dropdown">
                            <a href="#"><?php echo e($academy->getName()); ?></a>
                            <ul class="dropdown-menu">
                                <?php $__currentLoopData = Courses::where($academy)->andwhere('type','!==',1)->__getAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('coursedetail')); ?>?id=<?php echo e($course->getId()); ?>"><?php echo e($course->getName()); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>

            <li>
                <a href="<?php echo e(route('pricing')); ?>"><?php echo tt("Pricing"); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('bloglist')); ?>"><?php echo tt("Articles"); ?></a>
            </li>
            
            
            
            <li>
                <a href="<?php echo e(route('affiliation')); ?>"><?php echo tt("Affiliation"); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('investor')); ?>"><?php echo tt("Investors"); ?></a>
            </li>
            <li>
                <a href="<?php echo e(route('contact')); ?>"><?php echo tt("Contact"); ?></a>
            </li>
        </ul>

        <div class="wrap-search-fullscreen">
            <div class="container">
                <button class="close-search"><span class="ti-close"></span></button>
                <input type="text" placeholder="<?php echo tt('Search...'); ?>" />
            </div>
        </div>
    </nav>
</header>
<?php /**PATH C:\xampp\htdocs\ls2ecgood\web\views/layout/header.blade.php ENDPATH**/ ?>