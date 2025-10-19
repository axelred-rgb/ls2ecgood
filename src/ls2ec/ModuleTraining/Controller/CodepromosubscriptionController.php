<?php 

            
use dclass\devups\Controller\Controller;

class CodepromosubscriptionController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = CodepromosubscriptionTable::init(new Codepromosubscription())->buildindextable();

        self::$jsfiles[] = Codepromosubscription::classpath('Resource/js/codepromosubscriptionCtrl.js');

        $this->entitytarget = 'Codepromosubscription';
        $this->title = "Manage Codepromosubscription";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => CodepromosubscriptionTable::init(new Codepromosubscription())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $codepromosubscription = new Codepromosubscription();
        $action = Codepromosubscription::classpath("services.php?path=codepromosubscription.create");
        if ($id) {
            $action = Codepromosubscription::classpath("services.php?path=codepromosubscription.update&id=" . $id);
            $codepromosubscription = Codepromosubscription::find($id);
        }

        return ['success' => true,
            'form' => CodepromosubscriptionForm::init($codepromosubscription, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($codepromosubscription_form = null ){
        extract($_POST);

        $codepromosubscription = $this->form_fillingentity(new Codepromosubscription(), $codepromosubscription_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'codepromosubscription' => $codepromosubscription,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $codepromosubscription->__insert();
        return 	array(	'success' => true,
                        'codepromosubscription' => $codepromosubscription,
                        'tablerow' => CodepromosubscriptionTable::init()->router()->getSingleRowRest($codepromosubscription),
                        'detail' => '');

    }

    public function updateAction($id, $codepromosubscription_form = null){
        extract($_POST);
            
        $codepromosubscription = $this->form_fillingentity(new Codepromosubscription($id), $codepromosubscription_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'codepromosubscription' => $codepromosubscription,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $codepromosubscription->__update();
        return 	array(	'success' => true,
                        'codepromosubscription' => $codepromosubscription,
                        'tablerow' => CodepromosubscriptionTable::init()->router()->getSingleRowRest($codepromosubscription),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Codepromosubscription';
        $this->title = "Detail Codepromosubscription";

        $codepromosubscription = Codepromosubscription::find($id);

        $this->renderDetailView(
            CodepromosubscriptionTable::init()
                ->builddetailtable()
                ->renderentitydata($codepromosubscription)
        );

    }
    
    public function deleteAction($id){
    
        Codepromosubscription::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Codepromosubscription::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
