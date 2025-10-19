<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class SessionpaiementTable extends Datatable{
    

    public function __construct($sessionpaiement = null, $datatablemodel = [])
    {
        parent::__construct($sessionpaiement, $datatablemodel);
    }

    public static function init(\Sessionpaiement $sessionpaiement = null){
    
        $dt = new SessionpaiementTable($sessionpaiement);
        $dt->entity = $sessionpaiement;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('sessionpaiement.id', '#'), 'value' => 'id'], 
['header' => t('Datedebut'), 'value' => 'datedebut'], 
['header' => t('Datefin'), 'value' => 'datefin'], 
['header' => t('Name'), 'value' => 'name'], 
['header' => t('Numero'), 'value' => 'numero']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('datedebut'), 'value' => 'datedebut'], 
['label' => t('datefin'), 'value' => 'datefin'], 
['label' => t('name'), 'value' => 'name'], 
['label' => t('numero'), 'value' => 'numero']
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
