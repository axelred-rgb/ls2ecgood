<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="labs")
     * */
    class Labs extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="token", type="integer"  )
         * @var integer
         **/
        protected $token; 
        
        /**
         * @ManyToOne(targetEntity="\Courses")
         * @var \Courses
         */
        public $courses;

        /**
         * manyToMany
         * @var \Labs_keys
         */
        public $labs_keys;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->courses = new Courses();
			$this->labs_keys = [];
}

        public function getId() {
            return $this->id;
        }
        public function getToken() {
            return $this->token;
        }

        public function setToken($token) {
            $this->token = $token;
        }
        
        /**
         *  manyToOne
         *	@return \Courses
         */
        function getCourses() {
            $this->courses = $this->courses->__show();
            return $this->courses;
        }
        function setCourses(\Courses $courses) {
            $this->courses = $courses;
        }
                        
        /**
         *  manyToMany
         *	@return \Labs_keys
         */
        function getLabs_keys() {
            return $this->labs_keys;
        }
        function setLabs_keys($labs_keys){
            $this->labs_keys = $labs_keys;
        }
        
        function addLabs_keys(\Labs_keys $labs_keys){
            $this->labs_keys[] = $labs_keys;
        }
        
        function collectLabs_keys(){
            $this->labs_keys = $this->__hasmany('labs_keys');
            return $this->labs_keys;
        }
        
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'token' => $this->token,
                    'courses' => $this->courses,
                    'labs_keys' => $this->labs_keys,
                ];
        }
        
}
