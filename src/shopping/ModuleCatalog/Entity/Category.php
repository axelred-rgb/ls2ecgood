<?php
// user \dclass\devups\model\Model;

/**
 * @Entity @Table(name="category")
 * */
class Category extends Model implements JsonSerializable
{

    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     * */
    protected $id;
    /**
     * @Column(name="position", type="integer" , nullable=true )
     * @var string
     **/
    protected $position;
    /**
     * @Column(name="favicon", type="string" , length=255 , nullable=true)
     * @var string
     **/
    protected $favicon;
    /**
     * @Column(name="parent_id", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $parent_id;

    /**
     * @Column(name="name", type="string" , length=255 )
     * @var string
     **/
    protected $name;
    /**
     * @Column(name="description", type="text" , nullable=true )
     * @var string
     **/
    protected $description;
    /**
     * @Column(name="parents_id", type="string", length=255  , nullable=true)
     * @var string
     **/
    protected $parents_id;
    /**
     * @Column(name="slug", type="string" , length=255 , nullable=true)
     * @var string
     **/
    protected $slug;
    /**
     * @Column(name="main", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $main;
    /**
     * @Column(name="status", type="integer"  , nullable=true)
     * @var integer
     **/
    protected $status;

    /**
     * @Column(name="banner", type="string", length=155  , nullable=true)
     * @var string
     **/
    protected $banner;
    /**
     * @Column(name="cover", type="string", length=255  , nullable=true)
     * @var string
     **/
    protected $cover;
    /**
     * @Column(name="icon", type="string", length=155  , nullable=true)
     * @var string
     **/
    protected $icon;


    public function __construct($id = null)
    {

//        $this->dvtranslate = true;
//        $this->dvtranslated_columns = ["name", "description"];
        $this->dvsoftdelete = true;
        if ($id) {
            $this->id = $id;
        }

    }

    public static $filedir = "category";

    public function uploadCover($file = "cover")
    {
        self::$filedir .= "/cover/";
        $dfile = self::Dfile($file);
        if (!$dfile->errornofile) {
            Dfile::deleteFile($this->cover, self::$filedir);

            $url = $dfile
                ->addresize([50], "50_", self::$filedir, false)
                ->addresize([120], "120_", self::$filedir, false)
                ->setfile_name($this->name)
                ->sanitize()
                ->moveto(self::$filedir);

            if (!$url['success']) {
                return array('success' => false,
                    'error' => $url);
            }

            $this->cover = $url['file']["hashname"];

            $this->__update([
                "cover"=>$this->cover
            ]);

        }

        //dv_dump($this->cover);

    }

    public function uploadIcon($file = "icon")
    {
        self::$filedir .= "/icon/";
        $dfile = self::Dfile($file);
        if (!$dfile->errornofile) {
            Dfile::deleteFile($this->icon, self::$filedir);

            $url = $dfile->setfile_name($this->name)
                ->sanitize()
                ->moveto(self::$filedir);

            if (!$url['success']) {
                return array('success' => false,
                    'error' => $url);
            }

            $this->icon = $url['file']["hashname"];

        }
    }

    public function uploadBanner($file = "banner")
    {
        self::$filedir .= "/cover/";
        $dfile = self::Dfile($file);
        if (!$dfile->errornofile) {
            Dfile::deleteFile($this->banner, self::$filedir);

            $url = $dfile
                ->addresize([50], "50_", self::$filedir, false)
                ->addresize([120], "120_", self::$filedir, false)
                ->setfile_name($this->name)
                ->sanitize()
                ->moveto(self::$filedir);

            if (!$url['success']) {
                return array('success' => false,
                    'error' => $url);
            }

            $this->icon = $url['file']["hashname"];

        }
    }

    public function showCover()
    {
        $url = Dfile::show($this->cover, self::$filedir . "/cover/");
        return Dfile::fileadapter($url, $this->cover);
    }

    public function srcCover()
    {
        return Dfile::show($this->cover, self::$filedir . "/cover/");
    }

    public function srcBanner()
    {
        return Dfile::show($this->banner, self::$filedir . "/banner/");
    }

    public function srcIcon()
    {
        return Dfile::show($this->icon, self::$filedir . "/icon/");
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param string $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;
    }

