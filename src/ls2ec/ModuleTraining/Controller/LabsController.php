<?php 

            
use dclass\devups\Controller\Controller;

class LabsController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = LabsTable::init(new Labs())->buildindextable();

        self::$jsfiles[] = Labs::classpath('Resource/js/labsCtrl.js');

        $this->entitytarget = 'Labs';
        $this->title = "Manage Labs";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => LabsTable::init(new Labs())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $labs = new Labs();
        $action = Labs::classpath("services.php?path=labs.create");
        if ($id) {
            $action = Labs::classpath("services.php?path=labs.update&id=" . $id);
            $labs = Labs::find($id);
        }

        return ['success' => true,
            'form' => LabsForm::init($labs, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($labs_form = null ){
        extract($_POST);

        $labs = $this->form_fillingentity(new Labs(), $labs_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'labs' => $labs,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $labs->__insert();
        return 	array(	'success' => true,
                        'labs' => $labs,
                        'tablerow' => LabsTable::init()->router()->getSingleRowRest($labs),
                        'detail' => '');

    }

    public function updateAction($id, $labs_form = null){
        extract($_POST);
            
        $labs = $this->form_fillingentity(new Labs($id), $labs_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'labs' => $labs,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $labs->__update();
        return 	array(	'success' => true,
                        'labs' => $labs,
                        'tablerow' => LabsTable::init()->router()->getSingleRowRest($labs),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Labs';
        $this->title = "Detail Labs";

        $labs = Labs::find($id);

        $this->renderDetailView(
            LabsTable::init()
                ->builddetailtable()
                ->renderentitydata($labs)
        );

    }
    
    public function deleteAction($id){
    
        Labs::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Labs::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
