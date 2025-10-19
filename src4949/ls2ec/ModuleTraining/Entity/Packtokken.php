<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="packtokken")
     * */
    class Packtokken extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="prix", type="integer"  )
         * @var integer
         **/
        protected $prix;
        /**
         * @Column(name="nombre", type="integer"  )
         * @var integer
         **/
        protected $nombre; 
        

        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
}

        public function getId() {
            return $this->id;
        }
        public function getPrix() {
            return $this->prix;
        }

        public function setPrix($prix) {
            $this->prix = $prix;
        }
        
        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'prix' => $this->prix,
                    'nombre' => $this->nombre,
                ];
        }
        
}
