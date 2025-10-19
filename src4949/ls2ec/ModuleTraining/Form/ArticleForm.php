<?php 

        
use Genesis as g;

class ArticleForm extends FormManager{

    public $article;

    public static function init(\Article $article, $action = ""){
        $fb = new ArticleForm($article, $action);
        $fb->article = $article;
        return $fb;
    }

    public function buildForm()
    {
    
        
            $this->fields['title'] = [
                "label" => t('article.title'), 
			"type" => FORMTYPE_TEXT, 
                "value" => $this->article->getTitle(), 
        ];

            $this->fields['title_en'] = [
                "label" => t('article.title_en'),
			"type" => FORMTYPE_TEXT,
                "value" => $this->article->getTitle_en(),
        ];

            $this->fields['image'] = [
                "label" => t('article.image'), 
		"type" => FORMTYPE_FILE,
            "filetype" => FILETYPE_IMAGE, 
            "value" => $this->article->getImage(),
            "src" => $this->article->showImage(), 
        ];

            $this->fields['resume'] = [
                "label" => t('article.resume'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->article->getResume(), 
        ];

            $this->fields['resume_en'] = [
                "label" => t('article.resume_en'),
			"type" => FORMTYPE_TEXTAREA,
                "value" => $this->article->getResume_en(),
        ];

        $this->fields['description'] = [
                "label" => t('article.description'), 
			"type" => FORMTYPE_TEXTAREA, 
                "value" => $this->article->getDescription(),
        ];

        $this->fields['description_en'] = [
                "label" => t('article.description_en'),
			"type" => FORMTYPE_TEXTAREA,
                "value" => $this->article->getDescription_en(),
        ];


        $this->addjs(__admin.('plugins/tinymce.min'));
        $this->addjs(Article::classpath('Resource/js/articleForm'));
        $this->addcss(Article::classpath('Resource/css/style'));

        return  $this;
    
    }

    public static function renderWidget($id = null, $action = "create")
    {
        Genesis::renderView("article.formWidget", self::getFormData($id, $action));
    }
    
}
    