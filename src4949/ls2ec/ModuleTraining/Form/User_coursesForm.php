<?php 

        
use Genesis as g;

class User_coursesForm extends FormManager{

    public $user_courses;

    public static function init(\User_courses $user_courses, $action = ""){
        $fb = new User_coursesForm($user_courses, $action);
        $fb->user_courses = $user_courses;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['creationdate'] = [
                "label" => t('user_courses.creationdate'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user_courses->getCreationdate(), 
        ];

        $this->fields['user'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->user_courses->getUser()->getId(),
            "label" => t('entity.user'),
            "options" => FormManager::Options_Helper('firstname', User::allrows()),
        ];

        $this->fields['courses'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->user_courses->getCourses()->getId(),
            "label" => t('entity.courses'),
            "options" => FormManager::Options_Helper('name', Courses::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("user_courses.formWidget", self::getFormData($id, $action));
    }
    
}
    