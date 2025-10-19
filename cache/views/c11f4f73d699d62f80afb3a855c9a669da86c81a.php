
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <?php if(!isset($reference)): ?>
            <?php if(App::$user->getUsertype()!=1 && App::$user->getUsertype()!=2): ?>
                <div class="col-12">
                    <div class="bg-img box box-body py-50" style="background-color: #0b8e36;" data-overlay="7">

                        <div class="message"></div>
                        <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                            <p style="text-align: center;font-size: 30px;color: #ffffff;margin-bottom: 0px;">
                                <?php echo tt('Vous devez mettre à jour vos information afin de pouvoir recevoir vos gains'); ?><br>
                                <a href="<?php echo e(route('updateinfosaffiliation')); ?>" class="btn btn-md btn-success pull-right"> <i class="fa fa-plus"></i> <?php echo tt("Mettre à jour mes informations"); ?></a>
                            </p>
                        </div>
                    </div>

                </div>
            <?php elseif(App::$user->getUsertype()==2): ?>
                <?php if(App::$user->getEntreprisestatut() != 1): ?>
                    <div class="col-12">
                        <div class="bg-img box box-body py-50" style="background-color: #0b8e36;" data-overlay="7">

                            <div class="message"></div>
                            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                                <p style="text-align: center;font-size: 30px;color: #ffffff;margin-bottom: 0px;">
                                    <?php echo tt('Les informations de votre entreprise n\'ont pas encore été validé. Vous ne pouvez pas encore recevoir vos gains'); ?><br>
                                    <a href="<?php echo e(route('updateinfosaffiliation')); ?>" class="btn btn-md btn-success pull-right"> <i class="fa fa-plus"></i> <?php echo tt("Mettre à jour mes informations"); ?></a>
                                </p>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>


        <div class="row">
            <div class="col-6">
                <h4 class="box-title mb-0">
                    <?php echo tt("Liste des sessions"); ?>
                </h4>
            </div>

        </div>

        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark"><?php echo tt("Name"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Periode"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("Etat du paiement"); ?></span></th>
                    <?php if(!isset($reference)): ?>
                        <th><span class="text-fade"><?php echo tt("Frais de transation"); ?></span></th>
                    <?php endif; ?>
                    <th><span class="text-fade"><?php echo tt("Montant"); ?></span></th>
                    <th><span class="text-fade"><?php echo tt("*"); ?></span></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = array_reverse($sessioncode); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sess): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $session = $sess->getSessionpaiement();?>
                    <tr>
                        <td id="title<?php echo e($session->getId()); ?>">
                            <?php echo e($session->getName()); ?>

                            <label for="" class="badge badge-warning"><?php echo e($session->getSatutName()); ?></label><br>
                        </td>

                        <td>
                            <?php echo e($session->getDatedebut()); ?> - <?php echo e($session->getDatefin()); ?>

                        </td>

                        <td>
                            <?php echo e($sess->getStateName()); ?>

                            <?php if($sess->getState() == 1): ?>
                                <a target="__blank" href="<?php echo e($sess->getPreuve()); ?>">
                                    <label for="" class="badge badge-success"><?php echo tt('Téléchargez la preuve '); ?></label>
                                </a>
                                <a target="__blank" href="<?php echo e(route('generateinvoiceaffiliation')); ?>?id=<?php echo e($sess->getId()); ?>">
                                    <label for="" class="badge badge-success"><?php echo tt('Téléchargez la facture '); ?></label>
                                </a>
                            <?php endif; ?>
                        </td>
                        <?php if(!isset($reference)): ?>
                            <td>
                                <?php echo e($sess->getProcessfees()); ?>  €
                            </td>
                        <?php endif; ?>
                        <td>
                            <?php if(is_null($sess->getMontant())): ?>
                                0 €
                            <?php else: ?>
                                <?php echo e($sess->getMontant()); ?> €
                            <?php endif; ?>
                        </td>


                        <td>
                            <?php if(!isset($reference)): ?>
                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('mypaiementbysession')); ?>?session=<?php echo e($session->getId()); ?>" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                     <?php echo tt('Transactions'); ?>
                                </a>
                            <?php else: ?>
                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('codeaffiliationparticulierListbySession')); ?>?session=<?php echo e($session->getId()); ?>" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                    <?php echo tt('Transactions'); ?>
                                </a>
                            <?php endif; ?>
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

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/affiliationprogram/usersessions.blade.php ENDPATH**/ ?>