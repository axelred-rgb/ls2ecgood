<?php


class UserFrontController extends UserController
{

    public function ll($next = 1, $per_page = 10)
    {

        $ll = new Lazyloading();
        $ll->lazyloading(new User());
        return $ll;

    }

    public function createAction($user_form = null)
    {
        $rawdata = \Request::raw();
        $user = $this->hydrateWithJson(new User(), $rawdata["user"]);
        if ($this->error) {
            return array(
                'success' => false,
                'user' => $user,
                'error' => $this->error
            );
        }

        $code = password_hash(\DClass\lib\Util::randomcode(), PASSWORD_DEFAULT);
        $user->setPassword(md5($user->getPassword()));
        $user->setActivationcode($code);

        $user->setApiKey(\DClass\lib\Util::randomcode());
        $id = $user->__insert();

        LoginController::initSession($user);

        $data = [
            "activationcode" => route('login').'?vld='.$code.'&u_id='.$user->getId(),
            "username" => $user->getFirstname(),
        ];

        Emailmodel::init("registration")
            ->addReceiver($user->getEmail(), $user->getUsername())
            ->sendMail($data);

        return array('success' => true,
            'user' => User::find($id),
            'detail' => '');

    }

    public function updateAction($id, $user_form = null)
    {
        $rawdata = \Request::raw();

        $user = $this->hydrateWithJson(new User($id), $rawdata["user"]);
        if ($this->error) {
            return array(
                'success' => false,
                'user' => $user,
                'error' => $this->error
            );
        }

        $user->__update();
        return array('success' => true,
            'user' => $user,
            'detail' => 'Vos informations ont bien été modifié');

    }

