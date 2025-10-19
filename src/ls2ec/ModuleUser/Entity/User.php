<?php
// user \dclass\devups\model\Model;

/**
 * @Entity @Table(name="user")
 * */
class User extends UserCore implements JsonSerializable
{

    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     * */
    protected $id;

    /**
     * @Column(name="username", type="string" , length=55 )
     * @var string
     **/
    protected $username;

    /**
     * @Column(name="role", type="integer"   , nullable=true)
     * @var integer
     **/
    protected $role = 1;

    /**
     * @Column(name="token", type="integer"   , nullable=true)
     * @var integer
     **/
    protected $token = 0;

    /**
     * @Column(name="ispassforgot", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $ispassforgot = 0;


    /**
     * @Column(name="usertype", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $usertype = 1;

    /**
     * @Column(name="denomination", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $denomination;

    /**
     * @Column(name="emailpaypal", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $emailpaypal;

    /**
     * @Column(name="sigle", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $sigle;

    /**
     * @Column(name="siret", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $siret;

    /**
     * @Column(name="banque", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $banque;

    /**
     * @Column(name="iban", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $iban;

    /**
     * @Column(name="orangemoney", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $orangemoney;

    /**
     * @Column(name="mobilemoney", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $mobilemoney;

    /**
     * @Column(name="nomretrait", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $nomretrait;

    /**
     * @Column(name="prenomretrait", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $prenomretrait;

    /**
     * @Column(name="telretrait", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $telretrait;

    /**
     * @ManyToOne(targetEntity="\Country")
     * @var \Country
     */
    public $countryretrait;

    /**
     * @Column(name="entreprisestatut", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $entreprisestatut = 0;

    /**
     * @Column(name="isconnected", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $isconnected = 0;

    /**
     * @Column(name="timelastconnection", type="string"  , nullable=true)
     * @var string
     **/
    protected $timelastconnection;

    /**
     * @Column(name="passisupdate", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $passisupdate = 1;




    public function getIspassforgot()
    {
        return $this->ispassforgot;
    }


    public function setIspassforgot($ispassforgot)
    {
        $this->ispassforgot = $ispassforgot;
    }

    public function getRole()
    {
        return $this->role;
    }


    public function setRole($role)
    {
        $this->role = $role;
    }

    
    public function getToken()
    {
        return $this->token;
    }


    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        if (!$username)
            return null;
        $username = strtolower($username);

        $space = preg_match('/\s/',$username);
        if($space == 0)
        {
            $nb = User::where("username", $username);
            if ($nb->__countEl()) {
                if ($nb->__getOne()->getId() != $this->id)
                    return t("a user with this :attribute already exist", ["attribute" => "username"]);
            }
        }
        else
            return t("your username must be without space");



        $this->username = $username;
    }





    public function setConfirmpassword($confirmpassword)
    {
        if ($confirmpassword==$this->getPassword())
            return null;
        else
            return "les deux mots de passe ne sont pas identique";
    }

    /**
     * @ManyToOne(targetEntity="\Country")
     * @var \Country
     */
    public $country;



