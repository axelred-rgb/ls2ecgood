<?php

use Genesis as g;

/**
 * this class refer to the front pages. each method represent a page. where we can add js css and some other parameter
 * such as meta titel, title and so on
 *
 * Class App
 */
class App extends \dclass\devups\Controller\FrontController
{

    protected $layout = "layout.app";
    public static $user;
    public static $lang;
    public static $academies;
    public static $courses;
    public static $subscription;

    public function __construct()
    {
		

        self::$user = User::find(userapp()->getId());
        //self::$user = User::find(userapp()->getId());

        self::$academies = Academies::all();
        self::$courses = Courses::all();
        self::$subscription = Subscription::all();


        self::$jsfiles[] = CLASSJS . "devups.js";
        self::$jsfiles[] = CLASSJS . "model.js";
        self::$jsfiles[] = CLASSJS . "ddatatable.js";
        self::$jsfiles[] = CLASSJS . "dform.js";
        self::$cssfiles[] = assets . "css/dv_style.css";
        self::$cssfiles[] = assets . "css/stylesheet.css";
        self::$jsfiles[] = CLASSJS . "Request.js";
        self::$jsfiles[] = __front . "js/app.js";
        //self::$cssfiles[] = assets . "css/style.css";
        //self::$cssfiles[] = assets . "css/skin_color.css";
        //self::$cssfiles[] = assets . "css/vendors_css.css";

        (new Request('hello'));

        if(self::$user->getId()  && self::$user->getIsActivated()==0 && Request::get("path")!='confirmregister' && Request::get("path")!='resendcode' && Request::get("path")!='logout') {
            redirect('confirmregister');
        }

        require_once('curl.php');

        self::$lang = Dvups_lang::getbyattribut("iso_code", local());

        Request::Route($this, Request::get('path'));


    }

    public static function isGuest(){
        return is_null(self::$user->getId());
    }

    public static function needsession($message = "")
    {
        if (!self::$user->getId()) {
            redirect(route("login?message=" . $message));
            die;
        }

        return true;

    }

    public static function noneedsession()
    {
        if (self::$user->getId()) {
            redirect(route("home"));
            die;
        }

    }

    public function helloView(){
        Genesis::render("home", []);
    }

    public function homeView(){
        Genesis::render("home", []);
    }

    public function aboutView(){
        Genesis::render("about", []);
    }

    public function pricingView(){
        Genesis::render("pricing", []);
    }

    public function contactView(){
        Genesis::render("contact", []);
    }

    public function cartView(){
        $id = Request::get("id");

        if(!App::$user->getId())
            $_SESSION['IDSUBSCRIPTION'] = $id;

        $subscription = Subscription::find($id);
        Genesis::render("cart", ["subscription"=> $subscription]);
    }

    public function confirmorderView(){
        self::needsession();

        $id = Request::get("id");
        $subscription = Subscription::find($id);

        if(!App::$user->getId())
            Genesis::render("auth.login", []);

        $iduser = App::$user->getId();


        $u_subscription = User_subscription::where("this.user_id", $iduser)->andwhere('this.subscription_id',$id)->__getOne();

        if(!$u_subscription->getId()){

            $subscribe = User_subscription::create(["user_id"=>$iduser, "subscription_id"=>$id]);

            if($subscription->getId()==2){
                $result = User_courses::create(["user_id"=>$iduser, "courses_id"=>3]);
                $result1 = User_courses::create(["user_id"=>$iduser, "courses_id"=>7]);
            }
            elseif ($subscription->getId()==3){
                $result = User_courses::create(["user_id"=>$iduser, "courses_id"=>4]);
                $result1 = User_courses::create(["user_id"=>$iduser, "courses_id"=>8]);
            }
            elseif ($subscription->getId()==4){
                $result = User_courses::create(["user_id"=>$iduser, "courses_id"=>3]);
                $result1 = User_courses::create(["user_id"=>$iduser, "courses_id"=>4]);
                $result2 = User_courses::create(["user_id"=>$iduser, "courses_id"=>7]);
                $result3 = User_courses::create(["user_id"=>$iduser, "courses_id"=>8]);
                $result4 = User_courses::create(["user_id"=>$iduser, "courses_id"=>2]);
            }
        }
        else{
            Genesis::render("confirmorder", ["subscription"=> 'nok']);
        }

        Genesis::render("confirmorder", ["subscription"=> 'ok']);
    }

