
<?php $__env->startSection('cssimport'); ?>
    <style>
        .error>label{
            color:#e31313!important;
        }
        .error>input, .error>textarea{
            border-color:#e31313!important;
        }
        .error>.cke_chrome{
            border-color:#e31313!important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    <?php echo tt("MANAGE BLOG"); ?>
                </h4>
            </div>
            <div class="col-md-6">
                
                <a href="<?php echo e(route('manageBlog')); ?>" class="btn btn-md btn-success pull-right"> <i class="fa fa-eye"></i> <?php echo tt("All Post"); ?></a>
            </div>
        </div>
        
        <hr>
		
        <div class="row">
            <div class="col-sm-12">
                <form action="" class="form-control">
                    <div class="row mb-4">
                        <div class="col-sm-6" id="titre">
                            <label for="titreInput"><?php echo tt("Title (Fr)"); ?></label>
                            <input type="text" class="form-control" name="titre" id="titreInput" value="<?php echo e($post->getTitle()); ?>">
                            <label for="" class="errormessage"></label>
                        </div>
                        <div class="col-sm-6" id="title">
                            <label for="titleInput"><?php echo tt("Title (En)"); ?></label>
                            <input type="text" class="form-control" name="title" id="titleInput" value="<?php echo e($post->getTitle_en()); ?>">
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6" id="resume">
                            <label for="resumeInput"><?php echo tt("Summary (Fr)"); ?></label>
                            <textarea name="resume" id="resumeInput" class="form-control" cols="30" rows="10" ><?php echo e($post->getResume()); ?></textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                        <div class="col-sm-6" id="summary">
                            <label for="summaryInput"><?php echo tt("Summary (En)"); ?></label>
                            <textarea name="summary" id="summaryInput" class="form-control" cols="30" rows="10" ><?php echo e($post->getResume_en()); ?></textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6" id="image">
                            <label for="imageInput"><?php echo tt("Image"); ?></label>
                            <input type="file" name="image" id="imageInput" class="form-control" accept="image/jpeg, image/png, image/jpg">
                            <label for="" class="errormessage"></label>
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo e(__env); ?>uploads/article/<?php echo e($post->getImage()); ?>" alt="" >
                        </div>
                    </div>
                    <div class="row mb-4" >
                        <div class="col-sm-12">
                            <label><?php echo tt("Description (Fr)"); ?></label>
                            <textarea name="descriptionFr" id="" cols="30" rows="10" class="form-control" ><?php echo html_entity_decode($post->getDescription()); ?></textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label><?php echo tt("Description (En)"); ?></label>
                            <textarea name="descriptionEn" id="" cols="30" rows="10" class="form-control" ><?php echo html_entity_decode($post->getDescription_en()); ?></textarea>
                            <label for="" class="errormessage"></label>
                        </div>
                    </div>
                    <div class="message"></div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-md btn-success" onclick="app.updatePost(this)" type="button" style="width:100%"><?php echo tt("Save"); ?></button>                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>

	<script>
        CKEDITOR.replace( 'descriptionEn', {
            filebrowserUploadUrl: __env+'/api/uploadimage.article',
            removePlugins: 'exportpdf, emoji',
        });
        CKEDITOR.replace( 'descriptionFr', {
            filebrowserUploadUrl: __env+'/api/uploadimage.article',
            removePlugins: 'exportpdf, emoji',

        });
        var id_post = <?php echo e(Request::get("id")); ?>

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/manageBlog/updatepost.blade.php ENDPATH**/ ?>