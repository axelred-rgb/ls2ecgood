
    <?php //use dclass\devups\Form\Form; ?>
    <?php //Form::addcss(Programs ::classpath('Resource/js/programs')) ?>
    
    <?= Form::open($programs, ["action"=> "$action", "method"=> "post"]) ?>

     <div class='form-group'>
                <label for='name'>{{t('programs.name')}}</label>
            	<?= Form::input('name', $programs->getName(), ['class' => 'form-control']); ?>
 </div>
<div class='form-group'>
                <label for='description'>{{t('programs.description')}}</label>
            	<?= Form::textarea('description', $programs->getDescription(), ['class' => 'form-control']); ?>
 </div>
<div class='form-group'>
                <label for='price'>{{t('programs.price')}}</label>
            	<?= Form::integer('price', $programs->getPrice(), ['class' => 'form-control']); ?>
 </div>

       
    <?= Form::submitbtn("save", ['class' => 'btn btn-success btn-block']) ?>
    
    <?= Form::close() ?>
    
    <?= Form::addDformjs() ?>    
    <?= Form::addjs(Programs::classpath('Resource/js/programsForm')) ?>
    