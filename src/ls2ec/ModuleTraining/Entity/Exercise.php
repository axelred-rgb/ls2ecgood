<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="exercise")
     * */
    class Exercise extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="title", type="string" , length=255, nullable=true )
         * @var string
         **/
        protected $title;
        /**
         * @Column(name="title_en", type="string" , length=255, nullable=true )
         * @var string
         **/
        protected $title_en;
        /**
         * @Column(name="image", type="string" , length=255 , nullable=true)
         * @var string
         **/
        protected $image;
        /**
         * @Column(name="contenu", type="text", nullable=true  )
         * @var text
         **/
        protected $contenu;
        /**
         * @Column(name="contenu_en", type="text" , nullable=true )
         * @var text
         **/
        protected $contenu_en;
        /**
         * @Column(name="reponse", type="text" , nullable=true )
         * @var text
         **/
        protected $reponse;
        /**
         * @Column(name="reponse_en", type="text" , nullable=true )
         * @var text
         **/
        protected $reponse_en;

        /**
         * @ManyToOne(targetEntity="\Courses")
         * @var \Courses
         */
        public $courses;
        

        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }

            $this->courses = new Courses();


        }

        public function getId() {
            return $this->id;
        }

        /**
         *  manyToOne
         *	@return \Courses
         */
        function getCourses() {
            $this->courses = $this->courses->__show();
            return $this->courses;
        }
        function setCourses(\Courses $courses) {
            $this->courses = $courses;
        }

        public function getTitle() {
            if(Request::get('lang') == 'en'){
                return $this->title_en;
            }
            return $this->title;
        }

        public function setTitle($title) {
            $this->title = $title;
        }
        
        public function getTitle_en() {
            return $this->title_en;
        }

        public function setTitle_en($title_en) {
            $this->title_en = $title_en;
        }
        
                        
        public function uploadImage($file = 'image') {
            $dfile = self::Dfile($file);
            if(!$dfile->errornofile){
            
                $filedir = 'exercise/';
                $url = $dfile
                    ->sanitize()
                    ->moveto($filedir);
    
                if (!$url['success']) {
                    return 	array(	'success' => false,
                        'error' => $url);
                }
    
                $this->image = $url['file']['hashname'];            
            }
        }     
             
        public function srcImage() {
            return Dfile::show($this->image, 'exercise');
        }
        public function showImage() {
            $url = Dfile::show($this->image, 'exercise');
            return Dfile::fileadapter($url, $this->image);
        }
        
        public function getImage() {
            return $this->image;
        }

        public function setImage($image) {
            $this->image = $image;
        }
        
        public function getContenu() {
            if(Request::get('lang') == 'en'){
                return $this->contenu_en;
            }
            return $this->contenu;
        }

        public function setContenu($contenu) {
            $this->contenu = $contenu;
        }
        
        public function getContenu_en() {
            return $this->contenu_en;
        }

        public function setContenu_en($contenu_en) {
            $this->contenu_en = $contenu_en;
        }
        
        public function getReponse() {
            if(Request::get('lang') == 'en'){
                return $this->reponse_en;
            }
            return $this->reponse;
        }

        public function setReponse($reponse) {
            $this->reponse = $reponse;
        }
        
        public function getReponse_en() {
            return $this->reponse_en;
        }

        public function setReponse_en($reponse_en) {
            $this->reponse_en = $reponse_en;
        }
        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'title' => $this->title,
                    'title_en' => $this->title_en,
                    'image' => $this->image,
                    'contenu' => $this->contenu,
                    'contenu_en' => $this->contenu_en,
                    'reponse' => $this->reponse,
                    'reponse_en' => $this->reponse_en,
                    'courses' => $this->courses,
                ];
        }
        
}
