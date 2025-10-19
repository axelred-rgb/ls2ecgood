<?php 

            
use dclass\devups\Controller\Controller;

class ProviderController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = ProviderTable::init(new Provider())->buildindextable();

        self::$jsfiles[] = Provider::classpath('Resource/js/providerCtrl.js');

        $this->entitytarget = 'Provider';
        $this->title = "Manage Provider";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => ProviderTable::init(new Provider())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $provider = new Provider();
        $action = Provider::classpath("services.php?path=provider.create");
        if ($id) {
            $action = Provider::classpath("services.php?path=provider.update&id=" . $id);
            $provider = Provider::find($id);
        }

        return ['success' => true,
            'form' => ProviderForm::init($provider, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($provider_form = null ){
        extract($_POST);

        $provider = $this->form_fillingentity(new Provider(), $provider_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'provider' => $provider,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $provider->__insert();
        return 	array(	'success' => true,
                        'provider' => $provider,
                        'tablerow' => ProviderTable::init()->router()->getSingleRowRest($provider),
                        'detail' => '');

    }

    public function updateAction($id, $provider_form = null){
        extract($_POST);
            
        $provider = $this->form_fillingentity(new Provider($id), $provider_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'provider' => $provider,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $provider->__update();
        return 	array(	'success' => true,
                        'provider' => $provider,
                        'tablerow' => ProviderTable::init()->router()->getSingleRowRest($provider),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Provider';
        $this->title = "Detail Provider";

        $provider = Provider::find($id);

        $this->renderDetailView(
            ProviderTable::init()
                ->builddetailtable()
                ->renderentitydata($provider)
        );

    }
    
    public function deleteAction($id){
    
        Provider::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Provider::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
