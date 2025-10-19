<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class PaiementTable extends Datatable{
    

    public function __construct($paiement = null, $datatablemodel = [])
    {
        parent::__construct($paiement, $datatablemodel);
    }

    public static function init(\Paiement $paiement = null){
    
        $dt = new PaiementTable($paiement);
        $dt->entity = $paiement;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('paiement.id', '#'), 'value' => 'id'], 
['header' => t('Motif'), 'value' => 'motif'], 
['header' => t('Montant'), 'value' => 'montant']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('motif'), 'value' => 'motif'], 
['label' => t('montant'), 'value' => 'montant']
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
