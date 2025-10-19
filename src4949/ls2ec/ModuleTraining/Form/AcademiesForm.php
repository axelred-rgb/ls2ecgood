<?php 

        
use Genesis as g;

class AcademiesForm extends FormManager{

    public $academies;

    public static function init(\Academies $academies, $action = ""){
        $fb = new AcademiesForm($academies, $action);
        $fb->academies = $academies;
        return $fb;
    }

    public function buildForm()
    {

        $this->fields['name'] = [
            "label" => t('academies.name'),
            "type" => FORMTYPE_TEXT,
            "value" => $this->academies->getName(),
        ];

        $this->fields['name_en'] = [
            "label" => t('academies.name_en'),
            "type" => FORMTYPE_TEXT,
            "value" => $this->academies->getName_en(),
        ];
        
            $this->fields['description'] = [
                "label" => t('academies.description'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->academies->getDescription(), 
        ];

            $this->fields['description_en'] = [
                "label" => t('academies.description_en'),
			"type" => FORMTYPE_TEXTAREA,
                "value" => $this->academies->getDescription_en(),
        ];

            $this->fields['image'] = [
                "label" => t('academies.image'), 
            "type" => FORMTYPE_TEXT,
            "value" => $this->academies->getImage(), 
        ];

        $this->fields['banner'] = [
            "label" => t('academies.banner'),
            "type" => FORMTYPE_TEXT,
            "value" => $this->academies->getBanner(),
        ];



           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("academies.formWidget", self::getFormData($id, $action));
    }
    
}
    