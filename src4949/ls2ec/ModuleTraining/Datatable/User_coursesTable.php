<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class User_coursesTable extends Datatable{
    

    public function __construct($user_courses = null, $datatablemodel = [])
    {
        parent::__construct($user_courses, $datatablemodel);
    }

    public static function init(\User_courses $user_courses = null){
    
        $dt = new User_coursesTable($user_courses);
        $dt->entity = $user_courses;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('user_courses.id', '#'), 'value' => 'id'], 
['header' => t('user_courses.creationdate', 'Creationdate'), 'value' => 'creationdate'], 
['header' => t('entity.user', 'User') , 'value' => 'User.firstname'], 
['header' => t('entity.courses', 'Courses') , 'value' => 'Courses.name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('user_courses.creationdate'), 'value' => 'creationdate'], 
['label' => t('entity.user'), 'value' => 'User.firstname'], 
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
