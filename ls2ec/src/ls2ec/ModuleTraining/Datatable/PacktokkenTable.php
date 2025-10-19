<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class PacktokkenTable extends Datatable{
    

    public function __construct($packtokken = null, $datatablemodel = [])
    {
        parent::__construct($packtokken, $datatablemodel);
    }

    public static function init(\Packtokken $packtokken = null){
    
        $dt = new PacktokkenTable($packtokken);
        $dt->entity = $packtokken;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('packtokken.id', '#'), 'value' => 'id'], 
['header' => t('Prix'), 'value' => 'prix'], 
['header' => t('Nombre'), 'value' => 'nombre']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('prix'), 'value' => 'prix'], 
['label' => t('nombre'), 'value' => 'nombre']
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
