<?php 

        
use Genesis as g;

class ExerciseForm extends FormManager{

    public $exercise;

    public static function init(\Exercise $exercise, $action = ""){
        $fb = new ExerciseForm($exercise, $action);
        $fb->exercise = $exercise;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['title'] = [
                "label" => t('exercise.title'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->exercise->getTitle(), 
        ];

            $this->fields['title_en'] = [
                "label" => t('exercise.title_en'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->exercise->getTitle_en(), 
        ];

            $this->fields['image'] = [
                "label" => t('exercise.image'), 
		"type" => FORMTYPE_FILE,
            "filetype" => FILETYPE_IMAGE, 
            "value" => $this->exercise->getImage(),
            "src" => $this->exercise->showImage(), 
        ];

            $this->fields['contenu'] = [
                "label" => t('exercise.contenu'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->exercise->getContenu(), 
        ];

            $this->fields['contenu_en'] = [
                "label" => t('exercise.contenu_en'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->exercise->getContenu_en(), 
        ];

            $this->fields['reponse'] = [
                "label" => t('exercise.reponse'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->exercise->getReponse(), 
        ];

            $this->fields['reponse_en'] = [
                "label" => t('exercise.reponse_en'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->exercise->getReponse_en(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("exercise.formWidget", self::getFormData($id, $action));
    }
    
}
    