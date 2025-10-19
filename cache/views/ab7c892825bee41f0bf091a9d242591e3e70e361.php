
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <div class="row">
            <div class="col-6">
                <h4 class="box-title mb-0">
                    <?php echo tt("Liste des sessions"); ?>
                </h4>
            </div>
            <div class="col-6 pull-right">
                <button class="btn btn-success btn-md pull-right" onclick="app.createSimpleattributeinEntity('sessionpaiement',{'pourcentagegain':30},'',this,true)">
                    <i class="fa fa-plus"></i> <?php echo tt('Nouvelle session'); ?>
                </button>
            </div>
        </div>

        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark"><?php echo tt("Name"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Taux"); ?></span></th>

                    <th><span class="text-fade"><?php echo tt("Date de debut"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Date de fin"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Etat"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Paiement"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("*"); ?></span></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = array_reverse(Sessionpaiement::all()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td id="title<?php echo e($session->getId()); ?>">
                            <?php echo e($session->getName()); ?>

                        </td>
                        <td>
                            <?php echo e($session->getPourcentagegain()); ?> %
                        </td>
                        <td>
                            <?php echo e($session->getDatedebut()); ?>

                        </td>
                        <td>
                            <?php echo e($session->getDatefin()); ?>

                        </td>
                        <td>
                            <?php echo e($session->getSatutName()); ?>

                        </td>
                        <td>

                        </td>

                        <td>
                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('codeaffiliationListbySession')); ?>?session=<?php echo e($session->getId()); ?>" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                <i class="fa fa-dollar"></i> <?php echo tt('Liste des paiements de la session'); ?>
                            </a>
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

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/affiliationprogram/listsession.blade.php ENDPATH**/ ?>