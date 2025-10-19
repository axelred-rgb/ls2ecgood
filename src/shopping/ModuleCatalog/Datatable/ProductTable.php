<?php


use dclass\devups\Datatable\Datatable as Datatable;

class ProductTable extends Datatable
{


    public function __construct($product = null, $datatablemodel = [])
    {
        parent::__construct($product, $datatablemodel);
    }

    public static function init(\Product $product = null)
    {

        $dt = new ProductTable($product);
        $dt->entity = $product;

        return $dt;
    }

    public function buildindextable()
    {

        $this->datatablemodel = [
            ['header' => t('product.id', '#'), 'value' => 'id'],
            ['header' => t('Name'), 'value' => 'name'],
            ['header' => t('Reference'), 'value' => 'reference'],
            ['header' => t('Priceofsale'), 'value' => 'priceofsale'],
            ['header' => t('Description'), 'value' => 'description'],
            ['header' => t('Cover'), 'value' => 'src:cover'],
            ['header' => t('Cover'), 'value' => 'cover'],
        ];

        return $this;
    }

    public function buildresourcetable()
    {
        $this->enablepagination = false;
        $this->base_url = __env . "";
        $this->groupaction = false;
        $this->enabletopaction = false;
        $this->actionDropdown = false;
        $this->searchaction = false;
        // $this->disableColumnAction();
        $this->disableDefaultaction();
        $this->datatablemodel = [
            ['header' => t('product.id', '#'), 'value' => 'id'],
            ['header' => t('Name'), 'value' => function ($item) {
                return " {$item->getName()} ";
            }],
            //['header' => t('Reference'), 'value' => 'reference'],
            ['header' => t('Priceofsale'), 'value' => 'priceofsale'],
            //['header' => t('Description'), 'value' => 'description'],
            ['header' => t('Cover'), 'value' => 'src:cover'],
            ['header' => t('Document'), 'value' => 'src:document'],
        ];

        $this->addcustomaction(function ($item) {
            if ($item->status == 1)
                return "
 <buttom onclick='model._edit({$item->getId()}, \"product\")' class='btn btn-warning'>Editer</buttom>
 <buttom onclick='model._visibility(this, {$item->getId()}, 0)' class='btn btn-danger'>Hide.</buttom>";

            return "
 <buttom onclick='model._edit({$item->getId()}, \"product\")' class='btn btn-warning'>Editer</buttom>
 <buttom onclick='model._visibility(this, {$item->getId()}, 1)' class='btn btn-danger'>Show.</buttom>";
        });
        return $this;
    }

    public function builddetailtable()
    {
        $this->datatablemodel = [
            ['label' => t('name'), 'value' => 'name'],
            ['label' => t('namecanonical'), 'value' => 'namecanonical'],
            ['label' => t('nameseo'), 'value' => 'nameseo'],
            ['label' => t('reference'), 'value' => 'reference'],
            ['label' => t('priceofsale'), 'value' => 'priceofsale'],
            ['label' => t('description'), 'value' => 'description'],
            ['label' => t('cover'), 'value' => 'src:cover'],
            ['label' => t('cover'), 'value' => 'src:cover'],
            ['label' => t('cover'), 'value' => 'cover'],
            ['label' => t('sommary'), 'value' => 'sommary']
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
