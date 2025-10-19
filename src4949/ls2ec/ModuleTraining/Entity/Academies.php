<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="academies")
     * */
    class Academies extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
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
         * @Column(name="image", type="string" , length=255 , nullable=true )
         * @var string
         **/
        protected $image;
        /**
         * @Column(name="banner", type="string" , length=255 ,nullable=true )
         * @var string
         **/
        protected $banner;

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



        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
}

        public function getId() {
            return $this->id;
        }

        public function getDescription() {
            $lang = Request::get('lang');
            if($lang == "en")
                return $this->description_en;
            else
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
        
        public function getImage() {
            return $this->image;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function getBanner() {
            return $this->banner;
        }

        public function setBanner($banner) {
            $this->banner = $banner;
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
        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'description' => $this->description,
                    'description_en' => $this->description_en,
                    'image' => $this->image,
                    'name' => $this->name,
                    'name_en' => $this->name_en,
                ];
        }
        
}
