<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class Course_activityTable extends Datatable{
    

    public function __construct($course_activity = null, $datatablemodel = [])
    {
        parent::__construct($course_activity, $datatablemodel);
    }

    public static function init(\Course_activity $course_activity = null){
    
        $dt = new Course_activityTable($course_activity);
        $dt->entity = $course_activity;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('course_activity.id', '#'), 'value' => 'id'], 
['header' => t('course_activity.title', 'Title'), 'value' => 'title'], 
['header' => t('entity.course_section', 'Course_section') , 'value' => 'Course_section.title']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('course_activity.title'), 'value' => 'title'], 
['label' => t('entity.course_section'), 'value' => 'Course_section.title']
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
