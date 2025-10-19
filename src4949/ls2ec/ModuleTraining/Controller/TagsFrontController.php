<?php 


class TagsFrontController extends TagsController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Tags());
            return $ll;

    }

    public function createAction($tags_form = null ){
        $rawdata = \Request::raw();
        $tags = $this->hydrateWithJson(new Tags(), $rawdata["tags"]);
 

        
        $id = $tags->__insert();
        return 	array(	'success' => true,
                        'tags' => $tags,
                        'detail' => '');

    }

    public function updateAction($id, $tags_form = null){
        $rawdata = \Request::raw();
            
        $tags = $this->hydrateWithJson(new Tags($id), $rawdata["tags"]);

                  
        
        $tags->__update();
        return 	array(	'success' => true,
                        'tags' => $tags,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $tags = Tags::find($id);

        return 	array(	'success' => true,
                        'tags' => $tags,
                        'detail' => '');
          
}       


}