    public function blogView(){
        $id = Request::get("id");
        $article=Article::find($id);
        Genesis::render("blog", ["article"=> $article]);
    }

    public function bloglistView(){
        Genesis::render("bloglist", []);
    }

    public function enterpriseView(){
        Genesis::render("enterprise", []);
    }

    public function individualView(){
        Genesis::render("individual", []);
    }

    public function checkoutView(){

        $id = Request::get("id");

        $subscription = Subscription::find($id);
        Genesis::render("checkout", ["subscription"=> $subscription]);
    }

    public function downloadbookView(){
        $lang = Request::get('lang');
        $id = Request::get("id");
        Genesis::render("downloadbook", ["id"=> $id,"lang"=> $lang]);
    }

    public function downloadbookentView(){
        $lang = Request::get('lang');
        $id = Request::get("id");
        Genesis::render("downloadbookent", ["id"=> $id,"lang"=> $lang]);
    }

    public function downloadView(){

        Genesis::render("download", []);
    }

    public function contactusokView(){

        Genesis::render("contactusok", []);
    }

    public function confirmregisterView(){

        Genesis::render("auth.confirmregister", []);
    }

    public function confirmView(){

        Genesis::render("auth.confirm", []);
    }

    public function registerconfirmView(){

        $id = Request::get("u_id");
        $code = Request::get("vld");

        $user = User::find($id);

        if ($user->getIsActivated()==1)
            Genesis::render("auth.registred", []);

        else {

            if ($code == $user->getActivationcode()) {

                $user->setIsActivated(1);
                $user->__update();

                $_SESSION[USER] = serialize($user);
                $_SESSION[USERID] = $user->getId();

                Genesis::render("auth.registerconfirm", []);

            }
            else
                Genesis::render("auth.confirmregister", []);
        }


    }

    public function forgotpasswordView(){
        self::noneedsession();
        Genesis::render("auth.forgotpassword", []);
    }

    public function resetpasswordView(){
        self::noneedsession();
        $u_id = Request::get("u_id");
        $vld = Request::get("vld");

        Genesis::render("auth.resetpassword", ["u_id"=> $u_id,"vld"=> $vld]);
    }

    public function confirmresetpasswordView(){
        self::noneedsession();

        Genesis::render("auth.confirmresetpassword", []);
    }



    public function loginView(){
        Genesis::render("auth.login", []);
    }

    public function registerView(){
        Genesis::render("auth.register", []);
    }

    public function coursedetailView(){

        $id = Request::get("id");
        $iduser = App::$user->getId();
        $course = Courses::find($id);

        $sections = Course_section::where($course)->__getAll();
        $u_course = User_courses::where("this.user_id", $iduser)->andwhere('this.courses_id',$id)->__getOne();

        if(!App::$user->getId())
            $_SESSION['IDCOURSE'] = $id;

        Genesis::render("coursedetail", ["course"=> $course, "sections"=> $sections, "u_course"=> $u_course]);
    }

    public function myboardView(){
        self::needsession();

        $iduser = App::$user->getId();

        $u_course = User_courses::where('this.user_id',$iduser)->__getAll();


        if(isset($_SESSION['IDSUBSCRIPTION'])) {
            $id = $_SESSION['IDSUBSCRIPTION'];
            $_SESSION['IDSUBSCRIPTION'] = "";
            redirect('cart?id='.$id);
        }

        Genesis::render("board.myboard", ["mycourses"=> $u_course]);
    }

    public function managecoursesView(){
        Genesis::render("board.managecourses");
    }

    public function paymentsView(){
        Genesis::render("board.payments");
    }

    public function alllabsView(){
        $labs = Labs::all();
        Genesis::render("board.labs",["labs"=> $labs]);
    }

