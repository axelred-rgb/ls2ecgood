<?php 

        
use Genesis as g;

class ContinentForm extends FormManager{

    public $continent;

    public static function init(\Continent $continent, $action = ""){
        $fb = new ContinentForm($continent, $action);
        $fb->continent = $continent;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['name'] = [
                "label" => t('continent.name'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->continent->getName(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("continent.formWidget", self::getFormData($id, $action));
    }
    
}
    