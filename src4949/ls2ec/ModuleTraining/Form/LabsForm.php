<?php 

        
use Genesis as g;

class LabsForm extends FormManager{

    public $labs;

    public static function init(\Labs $labs, $action = ""){
        $fb = new LabsForm($labs, $action);
        $fb->labs = $labs;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['token'] = [
                "label" => t('labs.token'), 
			"type" => FORMTYPE_NUMBER, 
                "value" => $this->labs->getToken(),  
        ];

        $this->fields['courses.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->labs->getCourses()->getId(),
            "label" => t('courses'),
            "options" => FormManager::Options_Helper('name', Courses::allrows()),
        ];

        $this->fields['labs_keys::values'] = [
            "type" => FORMTYPE_CHECKBOX, 
            "values" => $this->labs->inCollectionOf('Labs_keys'),
            "label" => t('labs_keys'),
            "options" => FormManager::Options_Helper('login', Labs_keys::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("labs.formWidget", self::getFormData($id, $action));
    }
    
}
    