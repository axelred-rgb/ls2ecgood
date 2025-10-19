<?php 


class InstructorFrontController extends InstructorController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Instructor());
            return $ll;

    }

    public function createAction($instructor_form = null ){
        $rawdata = \Request::raw();
        $instructor = $this->hydrateWithJson(new Instructor(), $rawdata["instructor"]);
 

        $instructor->uploadCv();


        
        $id = $instructor->__insert();
        return 	array(	'success' => true,
                        'instructor' => $instructor,
                        'detail' => '');

    }

    public function updateAction($id, $instructor_form = null){
        $rawdata = \Request::raw();
            
        $instructor = $this->hydrateWithJson(new Instructor($id), $rawdata["instructor"]);

            
                        $instructor->uploadCv();
      
        
        $instructor->__update();
        return 	array(	'success' => true,
                        'instructor' => $instructor,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $instructor = Instructor::find($id);

        return 	array(	'success' => true,
                        'instructor' => $instructor,
                        'detail' => '');
          
}       


}
