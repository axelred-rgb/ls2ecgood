<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="user_subscription")
     * */
    class User_subscription extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="start_date", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $start_date;
        /**
         * @Column(name="duration", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $duration;

        /**
         * @ManyToOne(targetEntity="\User")
         * @var \User
         */
        public $user;

        /**
         * @ManyToOne(targetEntity="\Subscription")
         * @var \Subscription
         */
        public $subscription;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->user = new User();
	$this->subscription = new Subscription();
}

        public function getId() {
            return $this->id;
        }
        public function getStart_date() {
            return $this->start_date;
        }

        public function setStart_date($start_date) {
            $this->start_date = $start_date;
        }
        
        public function getDuration() {
            return $this->duration;
        }

        public function setDuration($duration) {
            $this->duration = $duration;
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
         *	@return \Subscription
         */
        function getSubscription() {
            $this->subscription = $this->subscription->__show();
            return $this->subscription;
        }
        function setSubscription(\Subscription $subscription) {
            $this->subscription = $subscription;
        }
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'start_date' => $this->start_date,
                    'duration' => $this->duration,
                    'user' => $this->user,
                    'subscription' => $this->subscription,
                ];
        }
        
}
