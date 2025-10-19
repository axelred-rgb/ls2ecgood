
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-payments" role="tabpanel" aria-labelledby="pills-payments-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("All products"); ?>
        </h4>
        <hr>

        <div class="text-right">
            <button onclick="model._new(this, 'product')" class="btn btn-info pull-right"><?php echo tt("Add product"); ?></button>
        </div>

        <!-- Tab panes -->

        <?php echo ProductTable::init(new Product())
->buildresourcetable()
->setModel("resource")
->render(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("jsimport"); ?>
    <script>
        model._visibility = function (el, id, visibility) {
            model.addLoader($(el))
            Drequest.api("update.product?id="+id).data({
                product:{
                    status: visibility
                }
            }).raw((response)=>{
                model.removeLoader()
                if (visibility == 0)
                    $("#"+id).remove()
                else
                    alert("the product is now visible")

                console.log(response)
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/manageresources.blade.php ENDPATH**/ ?>