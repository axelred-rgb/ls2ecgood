<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class SessioncodepromoTable extends Datatable{
    

    public function __construct($sessioncodepromo = null, $datatablemodel = [])
    {
        parent::__construct($sessioncodepromo, $datatablemodel);
    }

    public static function init(\Sessioncodepromo $sessioncodepromo = null){
    
        $dt = new SessioncodepromoTable($sessioncodepromo);
        $dt->entity = $sessioncodepromo;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('sessioncodepromo.id', '#'), 'value' => 'id'], 
['header' => t('Preuve'), 'value' => 'preuve'], 
['header' => t('State'), 'value' => 'state'], 
['header' => t('Montant'), 'value' => 'montant'], 
['header' => t('Created_at'), 'value' => 'created_at'], 
['header' => t('Updated_at'), 'value' => 'updated_at'], 
['header' => t('Deleted_at'), 'value' => 'deleted_at'], 
['header' => t('User') , 'value' => 'User.firstname'], 
['header' => t('Session') , 'value' => 'Session.datedebut'], 
['header' => t('Codepromo') , 'value' => 'Codepromo.code']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('preuve'), 'value' => 'preuve'], 
['label' => t('state'), 'value' => 'state'], 
['label' => t('montant'), 'value' => 'montant'], 
['label' => t('created_at'), 'value' => 'created_at'], 
['label' => t('updated_at'), 'value' => 'updated_at'], 
['label' => t('deleted_at'), 'value' => 'deleted_at'], 
['label' => t('user'), 'value' => 'User.firstname'], 
['label' => t('session'), 'value' => 'Session.datedebut'], 
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
