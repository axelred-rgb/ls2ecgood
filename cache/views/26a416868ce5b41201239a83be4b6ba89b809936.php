<div class="col-md-6 col-xl-3">
    <div class="card mb-3 widget-content">
        <div class="widget-content-outer">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading">
                        <?php echo e($entity->getLabel()); ?>

                    </div>
                    <div class="widget-subheading"><a href="<?php echo e($entity->route()); ?>">
                            <i class="fa fa-external-link-alt"></i> <?php echo e(t("Details")); ?>

                        </a></div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-success"><?php echo e(ucfirst($entity->getLabel())::count()); ?></div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/yvafrkyk/public_html/admin/views/default/entitywidget.blade.php ENDPATH**/ ?>