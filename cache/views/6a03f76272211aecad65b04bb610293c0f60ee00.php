
<?php $__env->startSection('content'); ?>
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white"><?php echo tt("Inscription"); ?></h2>
						
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
							<h2 class="text-primary"><?php echo tt("Votre Compte à été activé avec success"); ?></h2>

						</div>
						<div class="p-40">

								<button onclick="location.href='<?php echo e(route('home')); ?>';" type="button" class="btn btn-info w-p100 mt-15"><?php echo tt("Commencer"); ?></button>

						</div>

					</div>								

					
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/auth/registerconfirm.blade.php ENDPATH**/ ?>