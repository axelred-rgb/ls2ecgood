<?php 

            
use dclass\devups\Controller\Controller;

class InstructorController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = InstructorTable::init(new Instructor())->buildindextable();

        self::$jsfiles[] = Instructor::classpath('Resource/js/instructorCtrl.js');

        $this->entitytarget = 'Instructor';
        $this->title = "Manage Instructor";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => InstructorTable::init(new Instructor())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $instructor = new Instructor();
        $action = Instructor::classpath("services.php?path=instructor.create");
        if ($id) {
            $action = Instructor::classpath("services.php?path=instructor.update&id=" . $id);
            $instructor = Instructor::find($id);
        }

        return ['success' => true,
            'form' => InstructorForm::init($instructor, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($instructor_form = null ){
        extract($_POST);

        $instructor = $this->form_fillingentity(new Instructor(), $instructor_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'instructor' => $instructor,
                            'action' => 'create', 
                            'error' => $this->error);
        }

        $instructor->uploadCv("cv");
        $instructor->setUser(userapp());

        $id = $instructor->__insert();

        $data = [
            "username" => $instructor->user->getFirstname(),
        ];
        Reportingmodel::init("notification")
            ->addReceiver($instructor->user->getEmail(), $instructor->user->getUsername())
            ->sendMail($data);

        return 	array(	'success' => true,
                        'instructor' => $instructor,
                        'tablerow' => InstructorTable::init()->router()->getSingleRowRest($instructor),
                        'redirect' => 'instructorconfirm');


    }

    public function updateAction($id, $instructor_form = null){
        extract($_POST);
            
        $instructor = $this->form_fillingentity(new Instructor($id), $instructor_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'instructor' => $instructor,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $instructor->__update();
        return 	array(	'success' => true,
                        'instructor' => $instructor,
                        'tablerow' => InstructorTable::init()->router()->getSingleRowRest($instructor),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Instructor';
        $this->title = "Detail Instructor";

        $instructor = Instructor::find($id);

        $this->renderDetailView(
            InstructorTable::init()
                ->builddetailtable()
                ->renderentitydata($instructor)
        );

    }
    
    public function deleteAction($id){
    
        Instructor::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Instructor::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
