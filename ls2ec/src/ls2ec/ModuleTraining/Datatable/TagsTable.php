<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class TagsTable extends Datatable{
    

    public function __construct($tags = null, $datatablemodel = [])
    {
        parent::__construct($tags, $datatablemodel);
    }

    public static function init(\Tags $tags = null){
    
        $dt = new TagsTable($tags);
        $dt->entity = $tags;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('tags.id', '#'), 'value' => 'id'], 
['header' => t('tags.name', 'Name'), 'value' => 'name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('tags.name'), 'value' => 'name']
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
