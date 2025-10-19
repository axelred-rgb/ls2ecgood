<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class CoursesTable extends Datatable{
    

    public function __construct($courses = null, $datatablemodel = [])
    {
        parent::__construct($courses, $datatablemodel);
    }

    public static function init(\Courses $courses = null){
    
        $dt = new CoursesTable($courses);
        $dt->entity = $courses;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('courses.id', '#'), 'value' => 'id'], 
['header' => t('courses.name', 'Name'), 'value' => 'name'], 
['header' => t('courses.description', 'Description'), 'value' => 'description'], 
['header' => t('courses.image', 'Image'), 'value' => 'image'], 
['header' => t('courses.price', 'Price'), 'value' => 'price'],
           // ['header' => t('courses.moodleid', 'Moodleid'), 'value' => 'moodleid'],
            ['header' => t('courses.creationdate', 'Creationdate'), 'value' => 'creationdate'],
['header' => t('courses.updateddate', 'Updateddate'), 'value' => 'updateddate'], 
['header' => t('entity.user', 'User') , 'value' => 'User.firstname']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('courses.name'), 'value' => 'name'], 
['label' => t('courses.description'), 'value' => 'description'], 
['label' => t('courses.image'), 'value' => 'image'], 
['label' => t('courses.price'), 'value' => 'price'],
          //  ['label' => t('courses.moodleid'), 'value' => 'moodleid'],
['label' => t('courses.creationdate'), 'value' => 'creationdate'], 
['label' => t('courses.updateddate'), 'value' => 'updateddate'], 
['label' => t('entity.user'), 'value' => 'User.firstname']
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
