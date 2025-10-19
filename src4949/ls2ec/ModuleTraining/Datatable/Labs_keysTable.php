<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class Labs_keysTable extends Datatable{
    

    public function __construct($labs_keys = null, $datatablemodel = [])
    {
        parent::__construct($labs_keys, $datatablemodel);
    }

    public static function init(\Labs_keys $labs_keys = null){
    
        $dt = new Labs_keysTable($labs_keys);
        $dt->entity = $labs_keys;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('labs_keys.id', '#'), 'value' => 'id'], 
['header' => t('Login'), 'value' => 'login'], 
['header' => t('Password'), 'value' => 'password']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('login'), 'value' => 'login'], 
['label' => t('password'), 'value' => 'password']
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
