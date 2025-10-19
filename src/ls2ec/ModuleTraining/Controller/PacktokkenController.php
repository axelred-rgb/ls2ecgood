<?php 

            
use dclass\devups\Controller\Controller;

class PacktokkenController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = PacktokkenTable::init(new Packtokken())->buildindextable();

        self::$jsfiles[] = Packtokken::classpath('Resource/js/packtokkenCtrl.js');

        $this->entitytarget = 'Packtokken';
        $this->title = "Manage Packtokken";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => PacktokkenTable::init(new Packtokken())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $packtokken = new Packtokken();
        $action = Packtokken::classpath("services.php?path=packtokken.create");
        if ($id) {
            $action = Packtokken::classpath("services.php?path=packtokken.update&id=" . $id);
            $packtokken = Packtokken::find($id);
        }

        return ['success' => true,
            'form' => PacktokkenForm::init($packtokken, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function getPackTokkenInformation(){
        $id = $_POST['packtoken'];
        $pack = Packtokken::find($id);

        return array('success' => true,
            'price'=>$pack->getPrix(),
            'qte'=>$pack->getNombre(),
            'detail' => '');
    }

    public function createAction($packtokken_form = null ){
        extract($_POST);

        $packtokken = $this->form_fillingentity(new Packtokken(), $packtokken_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'packtokken' => $packtokken,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $packtokken->__insert();
        return 	array(	'success' => true,
                        'packtokken' => $packtokken,
                        'tablerow' => PacktokkenTable::init()->router()->getSingleRowRest($packtokken),
                        'detail' => '');

    }

    public function updateAction($id, $packtokken_form = null){
        extract($_POST);
            
        $packtokken = $this->form_fillingentity(new Packtokken($id), $packtokken_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'packtokken' => $packtokken,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $packtokken->__update();
        return 	array(	'success' => true,
                        'packtokken' => $packtokken,
                        'tablerow' => PacktokkenTable::init()->router()->getSingleRowRest($packtokken),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Packtokken';
        $this->title = "Detail Packtokken";

        $packtokken = Packtokken::find($id);

        $this->renderDetailView(
            PacktokkenTable::init()
                ->builddetailtable()
                ->renderentitydata($packtokken)
        );

    }
    
    public function deleteAction($id){
    
        Packtokken::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Packtokken::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
