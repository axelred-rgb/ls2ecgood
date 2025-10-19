<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class=" ">
                    <?php echo $moduledata->getPrinticon(); ?>

                </i>
            </div>
            <div><?php echo e($moduledata->getName()); ?>

                <div class="page-title-subheading">Some text</div>
            </div>
        </div>
        <div class="page-title-actions">

        </div>
    </div>
</div>
<ul class="nav nav-justified">
    <li class="nav-item">
        <a class="nav-link active"
           href="<?= $moduledata->route() ?>">
            <i class="metismenu-icon"></i> <span>Dashboard</span>
        </a>
    </li>
    <?php $__currentLoopData = $moduledata->dvups_entity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item">
            <a class="nav-link active"
               href="<?=  $entity->route() ?>">
                <i class="metismenu-icon"></i> <span><?= $entity->getLabel() ?></span>
            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH /home/yvafrkyk/public_html/admin/views/default/moduleheaderwidget.blade.php ENDPATH**/ ?>