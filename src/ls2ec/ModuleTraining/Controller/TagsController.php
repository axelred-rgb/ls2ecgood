<?php 

            
use dclass\devups\Controller\Controller;

class TagsController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = TagsTable::init(new Tags())->buildindextable();

        self::$jsfiles[] = Tags::classpath('Resource/js/tagsCtrl.js');

        $this->entitytarget = 'Tags';
        $this->title = "Manage Tags";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => TagsTable::init(new Tags())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $tags = new Tags();
        $action = Tags::classpath("services.php?path=tags.create");
        if ($id) {
            $action = Tags::classpath("services.php?path=tags.update&id=" . $id);
            $tags = Tags::find($id);
        }

        return ['success' => true,
            'form' => TagsForm::init($tags, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($tags_form = null ){
        extract($_POST);

        $tags = $this->form_fillingentity(new Tags(), $tags_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'tags' => $tags,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $tags->__insert();
        return 	array(	'success' => true,
                        'tags' => $tags,
                        'tablerow' => TagsTable::init()->router()->getSingleRowRest($tags),
                        'detail' => '');

    }

    public function updateAction($id, $tags_form = null){
        extract($_POST);
            
        $tags = $this->form_fillingentity(new Tags($id), $tags_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'tags' => $tags,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $tags->__update();
        return 	array(	'success' => true,
                        'tags' => $tags,
                        'tablerow' => TagsTable::init()->router()->getSingleRowRest($tags),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Tags';
        $this->title = "Detail Tags";

        $tags = Tags::find($id);

        $this->renderDetailView(
            TagsTable::init()
                ->builddetailtable()
                ->renderentitydata($tags)
        );

    }
    
    public function deleteAction($id){
    
        Tags::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Tags::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
