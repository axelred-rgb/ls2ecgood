<?php 

        
use Genesis as g;

class UserForm extends FormManager{

    public $user;

    public static function init(\User $user, $action = ""){
        $fb = new UserForm($user, $action);
        $fb->user = $user;
        return $fb;
    }

    public function buildAdminForm()
    {
        $this->fields['canpublish'] = [
            "label" => t('Can publish'),
            FH_REQUIRE => false,
            "type" => FORMTYPE_RADIO,
            "options" => ["No", "Yes"],
            "value" => $this->user->getCanpublish(),
        ];

        return $this;
    }


    public function buildForm()
    {

        
            $this->fields['firstname'] = [
                "label" => t('user.firstname'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getFirstname(), 
        ];

            $this->fields['lastname'] = [
                "label" => t('user.lastname'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getLastname(), 
        ];

            $this->fields['email'] = [
                "label" => t('user.email'), 
			FH_REQUIRE => false,
 			"type" => FORMTYPE_EMAIL, 
                "value" => $this->user->getEmail(), 
        ];

            $this->fields['sex'] = [
                "label" => t('user.sex'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getSex(), 
        ];

            $this->fields['telephone'] = [
                "label" => t('user.telephone'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getTelephone(), 
        ];


            $this->fields['password'] = [
                "label" => t('user.password'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getPassword(), 
        ];

            $this->fields['resettingpassword'] = [
                "label" => t('user.resettingpassword'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getResettingpassword(), 
        ];

            $this->fields['is_activated'] = [
                "label" => t('user.is_activated'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getIs_activated(), 
        ];

        $this->fields['role'] = [
            "label" => t('user.role'),
            FH_REQUIRE => false,
            "type" => FORMTYPE_TEXT,
            "value" => $this->user->getRole(),
        ];

            $this->fields['activationcode'] = [
                "label" => t('user.activationcode'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getActivationcode(), 
        ];

            $this->fields['birthdate'] = [
                "label" => t('user.birthdate'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getBirthdate(), 
        ];

            $this->fields['last_login'] = [
                "label" => t('user.last_login'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getLast_login(), 
        ];

            $this->fields['lang'] = [
                "label" => t('user.lang'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user->getLang(), 
        ];

            $this->fields['username'] = [
                "label" => t('user.username'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->user->getUsername(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("user.formWidget", self::getFormData($id, $action));
    }
    
}
    