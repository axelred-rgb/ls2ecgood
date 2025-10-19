<?php 

            
use dclass\devups\Controller\Controller;

class ProductpaiementController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = ProductpaiementTable::init(new Productpaiement())->buildindextable();

        self::$jsfiles[] = Productpaiement::classpath('Resource/js/productpaiementCtrl.js');

        $this->entitytarget = 'Productpaiement';
        $this->title = "Manage Productpaiement";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => ProductpaiementTable::init(new Productpaiement())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $productpaiement = new Productpaiement();
        $action = Productpaiement::classpath("services.php?path=productpaiement.create");
        if ($id) {
            $action = Productpaiement::classpath("services.php?path=productpaiement.update&id=" . $id);
            $productpaiement = Productpaiement::find($id);
        }

        return ['success' => true,
            'form' => ProductpaiementForm::init($productpaiement, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($productpaiement_form = null ){
        extract($_POST);

        $productpaiement = $this->form_fillingentity(new Productpaiement(), $productpaiement_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'productpaiement' => $productpaiement,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $productpaiement->__insert();
        return 	array(	'success' => true,
                        'productpaiement' => $productpaiement,
                        'tablerow' => ProductpaiementTable::init()->router()->getSingleRowRest($productpaiement),
                        'detail' => '');

    }

    public function updateAction($id, $productpaiement_form = null){
        extract($_POST);
            
        $productpaiement = $this->form_fillingentity(new Productpaiement($id), $productpaiement_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'productpaiement' => $productpaiement,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $productpaiement->__update();
        return 	array(	'success' => true,
                        'productpaiement' => $productpaiement,
                        'tablerow' => ProductpaiementTable::init()->router()->getSingleRowRest($productpaiement),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Productpaiement';
        $this->title = "Detail Productpaiement";

        $productpaiement = Productpaiement::find($id);

        $this->renderDetailView(
            ProductpaiementTable::init()
                ->builddetailtable()
                ->renderentitydata($productpaiement)
        );

    }
    
    public function deleteAction($id){
    
        Productpaiement::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Productpaiement::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
