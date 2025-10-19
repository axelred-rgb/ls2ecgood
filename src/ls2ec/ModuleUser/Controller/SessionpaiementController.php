<?php 

            
use dclass\devups\Controller\Controller;

class SessionpaiementController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = SessionpaiementTable::init(new Sessionpaiement())->buildindextable();

        self::$jsfiles[] = Sessionpaiement::classpath('Resource/js/sessionpaiementCtrl.js');

        $this->entitytarget = 'Sessionpaiement';
        $this->title = "Manage Sessionpaiement";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => SessionpaiementTable::init(new Sessionpaiement())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $sessionpaiement = new Sessionpaiement();
        $action = Sessionpaiement::classpath("services.php?path=sessionpaiement.create");
        if ($id) {
            $action = Sessionpaiement::classpath("services.php?path=sessionpaiement.update&id=" . $id);
            $sessionpaiement = Sessionpaiement::find($id);
        }

        return ['success' => true,
            'form' => SessionpaiementForm::init($sessionpaiement, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($sessionpaiement_form = null ){
        extract($_POST);

        $sessionpaiement = $this->form_fillingentity(new Sessionpaiement(), $sessionpaiement_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'sessionpaiement' => $sessionpaiement,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $sessionpaiement->__insert();
        return 	array(	'success' => true,
                        'sessionpaiement' => $sessionpaiement,
                        'tablerow' => SessionpaiementTable::init()->router()->getSingleRowRest($sessionpaiement),
                        'detail' => '');

    }

    public function updateAction($id, $sessionpaiement_form = null){
        extract($_POST);
            
        $sessionpaiement = $this->form_fillingentity(new Sessionpaiement($id), $sessionpaiement_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'sessionpaiement' => $sessionpaiement,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $sessionpaiement->__update();
        return 	array(	'success' => true,
                        'sessionpaiement' => $sessionpaiement,
                        'tablerow' => SessionpaiementTable::init()->router()->getSingleRowRest($sessionpaiement),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Sessionpaiement';
        $this->title = "Detail Sessionpaiement";

        $sessionpaiement = Sessionpaiement::find($id);

        $this->renderDetailView(
            SessionpaiementTable::init()
                ->builddetailtable()
                ->renderentitydata($sessionpaiement)
        );

    }
    
    public function deleteAction($id){
    
        Sessionpaiement::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Sessionpaiement::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
