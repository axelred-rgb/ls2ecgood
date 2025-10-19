<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="courses")
     * */
    class Courses extends Model implements JsonSerializable{

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
         * @Column(name="name_en", type="string" , length=255 )
         * @var string
         **/
        protected $name_en;
        /**
         * @Column(name="description", type="text"  )
         * @var text
         **/
        protected $description;
        /**
         * @Column(name="description_en", type="text"  )
         * @var text
         **/
        protected $description_en;
        /**
         * @Column(name="image", type="string" , length=255 )
         * @var string
         **/
        protected $image;
        /**
         * @Column(name="imageurl", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $imageurl;
        /**
         * @Column(name="publisher", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $publisher;
        /**
         * @Column(name="price", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $price;

        /**
         * @Column(name="nb_sub", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $nb_sub = 0;

        /**
         * @Column(name="nb_review", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $nb_review = 0;

        /**
         * @Column(name="review_note", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $review_note = 0;

        /**
         * @Column(name="providercoursesid", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $providercoursesid;
        /**
         * @Column(name="courselink", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $courselink;



        /**
         * @Column(name="creationdate", type="datetime"  )
         * @var datetime
         **/
        protected $creationdate;
        /**
         * @Column(name="updateddate", type="datetime"  , nullable=true)
         * @var datetime
         **/
        protected $updateddate; 
        
        /**
         * @ManyToOne(targetEntity="\User")
         * @var \User
         */
        public $user;

        /**
         * @ManyToOne(targetEntity="\Provider")
         * @var \Provider
         */
        public $provider;

        /**
         * @ManyToOne(targetEntity="\Academies")
         * @var \Academies
         */
        public $academies;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->user = new User();
	$this->academies = new Academies();
	$this->provider = new Provider();
}

        public function getId() {
            return $this->id;
        }

        public function getName() {
            $lang = Request::get('lang');
            if($lang == "en")
                return $this->name_en;
            else
                return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getName_en() {
            return $this->name_en;
        }

        public function setName_en($name_en) {
            $this->name_en = $name_en;
        }

        public function getDescription() {
            $lang = Request::get('lang');
            if($lang == "en")
                return $this->description_en;
            else
                return $this->description;
        }

        public function getShort_description() {

            if (strlen($this->description) > 250)
            {
                $chaine = substr($this->description, 0, 250);
                $last_space = strrpos($chaine, " ");
                $chaine = substr($chaine, 0, $last_space)."...";
                return $chaine;
            }
            else
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getDescription_en() {
            return $this->description_en;
        }

        public function getShort_description_en() {

            if (strlen($this->description_en) > 250)
            {
                $chaine = substr($this->description_en, 0, 250);
                $last_space = strrpos($chaine, " ");
                $chaine = substr($chaine, 0, $last_space)."...";
                return $chaine;
            }
            else
            return $this->description_en;
        }

        public function setDescription_en($description_en) {
            $this->description_en = $description_en;
        }
        
        public function getImage() {
            return $this->image;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function getImageurl() {
            return $this->imageurl;
        }

        public function setImageurl($imageurl) {
            $this->imageurl = $imageurl;
        }

        public function getPublisher() {
            return $this->publisher;
        }

        public function setPublisher($publisher) {
            $this->publisher = $publisher;
        }

        public function getProvidercoursesid() {
            return $this->providercoursesid;
        }

        public function setProvidercoursesid($providercoursesid) {
            $this->providercoursesid = $providercoursesid;
        }


        
        public function getPrice() {
            return $this->price;
        }

        public function setPrice($price) {
            $this->price = $price;
        }

        public function getNb_review() {
            return $this->nb_review;
        }

        public function setNb_review($nb_review) {
            $this->nb_review = $nb_review;
        }

        public function getNb_sub() {
            return $this->nb_sub;
        }

        public function setNb_sub($nb_sub) {
            $this->nb_sub= $nb_sub;
        }

        public function getReview_note() {
            return $this->review_note;
        }

        public function setReview_note($review_note) {
            $this->review_note = $review_note;
        }

        public function getCourselink() {
            return $this->courselink;
        }

        public function setCourselink($courselink) {
            $this->courselink = $courselink;
        }
        
        public function getCreationdate() {
            return $this->creationdate;
        }

        public function setCreationdate($creationdate) {
            $this->creationdate = $creationdate;
        }
        
        public function getUpdateddate() {
            return $this->updateddate;
        }

        public function setUpdateddate($updateddate) {
            $this->updateddate = $updateddate;
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
         *	@return \Provider
         */
        function getProvider() {
            $this->provider = $this->provider->__show();
            return $this->provider;
        }
        function setProvider(\Provider $provider) {
            $this->provider = $provider;
        }
                        
        /**
         *  manyToOne
         *	@return \Academies
         */
        function getAcademies() {
            $this->academies = $this->academies->__show();
            return $this->academies;
        }
        function setAcademies(\Academies $academies) {
            $this->academies = $academies;
        }

        function isallreadyenrolled($id) {
            $isenrolled = User_courses::where($this)->andwhere('user.id',$id)->__firstOrNull();
            return $isenrolled;

        }
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'name_en' => $this->name_en,
                    'description' => $this->description,
                    'description_en' => $this->description_en,
                    'image' => $this->image,
                    'imageurl' => $this->imageurl,
                    'publisher' => $this->publisher,
                    'price' => $this->price,
                    'nb_sub' => $this->nb_sub,
                    'nb_review' => $this->nb_review,
                    'review_note' => $this->review_note,
                    'providercoursesid' => $this->providercoursesid,
                    'creationdate' => $this->creationdate,
                    'updateddate' => $this->updateddate,
                    'user' => $this->user,
                    'provider' => $this->provider,
                    'academies' => $this->academies,
                    'courselink' => $this->courselink,
                ];
        }
        
}
