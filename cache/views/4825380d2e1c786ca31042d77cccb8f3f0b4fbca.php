<?php $__env->startSection('title', 'Page Title'); ?>

<?php function style(){ ?>

<?php foreach (dclass\devups\Controller\Controller::$cssfiles as $cssfile){ ?>
<link href="<?= $cssfile ?>" rel="stylesheet">
<?php } ?>

<?php } ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title"><?php echo e($moduledata->getLabel()); ?></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= __env ?>admin">Dashboard</a></li>
                    <li class="breadcrumb-item active"><?php echo e($moduledata->getLabel()); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <ul class="nav nav-justified">

        <?php $__currentLoopData = $moduledata->dvups_entity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link active"
                   href="<?= path('src/' . strtolower($moduledata->getProject()) . '/' . $moduledata->getName() . '/' . $entity->getUrl() . '/index') ?>">
                    <i class="metismenu-icon"></i> <span><?= $entity->getLabel() ?></span>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <hr>

    <?php echo $__env->yieldContent('layout_content'); ?>


<?php $__env->stopSection(); ?>

<?php function script(){ ?>

<script src="<?= CLASSJS ?>devups.js"></script>
<script src="<?= CLASSJS ?>model.js"></script>
<script src="<?= CLASSJS ?>ddatatable.js"></script>
<?php foreach (dclass\devups\Controller\Controller::$jsfiles as $jsfile){ ?>
<script src="<?= $jsfile ?>"></script>
<?php } ?>

<?php } ?>

	
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/src/devups/ModuleLang/Resource/views/admin/layout.blade.php ENDPATH**/ ?>