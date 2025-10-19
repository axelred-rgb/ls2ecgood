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

    public function saveSignatureCertificate(){
        $folderPath = "web/assets/uploads/";

        $image_parts = explode(";base64,", $_POST['signature_image']);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . 'signature' . '.'.$image_type;

        file_put_contents($file, $image_base64);
        return   array(  'success' => true,
            'signature' => $file,
        );
    }
    

    public function detailAction($id)
    {

        $courses = Courses::find($id);

        return 	array(	'success' => true,
                        'courses' => $courses,
                        'detail' => '');
          
}       


}
