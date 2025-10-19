<?php 

        
use Genesis as g;

class TagsForm extends FormManager{

    public $tags;

    public static function init(\Tags $tags, $action = ""){
        $fb = new TagsForm($tags, $action);
        $fb->tags = $tags;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['name'] = [
                "label" => t('tags.name'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->tags->getName(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("tags.formWidget", self::getFormData($id, $action));
    }
    
}
    