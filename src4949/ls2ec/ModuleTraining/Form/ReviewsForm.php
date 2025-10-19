<?php 

        
use Genesis as g;

class ReviewsForm extends FormManager{

    public $reviews;

    public static function init(\Reviews $reviews, $action = ""){
        $fb = new ReviewsForm($reviews, $action);
        $fb->reviews = $reviews;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['note'] = [
                "label" => t('reviews.note'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->reviews->getNote(), 
        ];

            $this->fields['comments'] = [
                "label" => t('reviews.comments'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->reviews->getComments(), 
        ];

        $this->fields['courses'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->reviews->getCourses()->getId(),
            "label" => t('entity.courses'),
            "options" => FormManager::Options_Helper('name', Courses::allrows()),
        ];

        $this->fields['user'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->reviews->getUser()->getId(),
            "label" => t('entity.user'),
            "options" => FormManager::Options_Helper('firstname', User::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("reviews.formWidget", self::getFormData($id, $action));
    }
    
}
    