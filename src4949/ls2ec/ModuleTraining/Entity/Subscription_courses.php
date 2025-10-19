<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="subscription_courses")
     * */
    class Subscription_courses extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id; 
        
        /**
         * @ManyToOne(targetEntity="\Subscription")
         * @var \Subscription
         */
        public $subscription;

        /**
         * @ManyToOne(targetEntity="\Courses")
         * @var \Courses
         */
        public $courses;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->subscription = new Subscription();
	$this->courses = new Courses();
}

        public function getId() {
            return $this->id;
        }
        /**
         *  manyToOne
         *	@return \Subscription
         */
        function getSubscription() {
            $this->subscription = $this->subscription->__show();
            return $this->subscription;
        }
        function setSubscription(\Subscription $subscription) {
            $this->subscription = $subscription;
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
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'subscription' => $this->subscription,
                    'courses' => $this->courses,
                ];
        }
        
}
