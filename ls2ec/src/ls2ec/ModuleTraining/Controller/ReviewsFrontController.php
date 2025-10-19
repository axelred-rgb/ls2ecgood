<?php 


class ReviewsFrontController extends ReviewsController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Reviews());
            return $ll;

    }

    public function createAction($reviews_form = null ){
        $rawdata = \Request::raw();
        $reviews = $this->hydrateWithJson(new Reviews(), $rawdata["reviews"]);
 

        
        $id = $reviews->__insert();
        return 	array(	'success' => true,
                        'reviews' => $reviews,
                        'detail' => '');

    }

    public function updateAction($id, $reviews_form = null){
        $rawdata = \Request::raw();
            
        $reviews = $this->hydrateWithJson(new Reviews($id), $rawdata["reviews"]);

                  
        
        $reviews->__update();
        return 	array(	'success' => true,
                        'reviews' => $reviews,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $reviews = Reviews::find($id);

        return 	array(	'success' => true,
                        'reviews' => $reviews,
                        'detail' => '');
          
}       


}
