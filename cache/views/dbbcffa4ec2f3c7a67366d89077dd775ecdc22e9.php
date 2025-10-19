<?php $__env->startSection('content'); ?>
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white"><?php echo tt('Article'); ?></h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-1 col-md-1 col-12">
					
				</div>
				<div class="col-lg-10 col-md-8 col-12">
					<div class="blog-post mb-30">
						<div class="entry-image clearfix">
							<img class="img-fluid" src="<?php echo e(__env); ?>uploads/article/<?php echo e($article->getImage()); ?>" alt="">
						</div>
						<div class="blog-detail">
							<div class="entry-meta mb-10">
								<ul class="list-unstyled">
									<div class="me-10">
										<i class="fa fa-user me-5"></i> LS2EC
									</div>
								</ul>
							</div>
							<hr>
							<div class="entry-title mb-10">
								<a href="#" class="fs-24"><?php echo e($article->getTitle()); ?></a>
							</div>
							<div class="entry-content">
								<p style="text-align: justify;"><?php echo $article->getDescription(); ?></p>

							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-1 col-md-1 col-12">	
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/blog.blade.php ENDPATH**/ ?>