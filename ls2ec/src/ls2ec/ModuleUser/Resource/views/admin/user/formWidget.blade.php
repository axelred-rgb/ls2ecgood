
    <?php //use dclass\devups\Form\Form; ?>
    <?php //Form::addcss(User ::classpath('Resource/js/user')) ?>
    
    <?= Form::open($user, ["action"=> "$action", "method"=> "post"]) ?>

     <div class='form-group'>
                <label for='firstname'>{{t('user.firstname')}}</label>
            	<?= Form::input('firstname', $user->getFirstname(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='lastname'>{{t('user.lastname')}}</label>
            	<?= Form::input('lastname', $user->getLastname(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='email'>{{t('user.email')}}</label>
            	<?= Form::email('email', $user->getEmail(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='sex'>{{t('user.sex')}}</label>
            	<?= Form::input('sex', $user->getSex(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='telephone'>{{t('user.telephone')}}</label>
            	<?= Form::input('telephone', $user->getTelephone(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='password'>{{t('user.password')}}</label>
            	<?= Form::input('password', $user->getPassword(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='resettingpassword'>{{t('user.resettingpassword')}}</label>
            	<?= Form::input('resettingpassword', $user->getResettingpassword(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='is_activated'>{{t('user.is_activated')}}</label>
            	<?= Form::input('is_activated', $user->getIs_activated(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='activationcode'>{{t('user.activationcode')}}</label>
            	<?= Form::input('activationcode', $user->getActivationcode(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='birthdate'>{{t('user.birthdate')}}</label>
            	<?= Form::input('birthdate', $user->getBirthdate(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='last_login'>{{t('user.last_login')}}</label>
            	<?= Form::input('last_login', $user->getLast_login(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='lang'>{{t('user.lang')}}</label>
            	<?= Form::input('lang', $user->getLang(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'>
                <label for='username'>{{t('user.username')}}</label>
            	<?= Form::input('username', $user->getUsername(), ['class' => 'form-control']) ?>
 </div>
<div class='form-group'><label for='country'>Country</label>
                    <?= Form::select('country', 
                    FormManager::Options_Helper('name', Country::allrows()),
                    $user->getCountry()->getId(),
                    ['class' => 'form-control']); ?>
 </div>
            
       
    <?= Form::submitbtn("save", ['class' => 'btn btn-success btn-block']) ?>
    
    <?= Form::close() ?>
    
    <?= Form::addDformjs() ?>    
    <?= Form::addjs(User::classpath('Resource/js/userForm')) ?>
    