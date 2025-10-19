<?php 

            
use dclass\devups\Controller\Controller;

class Courses_tagController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = Courses_tagTable::init(new Courses_tag())->buildindextable();

        self::$jsfiles[] = Courses_tag::classpath('Resource/js/courses_tagCtrl.js');

        $this->entitytarget = 'Courses_tag';
        $this->title = "Manage Courses_tag";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => Courses_tagTable::init(new Courses_tag())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $courses_tag = new Courses_tag();
        $action = Courses_tag::classpath("services.php?path=courses_tag.create");
        if ($id) {
            $action = Courses_tag::classpath("services.php?path=courses_tag.update&id=" . $id);
            $courses_tag = Courses_tag::find($id);
        }

        return ['success' => true,
            'form' => Courses_tagForm::init($courses_tag, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($courses_tag_form = null ){
        extract($_POST);

        $courses_tag = $this->form_fillingentity(new Courses_tag(), $courses_tag_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'courses_tag' => $courses_tag,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $courses_tag->__insert();
        return 	array(	'success' => true,
                        'courses_tag' => $courses_tag,
                        'tablerow' => Courses_tagTable::init()->router()->getSingleRowRest($courses_tag),
                        'detail' => '');

    }

    public function updateAction($id, $courses_tag_form = null){
        extract($_POST);
            
        $courses_tag = $this->form_fillingentity(new Courses_tag($id), $courses_tag_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'courses_tag' => $courses_tag,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $courses_tag->__update();
        return 	array(	'success' => true,
                        'courses_tag' => $courses_tag,
                        'tablerow' => Courses_tagTable::init()->router()->getSingleRowRest($courses_tag),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Courses_tag';
        $this->title = "Detail Courses_tag";

        $courses_tag = Courses_tag::find($id);

        $this->renderDetailView(
            Courses_tagTable::init()
                ->builddetailtable()
                ->renderentitydata($courses_tag)
        );

    }
    
    public function deleteAction($id){
    
        Courses_tag::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Courses_tag::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
