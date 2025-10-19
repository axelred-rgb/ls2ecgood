<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class AcademiesTable extends Datatable{
    

    public function __construct($academies = null, $datatablemodel = [])
    {
        parent::__construct($academies, $datatablemodel);
    }

    public static function init(\Academies $academies = null){
    
        $dt = new AcademiesTable($academies);
        $dt->entity = $academies;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
            ['header' => t('academies.id', '#'), 'value' => 'id'],
            ['header' => t('academies.name', 'Name'), 'value' => 'name'],
            ['header' => t('academies.description', 'Description'), 'value' => 'description'],
            ['header' => t('academies.image', 'Image'), 'value' => 'image'],
            ['header' => t('academies.banner', 'Banner'), 'value' => 'banner']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
            ['label' => t('academies.name'), 'value' => 'name'],
['label' => t('academies.description'), 'value' => 'description'], 
['label' => t('academies.image'), 'value' => 'image'], 
['label' => t('academies.banner'), 'value' => 'banner']
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
