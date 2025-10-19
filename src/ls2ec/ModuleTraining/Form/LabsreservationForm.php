<?php 

        
use Genesis as g;

class LabsreservationForm extends FormManager{

    public $labsreservation;

    public static function init(\Labsreservation $labsreservation, $action = ""){
        $fb = new LabsreservationForm($labsreservation, $action);
        $fb->labsreservation = $labsreservation;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['date'] = [
                "label" => t('labsreservation.date'), 
			"type" => FORMTYPE_DATE, 
                "value" => $this->labsreservation->getDate(), 
        ];

            $this->fields['datefin'] = [
                "label" => t('labsreservation.datefin'), 
			"type" => FORMTYPE_DATE, 
                "value" => $this->labsreservation->getDatefin(), 
        ];

            $this->fields['statut'] = [
                "label" => t('labsreservation.statut'), 
			"type" => FORMTYPE_NUMBER, 
                "value" => $this->labsreservation->getStatut(),  
        ];

        $this->fields['user.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->labsreservation->getUser()->getId(),
            "label" => t('user'),
            "options" => FormManager::Options_Helper('firstname', User::allrows()),
        ];

        $this->fields['labs.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->labsreservation->getLabs()->getId(),
            "label" => t('labs'),
            "options" => FormManager::Options_Helper('token', Labs::allrows()),
        ];

        $this->fields['labs_keys.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->labsreservation->getLabs_keys()->getId(),
            "label" => t('labs_keys'),
            "options" => FormManager::Options_Helper('login', Labs_keys::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("labsreservation.formWidget", self::getFormData($id, $action));
    }
    
}
    