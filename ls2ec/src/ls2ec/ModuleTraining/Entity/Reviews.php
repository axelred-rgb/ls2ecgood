<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="reviews")
     * */
    class Reviews extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="note", type="integer"  )
         * @var integer
         **/
        protected $note;
        /**
         * @Column(name="comments", type="string" , length=255 )
         * @var string
         **/
        protected $comments; 
        
        /**
         * @ManyToOne(targetEntity="\Courses")
         * @var \Courses
         */
        public $courses;

        /**
         * @ManyToOne(targetEntity="\User")
         * @var \User
         */
        public $user;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->courses = new Courses();
	$this->user = new User();
}

        public function getId() {
            return $this->id;
        }
        public function getNote() {
            return $this->note;
        }

        public function setNote($note) {
            $this->note = $note;
        }
        
        public function getComments() {
            return $this->comments;
        }

        public function setComments($comments) {
            $this->comments = $comments;
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
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'note' => $this->note,
                    'comments' => $this->comments,
                    'courses' => $this->courses,
                    'user' => $this->user,
                ];
        }
        
}
