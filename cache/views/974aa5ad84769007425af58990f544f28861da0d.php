
<?php $__env->startSection('content'); ?>
    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white">
                            <?php echo tt("Mis à jour du mot de passe"); ?>
                        </h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->

    <section class="py-50">
        <div class="container">
            <div class="row justify-content-center g-0">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="box box-body">
                        <div class="content-top-agile pb-0 pt-20">
                            <h2 class="text-primary"><?php echo tt("Mis à jour de votre mot de passe"); ?></h2>
                            <p class="mb-0"><?php echo tt("Suite à la mis à jour de notre politique de sécurité, nous vous invitons à mettez à jour votre mot de passe"); ?></p>
                        </div>
                        <div class="p-40">
                            <form id="confirm-form" method="post" >


                                <div class="message2"></div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="<?php echo e(t("Mot de passe")); ?>">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="<?php echo e(t("Confirmez votre Mot de passe")); ?>">
                                </div>

                                <button onclick="upgradepassword(this)" type="button" class="btn btn-info w-p100 mt-15"><?php echo tt("Envoyer"); ?></button>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsimport'); ?>
    <script>
        function upgradepassword(event){
            model.addLoader($(event));
            var newpassword = $('#password').val();
            var newpasswordconfirm = $('#confirm-password').val();

            var formdata = new FormData();

            formdata.append("password", newpassword);
            formdata.append("confirmpassword", newpasswordconfirm);

            Drequest.api("user.upgradepassword")
                .data(formdata)
                .post(function (response) {
                    model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        $('.message2').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">× </button>Modification éffectuée avec succès</div>');

                        setTimeout(function () {
                            window.location.href = response.route;
                        }, 1000);
                    }
                    else{
                        $('.message2').html(' <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">× </button>'+response.detail+'</div>');
                    }
                })

        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/auth/upgradepassword.blade.php ENDPATH**/ ?>