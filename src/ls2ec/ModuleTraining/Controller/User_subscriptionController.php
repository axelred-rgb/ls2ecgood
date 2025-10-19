<?php 

            
use dclass\devups\Controller\Controller;

class User_subscriptionController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = User_subscriptionTable::init(new User_subscription())->buildindextable();

        self::$jsfiles[] = User_subscription::classpath('Resource/js/user_subscriptionCtrl.js');

        $this->entitytarget = 'User_subscription';
        $this->title = "Manage User_subscription";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => User_subscriptionTable::init(new User_subscription())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $user_subscription = new User_subscription();
        $action = User_subscription::classpath("services.php?path=user_subscription.create");
        if ($id) {
            $action = User_subscription::classpath("services.php?path=user_subscription.update&id=" . $id);
            $user_subscription = User_subscription::find($id);
        }

        return ['success' => true,
            'form' => User_subscriptionForm::init($user_subscription, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($user_subscription_form = null ){
        extract($_POST);

        $user_subscription = $this->form_fillingentity(new User_subscription(), $user_subscription_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'user_subscription' => $user_subscription,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $user_subscription->__insert();
        return 	array(	'success' => true,
                        'user_subscription' => $user_subscription,
                        'tablerow' => User_subscriptionTable::init()->router()->getSingleRowRest($user_subscription),
                        'detail' => '');

    }

    public function updateAction($id, $user_subscription_form = null){
        extract($_POST);
            
        $user_subscription = $this->form_fillingentity(new User_subscription($id), $user_subscription_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'user_subscription' => $user_subscription,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $user_subscription->__update();
        return 	array(	'success' => true,
                        'user_subscription' => $user_subscription,
                        'tablerow' => User_subscriptionTable::init()->router()->getSingleRowRest($user_subscription),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'User_subscription';
        $this->title = "Detail User_subscription";

        $user_subscription = User_subscription::find($id);

        $this->renderDetailView(
            User_subscriptionTable::init()
                ->builddetailtable()
                ->renderentitydata($user_subscription)
        );

    }
    
    public function deleteAction($id){
    
        User_subscription::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        User_subscription::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

    public function countsubscriptionenabled($id = null){
        if($id == null){
            $id = App::$user->getId();
        }
        $subs = User_subscription::where('this.user_id', $id)
            ->andwhere('isfinished','=',0)->__getAll();
        $u_course = [];
        $new_user_subscription = [];
        foreach ($subs as $u_subscription) {

            $a = "user_subscription.created_at";
            $date1 = $u_subscription->$a;
            $now = time();
            $your_date = strtotime($date1);
            $effectiveDate = date('Y-m-d', strtotime("+" . $u_subscription->getDuration() . " months", $your_date));

            $datediff =strtotime($effectiveDate) -  $now;
            $datediff = round($datediff / (60 * 60 * 24));

            if ($datediff <= 0) {
                $statut = 0;
                if($u_subscription->getDuration() < 12){
                    $new_sub = $u_subscription->getLastsubscriptionpaiement();
                    if(count($new_sub) > 0){
                        foreach ($new_sub as $n){
                            array_push($new_user_subscription , $n);
                        }
                    }
                    $u_subscription->setIsfinished(1);
                    $u_subscription->__update();

                }

            } else {
                $statut = $datediff;
            }
            $coursesubscription = $u_subscription->getSubscription()->getCourses();
            foreach ($coursesubscription as $course) {
                $i = 0;
                $course->statut = $statut;
                $good = false;
                foreach($u_course as $c){
                    if($c->getId() == $course->getId()){
                        if($c->statut < $statut){
                            $good = true;
                            $u_course[$i] = $course;
                        }
                        else{
                            $good = true;
                        }
                    }
                    $i++;
                }
                if(!$good){
                    array_push($u_course, $course);
                }
            }
        }

        if(count($new_user_subscription) > 0){
            foreach ($new_user_subscription as $u_subscription) {

                $a = "user_subscription.created_at";
                $date1 = $u_subscription->$a;
                $now = time();
                $your_date = strtotime($date1);
                $effectiveDate = date('Y-m-d', strtotime("+" . $u_subscription->getDuration() . " months", $your_date));
                $datediff =strtotime($effectiveDate) -  $now;
                $datediff = round($datediff / (60 * 60 * 24));

                if ($datediff <= 0) {
                    $statut = 0;
                    $u_subscription->setIsfinished(1);
                    $u_subscription->__update();

                } else {
                    $statut = $datediff;
                }
                $coursesubscription = $u_subscription->getSubscription()->getCourses();
                foreach ($coursesubscription as $course) {
                    $i = 0;
                    $course->statut = $statut;
                    $good = false;
                    foreach($u_course as $c){
                        if($c->getId() == $course->getId()){
                            if($c->statut < $statut){
                                $good = true;
                                $u_course[$i] = $course;
                            }
                            else{
                                $good = true;
                            }
                        }
                        $i++;
                    }
                    if(!$good){
                        array_push($u_course, $course);
                    }
                }
            }
        }
        return $u_course;
    }
    public function mycourse($id = null){

        $u_course = $this->countsubscriptionenabled($id);

        return array('success' => true,
            'courses' => $u_course);
    }

    public function myexercices($course_id){
        //$course = Courses::find($course_id);
        $exercises = Exercise::where('courses_id', '=', $course_id)->__getAll();
        return array('success' => true,
            'exercises' => $exercises);
    }

    public function allexercices(){
        $exercises = Exercise::All();
        return array('success' => true,
            'exercises' => $exercises);
    }

}
