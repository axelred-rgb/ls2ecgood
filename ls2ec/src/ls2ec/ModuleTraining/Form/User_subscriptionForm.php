<?php 

        
use Genesis as g;

class User_subscriptionForm extends FormManager{

    public $user_subscription;

    public static function init(\User_subscription $user_subscription, $action = ""){
        $fb = new User_subscriptionForm($user_subscription, $action);
        $fb->user_subscription = $user_subscription;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['start_date'] = [
                "label" => t('user_subscription.start_date'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user_subscription->getStart_date(), 
        ];

            $this->fields['duration'] = [
                "label" => t('user_subscription.duration'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->user_subscription->getDuration(), 
        ];

        $this->fields['user.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->user_subscription->getUser()->getId(),
            "label" => t('user'),
            "options" => FormManager::Options_Helper('firstname', User::allrows()),
        ];

        $this->fields['subscription.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->user_subscription->getSubscription()->getId(),
            "label" => t('subscription'),
            "options" => FormManager::Options_Helper('name', Subscription::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("user_subscription.formWidget", self::getFormData($id, $action));
    }
    
}
    