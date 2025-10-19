<?php $__env->startSection('content'); ?>
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">
						<h2 class="page-title text-white"><?php echo tt("Courses Details"); ?></h2>

					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Page content -->

	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-md-7 col-12">
					<div class="box">
						<div class="box-body">
							<h3 class="box-title"><?php echo e($course->getName()); ?></h3>
							<div class="cour-stac d-lg-flex align-items-center text-fade">
								<div class="d-flex align-items-center">
									<p><?php echo tt("Start Date"); ?> <?php echo tt("Imediatly"); ?></p>
									<p class="lt-sp">|</p>
									<p><?php echo e($course->provider->getName()); ?></p>
									<p class="lt-sp">|</p>
								</div>
								
								<div class="d-flex align-items-center">
									<p><?php echo tt("English - French"); ?></p>
									<p class="lt-sp">|</p>
									<p><?php echo e($course->getDuree()); ?></p>
								</div>
							</div>

						</div>
					</div>
					<div class="box">
						<div class="box-body">
							<h4 class="box-title mb-0 fw-500"><?php echo tt("Description"); ?></h4>
							<hr>
							<p class="fs-16 mb-30">
								<?php echo $course->getDescription(); ?>

								</p>
							<hr>
							<h4 class="box-title mb-0 fw-500"><?php echo tt("Certification"); ?></h4>
							<p class="fs-16 mb-30"><?php echo tt("At the end of this courses you are able to run for certification."); ?></p>
						</div>
					</div>

					<div class="box">
						<div class="box-body">
							<h4 class="box-title mb-0 fw-500"><?php echo tt("Curriculum Details"); ?></h4>
							<hr>
							<ul class="course-curriculum">
								<?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<h5 class="text-primary fw-500"><?php echo e($section->getTitle()); ?></h5>
									<ul class="list-unstyled">
										<?php $__currentLoopData = $section->getActivities(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li>
											<div class="list-bx">
												<?php echo e($activity->getTitle()); ?>

											</div>
										</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>

				</div>
				<div class="col-xl-4 col-md-5 col-sm-12">
					<div class="course-detail-bx">
						<div class="box box-body">

							<?php if(count(App::$usersubscription) > 0): ?>
								<div class="text-center">
									<a href="<?php echo e('gotocourse'); ?>?id=<?php echo $course->getProvidercoursesid(); ?>" type="button" onclick="location.href='<?php echo e(route('pricing')); ?>';" class="waves-effect waves-light btn w-p100 btn-success mb-10">
										<?php echo tt("Continuer"); ?>
									</a>
								</div>
							<?php else: ?>
								
								<div class="text-center">
									<?php if(App::$user->getId()): ?>
										<a href="<?php echo e('gotocourse'); ?>?id=<?php echo $course->getProviderfreecoursesid(); ?>" type="button" onclick="location.href='<?php echo e(route('pricing')); ?>';" class="waves-effect waves-light btn w-p100 btn-success mb-10">
											<?php echo tt("Suivre la version limitée"); ?>
										</a>
									<?php endif; ?>

									<button type="button" onclick="location.href='<?php echo e(route('pricing')); ?>';" class="waves-effect waves-light btn w-p100 btn-success mb-10">
										<?php echo tt("Enroll Now"); ?>
									</button>
								</div>
							<?php endif; ?>
						</div>
						
						<div class="box box-body">
							<div class="staff-bx">
								<div class="staff-info d-flex align-items-center">
									<div class="staff-thumb me-10">
										<img src="<?php echo e(assets); ?>images/avatar/avatar-1.png" alt="" class="bg-secondary-light rounded-circle max-w-60">
									</div>
									<div class="staff-name">
										<h5 class="mb-0"><?php echo e($course->provider->getName()); ?></h5>
										<span>Instructor</span>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/coursedetail.blade.php ENDPATH**/ ?>