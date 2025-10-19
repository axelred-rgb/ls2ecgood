<?php 

        
use Genesis as g;

class PacktokkenForm extends FormManager{

    public $packtokken;

    public static function init(\Packtokken $packtokken, $action = ""){
        $fb = new PacktokkenForm($packtokken, $action);
        $fb->packtokken = $packtokken;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['prix'] = [
                "label" => t('packtokken.prix'), 
			"type" => FORMTYPE_NUMBER, 
                "value" => $this->packtokken->getPrix(),  
        ];

            $this->fields['nombre'] = [
                "label" => t('packtokken.nombre'), 
			"type" => FORMTYPE_NUMBER, 
                "value" => $this->packtokken->getNombre(),  
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("packtokken.formWidget", self::getFormData($id, $action));
    }
    
}
    