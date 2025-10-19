
<?php $__env->startSection('content'); ?>
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white"><?php echo tt("Blog"); ?></h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section class="py-50">
		<div class="container">

			<div class="row justify-content-center">

				<?php $__currentLoopData = Article::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $articles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-9 col-12">
					<div class="box">


						<div class="row g-0">
							<div class="col-md-4 col-12 bg-img h-md-auto h-250" style="background-image: url(<?php echo e(__env); ?>uploads/article/<?php echo e($articles->getImage()); ?>)"></div>
							<div class="col-md-8 col-12">
								<div class="box-body">
									<h4><a href="<?php echo e(route('blog')); ?>?id=<?php echo e($articles->getId()); ?>"><?php echo e($articles->getTitle()); ?></a></h4>
									<div class="d-flex mb-10">
										<div class="me-10">
											<i class="fa fa-user me-5"></i> LS2EC
										</div>
									</div>

									<p><?php echo e($articles->getResume()); ?></p>

									<div class="flexbox align-items-center mt-3">
										<a class="btn btn-sm btn-primary" href="<?php echo e(route('blog')); ?>?id=<?php echo e($articles->getId()); ?>"><?php echo tt("Read more"); ?></a>

									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ls2ec\web\views/bloglist.blade.php ENDPATH**/ ?>