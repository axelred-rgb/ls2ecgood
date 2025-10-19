
<?php $__env->startSection('content'); ?>
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">Nouveau mot de passe</h2>
						
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
							<h2 class="text-primary"><?php echo tt("Entrer votre nouveau mot de passe"); ?></h2>
						</div>
						<div class="p-40">

							<form id="resetpassword-form" method="post">


								<div class="form-group">
									<input type="hidden" name="activationcode" class="form-control" id="resetpassword-form" placeholder="activation code" value="<?php echo e($vld); ?>">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" id="resetpassword-form" placeholder="New Password">
								</div>
								<div class="form-group">
									<input type="password" name="confirmpassword" class="form-control" id="resetpassword-form" placeholder="Confirm new password">
								</div>

								<input type="hidden" name="user" class="form-control" id="resetpassword-form" value="<?php echo e($u_id); ?>">

								<div class="resetpassword-error"></div>
								<button onclick="app.resetpassword(this)" type="button" class="btn btn-info w-p100 mt-15"><?php echo tt("valider"); ?></button>
								<hr>
							</form>


						</div>
					</div>								

					
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/auth/resetpassword.blade.php ENDPATH**/ ?>