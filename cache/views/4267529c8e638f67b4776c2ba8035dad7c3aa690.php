
<?php $__env->startSection('content'); ?>

	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white"><?php echo tt("Contact us"); ?></h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->
	
	<section class="py-50">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-7 col-12">
					<form method="post" id="contact-form" >
						<div class="text-start mb-30">
							<h2><?php echo tt("Get In Touch"); ?></h2>
							<p></p>
						</div>
						<div class="row">
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="text" name="firstname" class="form-control" placeholder="<?php echo tt('First Name'); ?>">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="text" name="lastname" class="form-control" placeholder="<?php echo tt('Last Name'); ?>">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="email" name="email" class="form-control" placeholder="<?php echo tt('Your Email'); ?>" required>
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="tel" name="phone" class="form-control" placeholder="<?php echo tt('Phone'); ?>">
							</div>
						  </div>
						  <div class="col-md-6">
							<div class="form-group">
							  <input type="text" name="subject" class="form-control" placeholder="<?php echo tt('Subject'); ?>" required>
							</div>
						  </div>
						  
						  <div class="col-lg-12">
						      <div class="form-group">
								<textarea type="text" name="message" rows="5" class="form-control" required="" placeholder="Message" ></textarea>
							  </div>
						  </div>
						  <div class="col-lg-12">
							  <button type="button" onclick="app.contactform(this)" class="btn btn-info w-p100 mt-15"><?php echo tt("Envoyer"); ?></button>
							 </div>
						</div>
					</form>
				</div>
				<div class="col-md-5 col-12 mt-30 mt-md-0">
					<div class="box box-body p-40 bg-dark mb-0">
						<h2 class="box-title text-white"><?php echo tt("Contact Info"); ?></h2>
						<p></p>
						<div class="widget fs-18 my-20 py-20 by-1 border-light">	
							<ul class="list list-unstyled text-white-80">
								<li class="ps-40"><i class="ti-location-pin"></i>15 RUE DE VIENNE 95380 <br>LOUVRES FRANCE</li>
								<li class="ps-40 my-20"><i class="ti-mobile"></i>+33 6 51 95 76 24</li>
							</ul>
						</div>
						<h4 class="mb-20"><?php echo tt("Follow Us"); ?></h4>
						<ul class="list-unstyled d-flex gap-items-1">
							<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/company/ls2ec-training" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-youtube"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2614.8428847939535!2d2.4986508159163057!3d49.05161087930689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e63fa11fde2109%3A0x74b2e4d1ff7e84a9!2sRue%20de%20Vienne%2C%2095380%20Louvres%2C%20France!5e0!3m2!1sen!2scm!4v1627465069409!5m2!1sen!2scm" class="map" style="border:0" allowfullscreen></iframe>
			</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/contact.blade.php ENDPATH**/ ?>