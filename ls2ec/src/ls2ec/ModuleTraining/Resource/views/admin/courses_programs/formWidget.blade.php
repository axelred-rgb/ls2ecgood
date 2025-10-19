
    <?php //use dclass\devups\Form\Form; ?>
    <?php //Form::addcss(Courses_programs ::classpath('Resource/js/courses_programs')) ?>
    
    <?= Form::open($courses_programs, ["action"=> "$action", "method"=> "post"]) ?>

     <div class='form-group'>
                <label for='quota'>{{t('courses_programs.quota')}}</label>
            	<?= Form::input('quota', $courses_programs->getQuota(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'><label for='courses'>Courses</label>
                    <?= Form::select('courses', 
                    FormManager::Options_Helper('name', Courses::allrows()),
                    $courses_programs->getCourses()->getId(),
                    ['class' => 'form-control']); ?>
 </div>
            <div class='form-group'><label for='programs'>Programs</label>
                    <?= Form::select('programs', 
                    FormManager::Options_Helper('name', Programs::allrows()),
                    $courses_programs->getPrograms()->getId(),
                    ['class' => 'form-control']); ?>
 </div>
            
       
    <?= Form::submitbtn("save", ['class' => 'btn btn-success btn-block']) ?>
    
    <?= Form::close() ?>
    
    <?= Form::addDformjs() ?>    
    <?= Form::addjs(Courses_programs::classpath('Resource/js/courses_programsForm')) ?>
    