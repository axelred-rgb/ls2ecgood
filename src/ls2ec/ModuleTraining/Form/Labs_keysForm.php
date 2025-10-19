<?php 

        
use Genesis as g;

class Labs_keysForm extends FormManager{

    public $labs_keys;

    public static function init(\Labs_keys $labs_keys, $action = ""){
        $fb = new Labs_keysForm($labs_keys, $action);
        $fb->labs_keys = $labs_keys;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['login'] = [
                "label" => t('labs_keys.login'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->labs_keys->getLogin(), 
        ];

            $this->fields['password'] = [
                "label" => t('labs_keys.password'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->labs_keys->getPassword(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("labs_keys.formWidget", self::getFormData($id, $action));
    }
    
}
    