<?php 

        
use Genesis as g;

class SubscriptionForm extends FormManager{

    public $subscription;

    public static function init(\Subscription $subscription, $action = ""){
        $fb = new SubscriptionForm($subscription, $action);
        $fb->subscription = $subscription;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['name'] = [
                "label" => t('subscription.name'), 
"type" => FORMTYPE_TEXT,
            "value" => $this->subscription->getName(), 
        ];

            $this->fields['description'] = [
                "label" => t('subscription.description'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->subscription->getDescription(), 
        ];

            $this->fields['target'] = [
                "label" => t('subscription.target'),
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->subscription->getTarget(),
        ];

            $this->fields['m_price'] = [
                "label" => t('subscription.m_price'),
"type" => FORMTYPE_TEXT,
            "value" => $this->subscription->getM_price(),
        ];

            $this->fields['y_price'] = [
                "label" => t('subscription.y_price'),
"type" => FORMTYPE_TEXT,
            "value" => $this->subscription->getY_price(),
        ];


           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("subscription.formWidget", self::getFormData($id, $action));
    }
    
}
    