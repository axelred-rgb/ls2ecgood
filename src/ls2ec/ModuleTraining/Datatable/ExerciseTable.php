<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class ExerciseTable extends Datatable{
    

    public function __construct($exercise = null, $datatablemodel = [])
    {
        parent::__construct($exercise, $datatablemodel);
    }

    public static function init(\Exercise $exercise = null){
    
        $dt = new ExerciseTable($exercise);
        $dt->entity = $exercise;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('exercise.id', '#'), 'value' => 'id'], 
['header' => t('Title'), 'value' => 'title'], 
['header' => t('Title_en'), 'value' => 'title_en'], 
['header' => t('Image'), 'value' => 'src:image'], 
['header' => t('Image'), 'value' => 'image'], 
['header' => t('Contenu'), 'value' => 'contenu'], 
['header' => t('Contenu_en'), 'value' => 'contenu_en'], 
['header' => t('Reponse'), 'value' => 'reponse'], 
['header' => t('Reponse_en'), 'value' => 'reponse_en']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('title'), 'value' => 'title'], 
['label' => t('title_en'), 'value' => 'title_en'], 
['label' => t('image'), 'value' => 'src:image'], 
['label' => t('image'), 'value' => 'src:image'], 
['label' => t('image'), 'value' => 'image'], 
['label' => t('contenu'), 'value' => 'contenu'], 
['label' => t('contenu_en'), 'value' => 'contenu_en'], 
['label' => t('reponse'), 'value' => 'reponse'], 
['label' => t('reponse_en'), 'value' => 'reponse_en']
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
