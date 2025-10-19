<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class User_subscriptionTable extends Datatable{
    

    public function __construct($user_subscription = null, $datatablemodel = [])
    {
        parent::__construct($user_subscription, $datatablemodel);
    }

    public static function init(\User_subscription $user_subscription = null){
    
        $dt = new User_subscriptionTable($user_subscription);
        $dt->entity = $user_subscription;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('user_subscription.id', '#'), 'value' => 'id'], 
['header' => t('Start_date'), 'value' => 'start_date'], 
['header' => t('Duration'), 'value' => 'duration'],
['header' => t('User') , 'value' => 'User.firstname'], 
['header' => t('Subscription') , 'value' => 'Subscription.name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('start_date'), 'value' => 'start_date'], 
['label' => t('duration'), 'value' => 'duration'],
['label' => t('user'), 'value' => 'User.firstname'], 
['label' => t('subscription'), 'value' => 'Subscription.name']
];
        // TODO: overwrite datatable attribute for this view
        return $this;
    }

    public function router()
    {
        $tablemodel = Request::get("tablemodel", null);
        if ($tablemodel && method_exists($this, "build" . $tablemodel . "table") && $result = call_user_func(array($this, "build" . $tablemodel . "table"))) {
            return $result;
        } else
            switch ($tablemodel) {
                // case "": return this->
                default:
                    return $this->buildindextable();
            }

    }
    
}
