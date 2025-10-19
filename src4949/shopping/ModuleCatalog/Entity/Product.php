<?php
// user \dclass\devups\model\Model;

/**
 * @Entity @Table(name="product")
 * */
class Product extends Model implements JsonSerializable
{

    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     * */
    protected $id;
    /**
     * @Column(name="name", type="string" , length=55 )
     * @var string
     **/
    protected $name;
    /**
     * @Column(name="status", type="integer"  )
     * @var string
     **/
    protected $status = 1;
    /**
     * @Column(name="namecanonical", type="string" , length=55 , nullable=true)
     * @var string
     **/
    protected $namecanonical;
    /**
     * @Column(name="nameseo", type="string" , length=55 )
     * @var string
     **/
    protected $nameseo;
    /**
     * @Column(name="reference", type="string" , length=25 , nullable=true)
     * @var string
     **/
    protected $reference;
    /**
     * @Column(name="priceofsale", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $priceofsale;
    /**
     * @Column(name="description", type="text"  , nullable=true)
     * @var text
     **/
    protected $description;
    /**
     * @Column(name="cover", type="string" , length=255 , nullable=true)
     * @var string
     **/
    protected $cover;
    /**
     * @Column(name="type", type="integer"  )
     * @var string
     **/
    protected $type = 0;
    /**
     * @Column(name="document", type="string" , length=255 , nullable=true)
     * @var string
     **/
    protected $document;
    /**
     * @Column(name="sommary", type="text"  , nullable=true)
     * @var text
     **/
    protected $sommary;

    /**
     * @ManyToOne(targetEntity="\Courses")
     * @var \Courses
     */
    public $courses;


    public function __construct($id = null)
    {

        if ($id) {
            $this->id = $id;
        }

        $this->courses = new Courses();

    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        $this->nameseo = url_format($name);
    }

    public function getNamecanonical()
    {
        return $this->namecanonical;
    }

    public function setNamecanonical($namecanonical)
    {
        $this->namecanonical = $namecanonical;
    }

    public function getNameseo()
    {
        return $this->nameseo;
    }

    public function setNameseo($nameseo)
    {
        $this->nameseo = $nameseo;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function getPriceofsale()
    {
        return $this->priceofsale;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setPriceofsale($priceofsale)
    {
        $this->priceofsale = $priceofsale;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function uploadCover($file = 'cover')
    {
        $dfile = self::Dfile($file);
        if (!$dfile->errornofile) {

            $filedir = 'product/';
            $url = $dfile
                ->sanitize()
                ->moveto($filedir);

            if (!$url['success']) {
                return array('success' => false,
                    'error' => $url);
            }

            $this->cover = $url['file']['hashname'];
        }
    }

    public function uploadDocument($file = 'document')
    {
        $dfile = self::Dfile($file);
        if (!$dfile->errornofile) {

            $filedir = 'product/';
            $url = $dfile
                ->sanitize()
                ->moveto($filedir);

            if (!$url['success']) {
                return array('success' => false,
                    'error' => $url);
            }

            $this->document = $url['file']['hashname'];
        }

    }

    public function srcCover()
    {
        return Dfile::show($this->cover, 'product');
    }

    public function showCover()
    {
        $url = Dfile::show($this->cover, 'product');
        return Dfile::fileadapter($url, $this->cover);
    }
    public function srcDocument()
    {
        return Dfile::show($this->document, 'product');
    }

    public function showDocument()
    {
        $url = Dfile::show($this->document, 'product');
        return Dfile::fileadapter($url, $this->document);
    }

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param string $document
     */
    public function setDocument( $document)
    {
        //$this->document = $document;
    }

    public function getCover()
    {
        return $this->cover;
    }

    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    public function getSommary()
    {
        return $this->sommary;
    }

    public function setSommary($sommary)
    {
        $this->sommary = $sommary;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int|string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDoc( $document)
    {
        $this->document = $document;
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

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'namecanonical' => $this->namecanonical,
            'nameseo' => $this->nameseo,
            'reference' => $this->reference,
            'priceofsale' => $this->priceofsale,
            'description' => $this->description,
            'cover' => $this->cover,
            'sommary' => $this->sommary,
            'document' => $this->document,
            'courses' => $this->courses,
        ];
    }

    public function __delete($exec = true)
    {
        Dfile::deleteFile($this->cover, "product/");
        Dfile::deleteFile($this->document, "product/");
        return parent::__delete($exec); // TODO: Change the autogenerated stub
    }

}
