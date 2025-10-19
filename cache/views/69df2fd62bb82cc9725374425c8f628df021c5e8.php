
<?php $__env->startSection('content'); ?>								
	<div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
		<h4 class="box-title mb-0">
			<?php echo tt("Users list"); ?>
		</h4>
		<hr>
		<div class="table-responsive">
			<table class="table no-border">
				<thead>
					<tr class="text-uppercase bg-lightest">
						<th><span class="text-dark"><?php echo tt("Name"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Contacts"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Date d'inscription"); ?></span></th>
                        <th><span class="text-fade"><?php echo tt("Country"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Tokens"); ?></span></th>
						<th><span class="text-fade"><?php echo tt("Status"); ?></span></th>
                        <th><span class="text-fade">*</span></th>
						
					</tr>
				</thead>
				<tbody>
				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td id="title<?php echo e($user->getId()); ?>">
							<?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?>

						</td>
						
						<td>
                            <?php echo e($user->email); ?> <br> <?php echo e($user->phonenumber); ?>


						</td>
                        <td>
                            <?php $a = 'this.created_at';?>
							<?php echo e($user->$a); ?>

						</td>
						<td>
							<?php echo e($user->getCountry()->getName()); ?>

						</td>
                        <td>
							<?php echo e($user->token); ?>

						</td>
						<td>
							<?php if($user->is_activated == 1): ?>
                                <label class="badge badge-warning"><?php echo tt("Active"); ?></label>
                            <?php else: ?>
                                <label class="badge badge-secondary"><?php echo tt("Inactive"); ?></label>
                            <?php endif; ?>
						</td>
						<td>
                            <?php if($user->is_activated == 1): ?>
                                <button class="btn btn-sm btn-danger" onclick="getDataDisable('<?php echo e($user->getId()); ?>')" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-times"></i></button>
                            <?php else: ?>
                                <button class="btn btn-sm btn-success" onclick="getDataEnable('<?php echo e($user->getId()); ?>')" id="buttonEnable" > <i class="fa fa-check"></i></button>
                            <?php endif; ?>
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
        function getDataEnable(user){
            id=user;

            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Do you want to enable user'); ?> "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){app.updateSimpleattributeinEntity(id,'user',{'is_activated':1},'') }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

        function getDataDisable(user){
            id=user;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Do you want to disable user'); ?> "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){app.updateSimpleattributeinEntity(id,'user',{'is_activated':2},'')}},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/log/userlist.blade.php ENDPATH**/ ?>