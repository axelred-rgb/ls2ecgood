<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="course_section")
     * */
    class Course_section extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="title", type="string" , length=255 )
         * @var string
         **/
        protected $title; 
        
        /**
         * @ManyToOne(targetEntity="\Courses")
         * @var \Courses
         */
        public $courses;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->courses = new Courses();
}

        public function getId() {
            return $this->id;
        }
        public function getTitle() {
            return $this->title;
        }

        public function setTitle($title) {
            $this->title = $title;
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

        function getActivities()
            {
                $activities = Course_activity::where($this)->__getAll();
                return $activities;
            }
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'title' => $this->title,
                    'courses' => $this->courses,
                ];
        }
        
}
