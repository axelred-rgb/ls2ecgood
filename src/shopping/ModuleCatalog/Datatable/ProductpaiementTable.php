<?php 


use dclass\devups\Datatable\Datatable as Datatable;

class ProductpaiementTable extends Datatable{
    

    public function __construct($productpaiement = null, $datatablemodel = [])
    {
        parent::__construct($productpaiement, $datatablemodel);
    }

    public static function init(\Productpaiement $productpaiement = null){
    
        $dt = new ProductpaiementTable($productpaiement);
        $dt->entity = $productpaiement;
        
        return $dt;
    }

    public function buildindextable(){

        $this->datatablemodel = [
['header' => t('productpaiement.id', '#'), 'value' => 'id'], 
['header' => t('Created_at'), 'value' => 'created_at'], 
['header' => t('Updated_at'), 'value' => 'updated_at'], 
['header' => t('Deleted_at'), 'value' => 'deleted_at'], 
['header' => t('Product') , 'value' => 'Product.name']
];

        return $this;
    }
    
    public function builddetailtable()
    {
        $this->datatablemodel = [
['label' => t('created_at'), 'value' => 'created_at'], 
['label' => t('updated_at'), 'value' => 'updated_at'], 
['label' => t('deleted_at'), 'value' => 'deleted_at'], 
['label' => t('product'), 'value' => 'Product.name']
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
