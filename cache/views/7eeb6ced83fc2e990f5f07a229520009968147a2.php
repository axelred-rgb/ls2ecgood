<?php $__env->startSection('content'); ?>								
	<div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
		<h4 class="box-title mb-0">
			<?php echo tt("Cours gratuits"); ?>
		</h4>
		<hr>
		<div class="table-responsive">
			<table class="table no-border">
				<thead>
					<tr class="text-uppercase bg-lightest">
						<th><span class="text-dark"><?php echo tt("Coursed"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Category"); ?></span></th>

						<th><span class="text-fade"><?php echo tt("Statut"); ?></span></th>
						
						<th><span class="text-fade"><?php echo tt("Action"); ?></span></th>

					</tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $mycourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u_courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<?php echo e($u_courses->getName()); ?>

						</td>
						<td>
							<?php echo e($u_courses->academies->getName()); ?>

						</td>
						<td>
							En attente de paiement
						</td>
						
						<td>
							<?php if($u_courses->statut != 0): ?>
								<a target="_blank" href="<?php echo e('gotocourse'); ?>?id=<?php echo $u_courses->getProviderfreecoursesid(); ?>"><span  class="badge badge-success badge-lg"><?php echo tt("continue"); ?></span>
								</a>
							<?php endif; ?>
						<td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>								
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/freecourse.blade.php ENDPATH**/ ?>