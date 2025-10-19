<?php


use dclass\devups\Datatable\Datatable as Datatable;

class CategoryTable extends Datatable
{


    public function __construct($category = null, $datatablemodel = [])
    {
        parent::__construct($category, $datatablemodel);
    }

    public static function init(\Category $category = null)
    {

        $dt = new CategoryTable($category);
        $dt->entity = $category;

        return $dt;
    }

    public function buildindextable()
    {

        $this->id_lang = 2;
        $this->datatablemodel = [
            ['header' => t('category.id', '#'), 'value' => 'id'],
            ['header' => t('category.name', 'Name'), 'value' => 'name'],
            ['header' => t('slug'), 'value' => 'slug'],
            ['header' => t('category.main', 'Main'), 'value' => 'main'],
            ['header' => t('Description'), 'value' => 'description'],
        ];

        $this->topactions[] = "<a href='".Category::classpath("category/manager")."' class='btn btn-info'>Gestionnaire avancé</a>";

        return $this;
    }

    public function builddetailtable()
    {
        $this->datatablemodel = [
            ['label' => t('category.name'), 'value' => 'name'],
            ['label' => t('category.favicon'), 'value' => 'favicon'],
            ['label' => t('category.parentid'), 'value' => 'parentid'],
            ['label' => t('category.nameseo'), 'value' => 'nameseo'],
            ['label' => t('category.main'), 'value' => 'main']
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
