<?php 

        
use Genesis as g;

class PaiementForm extends FormManager{

    public $paiement;

    public static function init(\Paiement $paiement, $action = ""){
        $fb = new PaiementForm($paiement, $action);
        $fb->paiement = $paiement;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['motif'] = [
                "label" => t('paiement.motif'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->paiement->getMotif(), 
        ];

            $this->fields['montant'] = [
                "label" => t('paiement.montant'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->paiement->getMontant(), 
        ];

           
        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("paiement.formWidget", self::getFormData($id, $action));
    }
    
}
    