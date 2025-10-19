<?php 

        
use Genesis as g;

class ProductForm extends FormManager{

    public $product;

    public static function init(\Product $product, $action = ""){
        $fb = new ProductForm($product, $action);
        $fb->product = $product;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['name'] = [
                "label" => t('product.name'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->product->getName(), 
        ];

            $this->fields['reference'] = [
                "label" => t('product.reference'), 
			FH_REQUIRE => false,
 			"type" => FORMTYPE_TEXT, 
                "value" => $this->product->getReference(), 
        ];

            $this->fields['priceofsale'] = [
                "label" => t('product.priceofsale'), 
			FH_REQUIRE => false,
 			"type" => FORMTYPE_TEXT, 
                "value" => $this->product->getPriceofsale(), 
        ];

            $this->fields['description'] = [
                "label" => t('product.description'), 
			FH_REQUIRE => false,
 			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->product->getDescription(), 
        ];

            $this->fields['cover'] = [
                "label" => t('product.cover'), 
			FH_REQUIRE => false,
 		"type" => FORMTYPE_FILE,
            "filetype" => FILETYPE_IMAGE, 
            "value" => $this->product->getCover(),
            "src" => $this->product->showCover(), 
        ];

        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("product.formWidget", self::getFormData($id, $action));
    }
    
}
    