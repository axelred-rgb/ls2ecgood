<?php 
        // user \dclass\devups\model\Model;
use ls2ec\ModuleTraining\Form\Session;

/**
     * @Entity @Table(name="sessioncodepromo")
     * */
    class Sessioncodepromo extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="preuve", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $preuve;
        /**
         * @Column(name="state", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $state = 0 ;

        /**
         * @Column(name="ispacekola", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $ispacekola = 0 ;

        /**
         * @Column(name="montant", type="float"  , nullable=true)
         * @var integer
         **/
        protected $montant;

        /**
         * @Column(name="processfees", type="float"  , nullable=true)
         * @var float
         **/
        protected $processfees;
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
         * @ManyToOne(targetEntity="\Sessionpaiement")
         * @JoinColumn(onDelete="cascade")
         * @var \Sessionpaiement
         */
        public $sessionpaiement;

        /**
         * @ManyToOne(targetEntity="\Codepromo")
         * @JoinColumn(onDelete="cascade")
         * @var \Codepromo
         */
        public $codepromo;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->sessionpaiement= new Sessionpaiement();
	$this->codepromo = new Codepromo();
}

        public function getId() {
            return $this->id;
        }
        public function getPreuve() {
            return $this->preuve;
        }

        public function setPreuve($preuve) {
            $this->preuve = $preuve;
        }
        
        public function getState() {
            return $this->state;
        }

        public function setState($state) {
            $this->state = $state;
        }

        public function getStateName(){
            if($this->state == 0)
                return tt('En attente');
            else
                return tt('Paiement effectué');
        }
        
        public function getMontant() {
            return $this->montant;
        }

        public function setMontant($montant) {
            $this->montant = $montant;
        }

        /**
         * @return int
         */
        public function getIspacekola()
        {
            return $this->ispacekola;
        }

        /**
         * @param int $ispacekola
         */
        public function setIspacekola($ispacekola)
        {
            $this->ispacekola = $ispacekola;
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
         *	@return \Sessionpaiement
         */
        function getSessionpaiement() {
            $this->sessionpaiement= $this->sessionpaiement->__show();
            return $this->sessionpaiement;
        }
        function setSessionpaiement(\Sessionpaiement $session) {
            $this->sessionpaiement = $session;
        }
                        
        /**
         *  manyToOne
         *	@return \Codepromo
         */
        function getCodepromo() {
            $this->codepromo = $this->codepromo->__show();
            return $this->codepromo;
        }
        function setCodepromo(\Codepromo $codepromo) {
            $this->codepromo = $codepromo;
        }

        /**
         * @return float
         */
        public function getProcessfees()
        {
            return $this->processfees;
        }

        /**
         * @param float $processfees
         */
        public function setProcessfees($processfees)
        {
            $this->processfees = $processfees;
        }



        static function createSessionCodepromo(\Codepromo $codepromo, $montant){

            $session = array_reverse(Sessionpaiement::all())[0];

            $sessioncodepromo = Sessioncodepromo::where('codepromo_id',$codepromo->getId())
                ->andwhere('sessionpaiement_id',$session->getId())
                ->__getOne();
            if($sessioncodepromo->getId()){
                $lastmontant = $sessioncodepromo->getMontant();
                $sessioncodepromo->setMontant($montant+$lastmontant);
                $sessioncodepromo->__update();
            }
            else{
                $sessioncodepromo = new Sessioncodepromo();
                $sessioncodepromo->setCodepromo($codepromo);
                $sessioncodepromo->setSessionpaiement($session);
                $sessioncodepromo->setMontant($montant);
                $sessioncodepromo->__insert();
            }

        }


        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'preuve' => $this->preuve,
                    'state' => $this->state,
                    'montant' => $this->montant,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                    'deleted_at' => $this->deleted_at,
                    'sessionpaiement' => $this->sessionpaiement,
                    'codepromo' => $this->codepromo,
                ];
        }
        
}
