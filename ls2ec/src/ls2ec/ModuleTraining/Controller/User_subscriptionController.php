<?php 

            
use dclass\devups\Controller\Controller;

class User_subscriptionController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = User_subscriptionTable::init(new User_subscription())->buildindextable();

        self::$jsfiles[] = User_subscription::classpath('Resource/js/user_subscriptionCtrl.js');

        $this->entitytarget = 'User_subscription';
        $this->title = "Manage User_subscription";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => User_subscriptionTable::init(new User_subscription())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $user_subscription = new User_subscription();
        $action = User_subscription::classpath("services.php?path=user_subscription.create");
        if ($id) {
            $action = User_subscription::classpath("services.php?path=user_subscription.update&id=" . $id);
            $user_subscription = User_subscription::find($id);
        }

        return ['success' => true,
            'form' => User_subscriptionForm::init($user_subscription, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($user_subscription_form = null ){
        extract($_POST);

        $user_subscription = $this->form_fillingentity(new User_subscription(), $user_subscription_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'user_subscription' => $user_subscription,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $user_subscription->__insert();
        return 	array(	'success' => true,
                        'user_subscription' => $user_subscription,
                        'tablerow' => User_subscriptionTable::init()->router()->getSingleRowRest($user_subscription),
                        'detail' => '');

    }

    public function updateAction($id, $user_subscription_form = null){
        extract($_POST);
            
        $user_subscription = $this->form_fillingentity(new User_subscription($id), $user_subscription_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'user_subscription' => $user_subscription,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $user_subscription->__update();
        return 	array(	'success' => true,
                        'user_subscription' => $user_subscription,
                        'tablerow' => User_subscriptionTable::init()->router()->getSingleRowRest($user_subscription),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'User_subscription';
        $this->title = "Detail User_subscription";

        $user_subscription = User_subscription::find($id);

        $this->renderDetailView(
            User_subscriptionTable::init()
                ->builddetailtable()
                ->renderentitydata($user_subscription)
        );

    }
    
    public function deleteAction($id){
    
        User_subscription::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        User_subscription::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
