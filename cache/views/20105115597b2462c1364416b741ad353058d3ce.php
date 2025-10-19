<?php $__env->startSection('content'); ?>
    <style>
        [data-overlay="7"]::before {
            opacity: 0.3!important;
        }
    </style>
    <?php $total = 0 ;$code = Codepromo::where('user_id',App::$user->getId())->andwhere('type',1)->__getAll();?>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <?php if( count($code) > 0): ?>
                <div class="col-md-6">
                    <h4 class="box-title mb-0">
                        <?php echo tt("PROGRAMME D'AFFILIATION"); ?>
                    </h4>
                </div>
                <div class="col-md-4">
                    <h4 class="box-title mb-0" style="font-weight: 100">
                        <?php echo tt("Code d'affiliation"); ?>:
                    </h4>
                     <strong><?php echo e($code[0]->getCode()); ?></strong><br>
                    <h4 class="box-title mb-0" style="font-weight: 100">
                        <?php echo tt("Gain total"); ?>:
                    </h4>
                    <strong id="gain_total"></strong>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo e(route('updateinfosaffiliation')); ?>" class="btn btn-md btn-success pull-right"> <i class="fa fa-plus"></i> <?php echo tt("Mettre à jour mes information"); ?></a>
                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <h4 class="box-title mb-0">
                        <?php echo tt("PROGRAMME D'AFFILIATION"); ?>
                    </h4>
                </div>
            <?php endif; ?>
        </div>

        <hr>

        <?php if( count($code) == 0): ?>
            <div class="col-12" style="text-align: center; margin-top: 2rem">
                <h3 class="box-title mb-0" style="text-decoration: underline">
                    <?php echo tt("DESCRIPTION DU PROGRAMME D'AFFILIATION"); ?>
                </h3>
            </div>
            <div class="col-12 mt-60">

                <div>
                    <p style="text-align: justify; font-size: 20px;">
                        <?php echo tt("Le programme d'affiliation LS2EC TRAINING vous permet d'être rémunéré lorsque vous recommandez des prospects vers notre site internet et qu’ils payent des formations."); ?><br><br>
                        <?php echo tt("Pour participer au programme et recevoir des commissions, il vous suffit de créer votre code promo et de le communiquer à vos prospects."); ?><br><br>
                        <?php echo tt("Vos prospects bénéficieront de 5% de réduction du pack choisi quelque soit leur mode de paiement par Mois ou par An."); ?><br><br>
                        <?php echo tt("Les affiliations sont ouvertes pour l'Europe, l'Amérique, l'Asie, et 2 pays d'Afrique à savoir le Cameroun et la Côte d'Ivoire."); ?><br><br>
                        <?php echo tt("Le programme d’affiliation vous permettra de gagner 30% du montant payé par le client si vous êtes une entreprise et 28% en passant par notre partenaire SPACEKOLA si vous êtes un particulier."); ?>
                    </p>
                </div>
            </div>
            <div class="col-12" style="text-align: center; margin-top: 8rem; margin-bottom: 2rem">
                <h4 class="box-title mb-0" style="text-decoration: underline">
                    <?php echo tt("CREER VOTRE CODE PROMO"); ?>
                </h4>
            </div>
            <div class="col-12">
                <div class="bg-img box box-body py-50"  data-overlay="7">

                    <div class="message"></div>
                    <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                        <div class="form-group col-xl-10 col-lg-9 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                            <input type="text" name="quantity" id="codepromo" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('code promo'); ?>">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-12 mb-0">
                            <button onclick="app.createSimpleattributeinEntity('codepromo',{'type':1,'code':$('#codepromo').val()},'',this,true)"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Save"); ?></button>
                        </div>
                        <div id="payment"></div>
                    </div>
                </div>

            </div>
        <?php else: ?>
            <?php if($code[0]->getState() == -1): ?>
                <div class="col-12">
                    <div class="bg-img box box-body py-50" style="background-color: #0b8e36;" data-overlay="7">

                        <div class="message"></div>
                        <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                            <p style="text-align: center;font-size: 30px;color: #ffffff;margin-bottom: 0px;">
                                <?php echo tt('Votre code est en attente de validation'); ?>
                            </p>
                        </div>
                    </div>

                </div>
            <?php else: ?>
                <?php if($code[0]->getState() == -2): ?>
                    <div class="col-12">
                        <div class="bg-img box box-body py-50" style="" data-overlay="7">

                            <div class="message"></div>
                            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                                <p style="text-align: center;font-size: 20px;color: #ffffff;margin-bottom: 0px;">
                                    <?php echo tt('Votre code a été rejetté. Veuillez le modifier'); ?>
                                </p>
                                <div class="form-group col-xl-10 col-lg-9 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                                    <input type="text" name="quantity" value="<?php echo e($code[0]->getCode()); ?>" id="codepromoupdate" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('code promo'); ?>">
                                </div>
                                <div class="col-xl-2 col-lg-3 col-12 mb-0">
                                    <button onclick="app.updateSimpleattributeinEntity(<?php echo e($code[0]->getId()); ?>,'codepromo',{'state':-1,'code':$('#codepromoupdate').val()},'',this,true)"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Update"); ?></button>
                                </div>
                                <div id="payment"></div>
                            </div>
                        </div>

                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col-12" style="text-align: center">
                            <h4 class="box-title mb-0" style="text-decoration: underline">
                                <?php echo tt("Achats effectué avec mon code "); ?>

                            </h4>
                        </div>
                    </div>


                    <div class="table-responsive mt-30">
                        <table class="table table-striped">
                            <thead>
                            <tr class="bg-dark">
                                <th><?php echo tt("Session"); ?></th>
                                <th><?php echo tt("Utilisateur"); ?></th>
                                <th><?php echo tt("Souscription"); ?></th>
                                <th><?php echo tt("Durée"); ?></th>
                                <th><?php echo tt("Montant"); ?></th>
                                <th><?php echo tt("Date"); ?></th>
                                <th><?php echo tt("Gain"); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $total = 0;
                            $paiements = array_reverse(Paiement::where('codepromo','=',$code[0]->getCode())->__getAll());
                            ?>
                            <?php $__currentLoopData = $paiements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paiement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo tt('Session'); ?> <?php echo e($paiement->getSessionpaiement()->getNumero()); ?>


                                        <?php $pourcentage = $paiement->getSessionpaiement()->getPourcentagegain();?>

                                    </td>
                                    <td><?php echo e($paiement->getUSer()->getFirstname()); ?> <?php echo e($paiement->getUser()->getLastname()); ?> </td>
                                    <td><?php echo e($paiement->getMotif()); ?></td>
                                    <td><?php echo e($paiement->getNbremonth()); ?></td>
                                    <td><?php echo e($paiement->getMontant()); ?> €</td>
                                    <td><?php $a='this.created_at';?><?php echo e($paiement->$a); ?></td>
                                    <?php $a = ($paiement->getMontant()*$pourcentage)/100; ?>
                                    <?php
                                        if($a > 0 && $code[0]->getType() == "1"){
                                            $b = ($paiement->getMontant()*2)/100;
                                            $a = $a - $b;
                                        }
                                        $total += $a;
                                    ?>

                                    <td><?php echo e($a); ?>€</td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($total == 0): ?>
                                    <tr>
                                        <td colspan="7"><?php echo tt("Aucun achat n'a encore été effectué avec votre code"); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td style="text-align: center" colspan="5">
                                        <h4><?php echo tt('Total des gains'); ?></h4>
                                    </td>
                                    <td style="text-align: center" colspan="2">
                                        <h4>
                                            <?php echo e($total); ?> €
                                        </h4>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>


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

        $total  = '<?php echo e($total); ?>'+'€';
        $('#gain_total').html($total);

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ls2ecgood\web\views/board/affiliationprogram/account.blade.php ENDPATH**/ ?>