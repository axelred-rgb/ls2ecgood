
<?php $__env->startSection('content'); ?>
    <style>
        .centered {
            position: absolute;
            top: 65%;
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
                    <?php echo tt("LIVRES RECOMMANDES"); ?>
                </h4>
            </div>
            <div class="col-md-6">

                
            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-12">
                <div class="col-md-4 col-sm-6">
                        <a target="_blank" href="https://ls2ec.com/web/assets/uploads/167517580366577621563d9277b746a0.pdf">
                            <div class="container2">
                                <img src="<?php echo e(__front); ?>images/folder.png" alt="Snow" style="width:100%;">

                                <div class="centered"><?php echo tt("Livres recommandés"); ?></div>
                            </div>
                        </a>


                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("jsimport"); ?>

<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.0/build/pdf.min.js"></script>
<script>
$(document).ready(function() {
  var url = 'https://ls2ec.com/web/assets/uploads/167517580366577621563d9277b746a0.pdf';
  var pdfContainer = document.getElementById('pdf-container');

  var loadingTask = pdfjsLib.getDocument(url);
  loadingTask.promise.then(function(pdf) {
    for (var i = 0; i < pdf.numPages; i++) {
      pdf.getPage(i + 1).then(function(page) {
        var viewport = page.getViewport({scale: 1});
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        pdfContainer.appendChild(canvas);

        var renderContext = {
          canvasContext: context,
          viewport: viewport
        };
        page.render(renderContext);
      });
    }
  });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('board.layoutboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yvafrkyk/public_html/web/views/board/manageLivrerecommande/mylivre.blade.php ENDPATH**/ ?>