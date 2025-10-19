<?php 

            
use dclass\devups\Controller\Controller;

class CategoryController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = CategoryTable::init(new Category())->buildindextable();

        self::$jsfiles[] = Category::classpath('Resource/js/categoryCtrl.js');

        $this->entitytarget = 'Category';
        $this->title = "Manage Category";
        
        $this->renderListView();

    }

    public function managerView()
    {
        self::$cssfiles[] = Dv_image::classpath('Resource/css/image.css');
        self::$jsfiles[] = __admin .('plugins/vue.min.js');
        self::$jsfiles[] = Category::classpath('Resource/js/category2Manager.js');

        Genesis::renderView("admin.manager", []);
    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => CategoryTable::init(new Category())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $category = new Category();
        $action = Category::classpath("services.php?path=category.create");
        if ($id) {
            $action = Category::classpath("services.php?path=category.update&id=" . $id);
            $category = Category::find($id);
        }

        return ['success' => true,
            'form' => CategoryForm::init($category, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($category_form = null ){
        extract($_POST);

        $category = $this->form_fillingentity(new Category(), $category_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'category' => $category,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $category->__insert();
        return 	array(	'success' => true,
                        'category' => $category,
                        'tablerow' => CategoryTable::init()->router()->getSingleRowRest(Category::find($id, Dvups_lang::first()->id)),
                        'detail' => '');

    }

    public function uploadimageAction($id){

        $ci = new Category_image();
        $ci->uploadImage("image");
        $ci->category = new Category($id);
        $ci->__insert();

        $cis = Category_image::where("category_id", $id)->__getAll();

        $success = true;
        return compact("success", "cis", "ci");

    }

    public function updateAction($id, $category_form = null){
        extract($_POST);
            
        $category = $this->form_fillingentity(new Category($id), $category_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'category' => $category,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }

//        $category->uploadCover();
//        $category->uploadBanner();
//        $category->uploadIcon();

        $category->__update();

        return 	array(	'success' => true,
                        'category' => $category,
                        'tablerow' => CategoryTable::init()->router()->getSingleRowRest(Category::find($id, Dvups_lang::first()->id)),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Category';
        $this->title = "Detail Category";

        $category = Category::find($id);

        $this->renderDetailView(
            CategoryTable::init()
                ->builddetailtable()
                ->renderentitydata($category)
        );

    }
    
    public function deleteAction($id){

        // UPDATE categories SET parents_id =  REPLACE(parents_id, ',', ' ')
        // UPDATE categories SET parents_id =  REPLACE(parents_id, $flight->id.',', '')
        // DELETE categories where  parents_id =  REPLACE(parents_id, '$flight->id', '')
        $flight = Category::find($id);
        // $parent_ids = $flight->getParents_id();
        $option = Request::get("option");

        $dbal = new DBAL();
        if($option == "all"){
            $dbal->executeDbal("DELETE FROM category WHERE parent_id = '".$flight->getId()."' ", []);
            $dbal->executeDbal("DELETE FROM category WHERE '".$flight->getId()."' IN (parents_id) ", []);

            //Category::where("parent_id", $flight->parents_id." ".$flight->id)->delete();
        }else{

            if($flight->getMain())
                $dbal->executeDbal("UPDATE category SET main = 1, parent_id = 0 WHERE parent_id = ".$flight->getId()." ", []);
            elseif ($flight->getParent_id()){

                $dbal->executeDbal("UPDATE category SET parent_id = ".$flight->parent_id." WHERE parent_id = ".$flight->getId()." ", []);
                $dbal->executeDbal("UPDATE category SET parents_id = REPLACE(parents_id, '".$flight->getId().",', '')  WHERE '".$flight->getId()."' IN (parents_id) ", []);
                $dbal->executeDbal("UPDATE category SET parents_id = REPLACE(parents_id, '".$flight->getId()."', '')  WHERE '".$flight->getId()."' IN (parents_id) ", []);

            }
            //UPDATE table
            //SET nom_colonne =  REPLACE(parents_id, '$flight->id', '')
            //Category::where("parents_id", $flight->parents_id." ".$flight->id)->update(["parents_id"=>$flight->parents_id]);

        }

        $result = $flight->__delete();

        return ["success"=>true, "result"=>$result, "option"=> $option];

    }
    

    public function deletegroupAction($ids)
    {

        Category::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
