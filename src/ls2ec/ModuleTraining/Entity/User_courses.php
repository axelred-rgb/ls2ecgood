<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="user_courses")
     * */
    class User_courses extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="creationdate", type="datetime"  , nullable=true)
         * @var datetime
         **/
        protected $creationdate; 
        
        /**
         * @ManyToOne(targetEntity="\User")
         * @var \User
         */
        public $user;

        /**
         * @Column(name="isterminated", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $isterminated =0;

        /**
         * @ManyToOne(targetEntity="\Courses")
         * @var \Courses
         */
        public $courses;

        /**
        * @Column(name="certificateavailable", type="integer"  , nullable=false)
        * @var integer
         **/
        protected $certificateavailable =0;

         /**
         * @Column(name="certificatedate", type="date"  , nullable=true)
         * @var integer
         **/
        protected $certificatedate;



        public function getIsterminated() {
            return $this->isterminated;
        }

        public function setIsterminated($isterminated) {
            $this->isterminated = $isterminated;
        }


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->user = new User();
	$this->courses = new Courses();
}

        public function getId() {
            return $this->id;
        }
        public function getCreationdate() {
            return $this->created_at;
        }

        public function setCreationdate($creationdate) {
            $this->creationdate = $creationdate;
        }
        
        /**
         *  manyToOne
         *	@return \User
         */
        function getUser() {
            $this->user = $this->user->__show();
            return $this->user;
        }
        function setUser(\User $user) {
            $this->user = $user;
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

        public function getCertificateAvailable() {
            return $this->certificateavailable ;
        }

        public function setCertificateAvailable($certificateavailable ) {
            $this->certificateavailable  = $certificateavailable ;
        }

        public function getCertificateDate() {
            return $this->certificatedate ;
        }

        public function setCertificateDate($certificatedate ) {
            $this->certificatedate  = $certificatedate ;
        }
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'creationdate' => $this->creationdate,
                    'certificateavailable ' => $this->certificateavailable,
                    'certificatedate' => $this->certificatedate,
                    'user' => $this->user,
                    'courses' => $this->courses,
                    'isterminated' => $this->isterminated,
                ];
        }
        
}
