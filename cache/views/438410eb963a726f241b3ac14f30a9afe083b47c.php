<?php if($ll["pagination"] > 1): ?>

    <!-- pagination starts -->
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="pagination-container">
                <ul class="pagination" role="menubar" aria-label="Pagination">
                    <?php if($ll["current_page"]>1): ?>
                        <li class="arrow "><a
                                    href="<?php echo e(route( $baseurl.'?next='.($ll["previous"]).'&per_page='.$ll["per_page"])); ?>">&laquo;
                                <?php echo tt("Previous"); ?></a></li>

                    <?php endif; ?>
                    <?php for($i=1;$i<=$ll["pagination"];$i++): ?>
                        <?php if($i == $ll["current_page"]): ?>
                            <li class='datatable active' style="background:#0f99de;">
                                <a href="<?php echo e(route($baseurl.'?next='.$i.'&per_page='.$ll["per_page"])); ?>"><?php echo e($i); ?></a>
                            </li>
                        <?php else: ?>
                            <li class='datatable' onclick="this.style.backgroundColor='red'">
                                <a href="<?php echo e(route($baseurl.'?next='.$i.'&per_page='.$ll["per_page"])); ?>"><?php echo e($i); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($ll["current_page"]!=$ll["pagination"]): ?>

                        <li class="arrow datatable">
                            <a href="<?php echo e(route($baseurl.'?next='.($ll["next"]).'&per_page='.$ll["per_page"])); ?>"><?php echo tt("Next"); ?>
                                &raquo;</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>


    </div>
    <!-- Pagination Ends -->
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ls2ecgood\web\views/default/pagination.blade.php ENDPATH**/ ?>