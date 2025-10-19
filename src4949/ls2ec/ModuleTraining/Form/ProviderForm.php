<?php 

        
use Genesis as g;

class ProviderForm extends FormManager{

    public $provider;

    public static function init(\Provider $provider, $action = ""){
        $fb = new ProviderForm($provider, $action);
        $fb->provider = $provider;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['name'] = [
                "label" => t('provider.name'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->provider->getName(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("provider.formWidget", self::getFormData($id, $action));
    }
    
}
    