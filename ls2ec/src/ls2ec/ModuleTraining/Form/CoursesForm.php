<?php 

        
use Genesis as g;

class CoursesForm extends FormManager{

    public $courses;

    public static function init(\Courses $courses, $action = ""){
        $fb = new CoursesForm($courses, $action);
        $fb->courses = $courses;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['name'] = [
                "label" => t('courses.name'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->courses->getName(), 
        ];

            $this->fields['description'] = [
                "label" => t('courses.description'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->courses->getDescription(), 
        ];

            $this->fields['name_en'] = [
                "label" => t('courses.name_en'),
"type" => FORMTYPE_TEXT,
            "value" => $this->courses->getName_en(),
        ];

            $this->fields['description_en'] = [
                "label" => t('courses.description_en'),
"type" => FORMTYPE_TEXT,
            "value" => $this->courses->getDescription_en(),
        ];

            $this->fields['image'] = [
                "label" => t('courses.image'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->courses->getImage(), 
        ];

            $this->fields['price'] = [
                "label" => t('courses.price'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->courses->getPrice(), 
        ];

//        $this->fields['moodleid'] = [
//            "label" => t('courses.moodleid'),
//            FH_REQUIRE => false,
//            "type" => FORMTYPE_TEXT,
//            "value" => $this->courses->getMoodleid(),
//        ];

            $this->fields['creationdate'] = [
                "label" => t('courses.creationdate'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->courses->getCreationdate(), 
        ];

            $this->fields['updateddate'] = [
                "label" => t('courses.updateddate'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->courses->getUpdateddate(), 
        ];

        $this->fields['user.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->courses->getUser()->getId(),
            "label" => t('entity.user'),
            "options" => FormManager::Options_Helper('firstname', User::allrows()),
        ];

        $this->fields['academies.id'] = [
            "type" => FORMTYPE_SELECT,
            "value" => $this->courses->getAcademies()->getId(),
            "label" => t('entity.academies'),
            "options" => FormManager::Options_Helper('name', Academies::allrows()),
        ];

        $this->fields['provider.id'] = [
            "type" => FORMTYPE_SELECT,
            "value" => $this->courses->getProvider()->getId(),
            "label" => t('entity.provider'),
            "options" => FormManager::Options_Helper('name', Provider::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("courses.formWidget", self::getFormData($id, $action));
    }
    
}
    