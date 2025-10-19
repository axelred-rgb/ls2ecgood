<?php 

            
use dclass\devups\Controller\Controller;

class Subscription_coursesController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = Subscription_coursesTable::init(new Subscription_courses())->buildindextable();

        self::$jsfiles[] = Subscription_courses::classpath('Resource/js/subscription_coursesCtrl.js');

        $this->entitytarget = 'Subscription_courses';
        $this->title = "Manage Subscription_courses";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => Subscription_coursesTable::init(new Subscription_courses())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $subscription_courses = new Subscription_courses();
        $action = Subscription_courses::classpath("services.php?path=subscription_courses.create");
        if ($id) {
            $action = Subscription_courses::classpath("services.php?path=subscription_courses.update&id=" . $id);
            $subscription_courses = Subscription_courses::find($id);
        }

        return ['success' => true,
            'form' => Subscription_coursesForm::init($subscription_courses, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($subscription_courses_form = null ){
        extract($_POST);

        $subscription_courses = $this->form_fillingentity(new Subscription_courses(), $subscription_courses_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'subscription_courses' => $subscription_courses,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $subscription_courses->__insert();
        return 	array(	'success' => true,
                        'subscription_courses' => $subscription_courses,
                        'tablerow' => Subscription_coursesTable::init()->router()->getSingleRowRest($subscription_courses),
                        'detail' => '');

    }

    public function updateAction($id, $subscription_courses_form = null){
        extract($_POST);
            
        $subscription_courses = $this->form_fillingentity(new Subscription_courses($id), $subscription_courses_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'subscription_courses' => $subscription_courses,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $subscription_courses->__update();
        return 	array(	'success' => true,
                        'subscription_courses' => $subscription_courses,
                        'tablerow' => Subscription_coursesTable::init()->router()->getSingleRowRest($subscription_courses),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Subscription_courses';
        $this->title = "Detail Subscription_courses";

        $subscription_courses = Subscription_courses::find($id);

        $this->renderDetailView(
            Subscription_coursesTable::init()
                ->builddetailtable()
                ->renderentitydata($subscription_courses)
        );

    }
    
    public function deleteAction($id){
    
        Subscription_courses::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Subscription_courses::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
