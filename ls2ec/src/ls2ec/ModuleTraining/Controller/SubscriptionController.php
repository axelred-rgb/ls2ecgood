<?php 

            
use dclass\devups\Controller\Controller;

class SubscriptionController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = SubscriptionTable::init(new Subscription())->buildindextable();

        self::$jsfiles[] = Subscription::classpath('Resource/js/subscriptionCtrl.js');

        $this->entitytarget = 'Subscription';
        $this->title = "Manage Subscription";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => SubscriptionTable::init(new Subscription())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $subscription = new Subscription();
        $action = Subscription::classpath("services.php?path=subscription.create");
        if ($id) {
            $action = Subscription::classpath("services.php?path=subscription.update&id=" . $id);
            $subscription = Subscription::find($id);
        }

        return ['success' => true,
            'form' => SubscriptionForm::init($subscription, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($subscription_form = null ){
        extract($_POST);

        $subscription = $this->form_fillingentity(new Subscription(), $subscription_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'subscription' => $subscription,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $subscription->__insert();
        return 	array(	'success' => true,
                        'subscription' => $subscription,
                        'tablerow' => SubscriptionTable::init()->router()->getSingleRowRest($subscription),
                        'detail' => '');

    }

    public function updateAction($id, $subscription_form = null){
        extract($_POST);
            
        $subscription = $this->form_fillingentity(new Subscription($id), $subscription_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'subscription' => $subscription,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $subscription->__update();
        return 	array(	'success' => true,
                        'subscription' => $subscription,
                        'tablerow' => SubscriptionTable::init()->router()->getSingleRowRest($subscription),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Subscription';
        $this->title = "Detail Subscription";

        $subscription = Subscription::find($id);

        $this->renderDetailView(
            SubscriptionTable::init()
                ->builddetailtable()
                ->renderentitydata($subscription)
        );

    }
    
    public function deleteAction($id){
    
        Subscription::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Subscription::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
