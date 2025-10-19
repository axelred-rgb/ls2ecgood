<?php 

            
use dclass\devups\Controller\Controller;

class ReviewsController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = ReviewsTable::init(new Reviews())->buildindextable();

        self::$jsfiles[] = Reviews::classpath('Resource/js/reviewsCtrl.js');

        $this->entitytarget = 'Reviews';
        $this->title = "Manage Reviews";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => ReviewsTable::init(new Reviews())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $reviews = new Reviews();
        $action = Reviews::classpath("services.php?path=reviews.create");
        if ($id) {
            $action = Reviews::classpath("services.php?path=reviews.update&id=" . $id);
            $reviews = Reviews::find($id);
        }

        return ['success' => true,
            'form' => ReviewsForm::init($reviews, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($reviews_form = null ){
        extract($_POST);

        $reviews = $this->form_fillingentity(new Reviews(), $reviews_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'reviews' => $reviews,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $reviews->__insert();
        return 	array(	'success' => true,
                        'reviews' => $reviews,
                        'tablerow' => ReviewsTable::init()->router()->getSingleRowRest($reviews),
                        'detail' => '');

    }

    public function updateAction($id, $reviews_form = null){
        extract($_POST);
            
        $reviews = $this->form_fillingentity(new Reviews($id), $reviews_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'reviews' => $reviews,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $reviews->__update();
        return 	array(	'success' => true,
                        'reviews' => $reviews,
                        'tablerow' => ReviewsTable::init()->router()->getSingleRowRest($reviews),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Reviews';
        $this->title = "Detail Reviews";

        $reviews = Reviews::find($id);

        $this->renderDetailView(
            ReviewsTable::init()
                ->builddetailtable()
                ->renderentitydata($reviews)
        );

    }
    
    public function deleteAction($id){
    
        Reviews::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Reviews::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

}
