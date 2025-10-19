<?php 


class Courses_tagFrontController extends Courses_tagController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Courses_tag());
            return $ll;

    }

    public function createAction($courses_tag_form = null ){
        $rawdata = \Request::raw();
        $courses_tag = $this->hydrateWithJson(new Courses_tag(), $rawdata["courses_tag"]);
 

        
        $id = $courses_tag->__insert();
        return 	array(	'success' => true,
                        'courses_tag' => $courses_tag,
                        'detail' => '');

    }

    public function updateAction($id, $courses_tag_form = null){
        $rawdata = \Request::raw();
            
        $courses_tag = $this->hydrateWithJson(new Courses_tag($id), $rawdata["courses_tag"]);

                  
        
        $courses_tag->__update();
        return 	array(	'success' => true,
                        'courses_tag' => $courses_tag,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $courses_tag = Courses_tag::find($id);

        return 	array(	'success' => true,
                        'courses_tag' => $courses_tag,
                        'detail' => '');
          
}       


}
