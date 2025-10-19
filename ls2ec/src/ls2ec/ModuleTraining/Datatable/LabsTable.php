<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class LabsTable extends Datatable{
    

    public function __construct($labs = null, $datatablemodel = [])
    {
        parent::__construct($labs, $datatablemodel);
    }

    public static function init(\Labs $labs = null){
    
        $dt = new LabsTable($labs);
        $dt->entity = $labs;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('labs.id', '#'), 'value' => 'id'], 
['header' => t('Token'), 'value' => 'token'], 
['header' => t('Courses') , 'value' => 'Courses.name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('token'), 'value' => 'token'], 
['label' => t('courses'), 'value' => 'Courses.name']
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
