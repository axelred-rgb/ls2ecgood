<?php 

            
use dclass\devups\Controller\Controller;

class ExerciseController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = ExerciseTable::init(new Exercise())->buildindextable();

        self::$jsfiles[] = Exercise::classpath('Resource/js/exerciseCtrl.js');

        $this->entitytarget = 'Exercise';
        $this->title = "Manage Exercise";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => ExerciseTable::init(new Exercise())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $exercise = new Exercise();
        $action = Exercise::classpath("services.php?path=exercise.create");
        if ($id) {
            $action = Exercise::classpath("services.php?path=exercise.update&id=" . $id);
            $exercise = Exercise::find($id);
        }

        return ['success' => true,
            'form' => ExerciseForm::init($exercise, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($exercise_form = null ){
        extract($_POST);

        $exercise = $this->form_fillingentity(new Exercise(), $exercise_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'exercise' => $exercise,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $exercise->__insert();
        return 	array(	'success' => true,
                        'exercise' => $exercise,
                        'tablerow' => ExerciseTable::init()->router()->getSingleRowRest($exercise),
                        'detail' => '');

    }

    public function updateAction($id, $exercise_form = null){
        extract($_POST);
            
        $exercise = $this->form_fillingentity(new Exercise($id), $exercise_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'exercise' => $exercise,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $exercise->__update();
        return 	array(	'success' => true,
                        'exercise' => $exercise,
                        'tablerow' => ExerciseTable::init()->router()->getSingleRowRest($exercise),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Exercise';
        $this->title = "Detail Exercise";

        $exercise = Exercise::find($id);

        $this->renderDetailView(
            ExerciseTable::init()
                ->builddetailtable()
                ->renderentitydata($exercise)
        );

    }
    
    public function deleteAction($id){
    
        Exercise::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Exercise::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
