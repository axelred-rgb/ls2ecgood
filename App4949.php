<?php

use dclass\devups\Datatable\Lazyloading;
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
    public static $usersubscription;
    public static $myressources;
    public static $mycodepromo;

    public function __construct()
    {


        self::$user = User::find(userapp()->getId());
        //self::$user = User::find(userapp()->getId());

        self::$academies = Academies::all();
        self::$courses = Courses::all();
        self::$subscription = Subscription::all();

        if(self::$user->getId()){
            if(time() - $_SESSION['timestamp'] > 7200) {
                $_SESSION['timestamp'] = time();
                redirect('logout');
            } else {
                $_SESSION['timestamp'] = time(); //set new timestamp
                self::$user->setTimelastconnection($_SESSION['timestamp']);
                self::$user->__update();
            }
            self::$usersubscription = User_subscription::where('user_id',self::$user->getId())
                ->__getAll();
            $courses = $this->countsubscriptionenabled();
            $find = $this->checkisenabled($courses);
            if(!$find){
                self::$usersubscription = [];
            }
            self::$myressources = Paiement::where('user_id','=',self::$user->getId())->whereNotNull("product_id")->get();
            self::$mycodepromo = Codepromo::where('user_id','=',self::$user->getId())
                ->andwhere('type','=',1)->andwhere('state','=',0)->__getOne();

//            date_default_timezone_set(self::$user->getCountry()->getTimezone());
        }
        else{
            self::$usersubscription = [];
            self::$myressources  = [];
            self::$mycodepromo = new Codepromo();
            date_default_timezone_set('Europe/Monaco');
        }


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

        if (self::$user->getId() && self::$user->getIsActivated() == 0 && Request::get("path") != 'confirmregister' && Request::get("path") != 'resendcode' && Request::get("path") != 'logout') {
            redirect('confirmregister');
        }

        if(Request::get('path') !== 'register' && Request::get('path') !== 'login' && Request::get('path') !== 'forgotpassword' && 
        Request::get('path') !== 'confirmregister' && Request::get('path') !== 'resendcode' && !str_contains(Request::$uri, 'google') && 
        Request::get('path') !== 'activateaccount' &&  Request::get('path') !== 'forgotpassworduser' && Request::get('path') !== 'updatepassword' && 
        Request::get('path') !== 'updatepassword' && Request::get('path') !== 'logout'){
            $_SESSION['eventslasturl'] =Request::$uri;
        }
        require_once('curl.php');

        self::$lang = Dvups_lang::getbyattribut("iso_code", local());

        Request::Route($this, Request::get('path'));


    }

    public static function isGuest()
    {
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

    public function helloView()
    {
        Genesis::render("homenewlook", []);
    }

    public function homeView()
    {
        Genesis::render("homenewlook", []);
    }

    public function homenewView()
    {
        Genesis::render("homenew", []);
    }

    public function aboutView()
    {
        Genesis::render("about", []);
    }

    public function pricingView()
    {
        Genesis::render("pricing", []);
    }

    public function contactView()
    {
        Genesis::render("contact", []);
    }

    public function cartView()
    {
        $id = Request::get("id");

        if (!App::$user->getId())
            $_SESSION['IDSUBSCRIPTION'] = $id;

        $subscription = Subscription::find($id);
        Genesis::render("cart", ["subscription" => $subscription]);
    }

    public function carttestView()
    {
        $id = Request::get("id");

        if (!App::$user->getId())
            $_SESSION['IDSUBSCRIPTION'] = $id;

        $subscription = Subscription::find($id);
        Genesis::render("carttest", ["subscription" => $subscription]);
    }

    public function cartnewView()
    {
        $id = Request::get("id");

        if (!App::$user->getId())
            $_SESSION['IDSUBSCRIPTION'] = $id;

        $subscription = Subscription::find($id);
        Genesis::render("cartnew", ["subscription" => $subscription]);
    }

    public function confirmpurchaseView()
    {
        self::needsession();

        $_SESSION['IDSUBSCRIPTION'] = "";
        $id = Request::get("id");
        $product = Product::find($id);
        if (!App::$user->getId())
            Genesis::render("auth.login", []);

        $iduser = App::$user->getId();

        $montant = $product->priceofsale;
        $code = '';
        $reduction = 0;
        $codepromo = '';
        $month = '';
        $tva = 0;
        $ttc = 0;
        $price = 0;
        $today = date("Ymd");
        $rand = sprintf("%04d", rand(0, 9999));
        $unique = $today . $rand;




        $paiement = Paiement::create([
            "product_id" => $id,
            "numero" => $unique,
            "ttc" => $ttc,
            "price" => $price,
            "tva" => $tva,
            "user_id" => $iduser,
            "nbremonth" => $month,
            "motif" => $product->getName(),
            "reduction" => $reduction,
            "codepromo" => $codepromo,
            "montant" => $montant]);


        $data = [
            "url" => route('invoiceproduct') . '?id=' . $paiement,
            "username" => self::$user->getUsername()
        ];
        Reportingmodel::init("paiementproduiteffectue")
            ->addReceiver(self::$user->getEmail(), self::$user->getUsername())
            ->sendMail($data);

        $data = [
            "motif" => tt('Paiement du produit ') . $product->getName(),
            "montant" => $montant,
            "firstname" => User::find($iduser)->getFirstname() . " " . User::find($iduser)->getLastname(),
            "email" => User::find($iduser)->getEmail()
        ];
        User::sendmailtoAdmin($data, 'paiement');
        redirect('confirmpaiement');

    }

    public function confirmpurchaseproductView()
    {
        self::needsession();

        $panier = unserialize($_SESSION['CART']);
        $totalht = 0;
        $total = 0;
        $produiname = '';
        foreach ($panier as $pan) {
            if (!is_null($pan)){
                $ht = (int)$pan[1] * $pan[0]->priceofsale;
                $produiname .= $pan[0]->getName() . ',';
                $totalht += $ht;
                $tot = round((($pan[0]->priceofsale * 0.2) + $pan[0]->priceofsale), 1) * (int)$pan[1];
                $total += $tot;
            }
        }

        $_SESSION['IDSUBSCRIPTION'] = "";
        if (!App::$user->getId())
            Genesis::render("auth.login", []);

        $iduser = App::$user->getId();

        $montant = $totalht;
        $code = '';
        $reduction = 0;
        $codepromo = '';
        $month = '';
        $tva = $totalht*0.2;
        $ttc = $total;
        $price = 0;
        $today = date("Ymd");
        $rand = sprintf("%04d", rand(0, 9999));
        $unique = $today . $rand;

        $paiement = Paiement::create([
            "numero" => $unique,
            "ttc" => $ttc,
            "price" => $price,
            "tva" => $tva,
            "user_id" => $iduser,
            "nbremonth" => $month,
            "motif" => tt('Achat de produit').' '.$produiname,
            "reduction" => $reduction,
            "codepromo" => $codepromo,
            "montant" => $montant]);

        $paiement = Paiement::find($paiement);

        foreach ($panier as $pan){
            if(!is_null($pan)){
                $productpaiement = new Productpaiement();
                $productpaiement->setPaiement($paiement);
                $productpaiement->setProduct(Product::find($pan[0]->getId()));
                $productpaiement->__insert();
            }
        }

        unset($_SESSION['CART']);
        $data = [
            "url" => route('invoice') . '?id=' . $paiement->getId(),
            "username" => self::$user->getUsername()
        ];
        Reportingmodel::init("paiementeffectue")
            ->addReceiver(self::$user->getEmail(), self::$user->getUsername())
            ->sendMail($data);

        $data = [
            "motif" => tt('Paiement de produits').' '.$produiname,
            "montant" => $montant,
            "firstname" => User::find($iduser)->getFirstname() . " " . User::find($iduser)->getLastname(),
            "email" => User::find($iduser)->getEmail()
        ];
        User::sendmailtoAdmin($data, 'paiement');
        redirect('confirmpaiementproduct');

    }

    public function confirmpurchasesimpleproductView()
    {
        self::needsession();

        $_SESSION['IDSUBSCRIPTION'] = "";
        $id = Request::get("id");
        $product = Product::find($id);
        if (!App::$user->getId())
            Genesis::render("auth.login", []);

        $iduser = App::$user->getId();

        $montant = $product->priceofsale;
        $code = '';
        $reduction = 0;
        $codepromo = '';
        $month = '';
        $tva = 0;
        $ttc = 0;
        $price = 0;
        $today = date("Ymd");
        $rand = sprintf("%04d", rand(0, 9999));
        $unique = $today . $rand;

        $paiement = Paiement::create([
            "numero" => $unique,
            "ttc" => $ttc,
            "price" => $price,
            "tva" => $tva,
            "user_id" => $iduser,
            "nbremonth" => $month,
            "motif" => tt('Product ') . $product->getName(),
            "reduction" => $reduction,
            "codepromo" => $codepromo,
            "montant" => $montant]);
        $paiement = Paiement::find($paiement);
        $productpaiement = new Productpaiement();
        $productpaiement->setPaiement($paiement);
        $productpaiement->setProduct($product);
        $productpaiement->__insert();

        if(isset($_SESSION['CART']) && isset($_SESSION['TOTALCART'])){
            $totalpanier = $_SESSION['TOTALCART'];
            if(is_int($totalpanier)){
                if($totalpanier > 0){
                    $carts = unserialize($_SESSION['CART']);

                    foreach ($carts as $key=>$cart){

                        if(!is_null($cart)){
                            if($cart[2] == $product->getId()){
                                $carts[$key] = null;
                            }
                        }
                    }
                    $_SESSION['TOTALCART'] = $totalpanier--;
                    $_SESSION['CART'] = serialize($carts);

                }
            }
        }

        $data = [
            "url" => route('invoice') . '?id=' . $paiement->getId(),
            "username" => self::$user->getUsername()
        ];
        Reportingmodel::init("paiementeffectue")
            ->addReceiver(self::$user->getEmail(), self::$user->getUsername())
            ->sendMail($data);

        $data = [
            "motif" => tt('Paiement du produit ') . $product->getName(),
            "montant" => $montant,
            "firstname" => User::find($iduser)->getFirstname() . " " . User::find($iduser)->getLastname(),
            "email" => User::find($iduser)->getEmail()
        ];
        User::sendmailtoAdmin($data, 'paiement');
        redirect('confirmpaiementproduct');

    }


    public function confirmpaiementproductView()
    {
        Genesis::render("confirmorderproduct", ["subscription" => 'ok','product'=>true]);
    }


    public function confirmorderView()
    {
        self::needsession();

        $_SESSION['IDSUBSCRIPTION'] = "";
        $id = Request::get("id");
        $subscription = Subscription::find($id);
        if (!App::$user->getId())
            Genesis::render("auth.login", []);

        $iduser = App::$user->getId();

        if (User_subscription::where('user_id', $iduser)->count() == 0){
            $token = self::$user->getToken();
            self::$user->setToken((int)$token+20);
            self::$user->__update();
        }
        $paypalsubscription = null;
        if(Request::get('paypalsubscription') !== false){
            $paypalsubscription = Request::get('paypalsubscription');
        }

        var_dump($paypalsubscription);
        exit();

        $subscribe = User_subscription::create(["user_id" => $iduser, "subscription_id" => $id, "duration" => Request::get('month'),"paypalsubscriptionid"=>$paypalsubscription]);

        $month = 0;
        if (Request::get('month')) {
            $month = Request::get('month');
        }
        if ($subscription->getId() == 2) {
            $result = User_courses::create(["user_id" => $iduser, "courses_id" => 3, "duree" => $month]);
            $result1 = User_courses::create(["user_id" => $iduser, "courses_id" => 7, "duree" => $month]);
        } elseif ($subscription->getId() == 3) {
            $result = User_courses::create(["user_id" => $iduser, "courses_id" => 4, "duree" => $month]);
            $result1 = User_courses::create(["user_id" => $iduser, "courses_id" => 8, "duree" => $month]);
        } elseif ($subscription->getId() == 4) {
            $result = User_courses::create(["user_id" => $iduser, "courses_id" => 3, "duree" => $month]);
            $result1 = User_courses::create(["user_id" => $iduser, "courses_id" => 4, "duree" => $month]);
            $result2 = User_courses::create(["user_id" => $iduser, "courses_id" => 7, "duree" => $month]);
            $result3 = User_courses::create(["user_id" => $iduser, "courses_id" => 8, "duree" => $month]);
            $result4 = User_courses::create(["user_id" => $iduser, "courses_id" => 2, "duree" => $month]);
        }
        $montant = $subscription->getY_price('check');
        $code = '';
        $reduction = 0;
        $codepromo = '';
        $month = '';
        $tva = 0;
        $ttc = 0;
        $price = 0;

        if (Request::get('montant')) {
            $montant = Request::get('montant');

            if(Request::get('month')){
                $month = Request::get('month');
            }
            if (Request::get('tva')) {
                $tva = Request::get('tva');
            }
            if (Request::get('price')) {
                $price = Request::get('price');
            }
            if(Request::get('code')){
                $code = Codepromo::find(Request::get('code'));
                $reduction = $code->getValeur();
                $codepromo = $code->getCode();
                if($code->getType() == 1){
                    Sessioncodepromo::createSessionCodepromo($code,(10*$montant)/100);
                }
            }
            if(Request::get('ttc')){
                $ttc = Request::get('ttc');
            }
        }

        $sessionpaiement_id = array_reverse(Sessionpaiement::all())[0]->getId();

        $today = date("Ymd");
        $rand = sprintf("%04d", rand(0, 9999));
        $unique = $today . $rand;

        $unitprice = 0;
        if($month >= 12){
            $unitprice = $subscription->getY_price();
        }
        else{
            $unitprice = $subscription->getM_price();
        }

        $paiement = Paiement::create([
            "subscription_id" => $id,
            "numero" => $unique,
            "ttc" => $ttc,
            "price" => $price,
            "tva" => $tva,
            "user_id"=>$iduser,
            "nbremonth"=>$month,
            "unitprice" =>$unitprice,
            "motif"=>tt('Pack ').$subscription->getName(),
            "reduction"=>$reduction,
            "codepromo"=>$codepromo,
            "montant"=>$montant,
            "sessionpaiement_id"=>$sessionpaiement_id]);

        $data = [
            "url" => route('invoice') . '?id=' . $paiement,
            "username" => self::$user->getUsername()
        ];
        Reportingmodel::init("paiementeffectue")
            ->addReceiver(self::$user->getEmail(), self::$user->getUsername())
            ->sendMail($data);

        $data = [
            "motif" => tt('Souscription au Pack ') . $subscription->getName(),
            "montant" => $montant,
            "firstname" => User::find($iduser)->getFirstname() . " " . User::find($iduser)->getLastname(),
            "email" => User::find($iduser)->getEmail()
        ];
        User::sendmailtoAdmin($data, 'paiement');
        redirect('confirmpaiement');
    }

    public function  cinetpayconfirmorderView(){
        $this->confirmordernewView();
    }

    public function confirmordernewView()
    {
        self::needsession();

        $_SESSION['IDSUBSCRIPTION'] = "";
        $id = Request::get("id");
        $subscription = Subscription::find($id);
        if (!App::$user->getId())
            Genesis::render("auth.login", []);

        $iduser = App::$user->getId();

        $token = self::$user->getToken();
        self::$user->setToken((int)$token+(int)$subscription->getToken());
        self::$user->__update();

        $paypalsubscription = null;
        if(Request::get('paypalsubscription') !== false){
            $paypalsubscription = Request::get('paypalsubscription');
        }

        
        $subscribe = User_subscription::create(["user_id" => $iduser, "subscription_id" => $id, "duration" => Request::get('month'),"paypalsubscriptionid"=>$paypalsubscription]);


        $month = 0;
        if (Request::get('month')) {
            $month = Request::get('month');
        }
        if ($subscription->getId() == 2) {
            $result = User_courses::create(["user_id" => $iduser, "courses_id" => 3, "duree" => $month]);
            $result1 = User_courses::create(["user_id" => $iduser, "courses_id" => 7, "duree" => $month]);
        } elseif ($subscription->getId() == 3) {
            $result = User_courses::create(["user_id" => $iduser, "courses_id" => 4, "duree" => $month]);
            $result1 = User_courses::create(["user_id" => $iduser, "courses_id" => 8, "duree" => $month]);
        } elseif ($subscription->getId() == 4) {
            $result = User_courses::create(["user_id" => $iduser, "courses_id" => 3, "duree" => $month]);
            $result1 = User_courses::create(["user_id" => $iduser, "courses_id" => 4, "duree" => $month]);
            $result2 = User_courses::create(["user_id" => $iduser, "courses_id" => 7, "duree" => $month]);
            $result3 = User_courses::create(["user_id" => $iduser, "courses_id" => 8, "duree" => $month]);
            $result4 = User_courses::create(["user_id" => $iduser, "courses_id" => 2, "duree" => $month]);
        }
        $montant = $subscription->getY_price('check');
        $code = '';
        $reduction = 0;
        $codepromo = '';
        $month = '';
        $tva = 0;
        $ttc = 0;
        $price = 0;

        if (Request::get('montant')) {
            $montant = Request::get('montant');

            if(Request::get('month')){
                $month = Request::get('month');
            }
            if (Request::get('tva')) {
                $tva = Request::get('tva');
            }
            if (Request::get('price')) {
                $price = Request::get('price');
            }
            if(Request::get('code')){
                $code = Codepromo::find(Request::get('code'));
                $reduction = $code->getValeur();
                $codepromo = $code->getCode();
                if($code->getType() == 1){
                    Sessioncodepromo::createSessionCodepromo($code,(10*$montant)/100);
                }
            }
            if(Request::get('ttc')){
                $ttc = Request::get('ttc');
            }
        }

        $sessionpaiement_id = array_reverse(Sessionpaiement::all())[0]->getId();

        $today = date("Ymd");
        $rand = sprintf("%04d", rand(0, 9999));
        $unique = $today . $rand;

        $unitprice = 0;
        if($month > 12){
            $unitprice = $subscription->getY_price();
        }
        else{
            $unitprice = $subscription->getM_price();
        }
        $paiement = Paiement::create([
            "subscription_id" => $id,
            "numero" => $unique,
            "ttc" => $ttc,
            "price" => $price,
            "tva" => $tva,
            "user_id"=>$iduser,
            "nbremonth"=>$month,
            "unitprice" =>$unitprice,
            "motif"=>tt('Pack ').$subscription->getName(),
            "reduction"=>$reduction,
            "codepromo"=>$codepromo,
            "montant"=>$montant,
            "sessionpaiement_id"=>$sessionpaiement_id]);

        $data = [
            "url" => route('invoice') . '?id=' . $paiement,
            "username" => self::$user->getUsername()
        ];
        Reportingmodel::init("paiementeffectue")
            ->addReceiver(self::$user->getEmail(), self::$user->getUsername())
            ->sendMail($data);

        $data = [
            "motif" => tt('Souscription au Pack ') . $subscription->getName(),
            "montant" => $montant,
            "firstname" => User::find($iduser)->getFirstname() . " " . User::find($iduser)->getLastname(),
            "email" => User::find($iduser)->getEmail()
        ];
        User::sendmailtoAdmin($data, 'paiement');
        redirect('confirmpaiement');
    }

    public function confirmpaiementView()
    {
        Genesis::render("confirmorder", ["subscription" => 'ok']);
    }


    public function blogView()
    {
        $id = Request::get("id");
        $article = Article::find($id);
        Genesis::render("blog", ["article" => $article]);
    }

    public function bloglistView()
    {
        Genesis::render("bloglist", []);
    }

    public function enterpriseView()
    {
        Genesis::render("enterprise", []);
    }

    public function individualView()
    {
        Genesis::render("individual", []);
    }

    public function checkoutView()
    {

        $id = Request::get("id");

        $subscription = Subscription::find($id);
        Genesis::render("checkout", ["subscription" => $subscription]);
    }

    public function downloadbookView()
    {
        $lang = Request::get('lang');
        $id = Request::get("id");
        Genesis::render("downloadbook", ["id" => $id, "lang" => $lang]);
    }

    public function downloadbookentView()
    {
        $lang = Request::get('lang');
        $id = Request::get("id");
        Genesis::render("downloadbookent", ["id" => $id, "lang" => $lang]);
    }

    public function downloadView()
    {

        Genesis::render("download", []);
    }

    public function contactusokView()
    {

        Genesis::render("contactusok", []);
    }

    public function confirmregisterView()
    {

        Genesis::render("auth.confirmregister", []);
    }

    public function confirmView()
    {

        Genesis::render("auth.confirm", []);
    }

    public function registerconfirmView()
    {

        $id = Request::get("u_id");
        $code = Request::get("vld");

        $user = User::find($id);

        if ($user->getIsActivated() == 1)
            Genesis::render("auth.registred", []);

        else {

            if ($code == $user->getActivationcode()) {

                $user->setIsActivated(1);
                $user->__update();

                $_SESSION[USER] = serialize($user);
                $_SESSION[USERID] = $user->getId();

                Genesis::render("auth.registerconfirm", []);

            } else
                Genesis::render("auth.confirmregister", []);
        }


    }

    public function forgotpasswordView()
    {
        self::noneedsession();
        Genesis::render("auth.forgotpassword", []);
    }

    public function resetpasswordView()
    {
        self::noneedsession();
        $u_id = Request::get("u_id");
        $vld = Request::get("vld");

        Genesis::render("auth.resetpassword", ["u_id" => $u_id, "vld" => $vld]);
    }

    public function confirmresetpasswordView()
    {
        self::noneedsession();

        Genesis::render("auth.confirmresetpassword", []);
    }


    public function loginView()
    {
        Genesis::render("auth.login", []);
    }

    public function registerView()
    {
        Genesis::render("auth.register", []);
    }

    public function coursedetailView()
    {

        $id = Request::get("id");
        $iduser = App::$user->getId();
        $course = Courses::find($id);

        $sections = Course_section::where($course)->__getAll();
        $u_course = User_courses::where("this.user_id", $iduser)->andwhere('this.courses_id', $id)->__getOne();

        if (!App::$user->getId())
            $_SESSION['IDCOURSE'] = $id;

        Genesis::render("coursedetail", ["course" => $course, "sections" => $sections, "u_course" => $u_course]);
    }


    public  function checkisenabled($u_course){
        $find = false;
        if(is_array($u_course)){
            foreach($u_course as $c){
                if($c->statut != 0){
                    $find = true;
                }
                else{
                    $find = false;
                }
            }
        }
        return $find;
    }

    public function listsubsView(){
        $subs = User_subscription::where('this.user_id', self::$user->getId())->__getAll();
        $sub = $subs[count($subs)-1];
        $sub->getLastsubscriptionpaiement();
    }

    public function countsubscriptionenabledlast(){
        $subs = User_subscription::where('this.user_id', self::$user->getId())->__getAll();
        $u_course = [];
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
        return $u_course;
    }

    public function countsubscriptionenabled(){
        $subs = User_subscription::where('this.user_id', self::$user->getId())
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
    
    public function myboardView()
    {

        self::needsession();
        if(count(App::$usersubscription) > 0){
            if (isset($_SESSION['IDSUBSCRIPTION']) && $_SESSION['IDSUBSCRIPTION'] !== "") {
                $id = $_SESSION['IDSUBSCRIPTION'];
                $_SESSION['IDSUBSCRIPTION'] = "";
                redirect('cart?id=' . $id);
            }

            if (isset($_SESSION['affiliation']) && $_SESSION['affiliation'] == true) {
                redirect('affiliationprogram');
            }

            $subs = User_subscription::where('this.user_id', self::$user->getId())->__getAll();
            $u_course = [];
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
//        $iduser = App::$user->getId();
//
//        $u_course = User_courses::where('this.user_id',$iduser)->__getAll();


            Genesis::render("board.myboard", ["mycourses" => $u_course,'sub'=>$datediff]);
        }
        else{
            if(count(App::$myressources) > 0){
                redirect('myresources');
            }
            else{
                redirect('affiliationprogram');
            }
        }

    }

    public function managecoursesView()
    {
        Genesis::render("board.managecourses");
    }

    public function manageresourcesView()
    {
        Genesis::render("board.manageresources");
    }

    public function myresourcesView()
    {
        Genesis::render("board.myresources");
    }

    public function purchaseresourcesView()
    {
        $reference = 'productpurshase';
        Genesis::render("board.myresources", compact('reference'));
    }

    public function paymentsView()
    {
        Genesis::render("board.payments");
    }

    public function allpaymentView()
    {
        Genesis::render("board.allpayments");
    }

    public function invoiceView()
    {
        $id = Request::get("id");
        $usercourse = new User_coursesFrontController();
        $usercourse->generateInvoice($id);
    }

    public function invoiceproductView(){
        $id = Request::get("id");
        $paiement = new PaiementController();
        $paiement->generateProductInvoice($id);
    }


    public function alllabsView()
    {
        $labs = Labs::all();
        Genesis::render("board.labs", ["labs" => $labs]);
    }

    public function mylabsView()
    {
        self::needsession();
        $iduser = App::$user->getId();

        $u_labs = Labsreservation::where('user_id', $iduser)->andwhere("statut",'=',0)->__getAll();

        Genesis::render("board.mylabs", ["u_labs" => $u_labs]);
    }

    public function attestationView()
    {

        $id = Request::get("attestation");
        $usercourse = new User_coursesFrontController();
        $usercourse->generateAttestation($id);
    }

    public function showlabsView()
    {
        $id = Request::get("id");
        $u_labs = Labsreservation::find($id);
        $date = date("Y-m-d H:i:s");

        $startlab = 1;

//        if($u_labs->getDate() <= $date && $u_labs->getDatefin() >= $date){
//            //var_dump($date);
//            $startlab = 1;
//        }
//        elseif ($u_labs->getDate() > $date)
//            $startlab = 0;
//        else
//            $startlab = -1;
//
//        $u_labs->setStatut($startlab);
//        $u_labs->__update();

        Genesis::render("board.showlabs", [
            "u_labs" => $u_labs,
            "date" => $date,
            "startlab" => $startlab,
        ]);
    }

    public function purchasetokenView()
    {
        $packTokens = PackTokken::all();
        $id = App::$user->getId();
        $user_tokens = User_Token::where('user_id', $id)->__getAll();
        Genesis::render("board.purchasetoken", ["packTokens" => $packTokens, 'user_tokens' => $user_tokens]);
    }

    public function mysignatureView()
    {
        Genesis::render("board.manageAttestation.mysignature", []);
    }

    public function assignCertificateView()
    {
        Genesis::render("board.manageAttestation.assigncertificate", []);
    }

    public function myCertificatesView()
    {
        $iduser = App::$user->getId();
        $certificates = User_courses::where('this.user_id', $iduser)->andwhere('certificateavailable', 1)->__getAll();
        Genesis::render("board.manageAttestation.myCertificate", compact('certificates'));
    }

    public function givetokenView()
    {
        $users = User::where('is_activated', 1)->__getAll();
        $packTokens = PackTokken::all();
        Genesis::render('board.givetoken', compact('users', 'packTokens'));
    }

    public function codespromoView()
    {
        $codes = Codepromo::all();
        Genesis::render('board.codepromo', compact('codes'));
    }

    public function deletecodeView()
    {
        $id = Request::get('id');
        $code = Codepromo::where('this.id', $id)->delete();
        redirect('codespromo');
    }

    public function manageblogView()
    {
        Genesis::render("board.manageBlog.blog", []);
    }


    public function createPostView()
    {
        Genesis::render('board.manageBlog.createpost', []);
    }

    public function editblogView()
    {
        $id = Request::get("id");
        $post = Article::find($id);
        Genesis::render('board.manageBlog.updatepost', compact('post'));

    }

    public function myprofilView()
    {
        Genesis::render("board.updateaccount", []);
    }

    public function manageexerciseView()
    {
        $exercises = Exercise::all();
        Genesis::render("board.manageExercise.index", compact('exercises'));
    }


    public function createExerciseView()
    {
        Genesis::render('board.manageExercise.create', []);
    }

    public function detailexerciseView()
    {
        $id = Request::get('id');
        $exo = Exercise::find($id);
        Genesis::render('board.manageExercise.detailexercise', compact('exo'));

    }

    public function editexerciseView()
    {
        $id = Request::get('id');
        $exo = Exercise::find($id);
        Genesis::render('board.manageExercise.updateexercise', compact('exo'));
    }

    public function myExerciseView()
    {
        $iduser = App::$user->getId();

        $u_course = User_courses::where('this.user_id', $iduser)->__getAll();
        $a=false;
        if(count($u_course)==0){
        
            if (isset($_SESSION['IDSUBSCRIPTION']) && $_SESSION['IDSUBSCRIPTION'] !== "") {
                $id = $_SESSION['IDSUBSCRIPTION'];
                $_SESSION['IDSUBSCRIPTION'] = "";
                redirect('cart?id=' . $id);
            }

            if (isset($_SESSION['affiliation']) && $_SESSION['affiliation'] == true) {
                redirect('affiliationprogram');
            }

            $subs = User_subscription::where('this.user_id', self::$user->getId())->__getAll();
            $u_course = [];
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
//        $iduser = App::$user->getId();
//
//        $u_course = User_courses::where('this.user_id',$iduser)->__getAll();


            $a=true;
        }
        
        Genesis::render('board.manageExercise.myexercise', compact('u_course','a'));
    }

    public function courseexerciseView()
    {
        $id = Request::get('id');
        $course = Courses::find($id);
        $exercises = Exercise::where('courses_id', '=', $id)->__getAll();
        Genesis::render('board.manageExercise.exercisescourse', compact('exercises', 'course'));
    }


    public function downloadPdfView()
    {
        $id = Request::get("id");
        ArticleController::getPdfFr($id);
    }


    public function usersListView()
    {
        $users = User::all();
        Genesis::render('board.log.userlist', compact('users'));
    }

    public function paimentsListView()
    {
        /* $user_tokens = User_token::select('*')->groupBy('user_id')->__getAll();
         $results = [];
         $i = 0;
         foreach($user_tokens as $ut){
             $res  = new stdClass();
             $usertokens = User_token::where('user_id', $ut->getUser()->getId())->__getAll();
             $res->count = count($usertokens);
             $res->user = $ut->getUser();
             $res->user_token =  $usertokens;

             $results[$i] = $res;
             $i++;
         }*/

        $results = User_token::all();

        Genesis::render('board.log.paiementstokenlist', compact('results'));
    }

    public function reservationListView()
    {
        $results = Labsreservation::all();
        Genesis::render('board.log.labsreservationlist', compact('results'));
    }


    public function myboardmView()
    {
        self::needsession();

        $email = App::$user->getEmail();
        $firstname = App::$user->getFirstname();
        $lastname = App::$user->getLastname();
        $username = App::$user->getUsername();

        $username = preg_replace('/[^A-Za-z0-9\-]/', '', $username);

        $token = '0f3c3454bb32b1de336ca98c20704adc';
        $domainname = 'https://courses.ls2ec.com';
        $functionname = 'auth_userkey_request_login_url';

        $param = [
            'user' => [
                'firstname' => $firstname, // You will not need this parameter, if you are not creating/updating users
                'lastname' => $lastname, // You will not need this parameter, if you are not creating/updating users
                'username' => $username,
                'email' => $email,
            ]
        ];

        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';
        $curl = new curl; // The required library curl can be obtained from https://github.com/moodlehq/sample-ws-clients


        try {
            $resp = $curl->post($serverurl, $param);
            $resp = json_decode($resp);


            if ($resp && !empty($resp->loginurl)) {
                $loginurl = $resp->loginurl;

            }
        } catch (Exception $ex) {
            return false;
        }


        if (!isset($loginurl)) {
            return false;
        }


        $path = $loginurl . '&wantsurl=' . $domainname;


        redirect($path);
    }

    public function resendcodeView()
    {

        $user = App::$user;

        $code = mt_rand(1000, 9999);
        $hashcode = md5($code);

        $user->setActivationcode($hashcode);

        $id = $user->__update();

        // send mail
        $data = [
            "activation_link" => route('login') . '?vld=' . $hashcode . '&u_id=' . $user->getId(),
            "username" => $user->getUsername(),
            "activation_code" => $code,
        ];

        Reportingmodel::init("register")
            ->addReceiver($user->getEmail(), $user->getUsername())
            ->sendMail($data);

        //send sms
        Notification::on($user, "registered", ["username" => $user->getFirstname(), "code" => $code])
            ->send([$user])->sendSMS([$user->getTelephone()]);

        Genesis::render("auth.confirmregister", []);
    }


    //go to course

    public function gotocourseView()
    {


        $email = App::$user->getEmail();
        $firstname = App::$user->getFirstname();
        $lastname = App::$user->getLastname();
        $username = App::$user->getUsername();
        $courseid = Request::get("id");

        $username = preg_replace('/[^A-Za-z0-9\-]/', '', $username);

        $token = '0f3c3454bb32b1de336ca98c20704adc';
        $domainname = 'https://courses.ls2ec.com';
        $functionname = 'auth_userkey_request_login_url';

        $param = [
            'user' => [
                'firstname' => $firstname, // You will not need this parameter, if you are not creating/updating users
                'lastname' => $lastname, // You will not need this parameter, if you are not creating/updating users
                'username' => $username,
                'email' => $email,
            ]
        ];

        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';
        $curl = new curl; // The required library curl can be obtained from https://github.com/moodlehq/sample-ws-clients


        try {
            $resp = $curl->post($serverurl, $param);
            $resp = json_decode($resp);


            if ($resp && !empty($resp->loginurl)) {
                $loginurl = $resp->loginurl;

            }
        } catch (Exception $ex) {
            return false;
        }


        if (!isset($loginurl)) {
            return false;
        }


        $path = $loginurl . '&wantsurl=' . "$domainname/course/view.php?id=$courseid";


        redirect($path);

    }

    public function affiliationView()
    {
        Genesis::render('affiliation', []);
    }

    public function investorView()
    {
        Genesis::render("investor", []);
    }

    public function resourcesView()
    {
        $ll = new Lazyloading();
        $ll->lazyloading(new Product(), Product::where("status", 1));

        Genesis::render('shop', [
            "success" => true,
            "lazyloading" => $ll->jsonSerialize(),
        ]);

    }

    public function productView()
    {
        $product = Product::find(Request::get("id"));
        Genesis::render('shop-details', [
            "success" => true,
            "product" => $product,
        ]);

    }

    public function panierView(){
        $panier = [];
        if(isset($_SESSION['CART'])){
            $panier = unserialize($_SESSION['CART']);
        }
        else{
            $panier = [];
        }
        Genesis::render("panier",compact('panier'));
    }

    public function logoutView()
    {
        self::$user->setIsconnected(0);
        self::$user->__update();
        LoginController::logout();
        self::$pagetitle = t("connexion");
        redirect(route("home"));
    }


    public function affiliationprogramView()
    {
        $_SESSION['affiliation'] = true;
        self::needsession();
        unset($_SESSION['affiliation']);
        Genesis::render("board.affiliationprogram.account", []);

    }

    public function codeaffiliationListView()
    {
        self::needsession();
        Genesis::render("board.affiliationprogram.logs", []);
    }

    public function affiliationtovalidateView()
    {
        self::needsession();
        $codes = Codepromo::where('this.state', '=', -1)->__getAll();
        Genesis::render("board.affiliationprogram.affiliationtovalidate", compact('codes'));

    }

    public function affiliationtransactionView()
    {
        self::needsession();
        $codes = Request::get('code');
        $code = Codepromo::where('code', $codes)->__getOne();
        $paiements = Paiement::where('codepromo', '=', $code->getCode())->__getAll();
        Genesis::render("board.affiliationprogram.transaction", compact('paiements', 'code'));

    }

    public function updateinfosaffiliationView()
    {
        self::needsession();
        Genesis::render("board.affiliationprogram.updateinfo", []);
    }

    public function listsessionaffiliationView(){
        self::needsession();
        Genesis::render("board.affiliationprogram.listsession",[]);
    }

    public function codeaffiliationListbySessionView(){
        self::needsession();
        $sessionpaiement = Sessionpaiement::find(Request::get('session'));
        $codes = [];
        if($sessionpaiement){
            $codes = Sessioncodepromo::where('sessionpaiement_id', Request::get('session'))->__getAll();

        }
        Genesis::render("board.affiliationprogram.contentsession", compact('codes','sessionpaiement'));
    }

    public function affiliationtransactionbysessionView(){
        self::needsession();
        $codes = Request::get('code');
        $code = Codepromo::where('code',$codes)->__getOne();

        $session = Request::get('session');
        $session = Sessionpaiement::find($session);
        $paiements  = Paiement::where('codepromo','=',$code->getCode())
            ->andwhere('sessionpaiement_id',$session->getId())
            ->__getAll();
        $sessioncode = Sessioncodepromo::where('codepromo_id',$code->getId())
            ->andwhere('sessionpaiement_id',$session->getId())
            ->__getOne();
        Genesis::render("board.affiliationprogram.transaction",
            compact('paiements','code','session','sessioncode'));

    }

    public function entrepriselistView(){
        self::needsession();
        $users  = User::where('usertype',2)->__getAll();
        Genesis::render("board.affiliationprogram.entrepriselist",compact("users"));
    }

    public function paiementspacekolaView(){

        self::needsession();
        $sessionpaiement = Sessionpaiement::find(Request::get('session'));
        $sessioncode = Sessioncodepromo::where('sessionpaiement_id',$sessionpaiement->getId())
            ->andwhere('ispacekola',1)
            ->__getOne();
        $codes = [];
        $reference = 'spacekola';
        if($sessionpaiement){
            $codes = Sessioncodepromo::where('sessionpaiement_id', Request::get('session'))->__getAll();
        }
        Genesis::render("board.affiliationprogram.paiementspacekola", compact('sessioncode','codes','sessionpaiement','reference'));

    }

    public function sessionspacekolaView(){
        self::needsession();
        $sessionpaiement = Sessionpaiement::find(Request::get('session'));
        $sessioncode = Sessioncodepromo::where('ispacekola', 1)
                        ->__getAll();
        $reference = 'spacekola';
        Genesis::render("board.affiliationprogram.usersessions", compact('sessioncode','sessionpaiement','reference'));

    }

    public function mypaiementbysessionView(){
        self::needsession();
        $session  = Sessionpaiement::find(Request::get('session'));
        $codepromo = Codepromo::where('user_id',self::$user->getId())->__getOne();
        if(!$codepromo->getId()){
            $paiements = [];
        }
        else{
            $paiements = Paiement::where('codepromo', $codepromo->getCode())
                ->andwhere('sessionpaiement_id',Request::get('session'))
                ->__getAll();
        }
        Genesis::render("board.affiliationprogram.userpaiements", compact('paiements','session'));

    }

    public function mysessionsView(){
        self::needsession();
        $codepromo = Codepromo::where('user_id',self::$user->getId())->__getOne();
        if(!$codepromo->getId()){
            $sessioncode = [];
        }
        else{
            $sessioncode = Sessioncodepromo::where('codepromo_id', $codepromo->getId())
                ->__getAll();
        }

        Genesis::render("board.affiliationprogram.usersessions", compact('sessioncode'));

    }

    public function codeaffiliationparticulierListbySessionView(){
        self::needsession();
        $sessionpaiement = Sessionpaiement::find(Request::get('session'));
        $codes = [];
        $reference = 1;
        if($sessionpaiement){
            $codes = Sessioncodepromo::where('sessionpaiement_id', Request::get('session'))->__getAll();

        }
        Genesis::render("board.affiliationprogram.contentsession", compact('codes','sessionpaiement','reference'));
    }

    
    public function managelivrerecommandeView()
    {
        $livres = Product::where('this.type','=',1)->get();
        Genesis::render("board.manageLivrerecommande.index", compact('livres'));
    }


    public function createlivreView()
    {
        Genesis::render('board.manageLivrerecommande.create', []);
    }


    public function editLivrerecommandeView()
    {
        $id = Request::get('id');
        $livre = Product::find($id);
        Genesis::render('board.manageLivrerecommande.update', compact('livre'));
    }

    

    public function livresView()
    {
        Genesis::render('board.manageLivrerecommande.mylivre', []);
    }

    public function courselivresrecommandeView(){
        $id = Request::get('id');
        $course = Courses::find($id);
        $livres = Product::where('courses_id', '=', $id)->__getAll();
        Genesis::render('board.manageLivrerecommande.livrecourse', compact('livres', 'course'));
    }


}