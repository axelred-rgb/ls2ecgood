<?php 

            
use dclass\devups\Controller\Controller;

class User_coursesController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = User_coursesTable::init(new User_courses())->buildindextable();

        self::$jsfiles[] = User_courses::classpath('Resource/js/user_coursesCtrl.js');

        $this->entitytarget = 'User_courses';
        $this->title = "Manage User_courses";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => User_coursesTable::init(new User_courses())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $user_courses = new User_courses();
        $action = User_courses::classpath("services.php?path=user_courses.create");
        if ($id) {
            $action = User_courses::classpath("services.php?path=user_courses.update&id=" . $id);
            $user_courses = User_courses::find($id);
        }

        return ['success' => true,
            'form' => User_coursesForm::init($user_courses, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($user_courses_form = null ){
        extract($_POST);

        $user_courses = $this->form_fillingentity(new User_courses(), $user_courses_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'user_courses' => $user_courses,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $user_courses->__insert();
        return 	array(	'success' => true,
                        'user_courses' => $user_courses,
                        'tablerow' => User_coursesTable::init()->router()->getSingleRowRest($user_courses),
                        'detail' => '');

    }

    public function updateAction($id, $user_courses_form = null){
        extract($_POST);
            
        $user_courses = $this->form_fillingentity(new User_courses($id), $user_courses_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'user_courses' => $user_courses,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $user_courses->__update();
        return 	array(	'success' => true,
                        'user_courses' => $user_courses,
                        'tablerow' => User_coursesTable::init()->router()->getSingleRowRest($user_courses),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'User_courses';
        $this->title = "Detail User_courses";

        $user_courses = User_courses::find($id);

        $this->renderDetailView(
            User_coursesTable::init()
                ->builddetailtable()
                ->renderentitydata($user_courses)
        );

    }
    
    public function deleteAction($id){
    
        User_courses::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        User_courses::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
