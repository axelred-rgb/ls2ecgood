<?php $__env->startSection('content'); ?>								
	<div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
		<h4 class="box-title mb-0">
			<?php echo tt("Labs reservations list"); ?>
		</h4>
		<hr>
		<div class="table-responsive">
			<table class="table no-border">
				<thead>
					<tr class="text-uppercase bg-lightest">
						<th><span class="text-dark"><?php echo tt("User Name"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Labs"); ?></span></th>
                        <th><span class="text-fade"><?php echo tt("Key"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Start date"); ?></span></th>
                        <th><span class="text-fade"><?php echo tt("End date"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Status"); ?></span></th>
                        <th><span class="text-fade"><?php echo tt("Action"); ?></span></th>

					</tr>
				</thead>
				<tbody>
                <?php $__currentLoopData = array_reverse($results); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td id="title<?php echo e($reservation->getId()); ?>" >
                                <?php echo e($reservation->getUser()->firstname); ?> <?php echo e($reservation->getUser()->lastname); ?>

                            </td>
                            
                            <td>
                                <?php echo e($reservation->getLabs()->getCourses()->getName()); ?>

                            </td>
                            <td>
                                <?php echo e($reservation->getLabs_keys()->getLogin()); ?>

                            </td>
                            <td>
                                <?php echo e($reservation->getDate()); ?>

                            </td>
                            <td>
                                <?php echo e($reservation->getDatefin()); ?> 
                            </td>
                            <td>
                                
                                <?php if(strtotime($reservation->getDatefin()) < time() ): ?>
                                    <label class="badge badge-primary" style="background-color:#e9182f;border-color:#e9182f"><?php echo tt("Is finished"); ?></label>
                                <?php endif; ?>
                                <?php if(strtotime($reservation->getDate()) > time() ): ?>
                                    <label class="badge badge-warning"><?php echo tt("Is Waiting"); ?></label>
                                <?php endif; ?>
                                <?php if(strtotime($reservation->getDate()) < time() && strtotime($reservation->getDatefin()) > time() && $reservation->getStatut() == 0): ?>
                                    <label class="badge badge-dark"><?php echo tt("In progress and awaiting launch"); ?></label>
                                <?php endif; ?>
                                <?php if(strtotime($reservation->getDate()) < time() && strtotime($reservation->getDatefin()) > time() && $reservation->getStatut() == 1): ?>
                                    <label class="badge badge-success"><?php echo tt("Running"); ?></label>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger" onclick="getDataDelete('<?php echo e($reservation->getId()); ?>')" id="buttonDelete"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>								
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>

    <script>
        let id;
        let title;
        function getDataDelete(post){
            id=post;
            title = '';
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Do you want too delete this reservation'); ?> ?.<br><strong style='color:#e9182f'><?php echo tt('WARNING!! this action is irreversible'); ?></strong>",
                'theme': 'blue',
                'btns': [
                    {'text':'<?php echo tt("Yes"); ?>', 'closeAlert':false, 'onClick': function(){app.deleteReservation(this,id);return false; }},
                    {'text':'<?php echo tt("No"); ?>', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/log/labsreservationlist.blade.php ENDPATH**/ ?>