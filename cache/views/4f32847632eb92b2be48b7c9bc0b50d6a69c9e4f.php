
<?php $__env->startSection('content'); ?>
    <style>
        .message{
            color: #FFFFFF;
            font-size: 1.5rem;
            margin-bottom: 8px;
        }
    </style>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0 ">
                    <?php echo tt("Liste des operation au cours de la session"); ?> <?php echo e($sessionpaiement->getNumero()); ?>

                    <?php if(isset($reference)): ?>
                        <?php echo tt('Pour les utilisateurs ayant un compte particulier'); ?>
                    <?php endif; ?>
                </h4>
            </div>
            <div class="col-md-6" style="padding-left: 30%;">
                <h4 class="box-title mb-0 " style="font-weight: 100">
                    <?php echo tt("Total à payer"); ?>:
                </h4>
                <strong id="gain_total"></strong>
                <?php if(!isset($reference)): ?>
                    <div class="row">
                        <?php if(App::$user->getRole() == 2): ?>
                            <div class="col-12">
                                <a class="btn btn-sm btn-success" href="<?php echo e(route('paiementspacekola')); ?>?session=<?php echo e($sessionpaiement->getId()); ?>" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                    <i class="fa fa-dollar"></i> <?php echo tt('Paiement spacekola'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <hr>

        <?php if(App::$user->getRole() == 2): ?>
        <div class="row">
            <div class="col-4">
                <h4><?php echo tt('Effectuez le paiement'); ?></h4>

            </div>
            <?php if($sessioncode->getState() == 1): ?>
                <div class="col-4">
                    <strong style="color:#0b8e36; font-size:2rem"><?php echo tt('PAIEMENT EFFECTUE'); ?></strong>
                </div>
                <div class="col-4">
                    <span>
                        <a target="__blank" href="<?php echo e($sessioncode->getPreuve()); ?>"><?php echo tt('Preuve du paiement'); ?></a>
                    </span>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-12">
            <div class="bg-img box box-body py-50"  data-overlay="7">

                <div class="message"><?php echo tt('Envoyez la preuve du paiement'); ?></div>
                <div class="form row g-0 align-items-center cours-search max-w-950" id="send-proofs">
                    <div class="form-group col-xl-10 col-lg-9 col-12 mb-lg-0 mb-5 bg-white ser-slt" data-id="preuve">
                        <input type="file" name="quantity" id="codepromo" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('code promo'); ?>">
                    </div>
                    <div class="form-group" hidden data-id="state">
                        <input type="text" value="1" class="form-control">
                    </div>
                    <div class="form-group" hidden data-id="montant">
                        <input type="text" id="montantinput" value="1" class="form-control">
                    </div>
                    <div class="col-xl-2 col-lg-3 col-12 mb-0">
                        <button onclick="app.updatesimpleObject(this,<?php echo e($sessioncode->getId()); ?>,'sessioncodepromo','send-proofs','')"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Save"); ?></button>
                    </div>
                    <div id="payment"></div>
                </div>
            </div>

        </div>
        <?php endif; ?>


        <div class="table-responsive mt-30">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><?php echo tt("Code"); ?></th>
                    <th><?php echo tt("Utilisateur"); ?></th>
                    <th><?php echo tt("Date de creation"); ?></th>
                    <th><?php echo tt('Type'); ?></th>
                    <th><?php echo tt("Montant total"); ?></th>
                    <th><?php echo tt("Etat"); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;$totaux=0; $isOk=true;?>
                <?php $__currentLoopData = array_reverse($codes); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if(isset($reference)): ?>
                        <?php if($reference == 'spacekola' && $code->getCodepromo()->getUser()->getUsertype() !== '2'): ?>
                            <?php $isOk = true;?>
                        <?php else: ?>
                            <?php $isOk = false;?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php $isOk = true;?>
                    <?php endif; ?>

                    <?php if($isOk): ?>
                        <?php if($code->getIspacekola() != 1): ?>
                        <tr >

                            <td style="cursor: pointer;" onclick="window.location.href = '<?php echo e(route('affiliationtransactionbysession')); ?>?code=<?php echo e($code->getCodepromo()->getCode()); ?>&session=<?php echo e($sessionpaiement->getId()); ?>'"><?php echo e($code->getCodepromo()->getCode()); ?></td>
                            <td style="cursor: pointer;" onclick="window.location.href = '<?php echo e(route('affiliationtransactionbysession')); ?>?code=<?php echo e($code->getCodepromo()->getCode()); ?>&session=<?php echo e($sessionpaiement->getId()); ?>'">
                                <?php echo e($code->getCodepromo()->getUser()->getFirstname()); ?>

                                <?php echo e($code->getCodepromo()->getUser()->getLastname()); ?> <br>
                                <?php echo e($code->getCodepromo()->getUser()->getEmail()); ?>


                            </td>
                            <td><?php $b='this.created_at';?><?php echo e($code->getCodepromo()->$b); ?></td>
                            <td>
                                <label class="badge badge-primary">
                                    <?php echo e($code->getCodepromo()->getUser()->getUsertypeName()); ?>

                                </label>
                            </td>
                            <td><?php $totaux += $code->getMontant(); ?><?php echo e($code->getMontant()); ?> €</td>
                            <td>
                                <?php echo e($code->getStateName()); ?>

                                <?php if($code->getState() == 1): ?>
                                    <a target="__blank" href="<?php echo e($code->getPreuve()); ?>">
                                        <label for="" class="badge badge-success"><?php echo tt('Téléchargez la preuve '); ?></label>
                                    </a>
                                <?php endif; ?>
                            </td>

                        </tr>
                        <?php endif; ?>
                    <?php endif; ?>

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
        function getDataDelete(post){
            id=post;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Do you want too delete post'); ?> "+title+" ?.<br><strong style='color:#e9182f'><?php echo tt('WARNING!! this action is irreversible'); ?></strong>",
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){app.deletePost(this,id);return false; }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }


        $total  = '<?php echo e($totaux); ?>'+'€';
        $('#montantinput').val(<?php echo e($totaux); ?>);
        $('#gain_total').html($total);

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/affiliationprogram/paiementspacekola.blade.php ENDPATH**/ ?>