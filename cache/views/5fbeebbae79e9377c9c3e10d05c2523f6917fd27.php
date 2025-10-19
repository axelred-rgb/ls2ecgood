
<?php $__env->startSection('content'); ?>
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white"><?php echo tt("Register"); ?></h2>
						
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
							<h2 class="text-primary"><?php echo tt("Get started with Us"); ?></h2>
							<p class="mb-0"><?php echo tt("Register a New Membership"); ?></p>
						</div>
						<div class="p-40">
							<?php echo Form::open(new user(), ["action" => __env."api/user.create", "method" => "post"]); ?>


							<div class='form-group'>
								<?php echo Form::input('firstname', "", ['class' => 'form-control', 'placeholder' => t('Firstname*')]); ?>

							</div>
							<div class='form-group'>
								<?php echo Form::input('lastname', "", ['class' => 'form-control', 'placeholder' => t('Lastname*')]); ?>

							</div>
							<div class='form-group'>
								<?php echo Form::input('username', "", ['class' => 'form-control', 'placeholder' => t('Username*')]); ?>

							</div>
							<div class='form-group'>
								<?php echo Form::email('email', "", ['class' => 'form-control', 'placeholder' => t('Email*')]); ?>

							</div>
							<div class='form-group'>
								<?php echo Form::select('country.id',
                                    FormManager::Options_Helper('namecode', Country::allrows()),
                                    "",
                                    ['class' => 'form-control', 'placeholder' => t('Select your country*')]);; ?>

							</div>
							<div class='form-group'>
								<?php echo Form::input('telephone', "", ['class' => 'form-control', 'placeholder' => t('phone number without phone code')]); ?>

							</div>
							<div class='form-group'>
								<?php echo Form::input('raison', "", ['class' => 'form-control'], 'hidden'); ?>

							</div>
							<div class='form-group'>
								<?php echo Form::password('password', "", ['class' => 'form-control', 'placeholder' => t('password*')]); ?>

							</div>
							<div class='form-group'>
								<?php echo Form::password('confirmpassword', "", ['class' => 'form-control', 'placeholder' => t('confirm password*')]); ?>

							</div>
							<div id="captcha"></div>
							<div class="form-error">
							</div>

							<button type="button" onclick="app.register(this)" disabled  class="btn btn-info w-p100 mt-15 submit"><?php echo tt("Envoyer"); ?></button>

							<?php echo Form::close(); ?>

							<div class="text-center">
								<p class="mt-15 mb-0"><?php echo tt("Already have an account?"); ?><a href="<?php echo e(route('login')); ?>" class="text-danger ms-5"> <?php echo tt("Log In"); ?></a></p>
							</div>
						</div>
					</div>								

					
				</div>
			</div>
		</div>
	</section>	

<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
<script type="text/javascript">
	var verifyCallback = function(response) {
		$("form").attr("action", "<?php echo e(__env); ?>"+"api/user.create" );
		$(".submit").removeAttr("disabled");
	};
	
	var onloadCallback = function() {
	
		grecaptcha.render('captcha', {
			'sitekey' : '6LeodRIdAAAAAEQTyVHaynthWv0pXLTHpZy_BeXc',
			'callback' : verifyCallback,
			'theme' : 'light'
		});
	};
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/auth/register.blade.php ENDPATH**/ ?>