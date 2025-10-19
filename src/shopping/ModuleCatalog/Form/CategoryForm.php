<?php


use Genesis as g;

class CategoryForm extends FormManager
{

    public $category;

    public static function init(\Category $category, $action = "")
    {
        $fb = new CategoryForm($category, $action);
        $fb->category = $category;
        return $fb;
    }

    public function buildForm()
    {

        $this->fields['name'] = [
            "label" => t('category.name'),
            "type" => FORMTYPE_TEXT,
            "lang" => true,
            "value" => $this->category->name,
        ];

        $this->fields['slug'] = [
            "label" => t('slug'),
            "type" => FORMTYPE_TEXT,
            "value" => $this->category->getSlug(),
        ];

        /*$this->fields['cover'] = [
            "label" => t('slug'),
            "type" => FORMTYPE_FILE,
            "value" => $this->category->getCover(),
            "src" => $this->category->showCover(),
        ];*/

        $this->fields['parent_id'] = [
            "label" => t('Parent id'),
            "type" => FORMTYPE_SELECT,
            "placeholder" => "--- Selectionnez une categorie parent ---" ,
            "value" => $this->category->parent_id,
            "options" => FormManager::Options_Helper("name", Category::getmaincategory(1)),
        ];

        $this->fields['main'] = [
            "label" => t('category.main'),
            FH_REQUIRE => false,
            "type" => FORMTYPE_RADIO,
            "options" => ["not main", "main category"],
            "value" => $this->category->getMain(),
        ];
        /*$this->fields['description'] = [
            "label" => t('Description'),
            FH_REQUIRE => false,
            "lang" => true,
            "type" => FORMTYPE_TEXTAREA,
            "value" => $this->category->description,
        ];*/


        return $this;

    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("category.formWidget", self::getFormData($id, $action));
    }

}
    