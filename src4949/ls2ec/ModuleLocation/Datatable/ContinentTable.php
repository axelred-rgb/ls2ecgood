<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class ContinentTable extends Datatable{
    

    public function __construct($continent = null, $datatablemodel = [])
    {
        parent::__construct($continent, $datatablemodel);
    }

    public static function init(\Continent $continent = null){
    
        $dt = new ContinentTable($continent);
        $dt->entity = $continent;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('continent.id', '#'), 'value' => 'id'], 
['header' => t('Name'), 'value' => 'name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('name'), 'value' => 'name']
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
