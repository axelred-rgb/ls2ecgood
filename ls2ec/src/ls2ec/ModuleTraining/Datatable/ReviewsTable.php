<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class ReviewsTable extends Datatable{
    

    public function __construct($reviews = null, $datatablemodel = [])
    {
        parent::__construct($reviews, $datatablemodel);
    }

    public static function init(\Reviews $reviews = null){
    
        $dt = new ReviewsTable($reviews);
        $dt->entity = $reviews;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('reviews.id', '#'), 'value' => 'id'], 
['header' => t('reviews.note', 'Note'), 'value' => 'note'], 
['header' => t('reviews.comments', 'Comments'), 'value' => 'comments'], 
['header' => t('entity.courses', 'Courses') , 'value' => 'Courses.name'], 
['header' => t('entity.user', 'User') , 'value' => 'User.firstname']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('reviews.note'), 'value' => 'note'], 
['label' => t('reviews.comments'), 'value' => 'comments'], 
['label' => t('entity.courses'), 'value' => 'Courses.name'], 
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
