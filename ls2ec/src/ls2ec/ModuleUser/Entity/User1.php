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
     * @Column(name="ispassforgot", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $ispassforgot = 0;

    /**
     * @Column(name="token", type="integer"   , nullable=true)
     * @var integer
     **/
    protected $token = 0;


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

    /**
     * return the phonenumber with the country phone code.
     * @return string
     */
    public function getTelephone(){
        return $this->country->getPhonecode().$this->phonenumber;
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

    function setCountry( $country)
    {

        $this->country = $country;
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
            'username' => $this->username,
            'api_key' => $this->api_key,
            'token' => $this->token,
            'session_token' => $this->session_token,
        ];
    }

}
