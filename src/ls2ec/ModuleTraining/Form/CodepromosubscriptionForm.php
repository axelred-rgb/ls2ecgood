<?php 

        
use Genesis as g;

class CodepromosubscriptionForm extends FormManager{

    public $codepromosubscription;

    public static function init(\Codepromosubscription $codepromosubscription, $action = ""){
        $fb = new CodepromosubscriptionForm($codepromosubscription, $action);
        $fb->codepromosubscription = $codepromosubscription;
        return $fb;
    }

    public function buildForm()
    {
    
        
        $this->fields['subscription.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->codepromosubscription->getSubscription()->getId(),
            "label" => t('subscription'),
            "options" => FormManager::Options_Helper('name', Subscription::allrows()),
        ];

        $this->fields['codepromo.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->codepromosubscription->getCodepromo()->getId(),
            "label" => t('codepromo'),
            "options" => FormManager::Options_Helper('code', Codepromo::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("codepromosubscription.formWidget", self::getFormData($id, $action));
    }
    
}
    