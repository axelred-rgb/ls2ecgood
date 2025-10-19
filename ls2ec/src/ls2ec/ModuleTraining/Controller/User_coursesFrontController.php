<?php 


class User_coursesFrontController extends User_coursesController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new User_courses());
            return $ll;

    }

    public function createAction($user_courses_form = null ){
        $rawdata = \Request::raw();
        $user_courses = $this->hydrateWithJson(new User_courses(), $rawdata["user_courses"]);
 

        
        $id = $user_courses->__insert();
        return 	array(	'success' => true,
                        'user_courses' => $user_courses,
                        'detail' => '');

    }

    public function updateAction($id, $user_courses_form = null){
        $rawdata = \Request::raw();
            
        $user_courses = $this->hydrateWithJson(new User_courses($id), $rawdata["user_courses"]);

                  
        
        $user_courses->__update();
        return 	array(	'success' => true,
                        'user_courses' => $user_courses,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $user_courses = User_courses::find($id);

        return 	array(	'success' => true,
                        'user_courses' => $user_courses,
                        'detail' => '');
          
}       


}
