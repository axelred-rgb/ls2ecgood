<?php 

        
use Genesis as g;

class Course_sectionForm extends FormManager{

    public $course_section;

    public static function init(\Course_section $course_section, $action = ""){
        $fb = new Course_sectionForm($course_section, $action);
        $fb->course_section = $course_section;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['title'] = [
                "label" => t('course_section.title'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->course_section->getTitle(), 
        ];

        $this->fields['courses.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->course_section->getCourses()->getId(),
            "label" => t('entity.courses'),
            "options" => FormManager::Options_Helper('name', Courses::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("course_section.formWidget", self::getFormData($id, $action));
    }
    
}
    