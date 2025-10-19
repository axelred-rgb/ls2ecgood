<?php 
        // user \dclass\devups\model\Model;
    /**
     * @Entity @Table(name="instructor")
     * */
    class Instructor extends Model implements JsonSerializable{

        /**
         * @Id @GeneratedValue @Column(type="integer")
         * @var int
         * */
        protected $id;
        /**
         * @Column(name="fields", type="string" , length=255 )
         * @var string
         **/
        protected $fields;
        /**
         * @Column(name="profession", type="string" , length=255 )
         * @var string
         **/
        protected $profession;
        /**
         * @Column(name="speciality", type="string" , length=255 )
         * @var string
         **/
        protected $speciality;
        /**
         * @Column(name="biography", type="text"  )
         * @var text
         **/
        protected $biography;

        /**
         * @Column(name="istreat", type="integer"  , nullable=true)
         * @var integer
         **/
        protected $istreat = 0;

        /**
         * @Column(name="cv", type="string" , length=255 )
         * @var string
         **/
        protected $cv; 
        
        /**
         * @ManyToOne(targetEntity="\Academies")
         * @var \Academies
         */
        public $academies;

        /**
         * @ManyToOne(targetEntity="\User")
         * @var \User
         */
        public $user;


        
        public function __construct($id = null){
            
                if( $id ) { $this->id = $id; }   
                          
	$this->academies = new Academies();
	$this->user = new User();
}

        public function getId() {
            return $this->id;
        }
        public function getFields() {
            return $this->fields;
        }

        public function setFields($fields) {
            $this->fields = $fields;
        }
        
        public function getProfession() {
            return $this->profession;
        }

        public function setProfession($profession) {
            $this->profession = $profession;
        }
        
        public function getSpeciality() {
            return $this->speciality;
        }

        public function setSpeciality($speciality) {
            $this->speciality = $speciality;
        }
        
        public function getBiography() {
            return $this->biography;
        }

        public function setBiography($biography) {
            $this->biography = $biography;
        }

        public function getIstreat() {
            return $this->istreat;
        }

        public function setIstreat($istreat) {
            $this->istreat = $istreat;
        }
        
                        
        public function uploadCv($file = 'cv') {
            $dfile = self::Dfile($file);
            if(!$dfile->errornofile){
            
                $filedir = 'instructor/';
                $url = $dfile
                    ->hashname()
                    ->moveto($filedir);
    
                if (!$url['success']) {
                    return 	array(	'success' => false,
                        'error' => $url);
                }
    
                $this->cv = $url['file']['hashname'];            
            }
        }     
             
        public function srcCv() {
            return Dfile::show($this->cv, 'instructor');
        }
        public function showCv() {
            $url = Dfile::show($this->cv, 'instructor');
            return Dfile::fileadapter($url, $this->cv);
        }

        public function showCv2()
        {
            return Dfile::show($this->cv, "instructor");
        }
        
        public function getCv() {
            return $this->cv;
        }

        public function setCv($cv) {
            $this->cv = $cv;
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
                        
        
        public function jsonSerialize() {
                return [
                    'id' => $this->id,
                    'fields' => $this->fields,
                    'profession' => $this->profession,
                    'speciality' => $this->speciality,
                    'biography' => $this->biography,
                    'cv' => $this->cv,
                    'academies' => $this->academies,
                    'istreat' => $this->istreat,

                    'user' => $this->user,
                ];
        }
        
}
