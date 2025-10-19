<?php 

            
use dclass\devups\Controller\Controller;
use Dompdf\Dompdf;

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

    public function savePost(){
        
        $article = $this->form_fillingentity(new Article(), null);
        
        $article->setTitle($_POST['titre']);
        $article->setTitle_en($_POST['title']);
        $article->setResume($_POST['resume']);
        $article->setResume_en($_POST['summary']);
        $article->setDescription($_POST['descriptionFr']);
        $article->setDescription_en($_POST['descriptionEn']);
        
        $image_name = $_FILES["image"]["name"];
        $allowed_extensions = array("png", "jpg", "jpeg");
        $image_extension = explode(".", $image_name);
        
        $extension = end($image_extension); // which is png
        if(!in_array($extension, $allowed_extensions)){
            return 	array(	'success' => false,
                    'message'=> 'tt("fichier invalide")',
                    'detail' => 'image');
        }

        $a = $article->uploadImage('image');
        $article->__insert();
        return 	array(	'success' => true,
                        'article' => $article,
                        
                        'detail' => 'ok');
    }

    public function updatePost(){
        $article = Article::find($_POST['id']);
        $article->setTitle($_POST['titre']);
        $article->setTitle_en($_POST['title']);
        $article->setResume($_POST['resume']);
        $article->setResume_en($_POST['summary']);
        $article->setDescription($_POST['descriptionFr']);
        $article->setDescription_en($_POST['descriptionEn']);
        
        if(isset($_FILES['image'])){
            $image_name = $_FILES["image"]["name"];
            $allowed_extensions = array("png", "jpg", "jpeg");
            $image_extension = explode(".", $image_name);
            
            $extension = end($image_extension); // which is png
            if(!in_array($extension, $allowed_extensions)){
                return 	array(	'success' => false,
                        'message'=> 'tt("fichier invalide")',
                        'detail' => 'image');
            }
           
            $a = $article->uploadImage('image');
        }
       
        $article->__update();
        return 	array(	'success' => true,
                        'article' => $article,
                        
                        'detail' => 'ok');
    }

    public function uploadImageCkeditor(){
        $target_dir = "web/assets/uploads/";
        $name = time().uniqid(rand());
        $target_file = $target_dir .$name. basename($_FILES["upload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //$target_file = $target_dir . $name.$imageFileType;

        if ($_FILES["upload"]["size"] > 500000000) {
            $uploadOk = 0;
            return 	array(	'success' => false,
                'data' => tt("Sorry, your file is too large.")
            );

        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "pdf" && $imageFileType != "doc"&& $imageFileType != "txt" ) {
            $uploadOk = 0;
            return 	array(	'success' => false,
                'data' => tt("Extension not supported.")
            );

        }
        else{
            $target_file = $target_dir .$name.'.'.$imageFileType;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return 	array(	'success' => false,
                'data' => tt("Sorry, your file was not uploaded.")
            );
        } else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {

                return
                    array(	'uploaded' => 1,
                        'fileNam' => $target_file,
                        'url' =>  __front.'uploads/'.$name.'.'.$imageFileType);
            } else {

                return 	array(	'success' => false,
                    'data' => tt("Sorry, there was an error uploading your file.")
                );
            }
        }
    }

    public function uploadImageCkeditorLast(){
        $article = new Article();
        $image_name = $_FILES["upload"]["name"];
        $allowed_extensions = array("png", "jpg", "jpeg");
        $image_extension = explode(".", $image_name);
        
        $extension = end($image_extension); 
        if(!in_array($extension, $allowed_extensions)){
            return 	array(	'success' => false,
                    'message'=> tt("fichier invalide"),
                    'detail' => 'image');
        }
        $img = $article->uploadImage('upload');
        //var_dump($_POST);
        //$function_number = $_POST['CKEditorFuncNum'];
        $url = __env.'uploads/article/'.$img['image'];
        //var_dump($url);
        $message = '';
        return 	array(	'uploaded' => 1,
                        'fileNam' => $img['image'],
                        
                        'url' =>  $url);
        
       // echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('$url', '$message');</script>";
        
    }

    public function getPdfFr($id){
        $article = Article::find($id);
        $dompdf = new Dompdf(array('enable_remote' => true));
        $url = __env.'web/assets/';
        
        $html2 = '<html>
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <style>
                        @page { margin: 80px 50px; }
                        #header { position: fixed; left: 0px; top: -80px; right: 0px; height: 40px; text-align: start; }
                        #footer { position: fixed; left: 0px; bottom: -40px; right: 0px; height: 40px; }
                        #footer .page:after { content: counter(page, upper-roman); }
                    </style>
                    </head>
                    <body>
                        <div id="header">
                            <img src="'.$url.'images/logo-training.png">
                        </div>
                        <div id="footer">
                            <img src="'.$url.'images/logo-training.png">
                            <p class="page">Page </p>
                        </div>
                        <div id="content">'.$article->getDescription().'
                        </div>
                    </body>
                </html>';
        
        $dompdf->loadHtml($html2);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $a = $dompdf->stream($article->getTitle()."-LS2EC-POST".".pdf");
    }

    public function deletePost(){
        $id = $_POST['id'];
        $article = Article::where('this.id',$id)->delete();
        return 	array(	'success' => true,
            'detail' => 'ok');
    }

}
