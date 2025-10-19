<?php 

        
use Genesis as g;

class SessionpaiementForm extends FormManager{

    public $sessionpaiement;

    public static function init(\Sessionpaiement $sessionpaiement, $action = ""){
        $fb = new SessionpaiementForm($sessionpaiement, $action);
        $fb->sessionpaiement = $sessionpaiement;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['datedebut'] = [
                "label" => t('sessionpaiement.datedebut'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->sessionpaiement->getDatedebut(), 
        ];

            $this->fields['datefin'] = [
                "label" => t('sessionpaiement.datefin'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->sessionpaiement->getDatefin(), 
        ];

            $this->fields['name'] = [
                "label" => t('sessionpaiement.name'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->sessionpaiement->getName(), 
        ];

            $this->fields['numero'] = [
                "label" => t('sessionpaiement.numero'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->sessionpaiement->getNumero(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("sessionpaiement.formWidget", self::getFormData($id, $action));
    }
    
}
    