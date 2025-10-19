<?php 


class CoursesFrontController extends CoursesController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Courses());
            return $ll;

    }

    public function createAction($courses_form = null ){
        $rawdata = \Request::raw();
        $courses = $this->hydrateWithJson(new Courses(), $rawdata["courses"]);
 

        
        $id = $courses->__insert();
        return 	array(	'success' => true,
                        'courses' => $courses,
                        'detail' => '');

    }

    public function updateAction($id, $courses_form = null){
        $rawdata = \Request::raw();
            
        $courses = $this->hydrateWithJson(new Courses($id), $rawdata["courses"]);

                  
        
        $courses->__update();
        return 	array(	'success' => true,
                        'courses' => $courses,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $courses = Courses::find($id);

        return 	array(	'success' => true,
                        'courses' => $courses,
                        'detail' => '');
          
}       


}
