<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class ProviderTable extends Datatable{
    

    public function __construct($provider = null, $datatablemodel = [])
    {
        parent::__construct($provider, $datatablemodel);
    }

    public static function init(\Provider $provider = null){
    
        $dt = new ProviderTable($provider);
        $dt->entity = $provider;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('provider.id', '#'), 'value' => 'id'], 
['header' => t('provider.name', 'Name'), 'value' => 'name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('provider.name'), 'value' => 'name']
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
