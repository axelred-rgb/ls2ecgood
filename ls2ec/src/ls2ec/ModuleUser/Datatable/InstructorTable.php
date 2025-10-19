<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class InstructorTable extends Datatable{
    

    public function __construct($instructor = null, $datatablemodel = [])
    {
        parent::__construct($instructor, $datatablemodel);
    }

    public static function init(\Instructor $instructor = null){
    
        $dt = new InstructorTable($instructor);
        $dt->entity = $instructor;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('instructor.id', '#'), 'value' => 'id'], 
['header' => t('instructor.fields', 'Fields'), 'value' => 'fields'], 
['header' => t('instructor.Profession', 'Profession'), 'value' => 'Profession'], 
['header' => t('instructor.speciality', 'Speciality'), 'value' => 'speciality'], 
['header' => t('instructor.biography', 'Biography'), 'value' => 'biography'], 
['header' => t('instructor.cv', 'Cv'), 'value' => 'cv'], 
['header' => t('entity.academies', 'Academies') , 'value' => 'Academies.description'], 
['header' => t('entity.user', 'User') , 'value' => 'User.firstname']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('instructor.fields'), 'value' => 'fields'], 
['label' => t('instructor.Profession'), 'value' => 'Profession'], 
['label' => t('instructor.speciality'), 'value' => 'speciality'], 
['label' => t('instructor.biography'), 'value' => 'biography'], 
['label' => t('instructor.cv'), 'value' => 'cv'], 
['label' => t('entity.academies'), 'value' => 'Academies.description'], 
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
