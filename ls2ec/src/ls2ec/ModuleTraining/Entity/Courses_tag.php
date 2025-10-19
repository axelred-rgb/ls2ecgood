<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="courses_tag")
     * */
    class Courses_tag extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id; 
        
        /**
         * @ManyToOne(targetEntity="\Courses")
         * @var \Courses
         */
        public $courses;

        /**
         * @ManyToOne(targetEntity="\Tags")
         * @var \Tags
         */
        public $tags;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->courses = new Courses();
	$this->tags = new Tags();
}

        public function getId() {
            return $this->id;
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
         *	@return \Tags
         */
        function getTags() {
            $this->tags = $this->tags->__show();
            return $this->tags;
        }
        function setTags(\Tags $tags) {
            $this->tags = $tags;
        }
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'courses' => $this->courses,
                    'tags' => $this->tags,
                ];
        }
        
}
