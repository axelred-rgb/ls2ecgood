<?php 

            
use dclass\devups\Controller\Controller;

class Course_sectionController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = Course_sectionTable::init(new Course_section())->buildindextable();

        self::$jsfiles[] = Course_section::classpath('Resource/js/course_sectionCtrl.js');

        $this->entitytarget = 'Course_section';
        $this->title = "Manage Course_section";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => Course_sectionTable::init(new Course_section())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $course_section = new Course_section();
        $action = Course_section::classpath("services.php?path=course_section.create");
        if ($id) {
            $action = Course_section::classpath("services.php?path=course_section.update&id=" . $id);
            $course_section = Course_section::find($id);
        }

        return ['success' => true,
            'form' => Course_sectionForm::init($course_section, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($course_section_form = null ){
        extract($_POST);

        $course_section = $this->form_fillingentity(new Course_section(), $course_section_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'course_section' => $course_section,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $course_section->__insert();
        return 	array(	'success' => true,
                        'course_section' => $course_section,
                        'tablerow' => Course_sectionTable::init()->router()->getSingleRowRest($course_section),
                        'detail' => '');

    }

    public function updateAction($id, $course_section_form = null){
        extract($_POST);
            
        $course_section = $this->form_fillingentity(new Course_section($id), $course_section_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'course_section' => $course_section,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $course_section->__update();
        return 	array(	'success' => true,
                        'course_section' => $course_section,
                        'tablerow' => Course_sectionTable::init()->router()->getSingleRowRest($course_section),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Course_section';
        $this->title = "Detail Course_section";

        $course_section = Course_section::find($id);

        $this->renderDetailView(
            Course_sectionTable::init()
                ->builddetailtable()
                ->renderentitydata($course_section)
        );

    }
    
    public function deleteAction($id){
    
        Course_section::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Course_section::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