    public function __construct($id = null)
    {

        if ($id) {
            $this->id = $id;
        }
        $this->country = new Country();
        $this->countryretrait = new Country();

    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @param string $api_key
     */
    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    public function getLastLogin()
    {
        return $this->last_login;
    }

    public function getIsActivated()
    {
        return $this->is_activated;
    }

    public function setIsActivated($is_activated)
    {
        $this->is_activated = $is_activated;
    }

    public function setIs_activated($is_activated)
    {
        $this->is_activated = $is_activated;
    }

    /**
     * return the phonenumber with the country phone code.
     * @return string
     */
    public function getTelephone(){
        return $this->country->getPhonecode().$this->phonenumber;
    }

    public function getPhonenumber(){
        return $this->phonenumber;
    }

    public function setPhonenumber($phone){
        $this->phonenumber = $phone;
    }



    /**
     * @param date $last_login
     */
    public function setLastLogin($last_login)
    {
        $this->last_login = $last_login;
    }

    public function setConfirm($confirm){

        if($this->getPassword() != md5($confirm))
            return t("Mot de passe incorrect. veuillez reessayer svp!");

    }





    /**
     *  manyToOne
     * @return \Country
     */
    function getCountry()
    {
        $this->country = $this->country->__show();
        return $this->country;
    }

    function setCountry(\Country $country)
    {

        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getUsertype()
    {
        return $this->usertype;
    }

    /**
     * @param int $usertype
     */
    public function setUsertype($usertype)
    {
        $this->usertype = $usertype;
    }

    /**
     * @return string
     */
    public function getDenomination()
    {
        return $this->denomination;
    }

    /**
     * @param string $denomination
     */
    public function setDenomination($denomination)
    {
        $this->setEntreprisestatut(0);
        $this->denomination = $denomination;
    }

    /**
     * @return string
     */
    public function getSigle()
    {
        return $this->sigle;
    }

    /**
     * @param string $sigle
     */
    public function setSigle($sigle)
    {
        $this->setEntreprisestatut(0);

        $this->sigle = $sigle;
    }

    /**
     * @return string
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * @param string $siret
     */
    public function setSiret($siret)
    {
        $this->setEntreprisestatut(0);

        $this->siret = $siret;
    }

    /**
     * @return string
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * @param string $banque
     */
    public function setBanque($banque)
    {
        $this->setEntreprisestatut(0);

        $this->banque = $banque;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     */
    public function setIban($iban)
    {
        $this->setEntreprisestatut(0);

        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getOrangemoney()
    {
        return $this->orangemoney;
    }

    /**
     * @param string $orangemoney
     */
    public function setOrangemoney(string $orangemoney)
    {
        $this->orangemoney = $orangemoney;
    }

    /**
     * @return string
     */
    public function getMobilemoney()
    {
        return $this->mobilemoney;
    }

    /**
     * @param string $mobilemoney
     */
    public function setMobilemoney(string $mobilemoney)
    {
        $this->mobilemoney = $mobilemoney;
    }

    /**
     * @return string
     */
    public function getNomretrait()
    {
        return $this->nomretrait;
    }

    /**
     * @param string $nomretrait
     */
    public function setNomretrait(string $nomretrait)
    {
        $this->nomretrait = $nomretrait;
    }

    /**
     * @return string
     */
    public function getPrenomretrait()
    {
        return $this->prenomretrait;
    }

    /**
     * @param string $prenomretrait
     */
    public function setPrenomretrait(string $prenomretrait)
    {
        $this->prenomretrait = $prenomretrait;
    }

    /**
     * @return string
     */
    public function getTelretrait()
    {
        return $this->telretrait;
    }

    /**
     * @param string $telretrait
     */
    public function setTelretrait(string $telretrait): void
    {
        $this->telretrait = $telretrait;
    }

    /**
     * @return Country
     */
    public function getCountryretrait()
    {
        $this->countryretrait = $this->countryretrait->__show();

        return $this->countryretrait;
    }

    /**
     * @param Country $countryretrait
     */

    public function setCountryretraitid($id){
        if(!is_null($id) && $id !== '' && $id!=0){
            $this->countryretrait = Country::find($id);
        }
    }
    public function setCountryretrait(Country $countryretrait)
    {
        $this->countryretrait = $countryretrait;
    }

    /**
     * @return string
     */
    public function getEmailpaypal()
    {
        return $this->emailpaypal;
    }

    /**
     * @param string $emailpaypal
     */
    public function setEmailpaypal($emailpaypal)
    {
        $this->emailpaypal = $emailpaypal;
    }

    public function setEmailnew($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getEntreprisestatut()
    {
        return $this->entreprisestatut;
    }

    /**
     * @param int $entreprisestatut
     */
    public function setEntreprisestatut($entreprisestatut)
    {
        $this->entreprisestatut = $entreprisestatut;
    }

    public function getUsertypeName(){
        if($this->usertype == 2)
            return tt('Entreprise');
        else
            return tt('Personnel');
    }

    /**
     * @return int
     */
    public function getIsconnected()
    {
        return $this->isconnected;
    }

    /**
     * @param int $isconnected
     */
    public function setIsconnected($isconnected)
    {
        $this->isconnected = $isconnected;
    }

    /**
     * @return string
     */
    public function getTimelastconnection()
    {
        return $this->timelastconnection;
    }

    /**
     * @param string $timelastconnection
     */
    public function setTimelastconnection($timelastconnection)
    {
        $this->timelastconnection = $timelastconnection;
    }

    public static function maximaltimeactivity(){
        return 7200;
    }


    /**
     * @return int
     */
    public function getPassisupdate()
    {
        return $this->passisupdate;
    }

    /**
     * @param int $passisupdate
     */
    public function setPassisupdate($passisupdate)
    {
        $this->passisupdate = $passisupdate;
    }



    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'country' => $this->country,
            'phonenumber' => $this->phonenumber,
            'password' => $this->password,
            'is_activated' => $this->is_activated,
            'ispassforgot' => $this->ispassforgot,
            'activationcode' => $this->activationcode,
            'lang' => $this->lang,
            'role' => $this->role,
            'token' => $this->token,
            'username' => $this->username,
            'api_key' => $this->api_key,
            'session_token' => $this->session_token,
            'isconnected' => $this->isconnected,
            'timelastconnection' => $this->timelastconnection
        ];
    }

    public static function sendmailtoAdmin($data,$typemail){
        $email2= "cm.biyihamang@ls2ec.com";

        //$emailmodel->sendMail($data);
        Reportingmodel::init($typemail)
            ->addReceiver($email2, 'claude')
            ->sendMail($data);
    }

    static function getVisIpAddr() {

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }



    static function time_zonelist(){
        $return = array();
        $timezone_identifiers_list = timezone_identifiers_list();

        foreach($timezone_identifiers_list as $key=>$timezone_identifier){
            $fuseau = new stdClass();
            $date_time_zone = new DateTimeZone($timezone_identifier);
            $date_time = new DateTime('now', $date_time_zone);
            $hours = floor($date_time_zone->getOffset($date_time) / 3600);
            $mins = floor(($date_time_zone->getOffset($date_time) - ($hours*3600)) / 60);
            $h = $hours < 0 ? $hours : '+'.$hours;
            $hours = 'GMT' . ($hours < 0 ? $hours : '+'.$hours);
            $mins = ($mins > 0 ? $mins : '0'.$mins);
            $fuseau->value = $h.':'.$mins;
            $text = str_replace("_"," ",$timezone_identifier);
            $fuseau->name = $text.' ('.$hours.':'.$mins.')';
            $return[$key] = $fuseau;
        }
        return $return;
    }


}
