
<?php $__env->startSection('content'); ?>

    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(<?php echo e(assets); ?>images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white"><?php echo tt("Cours gratuits"); ?></h2>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Page content -->

    <section class="py-50" data-aos="fade-up">
        <div class="container">

            <div class="row mt-30">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <thead>
                                <tr class="text-uppercase bg-lightest">
                                    <th><span class="text-dark"><?php echo tt("Coursed"); ?></span></th>
                                    <th><span class="text-fade"><?php echo tt("Category"); ?></span></th>
                                    <th><span class="text-fade"><?php echo tt("Action"); ?></span></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = App::$academies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = Courses::where($academy)->andwhere('type','!==',1)->__getAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u_courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($u_courses->getName()); ?>

                                            </td>
                                            <td>
                                                <?php echo e($u_courses->academies->getName()); ?>

                                            </td>

                                            <td>
                                                <a target="_blank" href="<?php echo e('gotofreecoursewihoutlogin'); ?>?id=<?php echo $u_courses->getProviderfreecoursesid(); ?>"><span  class="badge badge-success badge-lg"><?php echo tt("continue"); ?></span>
                                                </a>
                                            <td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/freecourse.blade.php ENDPATH**/ ?>