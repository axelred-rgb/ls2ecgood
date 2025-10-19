
    <?php //use dclass\devups\Form\Form; ?>
    <?php //Form::addcss(Academies ::classpath('Resource/js/academies')) ?>
    
    <?= Form::open($academies, ["action"=> "$action", "method"=> "post"]) ?>

     <div class='form-group'>
                <label for='description'>{{t('academies.description')}}</label>
            	<?= Form::textarea('description', $academies->getDescription(), ['class' => 'form-control']); ?>
 </div>
<div class='form-group'>
                <label for='image'>{{t('academies.image')}}</label>
            	<?= Form::input('image', $academies->getImage(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='name'>{{t('academies.name')}}</label>
            	<?= Form::input('name', $academies->getName(), ['class' => 'form-control']) ?>
 </div>

       
    <?= Form::submitbtn("save", ['class' => 'btn btn-success btn-block']) ?>
    
    <?= Form::close() ?>
    
    <?= Form::addDformjs() ?>    
    <?= Form::addjs(Academies::classpath('Resource/js/academiesForm')) ?>
    