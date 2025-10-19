<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="course_activity")
     * */
    class Course_activity extends Model implements JsonSerializable{

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
         * @ManyToOne(targetEntity="\Course_section")
         * @var \Course_section
         */
        public $course_section;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->course_section = new Course_section();
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
         *	@return \Course_section
         */
        function getCourse_section() {
            $this->course_section = $this->course_section->__show();
            return $this->course_section;
        }
        function setCourse_section(\Course_section $course_section) {
            $this->course_section = $course_section;
        }
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'title' => $this->title,
                    'course_section' => $this->course_section,
                ];
        }
        
}
