<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class Courses_tagTable extends Datatable{
    

    public function __construct($courses_tag = null, $datatablemodel = [])
    {
        parent::__construct($courses_tag, $datatablemodel);
    }

    public static function init(\Courses_tag $courses_tag = null){
    
        $dt = new Courses_tagTable($courses_tag);
        $dt->entity = $courses_tag;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('courses_tag.id', '#'), 'value' => 'id'], 
['header' => t('entity.courses', 'Courses') , 'value' => 'Courses.name'], 
['header' => t('entity.tags', 'Tags') , 'value' => 'Tags.name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('entity.courses'), 'value' => 'Courses.name'], 
['label' => t('entity.tags'), 'value' => 'Tags.name']
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
