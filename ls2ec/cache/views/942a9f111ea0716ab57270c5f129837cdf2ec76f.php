<?php $dvups_navigation = unserialize($_SESSION[dv_role_navigation]); ?>

<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading"><?php echo e(t("Dashboards")); ?></li>
                <li>
                    <a href="<?= __env ?>admin/" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        <?php echo e(t("Dashboards")); ?>

                    </a>
                </li>
                <?php $__currentLoopData = $dvups_navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="app-sidebar__heading"><?php echo e($component["component"]->getLabel()); ?></li>

                    <?php $__currentLoopData = $component["modules"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a aria-expanded="true" href="#">
                                <i class="metismenu-icon ">
                                    <?php echo $module["module"]->getPrinticon(); ?>

                                </i>


                                <span class="menu-title"><?php echo e($module["module"]->getLabel()); ?></span>
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul class="mm-collapse">
                                <li>
                                    <a href="<?php echo e($module["module"]->route()); ?>">
                                        <i class="metismenu-icon"></i> <?php echo e(t("Dashboard")); ?>

                                    </a>
                                </li>
                                <?php $__currentLoopData = $module["entities"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($entity->route()); ?>">
                                            <i class="metismenu-icon"></i> <?php echo e($entity->getLabel()); ?>

                                            <?php if($nb = $entity->alert()): ?>
                                              (  <?php echo e($nb); ?> )
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\ls2ec\admin\views/layout/navbar.blade.php ENDPATH**/ ?>