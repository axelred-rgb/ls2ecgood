<?php 

        
use Genesis as g;

class CodepromoForm extends FormManager{

    public $codepromo;

    public static function init(\Codepromo $codepromo, $action = ""){
        $fb = new CodepromoForm($codepromo, $action);
        $fb->codepromo = $codepromo;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['code'] = [
                "label" => t('codepromo.code'), 
			"type" => FORMTYPE_NUMBER, 
                "value" => $this->codepromo->getCode(),  
        ];

            $this->fields['valeur'] = [
                "label" => t('codepromo.valeur'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->codepromo->getValeur(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("codepromo.formWidget", self::getFormData($id, $action));
    }
    
}
    