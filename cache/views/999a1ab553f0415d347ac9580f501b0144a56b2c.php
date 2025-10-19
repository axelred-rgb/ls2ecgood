
<?php $__env->startSection('content'); ?>
    <style>
        .message{
            color: #FFFFFF;
            font-size: 1.5rem;
            margin-bottom: 8px;
        }
        .information{
            font-weight: bold;
            font-size: 15px;
            text-transform: uppercase;
        }
    </style>
    <?php $total = 0;?>
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    <?php echo tt("Liste des transactions associées au code"); ?> <?php echo e($code->getCode()); ?>

                    <?php if($session->getId()): ?>
                        <?php echo tt('Au cours de la session'); ?> <?php echo e($session->getNumero()); ?>

                    <?php endif; ?>
                </h4>
            </div>
            <div class="col-md-6" style="padding-left: 25%;">
                <h4 class="box-title mb-0" style="font-weight: 100">
                    <?php echo tt("Utilisateur"); ?>:
                </h4>
                <strong><?php echo e($code->getUser()->getFirstname()); ?> <?php echo e($code->getUser()->getLastname()); ?></strong><br>
                <h4 class="box-title mb-0" style="font-weight: 100">
                    <?php echo tt("Gain total"); ?>:
                </h4>
                <strong id="gain_total"></strong>
            </div>
        </div>

        <hr>

        <?php $user = $code->getUser(); ?>
        <div class="row">

            <?php if($user->getUsertype() == 2): ?>
                <div class="table-responsive">
                    <table class="table">

                        <tbody>
                            <tr>
                                <td colspan="2" style="text-align: center; font-size: 1.8rem">
                                    <?php echo tt('Informations '); ?>
                                    <?php if($user->getEntreprisestatut() == 0): ?>
                                        <label style="background-color: #9d9105!important;" class="pull-right badge badge-primary"><?php echo tt("Entreprise En attente de validation"); ?></label>
                                    <?php elseif($user->getEntreprisestatut() == 1): ?>
                                        <label class=" pull-rightbadge badge-primary"><?php echo tt("Entreprise Validées"); ?></label>
                                    <?php else: ?>
                                        <label style="background-color: #ff0000!important;" class="pull-right badge badge-danger"><?php echo tt("Entreprise Rejettées"); ?></label>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt("Type d'utilisateur"); ?></td>
                                <td><?php echo e($user->getUsertype() == 2 ? tt('Entreprise') : tt('Particulier')); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Denomination'); ?></td>
                                <td><?php echo e($user->getDenomination()); ?> </td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Sigle'); ?></td>
                                <td><?php echo e($user->getSigle()); ?><</td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Siret'); ?></td>
                                <td><?php echo e($user->getSiret()); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Banque'); ?></td>
                                <td><?php echo e($user->getBanque()); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Iban'); ?></td>
                                <td><?php echo e($user->getIban()); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table">

                        <tbody>
                            <tr>
                                <td class="information" style="text-align: center; font-size: 1.8rem" colspan="2">
                                    <?php echo tt('Informations '); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt("Type d'utilisateur"); ?></td>
                                <td><?php echo e($user->getUsertype() == 2 ? tt('Entreprise') : tt('Particulier')); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Numero OM'); ?></td>
                                <td><?php echo e($user->getOrangemoney()); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Email Paypal'); ?></td>
                                <td><?php echo e($user->getEmailpaypal()); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Nom'); ?></td>
                                <td><?php echo e($user->getNomretrait()); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Prenom'); ?></td>
                                <td><?php echo e($user->getPrenomretrait()); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Telephone'); ?></td>
                                <td><?php echo e($user->getTelretrait()); ?></td>
                            </tr>
                            <tr>
                                <td class="information"><?php echo tt('Pays'); ?></td>
                                <td><?php echo e($user->getCountryretrait()->getName()); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            <?php endif; ?>
        </div>
        <hr>
        <?php if((App::$user->getRole() == 2 && $user->getUsertype() == 2) || (App::$user->getRole() == 3 && $user->getUsertype() !== 2)): ?>
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
                        <div class="form-group" hidden data-id="processfees">
                            <input type="text" value="1" id="processfees" class="form-control">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-12 mb-0">
                            <button onclick="app.updatesimpleObject(this,<?php echo e($sessioncode->getId()); ?>,'sessioncodepromo','send-proofs','')"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Save"); ?></button>
                        </div>
                        <div id="payment"></div>
                    </div>
                </div>

            </div>
            <hr>
        <?php endif; ?>
        <h4><?php echo tt('Liste des paiements'); ?></h4>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark"><?php echo tt("Utilisateur"); ?></span></th>
                    <th><span class="text-dark"><?php echo tt("Souscription"); ?></span></th>
                    <th><span class="text-dark"><?php echo tt("Durée"); ?></span></th>
                    <th><span class="text-dark"><?php echo tt("Montant"); ?></span></th>
                    <th><span class="text-dark"><?php echo tt("Date"); ?></span></th>
                    <th><span class="text-dark"><?php echo tt("Gain"); ?></span></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $paiements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($paiement->getUSer()->getFirstname()); ?> <?php echo e($paiement->getUser()->getLastname()); ?> </td>
                        <?php $pourcentage = $paiement->getSessionpaiement()->getPourcentagegain();?>
                        <td><?php echo e($paiement->getMotif()); ?></td>
                        <td><?php echo e($paiement->getNbremonth()); ?></td>
                        <td><?php echo e($paiement->getMontant()); ?> €</td>
                        <td><?php $a='this.created_at';?><?php echo e($paiement->$a); ?></td>
                        <?php $a = ($paiement->getMontant()*$pourcentage)/100; $total += $a;?>
                        <td><?php echo e($a); ?>€</td>
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
        $total  = '<?php echo e($total); ?>'+'€';
        $('#gain_total').html($total);
        $process = 0;
        <?php if($user->getUsertype() != 2): ?>
            <?php $fees = 20*$total/100; ?>
            $process = <?php echo e($fees); ?>

        <?php else: ?>
            $process = 0;
        <?php endif; ?>

        $('#processfees').val(''+$process);
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
                'content': "<?php echo tt('Do you want to disable user'); ?> "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){app.enabledisableUser(id,2);return false; }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/affiliationprogram/transaction.blade.php ENDPATH**/ ?>