<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class CodepromosubscriptionTable extends Datatable{
    

    public function __construct($codepromosubscription = null, $datatablemodel = [])
    {
        parent::__construct($codepromosubscription, $datatablemodel);
    }

    public static function init(\Codepromosubscription $codepromosubscription = null){
    
        $dt = new CodepromosubscriptionTable($codepromosubscription);
        $dt->entity = $codepromosubscription;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('codepromosubscription.id', '#'), 'value' => 'id'], 
['header' => t('Subscription') , 'value' => 'Subscription.name'], 
['header' => t('Codepromo') , 'value' => 'Codepromo.code']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('subscription'), 'value' => 'Subscription.name'], 
['label' => t('codepromo'), 'value' => 'Codepromo.code']
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
