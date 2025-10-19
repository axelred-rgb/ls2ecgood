<?php 

            
use dclass\devups\Controller\Controller;


class CoursesController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = CoursesTable::init(new Courses())->buildindextable();

        self::$jsfiles[] = Courses::classpath('Resource/js/coursesCtrl.js');

        $this->entitytarget = 'Courses';
        $this->title = "Manage Courses";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => CoursesTable::init(new Courses())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $courses = new Courses();
        $action = Courses::classpath("services.php?path=courses.create");
        if ($id) {
            $action = Courses::classpath("services.php?path=courses.update&id=" . $id);
            $courses = Courses::find($id);
        }

        return ['success' => true,
            'form' => CoursesForm::init($courses, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($courses_form = null ){
        extract($_POST);

        $courses = $this->form_fillingentity(new Courses(), $courses_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'courses' => $courses,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $courses->__insert();
        return 	array(	'success' => true,
                        'courses' => $courses,
                        'tablerow' => CoursesTable::init()->router()->getSingleRowRest($courses),
                        'detail' => '');

    }

    public function updateAction($id, $courses_form = null){
        extract($_POST);
            
        $courses = $this->form_fillingentity(new Courses($id), $courses_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'courses' => $courses,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $courses->__update();
        return 	array(	'success' => true,
                        'courses' => $courses,
                        'tablerow' => CoursesTable::init()->router()->getSingleRowRest($courses),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Courses';
        $this->title = "Detail Courses";

        $courses = Courses::find($id);

        $this->renderDetailView(
            CoursesTable::init()
                ->builddetailtable()
                ->renderentitydata($courses)
        );

    }

    public function searchcourseAction()
    {
        extract($_POST);
        $courses = Courses::select()->where('this.name')->like($search)->__getAll();

        var_dump($courses);
        die();

        $this->renderDetailView(
            CoursesTable::init()
                ->builddetailtable()
                ->renderentitydata($courses)
        );

    }
    
    public function deleteAction($id){
    
        Courses::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Courses::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

    public function generatemoodleurl(){

        require_once('curl.php');
        $user = User::find(Request::get("user_id"));
        $email = $user->getEmail();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $username = $user->getUsername();
        $courseid = Request::get("id");

        $username = preg_replace('/[^A-Za-z0-9\-]/', '', $username);

        $token = '0f3c3454bb32b1de336ca98c20704adc';
        $domainname = 'https://courses.ls2ec.com';
        $functionname = 'auth_userkey_request_login_url';

        $param = [
            'user' => [
                'firstname' => $firstname, // You will not need this parameter, if you are not creating/updating users
                'lastname' => $lastname, // You will not need this parameter, if you are not creating/updating users
                'username' => $username,
                'email' => $email,
            ]
        ];

        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';
        $curl = new curl; // The required library curl can be obtained from https://github.com/moodlehq/sample-ws-clients


        try {
            $resp = $curl->post($serverurl, $param);
            $resp = json_decode($resp);

            if ($resp && !empty($resp->loginurl)) {
                $loginurl = $resp->loginurl;

            }
        } catch (Exception $ex) {
            return array('success' => false,
                'url' => ''); 

        }


        if (!isset($loginurl)) {
            return false;
        }


        $path = $loginurl . '&wantsurl=' . "$domainname/course/view.php?id=$courseid";

        return array('success' => true,
                'url' => $path); 

    }
}