    public function postupdateAction(){
        extract($_POST);


        $user = userapp();
        $user->setFirstname($nom);
        $user->setLastname($prenom);
        $user->setEmail($email);
        if(isset($country)){
            $user->setCountry(Country::find($country));
        }
        if(isset($tel)){
            $user->setTelephone($tel);
        }

        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username))
        {
            return array(
                'success' => false,
                'user' => $user,
                'error' => tt("Le username ne doit pas contenir de caractères spéciaux")
            );
        }
        else{
            if ($username == trim($username) && strpos($username, ' ') !== false) {
                return array(
                    'success' => false,
                    'user' => $user,
                    'error' => tt("Le username ne doit pas contenir d'espaces")
                );
            }
            else{
                $user->__update();
                return 	array(	'success' => true,
                    'user' => $user,
        
                    'detail' => 'ok');
            }
            
        }
        
        
    }




    public function detailAction($id)
    {

        $user = User::find($id);

        return array('success' => true,
            'user' => $user,
            'detail' => '');

    }

    public function resendActivationCode($id)
    {
        extract($_POST);
        $user = User::find($id, false);
        $error = $user->setEmail($user_form["email"]);
        if ($error) {
            $this->error["email"] = $error;
            return [
                "success" => false,
                "error" => $this->error,
            ];
        }

        //$user->setStatus(0);
        $code = User::generateActivationCode();
        $user->setActivationcode($code);
        $user->__update();

        $data = [
            "activationcode" => route('login').'?vld='.$code.'&u_id='.$user->getId(),
            "username" => $user->getFirstname(),
        ];
        Emailmodel::init("registration")
            ->addReceiver($user->getEmail(), $user->getUsername())
            ->sendMail($data);

        return array('success' => true,
            'user' => $user,
            'redirect' => route('register-completed'),
            'detail' => t('le code d\'activation a bien été renvoyé.'));

    }

    public function createWebAction($user_form = null)
    {
        extract($_POST);

        $user = $this->form_fillingentity(new User(), $user_form);

        if ($this->error) {
            return array(
                'success' => false,
                'user' => $user,
                'action' => 'create',
                'error' => $this->error
            );

        }

        $username = $user->getUsername();
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username))
        {
            return array(
                'success' => false,
                'user' => $user,
                'error' => ['username'=>tt("Le username ne doit pas contenir de caractères spéciaux")]
            );
        }
        else{
            if ($username == trim($username) && strpos($username, ' ') !== false) {
                return array(
                    'success' => false,
                    'user' => $user,
                    'error' => ['username'=>tt("Le username ne doit pas contenir d'espaces")]
                );
            }
            else{
                if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
                    return array(
                        'success' => false,
                        'user' => $user,
                        'error' => ['email'=>tt("Format d'adresse mail incorrect")]
                    );
                }
                /*$find1 = strpos($user->getEmail(), '@');
                $find2 = strpos($user->getEmail(), '.');
                if($find1 == false || $find2 == false || $find2 < $find1){
                    return array(
                        'success' => false,
                        'user' => $user,
                        'error' => ['email'=>tt("Format d'adresse mail incorrect")]
                    );
                }*/
                else{
                    $code = mt_rand(1000, 9999);
                    //$code = 1234;
                    $hashcode = md5($code);
                    $md5 = md5($user->getPassword());
                    $sha256 = hash('sha256', $user->getPassword());
                    /*var_dump($md5);
                    var_dump($sha256);
                    $test = hash('sha256', $user->getPassword());
                    var_dump($sha256 == $test);
                    exit();*/
                    $user->setPassword($sha256);
                    $user->setActivationcode($hashcode);
                    $user->setToken(0);

                    $id = $user->__insert();



                    //Emailmodel::addReceiver($user->getEmail(), $user->getName());

                    //$emailmodel = Emailmodel::getbyattribut("name", "registration");
                    $data = [
                        "activation_link" => route('registerconfirm').'?vld='.$hashcode.'&u_id='.$user->getId(),
                        "username" => $user->getUsername(),
                        "activation_code" => $code,
                    ];
                    //$emailmodel->sendMail($data);
                    Reportingmodel::init("register")
                        ->addReceiver($user->getEmail(), $user->getUsername())
                        ->sendMail($data);


                    return array('success' => true,
                        'user' => $user,
                        'redirect' => route('confirm'),
                        'detail' => t('Compte utilisateur cree.'));
       
                }
            }
            
        }
        

    }

    public function downloadpartAction()
    {
        extract($_POST);

        $masque = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";

        if(preg_match($masque, $email))  {

            $url = 'https://ls2ec.com/web/assets/';

            if($id==2){
                $whitebooken = $url.'document/DigitalNetworkArchitecture(DNA).pdf';
                $whitebookfr = $url.'document/DigitalNetworkArchitecture(DNA)_Fr.pdf';
            }
            elseif($id==3){
                $whitebooken = $url.'document/NetworkAutomation.pdf';
                $whitebookfr = $url.'document/NetworkAutomation_Fr.pdf';
            }
            else{
                $whitebooken = $url.'document/SoftwareDefinedAccess(SD-Access).pdf';
                $whitebookfr = $url.'document/SoftwareDefinedAccess(SD-Access)_Fr.pdf';
            }

            $data = [
                "whitebooken" => $whitebooken,
                "whitebookfr" => $whitebookfr
            ];
            //$emailmodel->sendMail($data);
            Reportingmodel::init("whitebook")
                ->addReceiver($email, 'brice')
                ->sendMail($data);


            return array('success' => true,
                'redirect' => route('download'),
                'detail' => t('success.'));
        }
        else {
            return array('success' => false,
                'error' => ['error'=> t('mauvaise adresse mail')]);
        }




    }

    public static function contactusAction()
    {
        extract($_POST);

        $masque = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";

        if(preg_match($masque, $email))  {

            $email2= "cm.biyihamang@ls2ec.com";
            $data = [
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email,
                "phone" => $phone,
                "subject" => $subject,
                "message" => $message
            ];
            //$emailmodel->sendMail($data);
            Reportingmodel::init("contactform")
                ->addReceiver($email2, 'claude')
                ->sendMail($data);


            return array('success' => true,
                'redirect' => route('contactusok'),
                'detail' => t('success.'));
        }
        else {
            return array('success' => false,
                'error' => ['error'=> t('mauvaise adresse mail')]);
        }

    }

    public function newsletterAction()
    {
        extract($_POST);

        $masque = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";

        if(preg_match($masque, $email))  {

            $email2= "cm.biyihamang@ls2ec.com";
            $data = [
                "email" => $email
            ];
            //$emailmodel->sendMail($data);
            Reportingmodel::init("newsletterform")
                ->addReceiver($email2, 'claude')
                ->sendMail($data);


            return array('success' => true,
                'redirect' => route('home'),
                'detail' => t('votre demande a été envoyé.'));
        }
        else {
            return array('success' => false,
                'error' => ['error'=> t('mauvaise adresse mail')]);
        }

    }

    public function downloadentAction()
    {
        extract($_POST);

        $masque = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";

        if(preg_match($masque, $email))  {
            if (strpos($email, 'gmail') !== false){
                return array('success' => false,
                    'error' => ['error'=> t('Entrer une adresse mail professionnelle')]);
            }
            elseif (strpos($email, 'yahoo') !== false){
                return array('success' => false,
                    'error' => ['error'=> t('Entrer une adresse mail professionnelle')]);
            }
            elseif (strpos($email, 'outlook') !== false){
                return array('success' => false,
                    'error' => ['error'=> t('Entrer une adresse mail professionnelle')]);
            }
            elseif (strpos($email, 'icloud') !== false){
                return array('success' => false,
                    'error' => ['error'=> t('Entrer une adresse mail professionnelle')]);
            }

            $url = 'https://ls2ec.com/web/assets/';
            if($id==1){
                $whitebooken = $url.'document/CyberSecurity.pdf';
                $whitebookfr = $url.'document/CyberSecurity_Fr.pdf';
            }
            elseif($id==2){
                $whitebooken = $url.'document/DigitalNetworkArchitecture(DNA).pdf';
                $whitebookfr = $url.'document/DigitalNetworkArchitecture(DNA)_Fr.pdf';
            }
            elseif($id==3){
                $whitebooken = $url.'document/NetworkAutomation.pdf';
                $whitebookfr = $url.'document/NetworkAutomation_Fr.pdf';
            }
            elseif($id==4){
                $whitebooken = $url.'document/SecureAccessServiceEdge(SASE).pdf';
                $whitebookfr = $url.'document/SecureAccessServiceEdge(SASE)_Fr.pdf';
            }
            elseif($id==5){
                $whitebooken = $url.'document/SoftwareDefinedAccess(SD-Access).pdf';
                $whitebookfr = $url.'document/SoftwareDefinedAccess(SD-Access)_Fr.pdf';
            }
            else{
                $whitebooken = $url.'document/SoftwareDefinedWAN(SD-WAN).pdf';
                $whitebookfr = $url.'document/SoftwareDefinedWAN(SD-WAN)_Fr.pdf';
            }

            $data = [
                "whitebooken" => $whitebooken,
                "whitebookfr" => $whitebookfr
            ];
            //$emailmodel->sendMail($data);
            Reportingmodel::init("whitebook")
                ->addReceiver($email, $name)
                ->sendMail($data);


            return array('success' => true,
                'redirect' => route('download'),
                'detail' => t('success.'));
        }

        else {
            return array('success' => false,
                'error' => ['error'=> t('mauvaise adresse mail')]);
        }




    }

    public function updateWebAction($id, $user_form = null)
    {

        extract($_POST);
        $user = $this->form_fillingentity(new User($id), $user_form, true);

        if ($this->error) {
            return array(
                'success' => false,
                'user' => $user,
                'action' => 'create',
                'error' => $this->error
            );
        }

        $_SESSION[USERAPP] = serialize($user);

        $user->__update();
        return array('success' => true,
            'user' => $user,
            'detail' => t('modification enregistrer'));

    }

    public function updateToken()
    {

        if(!empty($_POST["quantite"]) && !empty($_POST["user"]))
        {
            $nombretoken = 0;
            if(isset($_POST["packtoken"])){
                $packtoken = Packtokken::find($_POST["packtoken"]);
                $nombretoken = $packtoken->getNombre()*(int)$_POST["quantite"];
            }
            else{
                $nombretoken = (int)$_POST["quantite"];
            }
            $user = User::find($_POST["user"]);
            $token = $user->getToken();
            $user->setToken($token + $nombretoken);
            $id = $user->__update();
            return [
                "success" => true,
                "detail" => "opération réussie",
                "redirect" => "purchasetoken",
            ];
        }
        else{
            return [
                "success" => false,
                "error" => ["error" => "les champs ne doivent pas etre vide"]
            ];
        }
    }

    public function enabledisableUser(){
        $user = User::find($_POST['id']);
        $user->setIsActivated($_POST['value']);
        $user->__update();
        return [
            "success" => true,
            "detail" => t("opération réussie"),
            "redirect" => "usersList",
        ];
    }

    public function updatephonenumber(){
        $code = RegistrationController::generatecode();
        $user = User::userapp();
        $user->setActivationcode(sha1($code));
        $user->__update();
        $country = Country::find($_POST['country']);
        $codecountry = $country->getPhonecode();
        $phone = $_POST['phonenumber'];

        $message = tt('Votre code de confirmation LS2EC TRAINING est ').$code;

        $response = $this->sendSms($phone, $codecountry, $message);


        if(isset($response->success)){
            if($response->success == false){
                return array(
                    "success" => false,
                    "detail" => t($response->detail),
                );
            }
            else{
                return array(
                    "success" => true,
                    "detail" => t('Code d activation envoye'),
                );
            }
        }
        else{
            return array(
                "success" => true,
                "detail" => t('Code d activation envoye'),
            );
        }

    }

    public function sendSms($phonenumber,$code, $message ){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://spacekolasms.com/api/sendsms?api_key=ls2ec2022',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('phonenumber' => $phonenumber,'message' =>  $message,'phone_code' => $code),
            CURLOPT_HTTPHEADER => array(
                'Cookie: PHPSESSID=ca28e983cb08370aa655da708cf39ccf'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);



        $response = json_decode($response);

        return $response;


    }

    public function updatephonenumber1(){
        $code = sha1(Request::post("code"));
        //var_dump($code);

        $user = User::find(User::userapp()->getId());

        if($user->getActivationcode() !==  $code )
            return ["success" => false, "detail" => t("Activation code incorrect")];

        if($user->getPassword() !== md5(Request::post("password")))
            return ["success" => false, "detail" => t("Mot de passe incorrect")];

        $user->setPhonenumber(Request::post("phonenumber"));

        $user->setCountry(Country::find(Request::post("country")));

        $user->__update();

        $_SESSION[USER] = serialize($user);

        return ["success" => true, "detail" => t("Numéro de téléphone mise a jour")];

    }

}