    public function mylabsView(){
        $iduser = App::$user->getId();

        $u_labs = Labsreservation::where('user_id',$iduser)->__getAll();
        Genesis::render("board.mylabs",["u_labs"=> $u_labs]);
    }

    public function showlabsView(){
        $id = Request::get("id");
        $u_labs = Labsreservation::find($id);
        Genesis::render("board.showlabs",["u_labs"=> $u_labs]);
    }

    public function purchasetokenView(){
        $packTokens = PackTokken::all();
        $id = App::$user->getId();
        $user_tokens = User_Token::where('user_id', $id)->__getAll();
        Genesis::render("board.purchasetoken",[ "packTokens"=>$packTokens, 'user_tokens'=>$user_tokens]);
    }


    public function myboardmView(){
        self::needsession();

        $email = App::$user->getEmail();
        $firstname = App::$user->getFirstname();
        $lastname = App::$user->getLastname();
        $username = App::$user->getUsername();

        $token        = '0f3c3454bb32b1de336ca98c20704adc';
        $domainname   = 'https://courses.ls2ec.com';
        $functionname = 'auth_userkey_request_login_url';

        $param = [
            'user' => [
                'firstname' => $firstname, // You will not need this parameter, if you are not creating/updating users
                'lastname'  => $lastname, // You will not need this parameter, if you are not creating/updating users
                'username'  => $username,
                'email'     => $email,
            ]
        ];

        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';
        $curl = new curl; // The required library curl can be obtained from https://github.com/moodlehq/sample-ws-clients


        try {
            $resp     = $curl->post($serverurl, $param);
            $resp     = json_decode($resp);


            if ($resp && !empty($resp->loginurl)) {
                $loginurl = $resp->loginurl;

            }
        } catch (Exception $ex) {
            return false;
        }


        if (!isset($loginurl)) {
            return false;
        }


        $path = $loginurl .'&wantsurl=' .$domainname;



        redirect($path);
    }

    public function resendcodeView(){

        $user = App::$user;

        $code = mt_rand(1000, 9999);
        $hashcode = md5($code);

        $user->setActivationcode($hashcode);

        $id = $user->__update();

        // send mail
        $data = [
            "activation_link" => route('login').'?vld='.$hashcode.'&u_id='.$user->getId(),
            "username" => $user->getUsername(),
            "activation_code" => $code,
        ];

        Reportingmodel::init("register")
            ->addReceiver($user->getEmail(), $user->getUsername())
            ->sendMail($data);

        //send sms
        Notification::on($user, "registered", ["username"=>$user->getFirstname(), "code"=>$code])
            ->send([$user])->sendSMS([$user->getTelephone()]);

        Genesis::render("auth.confirmregister", []);
    }


    //go to course

    public function gotocourseView(){


        $email = App::$user->getEmail();
        $firstname = App::$user->getFirstname();
        $lastname = App::$user->getLastname();
        $username = App::$user->getUsername();
        $courseid = Request::get("id");

        $token        = '0f3c3454bb32b1de336ca98c20704adc';
        $domainname   = 'https://courses.ls2ec.com';
        $functionname = 'auth_userkey_request_login_url';

        $param = [
            'user' => [
                'firstname' => $firstname, // You will not need this parameter, if you are not creating/updating users
                'lastname'  => $lastname, // You will not need this parameter, if you are not creating/updating users
                'username'  => $username,
                'email'     => $email,
            ]
        ];

        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';
        $curl = new curl; // The required library curl can be obtained from https://github.com/moodlehq/sample-ws-clients


        try {
            $resp     = $curl->post($serverurl, $param);
            $resp     = json_decode($resp);


            if ($resp && !empty($resp->loginurl)) {
                $loginurl = $resp->loginurl;

            }
        } catch (Exception $ex) {
            return false;
        }


        if (!isset($loginurl)) {
            return false;
        }


        $path = $loginurl .'&wantsurl=' ."$domainname/course/view.php?id=$courseid";



        redirect($path);

    }

    public function investorView()
    {
        Genesis::render("investor", []);
    }


    public function logoutView()
    {
        LoginController::logout();
        self::$pagetitle = t("connexion");
        redirect( route("home"));
    }




}