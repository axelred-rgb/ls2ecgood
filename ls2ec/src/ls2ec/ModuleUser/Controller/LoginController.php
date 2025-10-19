<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author azankang
 */
class LoginController
{

    static function logout()
    {

        unset($_SESSION[USERID]);
        unset($_SESSION[USERAPP]);
        unset($_SESSION["setting"]);
        session_destroy();

        if (isset($_COOKIE[USERCOOKIE])) {
            setcookie(USERCOOKIE, null, -1, null, null, false, true);
            setcookie(USERMAIL, null, -1, null, null, false, true);
            setcookie(USERPASS, null, -1, null, null, false, true);
        }

        if (isset($_GET['extern']))
            return ["success" => true];

        header("location: " . route("login"));
    }

    private static function setcookie($email, $pass)
    {
        setcookie(USERCOOKIE, 1, time() + 365 * 24 * 3600, null, null, false, true); // On écrit un cookie
        setcookie(USERMAIL, $email, time() + 365 * 24 * 3600, null, null, false, true); // On écrit un cookie
        setcookie(USERPASS, $pass, time() + 365 * 24 * 3600, null, null, false, true); // On écrit un autre cookie...
    }

    public static function resetactivationcode()
    {

        $login = Request::post("login");
        $user = User::select()
            ->where('user.email', $login)
            ->orwhere('user.telephone', $login)
            ->__firstOrNull();

        if (!is_null($user)) {
            return LoginController::initialiseUserParam($user);
        } else {
            return array("success" => false,
                "detail" => t('No user found'));
        }
    }

    private static function initialiseUserParam(\User $user)
    {

        $activationcode = RegistrationController::generatecode();

        $user->setIs_activated(0);
        //$user->setLocked(true);
        $user->setResettingpassword(1);
        $user->setActivationcode($activationcode);
        $user->__update();

//        $_SESSION[USERID] = $user->getId();
//        $_SESSION[USERAPP] = serialize($user);
        //$_SESSION[LANG] = $user->getLocale();

        //updatesession($user);

//        RegistrationController::sendsms($activationcode, $user->getPhonenumber(), $user);
        //RegistrationController::sendmail($activationcode, $user);
        // todo: send mail or sms

        return array('success' => true, 'user' => $user, 'activationcode' => $activationcode, 'redirect' => route("reset-password"));

    }

    public static function resetpassword()
    {
        extract($_POST);
        $userapp = User::userapp();

        //$code = sha1($user_form['activationcode']);
        //if ($code == $userapp->getActivationcode()) {
        //if (substr($code, 0, 5) == $userapp->getActivationcode()) {

        //$userapp->setSalt(sha1($_POST['password']));
        $userapp->setPassword(md5(Request::post('newpassword')));
        //$userapp->setIs_activated(0);
        $userapp->setResettingpassword(0);
        $userapp->__update();

        $_SESSION[USERID] = $userapp->getId();
        $_SESSION[USERAPP] = serialize($userapp);
        //updatesession($userapp);

        return ["user" => $userapp, "detail" => t("Mot de passe enregistré!"), "success" => true, "redirect" => route("account")];
        //} else {
        //    return ["success" => false, "error" => "Unvalid activation code"];
        //}
    }

    public static function newresetpassword()
    {

        if(!empty($_POST["activationcode"]) && !empty($_POST["password"]) && !empty($_POST["confirmpassword"]) && !empty($_POST["user"]))
        {
            if($_POST["password"] == $_POST["confirmpassword"]) {
                $user = User::find($_POST["user"]);
                $hashcode =  $_POST["activationcode"];


                if($hashcode == $user->getActivationcode()) {

                    $user->setisActivated(1);
                    $user->setResettingpassword(0);
                    $user->setPassword(md5($_POST["password"]));
                    $id = $user->__update();
                    return [
                        "success" => true,
                        "detail" => "opération réussie",
                        "redirect" => "login",
                    ];
                }
                else
                    return [
                        "success" => false,
                        "error" => ["error" => "Code incorrect"],
                    ];

            }
            else
                return [
                        "success" => false,
                        "error" => ["error" => "les mot de passe ne sont pas identiques"],
                ];
        }
        else
            return [
                "success" => false,
                "error" => ["error" => "les champs ne doivent pas etre vide"]
            ];
    }

