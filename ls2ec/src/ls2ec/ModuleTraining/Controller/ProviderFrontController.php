<?php 


class ProviderFrontController extends ProviderController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Provider());
            return $ll;

    }

    public function createAction($provider_form = null ){
        $rawdata = \Request::raw();
        $provider = $this->hydrateWithJson(new Provider(), $rawdata["provider"]);
 

        
        $id = $provider->__insert();
        return 	array(	'success' => true,
                        'provider' => $provider,
                        'detail' => '');

    }

    public function updateAction($id, $provider_form = null){
        $rawdata = \Request::raw();
            
        $provider = $this->hydrateWithJson(new Provider($id), $rawdata["provider"]);

                  
        
        $provider->__update();
        return 	array(	'success' => true,
                        'provider' => $provider,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $provider = Provider::find($id);

        return 	array(	'success' => true,
                        'provider' => $provider,
                        'detail' => '');
          
}       


}
