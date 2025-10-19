<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class CodepromoTable extends Datatable{
    

    public function __construct($codepromo = null, $datatablemodel = [])
    {
        parent::__construct($codepromo, $datatablemodel);
    }

    public static function init(\Codepromo $codepromo = null){
    
        $dt = new CodepromoTable($codepromo);
        $dt->entity = $codepromo;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('codepromo.id', '#'), 'value' => 'id'], 
['header' => t('Code'), 'value' => 'code'], 
['header' => t('Valeur'), 'value' => 'valeur']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('code'), 'value' => 'code'], 
['label' => t('valeur'), 'value' => 'valeur']
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
