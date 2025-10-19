<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="labs_labs_keys")
     * */
    class Labs_labs_keys extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id; 
        
        /**
         * @ManyToOne(targetEntity="\Labs_keys")
         * @var \Labs_keys
         */
        public $labs_keys;

        /**
         * @ManyToOne(targetEntity="\Labs")
         * @var \Labs
         */
        public $labs;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->labs_keys = new Labs_keys();
	$this->labs = new Labs();
}

        public function getId() {
            return $this->id;
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
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'labs_keys' => $this->labs_keys,
                    'labs' => $this->labs,
                ];
        }
        
}
