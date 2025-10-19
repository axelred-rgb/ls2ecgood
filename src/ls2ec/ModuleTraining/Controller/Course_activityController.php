<?php 

            
use dclass\devups\Controller\Controller;

class Course_activityController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = Course_activityTable::init(new Course_activity())->buildindextable();

        self::$jsfiles[] = Course_activity::classpath('Resource/js/course_activityCtrl.js');

        $this->entitytarget = 'Course_activity';
        $this->title = "Manage Course_activity";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => Course_activityTable::init(new Course_activity())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $course_activity = new Course_activity();
        $action = Course_activity::classpath("services.php?path=course_activity.create");
        if ($id) {
            $action = Course_activity::classpath("services.php?path=course_activity.update&id=" . $id);
            $course_activity = Course_activity::find($id);
        }

        return ['success' => true,
            'form' => Course_activityForm::init($course_activity, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($course_activity_form = null ){
        extract($_POST);

        $course_activity = $this->form_fillingentity(new Course_activity(), $course_activity_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'course_activity' => $course_activity,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $course_activity->__insert();
        return 	array(	'success' => true,
                        'course_activity' => $course_activity,
                        'tablerow' => Course_activityTable::init()->router()->getSingleRowRest($course_activity),
                        'detail' => '');

    }

    public function updateAction($id, $course_activity_form = null){
        extract($_POST);
            
        $course_activity = $this->form_fillingentity(new Course_activity($id), $course_activity_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'course_activity' => $course_activity,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $course_activity->__update();
        return 	array(	'success' => true,
                        'course_activity' => $course_activity,
                        'tablerow' => Course_activityTable::init()->router()->getSingleRowRest($course_activity),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Course_activity';
        $this->title = "Detail Course_activity";

        $course_activity = Course_activity::find($id);

        $this->renderDetailView(
            Course_activityTable::init()
                ->builddetailtable()
                ->renderentitydata($course_activity)
        );

    }
    
    public function deleteAction($id){
    
        Course_activity::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Course_activity::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
