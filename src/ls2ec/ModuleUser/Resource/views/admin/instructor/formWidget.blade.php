
    <?php //use dclass\devups\Form\Form; ?>
    <?php //Form::addcss(Instructor ::classpath('Resource/js/instructor')) ?>
    
    <?= Form::open($instructor, ["action"=> "$action", "method"=> "post"]) ?>

     <div class='form-group'>
                <label for='fields'>{{t('instructor.fields')}}</label>
            	<?= Form::input('fields', $instructor->getFields(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='Profession'>{{t('instructor.Profession')}}</label>
            	<?= Form::input('Profession', $instructor->getProfession(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='speciality'>{{t('instructor.speciality')}}</label>
            	<?= Form::input('speciality', $instructor->getSpeciality(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='biography'>{{t('instructor.biography')}}</label>
            	<?= Form::textarea('biography', $instructor->getBiography(), ['class' => 'form-control']); ?>
 </div>
<div class='form-group'>
                <label for='cv'>{{t('instructor.cv')}}</label>
            	<?= Form::filepreview($instructor->getCv(),
                $instructor->showCv(),
                 ['class' => 'form-control'], 'image') ?>
	<?= Form::file('cv', 
                $instructor->getCv(),
                 ['class' => 'form-control'], 'document') ?>
 </div>
<div class='form-group'><label for='academies'>Academies</label>
                    <?= Form::select('academies', 
                    FormManager::Options_Helper('description', Academies::allrows()),
                    $instructor->getAcademies()->getId(),
                    ['class' => 'form-control']); ?>
 </div>
            <div class='form-group'><label for='user'>User</label>
                    <?= Form::select('user', 
                    FormManager::Options_Helper('firstname', User::allrows()),
                    $instructor->getUser()->getId(),
                    ['class' => 'form-control']); ?>
 </div>
            
       
    <?= Form::submitbtn("save", ['class' => 'btn btn-success btn-block']) ?>
    
    <?= Form::close() ?>
    
    <?= Form::addDformjs() ?>    
    <?= Form::addjs(Instructor::classpath('Resource/js/instructorForm')) ?>
    