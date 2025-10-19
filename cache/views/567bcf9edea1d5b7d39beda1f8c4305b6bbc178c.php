
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0 ">
                    <?php echo tt("Liste des operation au cours de la session"); ?> <?php echo e($sessionpaiement->getNumero()); ?>

                </h4>
            </div>
            <div class="col-md-6" style="padding-left: 30%;">
                <h4 class="box-title mb-0 " style="font-weight: 100">
                    <?php echo tt("Total à payer"); ?>:
                </h4>
                <strong id="gain_total"></strong>
                <div class="row">
                    <?php if(App::$user->getRole() == 2): ?>
                        <div class="col-12">
                            <a class="btn btn-sm btn-success" href="<?php echo e(route('paiementspacekola')); ?>?session=<?php echo e($sessionpaiement->getId()); ?>" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                <i class="fa fa-dollar"></i> <?php echo tt('Paiement spacekola'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <?php if(!isset($reference)): ?>
                <div class="col-4">
                    <label for="" id="stat_ets"><?php echo tt('Paiement entreprise'); ?> :</label>
                    <strong id="stat_ets_value"></strong>
                </div>
                <div class="col-4">
                    <label for="" id="stat_space"><?php echo tt('Paiement spacekola'); ?> :</label>
                    <strong id="stat_space_value">
                        <?php
                            $spacekola = Sessioncodepromo::where('sessionpaiement_id',$sessionpaiement->getId())
                                ->andwhere('ispacekola',1)
                                ->whereIsNull('codepromo_id')->__getOne();
                            echo $spacekola->getStateName();
                            $a = 'this.state';
                            if($spacekola->$a !== 0){
                        ?>
                        <a target="__blank" style="margin-top:2px;" href="<?php echo e(route('generateinvoiceaffiliation')); ?>?id=<?php echo e($spacekola->getId()); ?>">
                            <label for="" class="badge badge-primary"><?php echo tt('Téléchargez la facture'); ?></label>
                        </a>
                        <?php } ?>

                    </strong>
                </div>
            <?php endif; ?>
            <div class="col-4">
                <label for="" id="stat_part"><?php echo tt('Paiement particulier'); ?> :</label>
                <strong id="stat_part_value"></strong>
            </div>

        </div>
        <hr>

        <div class="table-responsive mt-30">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><?php echo tt("Code"); ?></th>
                    <th><?php echo tt("Utilisateur"); ?></th>
                    <th><?php echo tt("Date de creation"); ?></th>
                    <th><?php echo tt('Type'); ?></th>
                    <th><?php echo tt("Montant total"); ?></th>
                    <th><?php echo tt("Etat du paiement"); ?> </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;$totaux=0; $isOk = true; $totalets = 0; $total_ets_pay = 0; $total_par = 0 ; $total_par_pay = 0 ?>
                <?php $__currentLoopData = array_reverse($codes); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($code->getIspacekola() != 1): ?>
                        <?php if(isset($reference) && $reference == 1): ?>
                            <?php if($code->getCodepromo()->getUser()->getUsertype() != 2): ?>
                                <?php $isOk = true;?>
                            <?php else: ?>
                                <?php $isOk = false;?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php $isOk = true;?>
                        <?php endif; ?>

                        <?php
                           if($code->getCodepromo()->getUser()->getUsertype() == 2){
                               $totalets++;
                               if($code->getState() == 1){
                                   $total_ets_pay++;
                               }
                           }
                           else{
                               $total_par++;
                               if($code->getState() == 1){
                                   $total_par_pay++;
                               }
                           }

                        ?>


                        <?php if($isOk): ?>
                            <tr style="cursor: pointer;" >

                                <td onclick="window.location.href = '<?php echo e(route('affiliationtransactionbysession')); ?>?code=<?php echo e($code->getCodepromo()->getCode()); ?>&session=<?php echo e($sessionpaiement->getId()); ?>'">
                                    <?php echo e($code->getCodepromo()->getCode()); ?>

                                </td>
                                <td onclick="window.location.href = '<?php echo e(route('affiliationtransactionbysession')); ?>?code=<?php echo e($code->getCodepromo()->getCode()); ?>&session=<?php echo e($sessionpaiement->getId()); ?>'">
                                    <?php echo e($code->getCodepromo()->getUser()->getFirstname()); ?>

                                    <?php echo e($code->getCodepromo()->getUser()->getLastname()); ?> <br>
                                    <?php echo e($code->getCodepromo()->getUser()->getEmail()); ?>


                                </td>
                                <td onclick="window.location.href = '<?php echo e(route('affiliationtransactionbysession')); ?>?code=<?php echo e($code->getCodepromo()->getCode()); ?>&session=<?php echo e($sessionpaiement->getId()); ?>'">
                                    <?php $b='this.created_at';?><?php echo e($code->getCodepromo()->$b); ?>

                                </td>
                                <td onclick="window.location.href = '<?php echo e(route('affiliationtransactionbysession')); ?>?code=<?php echo e($code->getCodepromo()->getCode()); ?>&session=<?php echo e($sessionpaiement->getId()); ?>'">
                                    <label class="badge badge-primary">
                                        <?php echo e($code->getCodepromo()->getUser()->getUsertypeName()); ?>

                                    </label>
                                </td>
                                <td onclick="window.location.href = '<?php echo e(route('affiliationtransactionbysession')); ?>?code=<?php echo e($code->getCodepromo()->getCode()); ?>&session=<?php echo e($sessionpaiement->getId()); ?>'">
                                        <?php $totaux += $code->getMontant(); ?>
                                        <?php echo e($code->getMontant()); ?> €
                                </td>
                                <td>
                                    <?php echo e($code->getStateName()); ?>

                                    <?php if($code->getState() == 1): ?>
                                        <a target="__blank" href="<?php echo e($code->getPreuve()); ?>">
                                            <label for="" class="badge badge-success"><?php echo tt('Téléchargez la preuve '); ?></label>
                                        </a>
                                        <a target="__blank" style="margin-top:2px;" href="<?php echo e(route('generateinvoiceaffiliation')); ?>?id=<?php echo e($code->getId()); ?>">
                                            <label for="" class="badge badge-primary"><?php echo tt('Téléchargez la facture'); ?></label>
                                        </a>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $etspercent = 0;
                    if($totalets == 0){
                        $etspercent = tt('Aucun à effectuer');
                    }
                    else{
                        $etspercent = ($total_ets_pay/$totalets)*100;
                        $etspercent = $etspercent.' %';
                    }

                    $partpercent = 0;
                    if($total_par == 0){
                        $partpercent = tt('Aucun à effectuer');
                    }
                    else{
                        $partpercent = ($total_par_pay/$total_par)*100;
                        $partpercent = $partpercent.' %';
                    }
                ?>

                </tbody>
            </table>
        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>

    <script>
        <?php if(!isset($reference)): ?>
            $('#stat_ets_value').html('<?php echo e($etspercent); ?>');
        <?php endif; ?>
        $('#stat_part_value').html('<?php echo e($partpercent); ?>');

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
        $('#gain_total').html($total);

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/affiliationprogram/contentsession.blade.php ENDPATH**/ ?>