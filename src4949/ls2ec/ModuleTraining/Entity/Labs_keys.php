<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="labs_keys")
     * */
    class Labs_keys extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="login", type="string" , length=255 )
         * @var string
         **/
        protected $login;
        /**
         * @Column(name="password", type="string" , length=255 )
         * @var string
         **/
        protected $password; 
        

        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
}

        public function getId() {
            return $this->id;
        }
        public function getLogin() {
            return $this->login;
        }

        public function setLogin($login) {
            $this->login = $login;
        }
        
        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
        }
        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'login' => $this->login,
                    'password' => $this->password,
                ];
        }
        
}
