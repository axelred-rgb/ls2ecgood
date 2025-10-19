<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="labsreservation")
     * */
    class Labsreservation extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="date", type="datetime"  )
         * @var datetime
         **/
        protected $date;
        /**
         * @Column(name="datefin", type="datetime"  )
         * @var datetime
         **/
        protected $datefin;
        /**
         * @Column(name="statut", type="integer"  )
         * @var integer
         **/
        protected $statut; 
        
        /**
         * @ManyToOne(targetEntity="\User")
         * @var \User
         */
        public $user;

        /**
         * @ManyToOne(targetEntity="\Labs")
         * @var \Labs
         */
        public $labs;

        /**
         * @ManyToOne(targetEntity="\Labs_keys")
         * @var \Labs_keys
         */
        public $labs_keys;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->user = new User();
	$this->labs = new Labs();
	$this->labs_keys = new Labs_keys();
}

        public function getId() {
            return $this->id;
        }
        public function getDate() {
            return $this->date;
        }

        public function setDate($date) {
            $this->date = $date;
        }
        
        public function getDatefin() {
            return $this->datefin;
        }

        public function setDatefin($datefin) {
            $this->datefin = $datefin;
        }
        
        public function getStatut() {
            return $this->statut;
        }

        public function setStatut($statut) {
            $this->statut = $statut;
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
         *	@return \Labs
         */
        function getLabs() {
            $this->labs = $this->labs->__show();
            return $this->labs;
        }
        function setLabs(\Labs $labs) {
            $this->labs = $labs;
        }
                        
        /**
         *  manyToOne
         *	@return \Labs_keys
         */
        function getLabs_keys() {
            $this->labs_keys = $this->labs_keys->__show();
            return $this->labs_keys;
        }
        function setLabs_keys(\Labs_keys $labs_keys) {
            $this->labs_keys = $labs_keys;
        }
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'date' => $this->date,
                    'datefin' => $this->datefin,
                    'statut' => $this->statut,
                    'user' => $this->user,
                    'labs' => $this->labs,
                    'labs_keys' => $this->labs_keys,
                ];
        }
        
}
