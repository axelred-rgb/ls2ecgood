<?php 

        
use Genesis as g;

class Courses_tagForm extends FormManager{

    public $courses_tag;

    public static function init(\Courses_tag $courses_tag, $action = ""){
        $fb = new Courses_tagForm($courses_tag, $action);
        $fb->courses_tag = $courses_tag;
        return $fb;
    }

    public function buildForm()
    {
    
        
        $this->fields['courses'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->courses_tag->getCourses()->getId(),
            "label" => t('entity.courses'),
            "options" => FormManager::Options_Helper('name', Courses::allrows()),
        ];

        $this->fields['tags'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->courses_tag->getTags()->getId(),
            "label" => t('entity.tags'),
            "options" => FormManager::Options_Helper('name', Tags::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("courses_tag.formWidget", self::getFormData($id, $action));
    }
    
}
    