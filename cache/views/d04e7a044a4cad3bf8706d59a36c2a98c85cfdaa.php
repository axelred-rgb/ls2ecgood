<style>
    .swal2-modal {
        margin: auto;
    }

    .main-card {
        width: 800px;
    }
</style>
<?= Form::open($product, ["action" => "$action", "method" => "post"]) ?>

<div class='form-group'>
    <label for='name'><?php echo e(t('Name')); ?></label>
    <?= Form::input('name', $product->getName(), ['class' => 'form-control']); ?>
</div>
<div class='form-group'>
    <label for='priceofsale'><?php echo e(t('Price')); ?></label>
    <?= Form::input('priceofsale', $product->getPriceofsale(), ['class' => 'form-control']); ?>
</div>
<div class='form-group'>
    <label for='description'><?php echo e(t('Description')); ?></label>
    <?= Form::textarea('description', $product->getDescription(), ['class' => 'form-control']); ?>
</div>
<div class='form-group'>
    <label for='cover'><?php echo e(t('Cover')); ?></label>
    <?= Form::filepreview($product->getCover(),
        $product->showCover(),
        ['class' => 'form-control'], 'image') ?>
    <?= Form::file('cover',
        $product->getCover(),
        ['class' => 'form-control'], 'image') ?>
</div>
<div class='form-group'>
    <label for='cover'><?php echo e(t('Document')); ?></label>
    <?= Form::filepreview($product->getDocument(),
        $product->showDocument(),
        ['class' => 'form-control'], 'image') ?>
    <?= Form::file('document',
        $product->getDocument(),
        ['class' => 'form-control'], 'document') ?>
</div>


<?= Form::submitbtn("Enregistrer", ['class' => 'btn btn-success btn-block']) ?>

<?= Form::close() ?>

<?= Form::addDformjs() ?>

<?php /**PATH /home/yvafrkyk/public_html/web/views/board/manageResource/form.blade.php ENDPATH**/ ?>