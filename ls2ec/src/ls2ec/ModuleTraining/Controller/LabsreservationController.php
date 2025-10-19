<?php 

            
use dclass\devups\Controller\Controller;

class LabsreservationController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = LabsreservationTable::init(new Labsreservation())->buildindextable();

        self::$jsfiles[] = Labsreservation::classpath('Resource/js/labsreservationCtrl.js');

        $this->entitytarget = 'Labsreservation';
        $this->title = "Manage Labsreservation";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => LabsreservationTable::init(new Labsreservation())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $labsreservation = new Labsreservation();
        $action = Labsreservation::classpath("services.php?path=labsreservation.create");
        if ($id) {
            $action = Labsreservation::classpath("services.php?path=labsreservation.update&id=" . $id);
            $labsreservation = Labsreservation::find($id);
        }

        return ['success' => true,
            'form' => LabsreservationForm::init($labsreservation, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($labsreservation_form = null ){
        extract($_POST);

        $labsreservation = $this->form_fillingentity(new Labsreservation(), $labsreservation_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'labsreservation' => $labsreservation,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $labsreservation->__insert();
        return 	array(	'success' => true,
                        'labsreservation' => $labsreservation,
                        'tablerow' => LabsreservationTable::init()->router()->getSingleRowRest($labsreservation),
                        'detail' => '');

    }

    public function updateAction($id, $labsreservation_form = null){
        extract($_POST);
            
        $labsreservation = $this->form_fillingentity(new Labsreservation($id), $labsreservation_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'labsreservation' => $labsreservation,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $labsreservation->__update();
        return 	array(	'success' => true,
                        'labsreservation' => $labsreservation,
                        'tablerow' => LabsreservationTable::init()->router()->getSingleRowRest($labsreservation),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Labsreservation';
        $this->title = "Detail Labsreservation";

        $labsreservation = Labsreservation::find($id);

        $this->renderDetailView(
            LabsreservationTable::init()
                ->builddetailtable()
                ->renderentitydata($labsreservation)
        );

    }
    
    public function deleteAction($id){
    
        Labsreservation::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Labsreservation::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
