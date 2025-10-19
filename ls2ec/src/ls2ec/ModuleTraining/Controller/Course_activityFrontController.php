<?php 


class Course_activityFrontController extends Course_activityController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Course_activity());
            return $ll;

    }

    public function createAction($course_activity_form = null ){
        $rawdata = \Request::raw();
        $course_activity = $this->hydrateWithJson(new Course_activity(), $rawdata["course_activity"]);
 

        
        $id = $course_activity->__insert();
        return 	array(	'success' => true,
                        'course_activity' => $course_activity,
                        'detail' => '');

    }

    public function updateAction($id, $course_activity_form = null){
        $rawdata = \Request::raw();
            
        $course_activity = $this->hydrateWithJson(new Course_activity($id), $rawdata["course_activity"]);

                  
        
        $course_activity->__update();
        return 	array(	'success' => true,
                        'course_activity' => $course_activity,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $course_activity = Course_activity::find($id);

        return 	array(	'success' => true,
                        'course_activity' => $course_activity,
                        'detail' => '');
          
}       


}
