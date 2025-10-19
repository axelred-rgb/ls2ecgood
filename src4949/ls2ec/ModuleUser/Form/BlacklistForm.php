<?php 

        
use Genesis as g;

class BlacklistForm extends FormManager{

    public $blacklist;

    public static function init(\Blacklist $blacklist, $action = ""){
        $fb = new BlacklistForm($blacklist, $action);
        $fb->blacklist = $blacklist;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['status'] = [
                "label" => t('blacklist.status'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->blacklist->getStatus(), 
        ];

            $this->fields['subject'] = [
                "label" => t('blacklist.subject'), 
			"type" => FORMTYPE_SELECT, 
                "value" => $this->blacklist->getSubject(), 
                "options" => Blacklist::$subjects, 
                
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("blacklist.formWidget", self::getFormData($id, $action));
    }
    
}
    