    public static function changepwAction()
    {

        global $user;

        extract($_POST);

        if (!$_POST['currentpassword'] || !$_POST['newpassword'] || !$_POST['confirmpassword'])
            return array('success' => false,
                'detail' => t("Tous les champs sont important"));

        if ($_POST['newpassword'] != $_POST['confirmpassword'])
            return array('success' => false,
                'detail' => t("password.notconfirm"));

        if (md5($_POST['currentpassword']) == $user->getPassword()) {
            $user->__update([
                "password" => md5($_POST['newpassword'])
            ])->exec();
            return array('success' => true,
                'detail' => t('Mot de passe mise à jour avec succès'));
        } else {
            return array('success' => false,
                'detail' => t("Mot de passe incorrect"));
        }
    }

    static function restartsessionAction()
    {

        if (!isset($_COOKIE[USERPASS]) || !isset($_COOKIE[USERPASS]))
            return 0;

        if (isset($_SESSION[USER]))
            return 0;

        //$dbal = new DBAL(new User());
        //$user = $dbal->findOneElementWhereXisY(['user.email', 'user.devupspwd'], [$_COOKIE[USERMAIL], $_COOKIE[USERPASS]]);
        $user = User::where("this.email", $_COOKIE[USERMAIL])->andwhere('user.password', $_COOKIE[USERPASS])->__getOne();
        if ($user->getId()) {
            $url = self::initSession($user);
            header("location: " . __env . "/" . $url);
        } else {
            header("location: " . route("login") . "");
        }
        die;
    }

    public static function initSession(\User $user, $remember_me = null)
    {
        $datetime = date("Y-m-d H:i:s");
        User::where("this.id", $user->getId())->update([
            "last_login" => $datetime,
            "session_token" => sha1($datetime),
        ]);

        $_SESSION[USERAPP] = serialize($user);
        $_SESSION[USERID] = $user->getId();

        if (isset($remember_me)) {
            //set cookie
            LoginController::setcookie($user->getEmail(), $user->getPassword());
        }

        $url = "account";
        if (!$user->isActivated())
            $url = "account";

        return $url;

    }

    static function phoneconnexionAction($extern = false)
    {
        extract($_POST);

        //$password = md5($user_form["password"]);

        $user = User::select()
            ->where('user.password', "=", md5($password))
            ->andwhere('user.telephone', "=", $login)
            ->andwhere('user.country_id', "=", $country)
            ->__firstOrNull();

        if (!$user) {
            return ["success" => false,
                "error" => ["login" => t('erreur de connexion. téléphone ou mot de passe incorrecte')],
                "detail" =>  t('erreur de connexion. téléphone ou mot de passe incorrecte')
            ];

        }
        //if ($user->getId()) {

        $url = self::initSession($user);
        return array(
            'success' => true,
            "user" => User::find($user->getId()),
            "redirect" => route("home"),
            "detail" =>  t('Connexion réussi')
            //"userserialize" => $_SESSION[USERAPP]
        );

    }

    static function connexionAction($extern = false)
    {
        extract($_POST);

        //$password = md5($user_form["password"]);



        $user = User::select()
            ->where('user.password', "=", md5($password))
            ->andwhere('user.email', "=", $login)
            ->__firstOrNull();



            if (!$user) {
                $user = User::select()
                    ->where('user.password', "=", md5($password))
                    ->andwhere('user.username', "=", $login)
                    ->__firstOrNull();

                if (!$user)
                    return ["success" => false,
                        "error" => ["login" => t('erreur de connexion. Login ou mot de passe incorrecte')],
                        "detail" =>  t('erreur de connexion. Login ou mot de passe incorrecte')
                    ];

            }


        //if ($user->getId()) {

        $url = self::initSession($user);
        return array(
            'success' => true,
            "user" => User::find($user->getId()),
            "redirect" => route("myboard"),
            "detail" =>  t('Connexion réussi')
            //"userserialize" => $_SESSION[USERAPP]
        );

    }

}
