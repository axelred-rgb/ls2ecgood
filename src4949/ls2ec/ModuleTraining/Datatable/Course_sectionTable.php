<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class Course_sectionTable extends Datatable{
    

    public function __construct($course_section = null, $datatablemodel = [])
    {
        parent::__construct($course_section, $datatablemodel);
    }

    public static function init(\Course_section $course_section = null){
    
        $dt = new Course_sectionTable($course_section);
        $dt->entity = $course_section;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('course_section.id', '#'), 'value' => 'id'], 
['header' => t('course_section.title', 'Title'), 'value' => 'title'], 
['header' => t('entity.courses', 'Courses') , 'value' => 'Courses.name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('course_section.title'), 'value' => 'title'], 
['label' => t('entity.courses'), 'value' => 'Courses.name']
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
