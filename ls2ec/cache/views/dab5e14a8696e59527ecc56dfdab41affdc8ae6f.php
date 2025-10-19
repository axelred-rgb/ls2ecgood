
<?php $__env->startSection('content'); ?>
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white"><?php echo tt("Investor"); ?></h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->
	
	<section class="py-50 bg-white">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7 col-12">
					<h2 class="mb-10"><?php echo tt("Actionnariat"); ?></h2>
					<h4 class="fw-400"></h4>
					<p class="fs-16">
						<br>
						<br>
						<?php echo tt("LS2EC TRAINING une SAS dont le capital est constitué de 1000 actions."); ?>
						<br>

						<br>	<?php echo tt("L’actionnariat est réparti comme suit :"); ?>
						<br>
						<li><?php echo tt("LS2EC CONSULTING détient 82% des parts de LS2EC TRAINING"); ?></li>
						<li><?php echo tt("BIYIHA MANG CLAUDE MARCEL  détient 18% des parts de LS2EC TRAINING"); ?></li>

						<br>
						<?php echo tt("Si vous voulez investir dans LS2EC TRAINING, contactez-nous : "); ?>

							<li><i class="ti-mobile"> </i>      <b>+33 6 51 95 76 24</b></li>
							<li><i class="ti-email">  </i>  <b><a href="mailto:cm.biyihamang@ls2ec.com">cm.biyihamang@ls2ec.com</a></b></li>
						<br>
					</p>

				</div>
				<div class="col-lg-5 col-12 position-relative">
					<div class="popup-vdo mt-30 mt-md-0">
						<img src="<?php echo e(assets); ?>images/product/chart.png" class="img-fluid rounded" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="py-100" data-jarallax='{"speed": 0.4}' style="background-image: url(<?php echo e(assets); ?>images/product/finance.jpg);" data-overlay="5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-12">
					<div class="text-center text-white">
						<h2 class="mb-15 fw-600 fs-40"><?php echo tt("Comptes et rapports financiers"); ?></h2>
						<p></p>
						<div class="mt-5"><a href="#" class="btn btn-primary"><?php echo tt(" Rapport financier (Télécharger le PDF) "); ?></a></div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>
	
	

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ls2ec\web\views/investor.blade.php ENDPATH**/ ?>