<?php 

            
use dclass\devups\Controller\Controller;

class Labs_keysController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = Labs_keysTable::init(new Labs_keys())->buildindextable();

        self::$jsfiles[] = Labs_keys::classpath('Resource/js/labs_keysCtrl.js');

        $this->entitytarget = 'Labs_keys';
        $this->title = "Manage Labs_keys";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => Labs_keysTable::init(new Labs_keys())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $labs_keys = new Labs_keys();
        $action = Labs_keys::classpath("services.php?path=labs_keys.create");
        if ($id) {
            $action = Labs_keys::classpath("services.php?path=labs_keys.update&id=" . $id);
            $labs_keys = Labs_keys::find($id);
        }

        return ['success' => true,
            'form' => Labs_keysForm::init($labs_keys, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($labs_keys_form = null ){
        extract($_POST);

        $labs_keys = $this->form_fillingentity(new Labs_keys(), $labs_keys_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'labs_keys' => $labs_keys,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $labs_keys->__insert();
        return 	array(	'success' => true,
                        'labs_keys' => $labs_keys,
                        'tablerow' => Labs_keysTable::init()->router()->getSingleRowRest($labs_keys),
                        'detail' => '');

    }

    public function updateAction($id, $labs_keys_form = null){
        extract($_POST);
            
        $labs_keys = $this->form_fillingentity(new Labs_keys($id), $labs_keys_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'labs_keys' => $labs_keys,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $labs_keys->__update();
        return 	array(	'success' => true,
                        'labs_keys' => $labs_keys,
                        'tablerow' => Labs_keysTable::init()->router()->getSingleRowRest($labs_keys),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Labs_keys';
        $this->title = "Detail Labs_keys";

        $labs_keys = Labs_keys::find($id);

        $this->renderDetailView(
            Labs_keysTable::init()
                ->builddetailtable()
                ->renderentitydata($labs_keys)
        );

    }
    
    public function deleteAction($id){
    
        Labs_keys::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Labs_keys::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
