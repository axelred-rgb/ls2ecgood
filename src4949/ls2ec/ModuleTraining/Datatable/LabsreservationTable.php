<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class LabsreservationTable extends Datatable{
    

    public function __construct($labsreservation = null, $datatablemodel = [])
    {
        parent::__construct($labsreservation, $datatablemodel);
    }

    public static function init(\Labsreservation $labsreservation = null){
    
        $dt = new LabsreservationTable($labsreservation);
        $dt->entity = $labsreservation;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('labsreservation.id', '#'), 'value' => 'id'], 
['header' => t('Date'), 'value' => 'date'], 
['header' => t('Datefin'), 'value' => 'datefin'], 
['header' => t('Statut'), 'value' => 'statut'], 
['header' => t('User') , 'value' => 'User.firstname'], 
['header' => t('Labs') , 'value' => 'Labs.token'], 
['header' => t('Labs_keys') , 'value' => 'Labs_keys.login']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('date'), 'value' => 'date'], 
['label' => t('datefin'), 'value' => 'datefin'], 
['label' => t('statut'), 'value' => 'statut'], 
['label' => t('user'), 'value' => 'User.firstname'], 
['label' => t('labs'), 'value' => 'Labs.token'], 
['label' => t('labs_keys'), 'value' => 'Labs_keys.login']
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
