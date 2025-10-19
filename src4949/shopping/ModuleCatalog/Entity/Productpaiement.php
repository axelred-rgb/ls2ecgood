<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="productpaiement")
     * */
    class Productpaiement extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="created_at", type="datetime"  , nullable=true)
         * @var datetime
         **/
        protected $created_at;
        /**
         * @Column(name="updated_at", type="datetime"  , nullable=true)
         * @var datetime
         **/
        protected $updated_at;
        /**
         * @Column(name="deleted_at", type="datetime"  , nullable=true)
         * @var datetime
         **/
        protected $deleted_at; 
        
        /**
         * @ManyToOne(targetEntity="\Paiement")
         * @var \Paiement
         */
        public $paiement;

        /**
         * @ManyToOne(targetEntity="\Product")
         * @var \Product
         */
        public $product;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->paiement = new Paiement();
	$this->product = new Product();
}

        public function getId() {
            return $this->id;
        }
        public function getCreated_at() {
            return $this->created_at;
        }

        public function setCreated_at($created_at) {
            $this->created_at = $created_at;
        }
        
        public function getUpdated_at() {
            return $this->updated_at;
        }

        public function setUpdated_at($updated_at) {
            $this->updated_at = $updated_at;
        }
        
        public function getDeleted_at() {
            return $this->deleted_at;
        }

        public function setDeleted_at($deleted_at) {
            $this->deleted_at = $deleted_at;
        }
        
        /**
         *  manyToOne
         *	@return \Paiement
         */
        function getPaiement() {
            $this->paiement = $this->paiement->__show();
            return $this->paiement;
        }
        function setPaiement(\Paiement $paiement) {
            $this->paiement = $paiement;
        }
                        
        /**
         *  manyToOne
         *	@return \Product
         */
        function getProduct() {
            $this->product = $this->product->__show();
            return $this->product;
        }
        function setProduct(\Product $product) {
            $this->product = $product;
        }
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                    'deleted_at' => $this->deleted_at,
                    'paiement' => $this->paiement,
                    'product' => $this->product,
                ];
        }
        
}
