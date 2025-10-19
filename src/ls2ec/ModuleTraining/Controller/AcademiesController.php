<?php 

            
use dclass\devups\Controller\Controller;

class AcademiesController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = AcademiesTable::init(new Academies())->buildindextable();

        self::$jsfiles[] = Academies::classpath('Resource/js/academiesCtrl.js');

        $this->entitytarget = 'Academies';
        $this->title = "Manage Academies";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => AcademiesTable::init(new Academies())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $academies = new Academies();
        $action = Academies::classpath("services.php?path=academies.create");
        if ($id) {
            $action = Academies::classpath("services.php?path=academies.update&id=" . $id);
            $academies = Academies::find($id);
        }

        return ['success' => true,
            'form' => AcademiesForm::init($academies, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($academies_form = null ){
        extract($_POST);


        $academies = $this->form_fillingentity(new Academies(), $academies_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'academies' => $academies,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $academies->__insert();
        return 	array(	'success' => true,
                        'academies' => $academies,
                        'tablerow' => AcademiesTable::init()->router()->getSingleRowRest($academies),
                        'detail' => ''
                        );

    }

    public function updateAction($id, $academies_form = null){
        extract($_POST);
            
        $academies = $this->form_fillingentity(new Academies($id), $academies_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'academies' => $academies,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $academies->__update();
        return 	array(	'success' => true,
                        'academies' => $academies,
                        'tablerow' => AcademiesTable::init()->router()->getSingleRowRest($academies),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Academies';
        $this->title = "Detail Academies";

        $academies = Academies::find($id);

        $this->renderDetailView(
            AcademiesTable::init()
                ->builddetailtable()
                ->renderentitydata($academies)
        );

    }
    
    public function deleteAction($id){
    
        Academies::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Academies::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
