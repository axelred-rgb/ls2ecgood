<?php $__env->startSection('cssimport'); ?>
    <style>
        .error>label{
            color:#e31313!important;
        }
        .error>input, .error>textarea{
            border-color:#e31313!important;
        }
        .error>.cke_chrome{
            border-color:#e31313!important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    <?php echo tt("PROGRAMME D'AFFILIATION"); ?>
                </h4>
            </div>
            <div class="col-md-6">

                <a href="<?php echo e(route('affiliationprogram')); ?>" class="btn btn-md btn-success pull-right"> <i class="fa fa-eye"></i> <?php echo tt("Mes transactions"); ?></a>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12">
                <form action="" class="form-control" id="form-update-infos">
                    <div class="row mb-4">
                        <div class="col-sm-12 form-group" data-id="usertype" id="titre">
                            <label for="titreInput"><?php echo tt("Etes vous"); ?> </label>
                            <select class="form-control" onchange="if($('#persontype').val() == 1){
                $('#particular').removeAttr('hidden');
                $('#entreprise').attr('hidden','hidden');
            }
            else{
                $('#entreprise').removeAttr('hidden');
                $('#particular').attr('hidden','hidden');
            }

                            " name="" id="persontype" >
                                <option value=""><?php echo tt('Etes vous?'); ?></option>
                                <option <?php echo e(App::$user->getUsertype() == 1 ? 'selected' : ''); ?> value="1"><?php echo tt('Un Particulier'); ?></option>
                                <option <?php echo e(App::$user->getUsertype() == 2 ? 'selected' : ''); ?>  value="2"><?php echo tt('Une Entreprise'); ?></option>
                            </select>
                            <label for="" class="errormessage"></label>
                        </div>
                        <?php if(App::$user->getUsertype() == 2): ?>
                            <div class="col-12">
                                <div class="bg-img box box-body py-50" style="background-color: #0b8e36;" data-overlay="7">

                                    <div class="message"></div>
                                    <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                                        <p style="text-align: center;font-size: 30px;color: #ffffff;margin-bottom: 0px;">
                                            <?php if(App::$user->getEntreprisestatut() == 0): ?>
                                                <?php echo tt('Vos informations sont en attente de validation'); ?>
                                            <?php elseif(App::$user->getEntreprisestatut() == 1): ?>
                                                <?php echo tt('Vos informations ont été validées'); ?>
                                            <?php else: ?>
                                                <?php echo tt('Vos informations ont été rejettées. Verifiez les et soumettez les à nouveau'); ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        <?php endif; ?>
                    </div>
                    <hr>
                    <div class="row mb-4" <?php echo e(App::$user->getUsertype() != 1   ? 'hidden' : ''); ?>  id="particular" >
                        <div class="col-sm-12" id="resume">
                            <p style="text-align: center; font-size: 25px">
                                <?php echo tt('En tant que particulier, vos paiements seront traités par notre partenaire SPACEKOLA et cela engendrerait 6% comme frais de transaction'); ?>
                            </p>
                        </div>
                        <hr>

                        <div class="col-12">
                            <h4 style="text-align: center"><?php echo tt('Choisissez un moyen de paiement'); ?></h4>
                        </div>
                        <div class="col-12 form-group"  data-id="orangemoney">
                            <label for="summaryInput"><?php echo tt("Numero de téléphone Orange mobile money"); ?></label>
                            <input class="form-control" value="<?php echo e(App::$user->getOrangemoney()); ?>" type="tel">
                        </div>
                        <div class="col-12 form-group"  data-id="mobilemoney">
                            <label for="summaryInput"><?php echo tt("Numero de téléphone MOMO"); ?></label>
                            <input class="form-control" value="<?php echo e(App::$user->getMobilemoney()); ?>" type="tel">
                        </div>
                        <div class="col-12 form-group"  data-id="emailpaypal">
                            <label for="summaryInput"><?php echo tt("Adresse mail paypal"); ?></label>
                            <input class="form-control" value="<?php echo e(App::$user->getemailpaypal()); ?>" type="email">
                        </div>
                        <div class="col-6 form-group"  data-id="nomretrait">
                            <label for="summaryInput"><?php echo tt("Nom"); ?> (Compte Moneygram / Western union)</label>
                            <input class="form-control" value="<?php echo e(App::$user->getNomretrait()); ?>" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="prenomretrait">
                            <label for="summaryInput"><?php echo tt("Prénom"); ?> (Compte Moneygram / Western union)</label>
                            <input class="form-control" value="<?php echo e(App::$user->getPrenomretrait()); ?>" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="telretrait">
                            <label for="summaryInput"><?php echo tt("Telephone"); ?> (Compte Moneygram / Western union)</label>
                            <input class="form-control" value="<?php echo e(App::$user->getTelretrait()); ?>" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="countryretraitid">
                            <label for="summaryInput"><?php echo tt("Country"); ?> (Compte Moneygram / Western union)</label>
                            <select name="" id="" class="form-control">
                                <option value=""><?php echo tt('Select country'); ?></option>
                                <?php $__currentLoopData = Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($country->getId() == App::$user->getCountryretrait()->getId() ? 'selected' : ''); ?> value="<?php echo e($country->getId()); ?>"><?php echo e($country->getName()); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4" <?php echo e(App::$user->getUsertype() != 2 ? 'hidden' : ''); ?> id="entreprise">

                        <div class="col-6 form-group" data-id="denomination">
                            <label for="summaryInput"><?php echo tt("Dénomination"); ?></label>
                            <input class="form-control" value="<?php echo e(App::$user->getDenomination()); ?>" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="sigle">
                            <label for="summaryInput"><?php echo tt("Sigle"); ?></label>
                            <input class="form-control" value="<?php echo e(App::$user->getSigle()); ?>" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="siret">
                            <label for="summaryInput"><?php echo tt("Siret"); ?></label>
                            <input class="form-control " value="<?php echo e(App::$user->getSiret()); ?>" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="banque">
                            <label for="summaryInput"><?php echo tt("Banque"); ?></label>
                            <input class="form-control" value="<?php echo e(App::$user->getBanque()); ?>" type="text">
                        </div>
                        <div class="col-12 form-group" data-id="iban">
                            <label for="summaryInput"><?php echo tt("IBAN"); ?></label>
                            <input class="form-control" value="<?php echo e(App::$user->getIban()); ?>" type="text">
                        </div>
                    </div>
                    <div class="message"></div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-md btn-success" onclick="app.updatesimpleObject(this,<?php echo e(App::$user->getId()); ?>,'user','form-update-infos',false,false,function (){
                                        if($('#persontype').val() == '2'){
                                            successAlert('<?php echo e(tt("Vos informations ont bien été envoyé. Nous les verifierons et vous serez notifié en cas de validation")); ?>');

                                        }
                                        else{
                                            successAlert('<?php echo e(tt("Opération effectué avec succès")); ?>');
                                        }
                                        setTimeout(function () {
                                            window.location.href = '';
                                        }, 2000)
                                    })" type="button" style="width:100%"><?php echo tt("Update"); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>

    <script>
        //alert('pardon');
        function persontype(){

        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/affiliationprogram/updateinfo.blade.php ENDPATH**/ ?>