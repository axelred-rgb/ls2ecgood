
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("Users list"); ?>
        </h4>
        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark"><?php echo tt("Code promo"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Dénomination"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Sigle"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Siret"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Banque"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("IBAN"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Statut"); ?></span></th>

                    <th><span class="text-fade">*</span></th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td id="title<?php echo e($user->getId()); ?>">
                            <?php $code = Codepromo::where('user_id',$user->getId())->__getOne(); ?>
                            <?php echo e($code->getCode()); ?>

                        </td>
                        <td>
                            <?php echo e($user->getDenomination()); ?>

                        </td>

                        <td>
                            <?php echo e($user->getSigle()); ?>

                        </td>
                        <td>
                            <?php echo e($user->getSiret()); ?>

                        </td>
                        <td>
                            <?php echo e($user->getBanque()); ?>

                        </td>
                        <td>
                            <?php echo e($user->getIban()); ?>

                        </td>

                        <td>
                            <?php if($user->getEntreprisestatut() == 0): ?>
                                <label style="background-color: #9d9105!important;" class="badge badge-primary"><?php echo tt("En attente de validation"); ?></label>
                            <?php elseif($user->getEntreprisestatut() == 1): ?>
                                <label class="badge badge-primary"><?php echo tt("Validées"); ?></label>
                            <?php else: ?>
                                <label style="background-color: #ff0000!important;" class="badge badge-danger"><?php echo tt("Rejettées"); ?></label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="getDataDisable('<?php echo e($user->getId()); ?>')" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-times"></i></button>
                            <button class="btn btn-sm btn-success" onclick="getDataEnable('<?php echo e($user->getId()); ?>')" id="buttonEnable" > <i class="fa fa-check"></i></button>
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
                'content': "<?php echo tt('Do you want to enable user'); ?> "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){
                            app.updateSimpleattributeinEntity(id,'user',{'entreprisestatut':1},'');
                            return false;
                        }
                    },
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

        function getDataDisable(user){
            id=user;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Do you want to disable user'); ?> "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){
                        app.updateSimpleattributeinEntity(id,'user',{'entreprisestatut':-1},'');
                        return false; }
                    },
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/affiliationprogram/entrepriselist.blade.php ENDPATH**/ ?>