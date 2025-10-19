
<?php $__env->startSection('content'); ?>
    <style>
        .cours-search label{
            font-size: 18px;
            color: #ffffff;
        }
    </style>
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("My profile"); ?>
        </h4>
        <hr>

        <div class="bg-img box box-body py-50" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white"><?php echo tt("Update personnal information"); ?></h1>
                <div class="message"></div>
            </div>

            <div class="row">
                <div class="form col-6 g-0 align-items-center cours-search " style="width: 45%;"id="purchase-token">
                    <label for=""><?php echo tt("Nom"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">

                        <input type="text" name="nom" id="nom" value="<?php echo e(App::$user->getFirstname()); ?>" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('Nom'); ?>">
                    </div>

                </div>
                <div class="form col-6 g-0 align-items-center cours-search" style="width: 45%" id="purchase-token">
                    <label for=""><?php echo tt("Prénom"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="text" name="prenom" id="prenom" value="<?php echo e(App::$user->getLastname()); ?>" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('prenom'); ?>">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="form col-6 g-0 align-items-center cours-search " style="width: 45%;"id="purchase-token">
                    <label for=""><?php echo tt("Username"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="text" name="username" id="username2" value="<?php echo e(App::$user->getUsername()); ?>" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('username'); ?>">
                    </div>

                </div>
                <div class="form col-6 g-0 align-items-center cours-search" style="width: 45%" id="purchase-token">
                    <label for=""><?php echo tt("Email"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="email" name="email" value="<?php echo e(App::$user->getEmail()); ?>" id="email" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('email'); ?>">
                    </div>

                </div>
            </div>

            <div class="message"></div>
            <div class="row">
                <div class="col-6"></div>
                <div class="form col-6 g-0 align-items-center cours-search">
                    <button type="button" onclick="app.updateUser(this)"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Update"); ?></button>


                </div>
            </div>
        </div>

    </div>

    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">

        <div class="bg-img box box-body py-50" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white"><?php echo tt("Update Phone number"); ?></h1>
                <div class="message"></div>
            </div>

            <div class="row">
                <div class="form col-6 g-0 align-items-center cours-search " style="width: 45%;"id="purchase-token">
                    <label for=""><?php echo tt("Country"); ?></label>
                    <select class="form-control  input-lg b-0 be-1 border-light rounded-0" onchange="reset()" id="country" style="width: 100%;" name="packtoken">
                        <option selected="selected"  disabled><?php echo tt("Country"); ?></option>
                        <?php $__currentLoopData = Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($country->getId() == App::$user->getCountry()->getId() ? 'selected': ''); ?> value="<?php echo e($country->getId()); ?>"> <?php echo e($country->getName()); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form col-6 g-0 align-items-center cours-search" style="width: 45%" id="purchase-token">
                    <label for=""><?php echo tt("Phonenumber without country code"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="tel" name="tel" value="<?php echo e(App::$user->getPhonenumber()); ?>" id="phonenumber" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('Phonenumber'); ?>">
                    </div>

                </div>

                <div class="form col-6 g-0 align-items-center cours-search" hidden="hidden" style="width: 45%" id="code-act">
                    <label for=""><?php echo tt("Code d'activation"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="text" name="code"  id="code" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('Code d activation'); ?>">
                    </div>

                </div>
                <div class="form col-6 g-0 align-items-center cours-search" hidden="hidden" style="width: 45%" id="pass-word">
                    <label for=""><?php echo tt("Password"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="password" name="password"  id="password" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('Mot de passe'); ?>">
                    </div>

                </div>

                <div class="message2"></div>

                <div class="form col-6 g-0 align-items-center cours-search" hidden="hidden"  id="updatephonecountry">
                    <button type="button" onclick="app.updatephonorcountrystep2(this)"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Update"); ?></button>
                </div>

            </div>
            <div class="row">
                <div class="col-6"></div>
                <div class="form col-6 g-0 align-items-center cours-search">
                    <button id="updatephonecountry" onclick="app.updatephonorcountrystep2(this)" hidden="hidden"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Update"); ?></button>

                    <button type="button" onclick="app.updatephonorcountrystep1(this)"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Send activation code"); ?></button>
                </div>
            </div>
        </div>

    </div>

    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">

        <div class="bg-img box box-body py-50" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white"><?php echo tt("Mettre à jour son mot de passe"); ?></h1>
                <div class="message"></div>
            </div>

            <div class="row">
                <div class="form col-12 g-0 align-items-center cours-search"  style="width: 100%" id="pass-word">
                    <label for=""><?php echo tt("Ancien mot de passe"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="password" name="password"  id="passwordlast" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('Ancien mot de passe'); ?>">
                    </div>

                </div>

                <div class="form col-6 g-0 align-items-center cours-search"  style="width: 45%" id="pass-word">
                    <label for=""><?php echo tt("Nouveau mot de passe"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="password" name="password"  id="passwordnew" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('Nouveau mot de passe'); ?>">
                    </div>

                </div>
                <div class="form col-6 g-0 align-items-center cours-search"  style="width: 45%" id="pass-word">
                    <label for=""><?php echo tt("Confirmer le nouveau mot de passe"); ?></label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="password" name="password"  id="passwordnewconfirm" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="<?php echo tt('Confirmer les mot de passe'); ?>">
                    </div>

                </div>

                <div class="message2"></div>

                <div class="form col-6 g-0 align-items-center cours-search"   id="updatephonecountry">
                    <button type="button"  onclick="app.changepassword(this)"  class="btn w-p100 btn-danger rounded-0"><?php echo tt("Mettre à jour"); ?></button>
                </div>

            </div>








        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>


    <script>

        $('#pack').select2();
        function reset(){
            //alert("maff");
            $("#paypalbtn").html("");
            $("#paypalbtn").attr("hidden",'hidden');
            $('#paymentToken').attr('hidden','hidden');
        }
        $('#qte').on('change keyup', function() {
            reset();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/updateaccount.blade.php ENDPATH**/ ?>