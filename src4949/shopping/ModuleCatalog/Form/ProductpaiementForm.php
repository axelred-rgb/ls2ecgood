<?php 

        
use Genesis as g;

class ProductpaiementForm extends FormManager{

    public $productpaiement;

    public static function init(\Productpaiement $productpaiement, $action = ""){
        $fb = new ProductpaiementForm($productpaiement, $action);
        $fb->productpaiement = $productpaiement;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['created_at'] = [
                "label" => t('productpaiement.created_at'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->productpaiement->getCreated_at(), 
        ];

            $this->fields['updated_at'] = [
                "label" => t('productpaiement.updated_at'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->productpaiement->getUpdated_at(), 
        ];

            $this->fields['deleted_at'] = [
                "label" => t('productpaiement.deleted_at'), 
			FH_REQUIRE => false,
 "type" => FORMTYPE_TEXT,
            "value" => $this->productpaiement->getDeleted_at(), 
        ];

        $this->fields['product.id'] = [
            "type" => FORMTYPE_SELECT, 
            "value" => $this->productpaiement->getProduct()->getId(),
            "label" => t('product'),
            "options" => FormManager::Options_Helper('name', Product::allrows()),
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("productpaiement.formWidget", self::getFormData($id, $action));
    }
    
}
    