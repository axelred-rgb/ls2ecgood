<?php 

use dclass\devups\Datatable\Lazyloading;

class User_tokenFrontController extends User_tokenController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new User_token());
            return $ll;

    }

    public function createAction($user_token_form = null ){
        $rawdata = \Request::raw();
        $user_token = $this->hydrateWithJson(new User_token(), $rawdata["user_token"]);
 

        
        $id = $user_token->__insert();
        return 	array(	'success' => true,
                        'user_token' => $user_token,
                        'detail' => '');

    }

    public function updateAction($id, $user_token_form = null){
        $rawdata = \Request::raw();
            
        $user_token = $this->hydrateWithJson(new User_token($id), $rawdata["user_token"]);

                  
        
        $user_token->__update();
        return 	array(	'success' => true,
                        'user_token' => $user_token,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $user_token = User_token::find($id);

        return 	array(	'success' => true,
                        'user_token' => $user_token,
                        'detail' => '');
          
    }

    public function giveToken(){
        if(isset($_POST['user'])){
            $user = User::find($_POST['user']);
            $token = $user->getToken();
            $tok = (int)$_POST['quantite'];
            $user->setToken((int)$token+$tok);
            $user->__update();
            return   array(  'success' => true,
                'user_token' => $user,
                'detail' => '');
        }
        else{
            return   array(  'success' => false,
                'detail' => 'Parametre manquant');
        }
    }


}
