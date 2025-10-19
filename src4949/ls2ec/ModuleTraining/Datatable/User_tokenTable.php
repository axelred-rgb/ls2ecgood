<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class User_tokenTable extends Datatable{
    

    public function __construct($user_token = null, $datatablemodel = [])
    {
        parent::__construct($user_token, $datatablemodel);
    }

    public static function init(\User_token $user_token = null){
    
        $dt = new User_tokenTable($user_token);
        $dt->entity = $user_token;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('user_token.id', '#'), 'value' => 'id'], 
['header' => t('Date'), 'value' => 'date'], 
['header' => t('Quantite'), 'value' => 'quantite'], 
['header' => t('User') , 'value' => 'User.firstname'], 
['header' => t('Packtokken') , 'value' => 'Packtokken.prix']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('date'), 'value' => 'date'], 
['label' => t('quantite'), 'value' => 'quantite'], 
['label' => t('user'), 'value' => 'User.firstname'], 
['label' => t('packtokken'), 'value' => 'Packtokken.prix']
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
