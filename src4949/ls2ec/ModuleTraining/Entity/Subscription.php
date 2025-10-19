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
         * @Column(name="redu", type="integer"  )
         * @var integer
         **/
        protected $redu;

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

        /**
         * @Column(name="paypalproduct", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $paypalproduct;

        /**
         * @Column(name="paypalplan", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $paypalplan;

        //protected $url = 'https://api-m.paypal.com';
         
        

        
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

            return $this->getMpriceReduce();
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

        /**
         * @return string
         */

        /**
         * @return int
         */
        public function getRedu()
        {
            return $this->redu;
        }

        /**
         * @param int $redu
         */
        public function setRedu($redu)
        {
            $this->redu = $redu;
        }

        public function getMpriceReduce($percentpromo = null, $iscodepromo = false){
            if($percentpromo == null){
                $percentpromo = $this->getRedu();
            }
            if(!$iscodepromo){
                return (int)$this->m_price*(1-$percentpromo/100);
            }
            else{
                $prix = $this->m_price*(1-$this->getRedu()/100);
                return (int)$prix*(1-$percentpromo/100);
            }
        }

        public function getN_price(){
            return $this->m_price;
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
                    'type' => $this->type,
                    'paypal_product'=> $this->getPaypalproduct(),
                    'paypal_plan' => $this->getPaypalplan()
                ];
        }

        public function getCycle(){
            return 12/$this->getMonth();
        }

        public function __insert()
        {
            return parent::__insert(); // TODO: Change the autogenerated stub
        }

        public function generateTokken(){
            $ch = curl_init();

            $url = 'https://api-m.paypal.com';
            //var_dump($url);
            

            curl_setopt($ch, CURLOPT_URL, $url.'/v1/oauth2/token');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
            //curl_setopt($ch, CURLOPT_USERPWD, 'AX-b9tAA43U18tmHWrPdzgbVRmMTtk4IsqLnkJufx-pSutyEUSQCjnoLTPNaG6ayGUcqcKAd_OtZcpQ1' . ':' . 'EAAXk2LcOxKmNTvRrCYtsJnA1bkUMoPhqlhOc-oxUY7WawoxzJI4SGr1nYrnWoFMSybiOsBg7GeUIUlK');
            //curl_setopt($ch, CURLOPT_USERPWD, 'ASq4h0hB7HT_bFKcGu8HFqqPHKOLlu0qszDornLOeSuMOPp9xXbbtQuQ0csML6egXOBLExP-aZDK0kOV' . ':' . 'EEejxFMoVE0EB3Fzn3FYUOcyIIJzFUCiHPr1Kd5tFOeB72beaKwSPjKEgEqWVPu02CwAx-2RhySO7ML3');

            curl_setopt($ch, CURLOPT_USERPWD, 'AdFBNbR7OUFEueglDyf34kslE69GMNeTf3SNVX7NQoEgI9xELL57qvfxN9yDE9Xn6R8HiyOuiL_fADOy' . ':' . 'EEuAwAAVeuiP2eDbnXxuOtL_Y9MURGQPGFvby2VxOTTuQb0cjHY1huy-l9ekq_aAMg2EaZ58MVie0VeV');


            $headers = array();
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            $result = json_decode($result);

            return $result->access_token;
        }

        public function getListTransactions($paypalaccesstokken, $subscriptionid){

            $curl = curl_init();
            $url = 'https://api-m.paypal.com';

            $year = date('Y', strtotime('+1 year'));
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url.'/v1/billing/subscriptions/'.$subscriptionid.'/transactions?start_time=2022-01-01T00:00:00.000Z&end_time='.$year.'-01-01T00:00:00.000Z',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'PayPal-Request-Id: b7f09d51-f241-4deb-a2c8-'.time(),
                    'Authorization: Bearer '.$paypalaccesstokken
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode($response);
            //var_d( $response);

            return  $response;

        }


        public function getPaypalproduct()
        {
            return $this->paypalproduct;
        }

        /**
         * @param string $paypalproduct
         */
        public function generatePaypalproduct($paypalaccesstokken)
        {
            $curl = curl_init();
            $url = 'https://api-m.paypal.com';

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url.'/v1/catalogs/products',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
   "name": "'.$this->getName().'",
    "type": "SERVICE",
    "id": "'.time().'",
    "description": "'.$this->getName().'",
    "category": "CLOTHING",
    "image_url": "https://example.com/gallary/images/1662696276.jpg",
    "home_url": "https://example.com/catalog/1662696276.jpg"
}',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'PayPal-Request-Id: 89d1dc73-cd94-473c-aeda-'.time(),
                    'Authorization: Bearer '.$paypalaccesstokken
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode($response);
            

            return  $response->id;
        }

        /**
         * @param string $paypalproduct
         */
        public function setPaypalproduct(string $paypalproduct)
        {
            $this->paypalproduct = $paypalproduct;
        }


        /**
         * @return string
         */
        public function getPaypalplan()
        {
            return $this->paypalplan;
        }

        /**
         * @param string $paypalplan
         */
        public function generatePaypalplan ($paypalaccesstokken,$periode, $productid, $percentpromo, $ispromocode = false)
        {
            $curl = curl_init();
            
            $url = 'https://api-m.paypal.com';
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url.'/v1/billing/plans',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "product_id": "'.$productid.'",
                    "name": "'.$this->getName().' Plan",
                    "description": "Each shirt they send out to subscribers is designed with lots of attention to detail",
                    "status": "ACTIVE",
                    "billing_cycles": [
                        {
                            "frequency": {
                                "interval_unit": "'.$periode.'",
                                "interval_count": '.$this->getMonth().'
                            },
                            "tenure_type": "TRIAL",
                            "sequence": 1,
                            "total_cycles": 1,
                            "pricing_scheme": {
                                "fixed_price": {
                                    "value": "'.$this->getMpriceReduce($percentpromo, $ispromocode).'",
                                    "currency_code": "EUR"
                                }
                            }
                        },
                        {
                            "frequency": {
                                "interval_unit": "'.$periode.'",
                                "interval_count": '.$this->getMonth().'
                            },
                            "tenure_type": "REGULAR",
                            "sequence": 2,
                            "total_cycles": '.$this->getCycle().',
                            "pricing_scheme": {
                                "fixed_price": {
                                    "value": "'.$this->m_price.'",
                                    "currency_code": "EUR"
                                }
                            }
                        }
                    ],
                    "payment_preferences": {
                        "auto_bill_outstanding": true,
                        "setup_fee": {
                            "value": "0",
                            "currency_code": "EUR"
                        },
                        "setup_fee_failure_action": "CONTINUE",
                        "payment_failure_threshold": 3
                    },
                    "taxes": {
                        "percentage": "20",
                        "inclusive": false
                    }
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'PayPal-Request-Id: 43e0edbe-7ec3-4a04-bcde-'.time(),
                    'Prefer: return=representation',
                    'Authorization: Bearer '.$paypalaccesstokken
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode($response);

            //var_dump($response->id);
            return $response->id;
        }

        /**
         * @param string $paypalplan
         */
        public function setPaypalplan(string $paypalplan): void
        {
            $this->paypalplan = $paypalplan;
        }





        public function __update($arrayvalues = null, $seton = null, $case = null, $defauljoin = true)
        {
            if($this->getMonth() < 12){
                $access_tokken = $this->generateTokken();

                //$this->getListTransactions($access_tokken);

                $paypalproduct = $this->generatePaypalproduct($access_tokken);

                $this->setPaypalproduct($paypalproduct);
                //$this->setMonth(1);

                $percentpromo = $this->getRedu();

                $paypalplan = $this->generatePaypalplan($access_tokken,'MONTH',$paypalproduct, $percentpromo);

                $this->setPaypalplan($paypalplan);

            }

            return parent::__update($arrayvalues, $seton, $case, $defauljoin); // TODO: Change the autogenerated stub
        }
    }
