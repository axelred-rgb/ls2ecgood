<?php 

        
use Genesis as g;

class User_tokenForm extends FormManager{

    public $user_token;

    public static function init(\User_token $user_token, $action = ""){
        $fb = new User_tokenForm($user_token, $action);
        $fb->user_token = $user_token;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['date'] = [
                "label" => t('user_token.date'), 
			FH_REQUIRE => false,
 			"type" => FORMTYPE_DATE, 
                "value" => $this->user_token->getDate(), 
        ];

            $this->fields['quantite'] = [
                "label" => t('user_token.quantite'), 
			"type" => FORMTYPE_NUMBER, 
                "value" => $this->user_token->getQuantite(),  
        ];

        $this->fields['user.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->user_token->getUser()->getId(),
            "label" => t('user'),
            "options" => FormManager::Options_Helper('firstname', User::allrows()),
        ];

        $this->fields['packtokken.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->user_token->getPacktokken()->getId(),
            "label" => t('packtokken'),
            "options" => FormManager::Options_Helper('prix', Packtokken::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("user_token.formWidget", self::getFormData($id, $action));
    }
    
}
    