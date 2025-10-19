<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="paiement")
     * */
    class Paiement extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="motif", type="string" , length=255 )
         * @var string
         **/
        protected $motif;
        /**
         * @Column(name="montant", type="integer" , length=255 )
         * @var integer
         **/
        protected $montant;

        /**
         * @Column(name="reduction", type="integer" , length=255 , nullable=true)
         * @var integer
         **/
        protected $reduction;

        /**
         * @Column(name="codepromo", type="string" , length=255, nullable=true )
         * @var string
         **/
        protected $codepromo;

        /**
         * @ManyToOne(targetEntity="\User")
         * @var \User
         */
        public $user;

        /**
         * @Column(name="nbremonth", type="integer" , length=255 , nullable=true)
         * @var integer
         **/
        protected $nbremonth = 0;

        /**
         * @Column(name="tva", type="integer" , length=255 , nullable=true)
         * @var integer
         **/
        protected $tva = 0;

        /**
         * @Column(name="ttc", type="integer" , length=255 , nullable=true)
         * @var integer
         **/
        protected $ttc = 0;

        /**
         * @Column(name="price", type="integer" , length=255 , nullable=true)
         * @var integer
         **/
        protected $price = 0;

        /**
         * @Column(name="numero", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $numero;

        /**
         * @ManyToOne(targetEntity="\Subscription")
         * @var \Subscription
         */
        public $subscription;

        /**
         * @ManyToOne(targetEntity="\Product")
         * @var \Product
         */
        public $product;

        /**
         * @ManyToOne(targetEntity="\Sessionpaiement")
         * @var \Sessionpaiement
         */
        public $sessionpaiement;

        /**
         * @Column(name="statutterminate", type="integer" , length=255 , nullable=true)
         * @var integer
         **/
        protected $statutterminate = 0;

        /**
         * @Column(name="unitprice", type="integer" , length=255 , nullable=true)
         * @var integer
         **/
        protected $unitprice = 0;
        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }
            $this->user = new User();
            $this->subscription = new Subscription();
            $this->sessionpaiement = new Sessionpaiement();
            $this->product = new Product();

        }

        public function getId() {
            return $this->id;
        }
        public function getMotif() {
            return $this->motif;
        }

        public function setMotif($motif) {
            $this->motif = $motif;
        }
        
        public function getMontant() {
            return $this->montant;
        }

        public function setMontant($montant) {
            $this->montant = $montant;
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

        function getSubscription() {
            $this->subscription = $this->subscription->__show();
            return $this->subscription;
        }
        function setSubscription(\Subscription $subscription) {
            $this->subscription = $subscription;
        }


        function getSessionpaiement() {
            $this->sessionpaiement = $this->sessionpaiement->__show();
            return $this->sessionpaiement;
        }
        function setSessionpaiement(\Sessionpaiement $sessionpaiement) {
            $this->sessionpaiement = $sessionpaiement;
        }

        /**
         * @return int
         */
        public function getReduction()
        {
            return $this->reduction;
        }

        /**
         * @param int $reduction
         */
        public function setReduction($reduction)
        {
            $this->reduction = $reduction;
        }

        /**
         * @return int
         */
        public function getTva()
        {
            return $this->tva;
        }

        /**
         * @param int $tva
         */
        public function setTva(int $tva): void
        {
            $this->tva = $tva;
        }

        /**
         * @return int
         */
        public function getTtc()
        {
            return $this->ttc;
        }

        /**
         * @param int $ttc
         */
        public function setTtc($ttc)
        {
            $this->ttc = $ttc;
        }

        /**
         * @return int
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param int $price
         */
        public function setPrice(int $price): void
        {
            $this->price = $price;
        }

        /**
         * @return string
         */
        public function getCodepromo()
        {
            return $this->codepromo;
        }

        /**
         * @param string $codepromo
         */
        public function setCodepromo($codepromo)
        {
            $this->codepromo = $codepromo;
        }

        /**
         * @return int
         */
        public function getNbremonth(): int
        {
            return $this->nbremonth;
        }

        /**
         * @param int $nbremonth
         */
        public function setNbremonth(int $nbremonth): void
        {
            $this->nbremonth = $nbremonth;
        }

        /**
         * @return string
         */
        public function getNumero(): string
        {
            return $this->numero;
        }

        /**
         * @param string $numero
         */
        public function setNumero($numero): void
        {
            $this->numero = $numero;
        }

        /**
         * @return int
         */
        public function getStatutterminate()
        {
            return $this->statutterminate;
        }

        /**
         * @param int $statutterminate
         */
        public function setStatutterminate($statutterminate)
        {
            $this->statutterminate = $statutterminate;
        }

        /**
         * @return int
         */
        public function getUnitprice()
        {
            return $this->unitprice;
        }

        /**
         * @param int $unitprice
         */
        public function setUnitprice($unitprice)
        {
            $this->unitprice = $unitprice;
        }

        function getProduct() {
            $this->product = $this->product->__show();
            return $this->product;
        }
        function setProduct(\Product $product) {
            $this->product = $product;
        }
        
        public function setCreatedAt($created_at)
        {
            if(is_null($created_at)){
                $created_at = date('Y-m-d H:i:s');
            }
            parent::setCreatedAt($created_at); // TODO: Change the autogenerated stub
        }

        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'motif' => $this->motif,
                    'montant' => $this->montant,
                    'user' => $this->user,
                    'reduction' => $this->reduction,
                    'codepromo' => $this->codepromo,
                    'nbremonth' => $this->nbremonth,
                    'subscription' => $this->subscription,
                    'ttc' => $this->ttc,
                    'tva' => $this->tva,
                    'price' => $this->price,
                    'numero' => $this->numero,
                    'product' => $this->product
                ];
        }

        public function __insert()
        {
            if($this->subscription->getId()){
                if($this->nbremonth > 12){
                    $this->unitprice = $this->subscription->getM_price();
                }
                else{
                    $this->unitprice = $this->subscription->getY_price();
                }
            }
            return parent::__insert(); // TODO: Change the autogenerated stub
        }

    }
