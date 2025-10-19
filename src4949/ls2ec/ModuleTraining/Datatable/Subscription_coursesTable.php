<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class Subscription_coursesTable extends Datatable{
    

    public function __construct($subscription_courses = null, $datatablemodel = [])
    {
        parent::__construct($subscription_courses, $datatablemodel);
    }

    public static function init(\Subscription_courses $subscription_courses = null){
    
        $dt = new Subscription_coursesTable($subscription_courses);
        $dt->entity = $subscription_courses;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('subscription_courses.id', '#'), 'value' => 'id'], 
['header' => t('Subscription') , 'value' => 'Subscription.name'], 
['header' => t('Courses') , 'value' => 'Courses.name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('subscription'), 'value' => 'Subscription.name'], 
['label' => t('courses'), 'value' => 'Courses.name']
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
