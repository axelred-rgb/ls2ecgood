<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="article")
     * */
    class Article extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="title", type="string" , length=255 )
         * @var string
         **/
        protected $title;
        /**
         * @Column(name="title_en", type="string" , length=255 )
         * @var string
         **/
        protected $title_en;
        /**
         * @Column(name="image", type="string" , length=255 )
         * @var string
         **/
        protected $image;
        /**
         * @Column(name="resume", type="string" , length=255 )
         * @var string
         **/
        protected $resume;
        /**
         * @Column(name="resume_en", type="string" , length=255 )
         * @var string
         **/
        protected $resume_en;
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
         * @Column(name="view", type="integer",nullable="true"  )
         * @var integer
         **/
        protected $view; 
        

        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
}

        public function getId() {
            return $this->id;
        }
        public function getTitle() {
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
            
                $filedir = 'article/';
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
            return Dfile::show($this->image, 'article');
        }
        public function showImage() {
            $url = Dfile::show($this->image, 'article');
            return Dfile::fileadapter($url, $this->image);
        }
        
        public function getImage() {
            return $this->image;
        }

        public function setImage($image) {
            $this->image = $image;
        }
        
        public function getResume() {
            return $this->resume;
        }

        public function setResume($resume) {
            $this->resume = $resume;
        }

        public function getResume_en() {
            return $this->resume_en;
        }

        public function setResume_en($resume_en) {
            $this->resume_en = $resume_en;
        }
        
        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getDescription_en() {
            return $this->description_en;
        }

        public function setDescription_en($description_en) {
            $this->description_en = $description_en;
        }
        
        public function getView() {
            return $this->view;
        }

        public function setView($view) {
            $this->view = $view;
        }
        
        
        public function jsonSerialize() {
                return [
                    'title' => $this->title,
                    'title_en' => $this->title_en,
                    'image' => $this->image,
                    'resume' => $this->resume,
                    'resume_en' => $this->resume_en,
                    'description' => $this->description,
                    'description_en' => $this->description_en,
                ];
        }
        
}
