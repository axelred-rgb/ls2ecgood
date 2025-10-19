<?php 

        
use Genesis as g;

class InstructorForm extends FormManager{

    public $instructor;

    public static function init(\Instructor $instructor, $action = ""){
        $fb = new InstructorForm($instructor, $action);
        $fb->instructor = $instructor;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['fields'] = [
                "label" => t('instructor.fields'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->instructor->getFields(), 
        ];

            $this->fields['Profession'] = [
                "label" => t('instructor.Profession'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->instructor->getProfession(), 
        ];

            $this->fields['speciality'] = [
                "label" => t('instructor.speciality'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->instructor->getSpeciality(), 
        ];

            $this->fields['biography'] = [
                "label" => t('instructor.biography'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->instructor->getBiography(), 
        ];

            $this->fields['cv'] = [
                "label" => t('instructor.cv'), 
			"type" => FORMTYPE_FILE,
                FH_FILETYPE => FILETYPE_DOCUMENT,  
                "value" => $this->instructor->getCv(),
                "src" => $this->instructor->showCv(), 
        ];

        $this->fields['academies'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->instructor->getAcademies()->getId(),
            "label" => t('entity.academies'),
            "options" => FormManager::Options_Helper('description', Academies::allrows()),
        ];

        $this->fields['user'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->instructor->getUser()->getId(),
            "label" => t('entity.user'),
            "options" => FormManager::Options_Helper('firstname', User::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("instructor.formWidget", self::getFormData($id, $action));
    }
    
}
    