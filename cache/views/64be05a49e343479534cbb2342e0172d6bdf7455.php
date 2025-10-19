
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("Liste des affiliés à valider"); ?>
        </h4>
        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark"><?php echo tt("Name"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Email"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Phone"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Country"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Code"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Date de creation"); ?></span></th>
                    <th><span class="text-fade">*</span></th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td id="title<?php echo e($code->getId()); ?>">
                            <?php echo e($code->getUser()->getFirstname()); ?> <?php echo e($code->getUser()->getLastname()); ?>

                        </td>

                        <td>
                            <?php echo e($code->getUser()->getEmail()); ?>

                        </td>
                        <td>
                            <?php echo e($code->getUser()->getPhonenumber()); ?>

                        </td>
                        <td>
                            <?php echo e($code->getUser()->getCountry()->getName()); ?>

                        </td>
                        <td>
                            <?php echo e($code->getCode()); ?>

                        </td>

                        <td>
                            <?php $b='this.created_at';?><?php echo e($code->$b); ?>

                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="getDataDisable('<?php echo e($code->getId()); ?>')" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-times"></i></button>
                            <button class="btn btn-sm btn-success" onclick="getDataEnable('<?php echo e($code->getId()); ?>')" id="buttonEnable" > <i class="fa fa-check"></i></button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>
    <script>
        let id;
        let title;
        function getDataEnable(user){
            id=user;

            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Voulez vous activer le code'); ?> "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){app.updateSimpleattributeinEntity(id,'codepromo',{'state':0},'',null,true) }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

        function getDataDisable(user){
            id=user;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Voulez vous rejetter ce code?'); ?> "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){app.updateSimpleattributeinEntity(id,'codepromo',{'state':-2},'',null,true) }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/affiliationprogram/affiliationtovalidate.blade.php ENDPATH**/ ?>