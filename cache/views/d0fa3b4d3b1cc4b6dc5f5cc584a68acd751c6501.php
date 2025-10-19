
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                   <?php echo e($course->getName()); ?> - <?php echo tt("EXERCISE"); ?>
                </h4>
            </div>

        </div>

        <hr>


        <?php $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-12 col-12">
                <div class="box">


                    <div class="row g-0">
                        <div class="col-md-4 col-12 bg-img h-md-auto h-250" style="background-image: url(<?php echo e($exo->getImage()); ?>)"></div>
                        <div class="col-md-8 col-12">
                            <div class="box-body">
                                <h4 id="title<?php echo e($exo->getId()); ?>"><?php echo e($exo->getTitle()); ?></h4>
                                <div class="d-flex mb-10">
                                    <div class="me-10">
                                        <i class="fa fa-book-open me-5"></i> <?php echo e($exo->getCourses()->getName()); ?>

                                    </div>
                                </div>

                                <div class="pull-right flexbox align-items-center mt-3">
                                    <a href="<?php echo e(route('detailexercise')); ?>?id=<?php echo e($exo->getId()); ?>" class="btn btn-sm btn-success"  id="buttonDelete"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-eye"></i> <?php echo tt("Effectuer l'exercice"); ?></a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/manageExercise/exercisescourse.blade.php ENDPATH**/ ?>