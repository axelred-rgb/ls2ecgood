<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="subscription")
     * */
    class Subscription extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="name", type="string" , length=255 )
         * @var string
         **/
        protected $name;
        /**
         * @Column(name="description", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $description;
        /**
         * @Column(name="y_price", type="integer"  )
         * @var integer
         **/
        protected $y_price;
        /**
         * @Column(name="m_price", type="integer"  )
         * @var integer
         **/
        protected $m_price;
        /**
         * @Column(name="target", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $target;
        

        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
}

        public function getId() {
            return $this->id;
        }
        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }
        
        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getTarget() {
            return $this->target;
        }

        public function setTarget($target) {
            $this->target = $target;
        }
        
        public function getY_price() {
            return $this->y_price;
        }

        public function setY_price($y_price) {
            $this->y_price = $y_price;
        }

        public function getM_price() {
            return $this->m_price;
        }

        public function setM_price($m_price) {
            $this->m_price = $m_price;
        }
        

        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'description' => $this->description,
                    'target' => $this->target,
                    'm_price' => $this->m_price,
                    'y_price' => $this->y_price,
                ];
        }
        
}
