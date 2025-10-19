<?php 

        
use Genesis as g;

class Course_activityForm extends FormManager{

    public $course_activity;

    public static function init(\Course_activity $course_activity, $action = ""){
        $fb = new Course_activityForm($course_activity, $action);
        $fb->course_activity = $course_activity;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['title'] = [
                "label" => t('course_activity.title'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->course_activity->getTitle(), 
        ];

        $this->fields['course_section.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->course_activity->getCourse_section()->getId(),
            "label" => t('entity.course_section'),
            "options" => FormManager::Options_Helper('title', Course_section::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("course_activity.formWidget", self::getFormData($id, $action));
    }
    
}
    