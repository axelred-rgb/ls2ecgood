
<?php $__env->startSection('cssimport'); ?>
    <link rel="stylesheet" href="<?php echo e(assets); ?>vendor_components/dateTimepicker/css/jquery.datetimepicker.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade show active" id="pills-labs" role="tabpanel" aria-labelledby="pills-labs-tab">
        <h4 class="box-title mb-0">
            <?php echo tt("Labs"); ?>
        </h4>
        <hr>
        <div class="card rounded-0 p-4 " id="scheduleLab" hidden>
            <div class="row">
                <div class="col-sm-8">
                    <h5 class="box-title mb-0">
                        <?php echo tt("Select Date Range"); ?>
                    </h5>
                </div>
                <div class="col-sm-4">
                    <span class="pull-right" onclick="closescheduleform()"><i class="fa fa-times fa-lg"></i></span>
                </div>
            </div>
            
            <hr>
            <div class="message"></div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <label for=""><?php echo tt("The"); ?></label>
                    <input type="text" class="form-control" id="beginDate" onkeydown="return false">
                    <input type="hidden" id="user" value="<?php echo App::$user->getId(); ?>">
                </div>
                <div class="col-sm-4 form-group">
                    <label for=""><?php echo tt("at"); ?></label>
                    <input type="text" class="form-control" id="endDate"  onkeydown="return false">
                    <input type="hidden" id="labsValue">
                </div>
                <?php $tzlist = User::time_zonelist(); ?>
                <div class="col-sm-4 form-group">
                    <label for=""><?php echo tt('Fuseau horaire'); ?></label>
                    <select name="fuseau" id="fuseau" class="form-control">
                        <?php $__currentLoopData = $tzlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($key==0 ? 'selected="selected"' : ''); ?> value="<?php echo e($time->value); ?>"><?php echo e($time->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-success" onclick="app.shedulelabs(this)"><?php echo tt("Takes"); ?></button>
                </div>
            </div>
        </div>
        <?php $__currentLoopData = $labs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card rounded-0 labs" id="labs<?php echo e($key); ?>">
                <div class="d-lg-flex">
                    <div class="position-relative w-lg-400">
                        <a href="#">
                            <img class="" src="<?php echo e(assets); ?>images/front-end-img/courses/<?php echo e($lab->courses->getImage()); ?>" alt="Card image cap">
                        </a>											
                    </div>
                    <div class="card mb-0 no-border no-shadow w-p100">
                        <div class="card-body">
                            <div class="cour-stac d-lg-flex align-items-center text-fade">
                                <h3 class="card-title mt-20"><?php echo e($lab->courses->getName()); ?></h3>
                                <p class="card-text">
                                    
                                </p>
                            </div>
                        </div>
                        <div class="card-footer justify-content-between d-flex align-items-center">
                            <div class="d-flex fs-18 fw-600"> <span class="text-dark me-10"><?php echo e($lab->token); ?> <?php echo tt("Tokens"); ?> / H</span> </div>
                            <span>
                                <button onclick="showsheduleForm(<?php echo e($key); ?>,<?php echo e($lab->getId()); ?>)" dataset="<?php echo e($key); ?>" datalabs="<?php echo e($lab->getId()); ?>" class="doingLab btn btn-success"><?php echo tt("Schedule"); ?></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>
    <script src="<?php echo e(assets); ?>vendor_components/dateTimepicker/js/jquery.datetimepicker.full.min.js"></script>
    <script>
        /*jslint browser:true*/
        /*global jQuery, document*/

        jQuery(document).ready(function () {
            'use strict';

            jQuery('#beginDate, #endDate').datetimepicker();
        });

        function showsheduleForm(dataset, datalabs){
            $("#scheduleLab").removeAttr("hidden");
            $("#scheduleLab").insertAfter("#labs"+dataset).hide().show('slow');;
            $("#labsValue").val(datalabs);
            $('.message').html("");
            $('#beginDate').val('');
            $('#endDate').val('');
            $('#fuseau').val('');
        
        }

        function closescheduleform(){
            $("#scheduleLab").fadeOut();
            $('.message').html("");
            $('#beginDate').val('');
            $('#endDate').val('');
            $('#fuseau').val('');
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/labs.blade.php ENDPATH**/ ?>