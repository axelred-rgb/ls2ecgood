
<?php $__env->startSection('content'); ?>
    <style>
        .centered {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .container2{
            position: relative;
            text-align: center;
            color: white;
            font-size: 17px;
            font-weight: bold;
        }
    </style>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    <?php echo tt("MY EXERCISE"); ?>
                </h4>
            </div>
            
        </div>

        <hr>

        <div class="row">
            <?php $i = 0;?>
            <?php $__currentLoopData = array_reverse($u_course); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coursee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($a==false): ?>
                    <?php if(Exercise::where('courses_id','=',$coursee->getCourses()->getId())->count() > 0): ?>
                        <?php $i++;?>
                        <div class="col-md-4 col-sm-6">
                            <a href="<?php echo e(route('courseexercise')); ?>?id=<?php echo e($coursee->getCourses()->getId()); ?>">
                                <div class="container2">
                                    <img src="<?php echo e(__front); ?>images/folder.png" alt="Snow" style="width:100%;">

                                    <div class="centered"><?php echo e($coursee->getCourses()->getName()); ?></div>
                                </div>
                            </a>


                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(Exercise::where('courses_id','=',$coursee->getId())->count() > 0): ?>
                        <?php $i++;?>
                        <div class="col-md-4 col-sm-6">
                            <a href="<?php echo e(route('courseexercise')); ?>?id=<?php echo e($coursee->getId()); ?>">
                                <div class="container2">
                                    <img src="<?php echo e(__front); ?>images/folder.png" alt="Snow" style="width:100%;">

                                    <div class="centered"><?php echo e($coursee->getName()); ?></div>
                                </div>
                            </a>


                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($i > 0): ?>
                    <div class="col-md-4 col-sm-6">
                        <a target="_blank" href="<?php echo e(__front); ?>document/lab_guide.pdf">
                            <div class="container2">
                                <img src="<?php echo e(__front); ?>images/folder.png" alt="Snow" style="width:100%;">

                                <div class="centered"><?php echo tt("Guide pratique des LAB"); ?></div>
                            </div>
                        </a>


                    </div>
            <?php endif; ?>

        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>

    <script>
        let id;
        let title;
        function setShowAnswer(post){
            id=post;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Do you want to see answer of exercise '); ?> "+title+" ?.<br><strong style='color:#e9182f'><?php echo tt('WARNING!! this action is irreversible'); ?></strong>",
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){
                        document.getElementById('reponse'+id).style.display = "block";
                            document.getElementById('show'+id).style.display = "none";

                            document.getElementById('hide'+id).style.display = "block";

                            return false;
                    }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

        function setHideAnswer(post){
            id=post;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "<?php echo tt('Do you want to hide answer of exercise '); ?> "+title+" ?.<br>",
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){
                            document.getElementById('reponse'+id).style.display = "none";
                            document.getElementById('show'+id).style.display = "block";

                            document.getElementById('hide'+id).style.display = "none";

                            return false;
                        }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/manageExercise/myexercise.blade.php ENDPATH**/ ?>