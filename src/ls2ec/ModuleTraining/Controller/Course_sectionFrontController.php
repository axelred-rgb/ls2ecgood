<?php 


class Course_sectionFrontController extends Course_sectionController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Course_section());
            return $ll;

    }

    public function createAction($course_section_form = null ){
        $rawdata = \Request::raw();
        $course_section = $this->hydrateWithJson(new Course_section(), $rawdata["course_section"]);
 

        
        $id = $course_section->__insert();
        return 	array(	'success' => true,
                        'course_section' => $course_section,
                        'detail' => '');

    }

    public function updateAction($id, $course_section_form = null){
        $rawdata = \Request::raw();
            
        $course_section = $this->hydrateWithJson(new Course_section($id), $rawdata["course_section"]);

                  
        
        $course_section->__update();
        return 	array(	'success' => true,
                        'course_section' => $course_section,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $course_section = Course_section::find($id);

        return 	array(	'success' => true,
                        'course_section' => $course_section,
                        'detail' => '');
          
}       


}
