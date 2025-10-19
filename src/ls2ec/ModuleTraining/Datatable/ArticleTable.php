<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class ArticleTable extends Datatable{
    

    public function __construct($article = null, $datatablemodel = [])
    {
        parent::__construct($article, $datatablemodel);
    }

    public static function init(\Article $article = null){
    
        $dt = new ArticleTable($article);
        $dt->entity = $article;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('article.id', '#'), 'value' => 'id'], 
['header' => t('Title'), 'value' => 'title'], 
['header' => t('Image'), 'value' => 'src:image'], 
['header' => t('Image'), 'value' => 'image'], 
['header' => t('Resume'), 'value' => 'resume'], 
['header' => t('Description'), 'value' => 'description'], 
['header' => t('View'), 'value' => 'view']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('title'), 'value' => 'title'], 
['label' => t('image'), 'value' => 'src:image'], 
['label' => t('image'), 'value' => 'src:image'], 
['label' => t('image'), 'value' => 'image'], 
['label' => t('resume'), 'value' => 'resume'], 
['label' => t('description'), 'value' => 'description'], 
['label' => t('view'), 'value' => 'view']
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
