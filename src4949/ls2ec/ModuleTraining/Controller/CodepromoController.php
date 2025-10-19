<?php 

            
use dclass\devups\Controller\Controller;

class CodepromoController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = CodepromoTable::init(new Codepromo())->buildindextable();

        self::$jsfiles[] = Codepromo::classpath('Resource/js/codepromoCtrl.js');

        $this->entitytarget = 'Codepromo';
        $this->title = "Manage Codepromo";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => CodepromoTable::init(new Codepromo())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $codepromo = new Codepromo();
        $action = Codepromo::classpath("services.php?path=codepromo.create");
        if ($id) {
            $action = Codepromo::classpath("services.php?path=codepromo.update&id=" . $id);
            $codepromo = Codepromo::find($id);
        }

        return ['success' => true,
            'form' => CodepromoForm::init($codepromo, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($codepromo_form = null ){
        extract($_POST);

        $codepromo = $this->form_fillingentity(new Codepromo(), $codepromo_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'codepromo' => $codepromo,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $codepromo->__insert();
        return 	array(	'success' => true,
                        'codepromo' => $codepromo,
                        'tablerow' => CodepromoTable::init()->router()->getSingleRowRest($codepromo),
                        'detail' => '');

    }

    public function updateAction($id, $codepromo_form = null){
        extract($_POST);
            
        $codepromo = $this->form_fillingentity(new Codepromo($id), $codepromo_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'codepromo' => $codepromo,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $codepromo->__update();
        return 	array(	'success' => true,
                        'codepromo' => $codepromo,
                        'tablerow' => CodepromoTable::init()->router()->getSingleRowRest($codepromo),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Codepromo';
        $this->title = "Detail Codepromo";

        $codepromo = Codepromo::find($id);

        $this->renderDetailView(
            CodepromoTable::init()
                ->builddetailtable()
                ->renderentitydata($codepromo)
        );

    }
    
    public function deleteAction($id){
    
        Codepromo::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Codepromo::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

    public function saveCode(){
        if(isset($_POST['code']) && isset($_POST['value'])){
            $codepromo = new Codepromo();
            $codepromo->setCode($_POST['code']);
            $codepromo->setValeur($_POST['value']);
            $codepromo->__insert();
            return 	array(	'success' => true,
                'code_promo' => $codepromo,
                'detail' => '');
        }
        else{
            return 	array(	'success' => false,
                'detail' => 'Parametre manquant');
        }
    }

}
