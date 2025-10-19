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

        //$user->setStatus(0);
        //$code = password_hash(\DClass\lib\Util::randomcode(), PASSWORD_DEFAULT);
        $code = mt_rand(1000, 9999);
        //$code = 1234;
        $hashcode = md5($code);
        $user->setPassword(md5($user->getPassword()));
        $user->setActivationcode($hashcode);
        $user->setToken(20);

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

    public function contactusAction()
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

}
