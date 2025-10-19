<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class SubscriptionTable extends Datatable{
    

    public function __construct($subscription = null, $datatablemodel = [])
    {
        parent::__construct($subscription, $datatablemodel);
    }

    public static function init(\Subscription $subscription = null){
    
        $dt = new SubscriptionTable($subscription);
        $dt->entity = $subscription;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('subscription.id', '#'), 'value' => 'id'], 
['header' => t('Name'), 'value' => 'name'], 
['header' => t('Description'), 'value' => 'description'], 
['header' => t('Target'), 'value' => 'target'],
['header' => t('M_price'), 'value' => 'm_price'],
['header' => t('M_a_price'), 'value' => 'm_a_price'],
['header' => t('Y_price'), 'value' => 'y_price'],
['header' => t('M_a_price'), 'value' => 'm_a_price']

];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('name'), 'value' => 'name'], 
['label' => t('description'), 'value' => 'description'], 
['label' => t('target'), 'value' => 'target'],
['label' => t('m_price'), 'value' => 'm_price'],
['label' => t('y_price'), 'value' => 'y_price']
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
