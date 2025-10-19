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
         * @Column(name="completenameen", type="string" , length=255, nullable=true )
         * @var string
         **/
        protected $completenameen;
        /**
         * @Column(name="completenamefr", type="string" , length=255, nullable=true )
         * @var string
         **/
        protected $completenamefr;
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
         * @Column(name="y_a_price", type="integer"  )
         * @var integer
         **/
        protected $y_a_price;
        /**
         * @Column(name="m_a_price", type="integer"  )
         * @var integer
         **/
        protected $m_a_price;

        /**
         * @Column(name="token", type="integer"  )
         * @var integer
         **/
        protected $token;

        /**
         * @Column(name="month", type="integer"  )
         * @var integer
         **/
        protected $month;

        /**
         * @Column(name="type", type="integer"  )
         * @var integer
         **/
        protected $type=1;

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
            if($this->getCompletename() == '' || !$this->getCompletename() || is_null($this->getCompletename())){
                return $this->name;
            }
            return $this->name;
        }

        public function getOnlyname(){
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
        
        public function getY_price($check = '') {
            return $this->y_price;
//            if($check == ''){
//                return $this->y_price;
//            }
//            else{
//                if(userapp()){
//                    $user = User::find(userapp()->getId());
//                    $continent = $user->getCountry()->getContinent()->getId();
//                    if($continent == 1){
//                        return $this->y_a_price;
//                    }
//                    else{
//                        return $this->y_price;
//                    }
//                }
//                else{
//                    return $this->y_price;
//                }
//            }
        }

        public function setY_price($y_price) {
            $this->y_price = $y_price;
        }

        public function getY_a_price() {
            return $this->y_a_price;
        }

        public function setY_a_price($y_a_price) {
            $this->y_a_price = $y_a_price;
        }

        public function getM_price($check = '') {

            return $this->m_price;
//            if($check == ''){
//                return $this->m_price;
//            }
//            else{
//                if(userapp()){
//                    $user = User::find(userapp()->getId());
//                    $continent = $user->getCountry()->getContinent()->getId();
//                    if($continent == 1){
//                        return $this->m_a_price;
//                    }
//                    else{
//                        return $this->m_price;
//                    }
//                }
//                else{
//                    return $this->m_price;
//                }
//            }
        }


        public function setM_price($m_price) {
            $this->m_price = $m_price;
        }

        public function getM_a_price() {
            return $this->m_a_price;
        }


        public function setM_a_price($m_a_price) {
            $this->m_a_price = $m_a_price;
        }

        public function getCourses(){
            $courseid = [];
            if($this->id == 2){
                $courseid = [3, 7];
            }
            else{
                if($this->id == 3){
                    $courseid = [4, 8];
                }
                else{
                    if($this->id == 4){
                        $courseid = [3, 4, 7, 8, 2];
                    }
                    else{
                        $courseid = [3, 4, 7, 8, 2];
                    }
                }
            }
            $courses = [];
            foreach ($courseid as $cours_id){
                array_push($courses, Courses::find($cours_id));
            }
            return $courses;
        }

        /**
         * @return int
         */
        public function getToken()
        {
            return $this->token;
        }

        /**
         * @param int $token
         */
        public function setToken($token)
        {
            $this->token = $token;
        }

        /**
         * @return int
         */
        public function getMonth()
        {
            return $this->month;
        }

        /**
         * @param int $month
         */
        public function setMonth($month)
        {
            $this->month = $month;
        }

        /**
         * @return int
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @param int $type
         */
        public function setType($type)
        {
            $this->type = $type;
        }

        /**
         * @return string
         */
        public function getCompletenameen()
        {
            return $this->completenameen;
        }

        /**
         * @param string $completenameen
         */
        public function setCompletenameen($completenameen)
        {
            $this->completenameen = $completenameen;
        }

        /**
         * @return string
         */
        public function getCompletenamefr()

        {
            return $this->completenamefr;
        }

        /**
         * @param string $completenamefr
         */
        public function setCompletenamefr($completenamefr)
        {
            $this->completenamefr = $completenamefr;
        }

        public function getCompletename(){
            if(Dvups_lang::currentLang()->getIso_code() == 'fr'){
                return $this->completenamefr;
            }

            return $this->getCompletenameen();
        }
        

        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'description' => $this->description,
                    'target' => $this->target,
                    'm_price' => $this->m_price,
                    'y_price' => $this->y_price,
                    'm_a_price' => $this->m_a_price,
                    'y_a_price' => $this->y_a_price,
                    'type' => $this->type
                ];
        }
        
}
