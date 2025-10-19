
<?php $__env->startSection('content'); ?>								
	<div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
		<h4 class="box-title mb-0">
			<?php echo tt("Token purchase list"); ?>
		</h4>
		<hr>
		<div class="table-responsive">
			<table class="table no-border">
				<thead>
					<tr class="text-uppercase bg-lightest">
						<th><span class="text-dark"><?php echo tt("Name"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Pack"); ?></span></th>
                        <th><span class="text-fade"><?php echo tt("Price"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Quantite"); ?></span></th>
                        <th><span class="text-fade"><?php echo tt("Total price"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Date"); ?></span></th>
					</tr>
				</thead>
				<tbody>
                <?php $__currentLoopData = array_reverse($results); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td id="title<?php echo e($user_token->getId()); ?>" >
                                <?php echo e($user_token->getUser()->firstname); ?> <?php echo e($user_token->getUser()->lastname); ?>

                            </td>
                            
                            <td>
                                <?php echo e($user_token->getPacktokken()->getNombre()); ?>

                            </td>
                            <td>
                                <?php echo e($user_token->price); ?>

                            </td>
                            <td>
                                <?php echo e($user_token->getQuantite()); ?>

                            </td>
                            <td>
                                <?php echo e($user_token->price*$user_token->getQuantite()); ?> €
                            </td>
                            <td>
                                <?php echo e($user_token->getDate()); ?>

                            </td>
                        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>								
<?php $__env->stopSection(); ?>


<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/log/paiementstokenlist.blade.php ENDPATH**/ ?>