    /**
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNamelang()
    {
        return $this->name;
        return $this->__gettranslate("name", null, $this->name);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getFavicon()
    {
        return $this->favicon;
    }

    public function setFavicon($favicon)
    {
        $this->favicon = $favicon;
    }

    public function getParent_id()
    {
        return $this->parent_id;
    }

    public function setParent_id($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getNameseo()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = \DClass\lib\Util::urlsanitize($slug);
    }

    public function getMain()
    {
        return $this->main;
    }

    public function setMain($main)
    {
        $this->main = $main;
    }


    public function jsonSerialize()
    {

        if ($dataset = parent::apimapper())
            return $dataset;

        if (Request::get("main:eq")){
            return [
                'id' => $this->id,
                'name' => $this->name,
                'slug' => $this->slug,
                'children' => $this->getChildren(),
            ];
        }

        return [
            // 'images' => Category_image::where($this)->__getAll(),
            'id' => $this->id,
            'name' => $this->name,
            'position' => intval($this->position),
//            'banner' => $this->srcBanner(),
//            'cover' => $this->srcCover(),
//            'icon' => $this->icon,
            'slug' => $this->slug,
            'parents_id' => $this->parents_id,
            'main' => (int)$this->main,
            'parent_id' => (int)$this->parent_id,
            'children' => (int)self::select()->where("parent_id", $this->id)->count(),
        ];
    }

    public function getChildren($category = null, $idlang = null)
    {
        if (!$category)
            $category = new Category();

        if (!$idlang)
            $idlang = Dvups_lang::currentLang()->getId();

        return Category::select()
            ->setLang($idlang)
            ->where("this.parent_id", $this->id)
            //->andwhere("this.id", "!=", $category->getId())
            ->orderby("name")
            ->get();
    }

    public static function children($id, $id_lang = null)
    {
        return Category::select()->setlang($id_lang)
            ->where("this.parent_id", $id);
    }

    /**
     * @param null $idp
     * @return Category
     */
    public function getParent($idp = null, $breakcumth = [])
    {
        if (!$idp)
            $idp = $this->parent_id;

        $categoryparent = Category::find($idp);
        if ($idp = $categoryparent->getParent_id())
            $breakcumth[] = $this->getParent($idp);
        else
            $breakcumth[] = $categoryparent;
            return $categoryparent;
    }

    public static $breadcrumb = [];
    /**
     * @param null $idp
     * @return Category
     */
    public function buildBreadcrumb($idp, $breadcrumb = [])
    {

        if(!$idp)
            return;

        $categoryparent = Category::find($idp);
        self::$breadcrumb[] = $categoryparent;

        if ($idp = $categoryparent->getParent_id()) {
            $categoryparent->buildBreadcrumb($idp, $breadcrumb);
        }

    }
    public function getBreadcrumb($breadcrumb = [])
    {

        $this->buildBreadcrumb($this->getParent_id(), $breadcrumb);
        for ($i = count(Category::$breadcrumb) - 1; $i >= 0; $i--){
            $cat = Category::$breadcrumb[$i];
            $breadcrumb["catalog/".$cat->getNameseo()] = $cat->name;
        }
        $breadcrumb["catalog/".$this->getNameseo()] = $this->name;

        return $breadcrumb;
    }

    public function collectChildren($limit = 10)
    {
        $count = self::select()->where("parent_id", $this->id)->count();
        if ($count)
            return self::select()
                ->setLang(Dvups_lang::currentLang()->id)->where("parent_id", $this->id)
                ->limit($limit)
                ->__getAll();

        return [];

    }

    public static function urlsanitize($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
        $str = str_replace(' ', '-', $str); // supprime les autres caractères

        return strtolower($str);
    }

    public function setParents_id($parent_idsarray)
    {

        /*if ($parent_idsarray) {
            $this->parents_id = implode(" ", array_keys($parent_idsarray));
        }*/
    }

    public function getParents_id()
    {

        if (!$this->parents_id)
            return false;

        $returns = [];
        $arrays = explode(' ', $this->parents_id);
        foreach ($arrays as $val) {
            $returns[$val] = $val;
        }

        return $returns;

    }

    public function getParentsCatTree()
    {
        $categorytree = [];
        if ($this->parents_id)
            $categorytree = Category::whereIn("id", explode(",", $this->parents_id))->get();

        return $categorytree;
    }

    public function ofSameTree()
    {
        $categoryparent = Category::find($this->parent_id);
        return $categoryparent->collectChildren(25);
    }

    public static function getmaincategory($id_lang = null)
    {
        return Category::where("main", 1)
            ->setLang(Dvups_lang::currentLang()->id)
            ->orderby("category_lang.name")
            ->setLang($id_lang)
            ->get();
    }
    public static function maincategory($id_lang = null)
    {
        return Category::where("main", 1)
            ->setLang($id_lang)
            ->orderby("category_lang.name")
            ->setLang($id_lang);
    }

}
