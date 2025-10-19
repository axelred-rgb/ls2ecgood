<?php 


class AcademiesFrontController extends AcademiesController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Academies());
            return $ll;

    }

    public function createAction($academies_form = null ){
        extract($_POST);


        $academies = $this->form_fillingentity(new Academies(), $academies_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                'academies' => $academies,
                'action' => 'create',
                'error' => $this->error);
        }


        $id = $academies->__insert();
        return 	array(	'success' => true,
            'academies' => $academies,
            'redirect' => 'manageacademies'
        );

    }



    public function updateAction($id, $academies_form = null){
        $rawdata = \Request::raw();
            
        $academies = $this->hydrateWithJson(new Academies($id), $rawdata["academies"]);

                  
        
        $academies->__update();
        return 	array(	'success' => true,
                        'academies' => $academies,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $academies = Academies::find($id);

        return 	array(	'success' => true,
                        'academies' => $academies,
                        'detail' => '');
          
}       


}
