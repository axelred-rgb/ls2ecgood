<?php 

            
use dclass\devups\Controller\Controller;

class ArticleController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = ArticleTable::init(new Article())->buildindextable();

        self::$jsfiles[] = Article::classpath('Resource/js/articleCtrl.js');

        $this->entitytarget = 'Article';
        $this->title = "Manage Article";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => ArticleTable::init(new Article())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $article = new Article();
        $action = Article::classpath("services.php?path=article.create");
        if ($id) {
            $action = Article::classpath("services.php?path=article.update&id=" . $id);
            $article = Article::find($id);
        }

        return ['success' => true,
            'form' => ArticleForm::init($article, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($article_form = null ){
        extract($_POST);

        $article = $this->form_fillingentity(new Article(), $article_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'article' => $article,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $article->__insert();
        return 	array(	'success' => true,
                        'article' => $article,
                        'tablerow' => ArticleTable::init()->router()->getSingleRowRest($article),
                        'detail' => '');

    }

    public function updateAction($id, $article_form = null){
        extract($_POST);
            
        $article = $this->form_fillingentity(new Article($id), $article_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'article' => $article,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $article->__update();
        return 	array(	'success' => true,
                        'article' => $article,
                        'tablerow' => ArticleTable::init()->router()->getSingleRowRest($article),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Article';
        $this->title = "Detail Article";

        $article = Article::find($id);

        $this->renderDetailView(
            ArticleTable::init()
                ->builddetailtable()
                ->renderentitydata($article)
        );

    }
    
    public function deleteAction($id){
    
        Article::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Article::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
