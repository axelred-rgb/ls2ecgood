<?php 

            
use dclass\devups\Controller\Controller;

class User_tokenController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = User_tokenTable::init(new User_token())->buildindextable();

        self::$jsfiles[] = User_token::classpath('Resource/js/user_tokenCtrl.js');

        $this->entitytarget = 'User_token';
        $this->title = "Manage User_token";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => User_tokenTable::init(new User_token())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $user_token = new User_token();
        $action = User_token::classpath("services.php?path=user_token.create");
        if ($id) {
            $action = User_token::classpath("services.php?path=user_token.update&id=" . $id);
            $user_token = User_token::find($id);
        }

        return ['success' => true,
            'form' => User_tokenForm::init($user_token, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($user_token_form = null ){
        extract($_POST);

        $user_token = $this->form_fillingentity(new User_token(), $user_token_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'user_token' => $user_token,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $user_token->__insert();
        return 	array(	'success' => true,
                        'user_token' => $user_token,
                        'tablerow' => User_tokenTable::init()->router()->getSingleRowRest($user_token),
                        'detail' => '');

    }

    public function updateAction($id, $user_token_form = null){
        extract($_POST);
            
        $user_token = $this->form_fillingentity(new User_token($id), $user_token_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'user_token' => $user_token,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $user_token->__update();
        return 	array(	'success' => true,
                        'user_token' => $user_token,
                        'tablerow' => User_tokenTable::init()->router()->getSingleRowRest($user_token),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'User_token';
        $this->title = "Detail User_token";

        $user_token = User_token::find($id);

        $this->renderDetailView(
            User_tokenTable::init()
                ->builddetailtable()
                ->renderentitydata($user_token)
        );

    }
    
    public function deleteAction($id){
    
        User_token::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        User_token::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
