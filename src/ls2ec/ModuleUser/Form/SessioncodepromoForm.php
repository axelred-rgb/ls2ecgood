<?php 

        
use Genesis as g;
use ls2ec\ModuleTraining\Form\Session;

class SessioncodepromoForm extends FormManager{

    public $sessioncodepromo;

    public static function init(\Sessioncodepromo $sessioncodepromo, $action = ""){
        $fb = new SessioncodepromoForm($sessioncodepromo, $action);
        $fb->sessioncodepromo = $sessioncodepromo;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['preuve'] = [
                "label" => t('sessioncodepromo.preuve'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->sessioncodepromo->getPreuve(), 
        ];

            $this->fields['state'] = [
                "label" => t('sessioncodepromo.state'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->sessioncodepromo->getState(), 
        ];

            $this->fields['montant'] = [
                "label" => t('sessioncodepromo.montant'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->sessioncodepromo->getMontant(), 
        ];

            $this->fields['created_at'] = [
                "label" => t('sessioncodepromo.created_at'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->sessioncodepromo->getCreated_at(), 
        ];

            $this->fields['updated_at'] = [
                "label" => t('sessioncodepromo.updated_at'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->sessioncodepromo->getUpdated_at(), 
        ];

            $this->fields['deleted_at'] = [
                "label" => t('sessioncodepromo.deleted_at'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->sessioncodepromo->getDeleted_at(), 
        ];

        $this->fields['user.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->sessioncodepromo->getUser()->getId(),
            "label" => t('user'),
            "options" => FormManager::Options_Helper('firstname', User::allrows()),
        ];

        $this->fields['session.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->sessioncodepromo->getSession()->getId(),
            "label" => t('session'),
            "options" => FormManager::Options_Helper('datedebut', Session::allrows()),
        ];

        $this->fields['codepromo.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->sessioncodepromo->getCodepromo()->getId(),
            "label" => t('codepromo'),
            "options" => FormManager::Options_Helper('code', Codepromo::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("sessioncodepromo.formWidget", self::getFormData($id, $action));
    }
    
}
    