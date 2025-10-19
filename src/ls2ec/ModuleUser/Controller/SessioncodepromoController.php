<?php 

            
use dclass\devups\Controller\Controller;

class SessioncodepromoController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = SessioncodepromoTable::init(new Sessioncodepromo())->buildindextable();

        self::$jsfiles[] = Sessioncodepromo::classpath('Resource/js/sessioncodepromoCtrl.js');

        $this->entitytarget = 'Sessioncodepromo';
        $this->title = "Manage Sessioncodepromo";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => SessioncodepromoTable::init(new Sessioncodepromo())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $sessioncodepromo = new Sessioncodepromo();
        $action = Sessioncodepromo::classpath("services.php?path=sessioncodepromo.create");
        if ($id) {
            $action = Sessioncodepromo::classpath("services.php?path=sessioncodepromo.update&id=" . $id);
            $sessioncodepromo = Sessioncodepromo::find($id);
        }

        return ['success' => true,
            'form' => SessioncodepromoForm::init($sessioncodepromo, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($sessioncodepromo_form = null ){
        extract($_POST);

        $sessioncodepromo = $this->form_fillingentity(new Sessioncodepromo(), $sessioncodepromo_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'sessioncodepromo' => $sessioncodepromo,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $sessioncodepromo->__insert();
        return 	array(	'success' => true,
                        'sessioncodepromo' => $sessioncodepromo,
                        'tablerow' => SessioncodepromoTable::init()->router()->getSingleRowRest($sessioncodepromo),
                        'detail' => '');

    }

    public function updateAction($id, $sessioncodepromo_form = null){
        extract($_POST);
            
        $sessioncodepromo = $this->form_fillingentity(new Sessioncodepromo($id), $sessioncodepromo_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'sessioncodepromo' => $sessioncodepromo,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $sessioncodepromo->__update();
        return 	array(	'success' => true,
                        'sessioncodepromo' => $sessioncodepromo,
                        'tablerow' => SessioncodepromoTable::init()->router()->getSingleRowRest($sessioncodepromo),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Sessioncodepromo';
        $this->title = "Detail Sessioncodepromo";

        $sessioncodepromo = Sessioncodepromo::find($id);

        $this->renderDetailView(
            SessioncodepromoTable::init()
                ->builddetailtable()
                ->renderentitydata($sessioncodepromo)
        );

    }
    
    public function deleteAction($id){
    
        Sessioncodepromo::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Sessioncodepromo::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
