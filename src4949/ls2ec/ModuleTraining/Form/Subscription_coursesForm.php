<?php 

        
use Genesis as g;

class Subscription_coursesForm extends FormManager{

    public $subscription_courses;

    public static function init(\Subscription_courses $subscription_courses, $action = ""){
        $fb = new Subscription_coursesForm($subscription_courses, $action);
        $fb->subscription_courses = $subscription_courses;
        return $fb;
    }

    public function buildForm()
    {
    
        
        $this->fields['subscription.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->subscription_courses->getSubscription()->getId(),
            "label" => t('subscription'),
            "options" => FormManager::Options_Helper('name', Subscription::allrows()),
        ];

        $this->fields['courses.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->subscription_courses->getCourses()->getId(),
            "label" => t('courses'),
            "options" => FormManager::Options_Helper('name', Courses::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("subscription_courses.formWidget", self::getFormData($id, $action));
    }
    
}
    