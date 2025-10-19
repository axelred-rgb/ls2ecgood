<?php 

            
use dclass\devups\Controller\Controller;

class ProductController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = ProductTable::init(new Product())->buildindextable();

        self::$jsfiles[] = Product::classpath('Resource/js/productCtrl.js');

        $this->entitytarget = 'Product';
        $this->title = "Manage Product";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => ProductTable::init(new Product())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $product = new Product();
        $action = Product::classpath("services.php?path=product.create");
        if ($id) {
            $action = Product::classpath("services.php?path=product.update&id=" . $id);
            $product = Product::find($id);
        }

        return ['success' => true,
            'form' => ProductForm::init($product, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function formFrontView($id = null)
    {

        $product = new Product();
        $action = __env.("services.php?path=product.create&tablemodel=resource");
        if ($id) {
            $action = __env.("services.php?path=product.update&tablemodel=resource&id=" . $id);
            $product = Product::find($id);
        }

        return ['success' => true,
            'form' => Genesis::getView("board.manageResource.form", compact("product", "action")),
        ];
    }

    public function createAction($product_form = null ){
        extract($_POST);

        $product = $this->form_fillingentity(new Product(), $product_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'product' => $product,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $product->__insert();
        return 	array(	'success' => true,
                        'product' => $product,
                        'tablerow' => ProductTable::init()->router()->getSingleRowRest($product),
                        'detail' => '');

    }

    public function updateAction($id, $product_form = null){
        extract($_POST);
            
        $product = $this->form_fillingentity(new Product($id), $product_form);

        if ( $this->error ) {
            return 	array(	'success' => false,
                            'product' => $product,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        $product->__update();
        return 	array(	'success' => true,
                        'product' => $product,
                        'tablerow' => ProductTable::init()->router()->getSingleRowRest($product),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Product';
        $this->title = "Detail Product";

        $product = Product::find($id);

        $this->renderDetailView(
            ProductTable::init()
                ->builddetailtable()
                ->renderentitydata($product)
        );

    }
    
    public function deleteAction($id){
    
        $product = Product::find($id);
        $product->__delete();
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Product::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

    

    public function updatecart(){
        $index = Request::get('index');
        $qte = Request::get('qte');
        $carts = unserialize($_SESSION['CART']);
        $carts[$index][1] = $qte;
        $i =0;
        $totalpanier = 0;
        foreach ($carts as $cart){
            if(!is_null($carts[$i])) {
                $totalpanier += $carts[$i][1];
                $i++;
            }
        }

        $_SESSION['CART'] = serialize($carts);
        $_SESSION['TOTALCART'] = $totalpanier;

        return array('success' => true,
            'panier' => $totalpanier,);
    }

    public function removetocart(){
        $index = Request::get('index');
        $carts = unserialize($_SESSION['CART']);
        $carts[$index] = null;
        $totalpanier = 0;
        $i=0;
        foreach ($carts as $key=>$cart){
            //var_dump($carts[$key]);
            if(!is_null($carts[$key])){
                //var_dump($carts[$key][1]);
                $totalpanier += $carts[$key][1];
                $i++;
            }

        }

        $_SESSION['CART'] = serialize($carts);
        $_SESSION['TOTALCART'] = $totalpanier;
        return array('success' => true,'panier' => $totalpanier,);
    }

    public function addTocart(){
        if(isset($_POST['produitsid']) && isset($_POST['qte'])){
            if($_POST['qte'] > 0){
                $produit = Product::find($_POST['produitsid']);
                if($produit){
                    $totalpanier = 0;
                    if(isset($_SESSION['CART'])){
                        $carts = unserialize($_SESSION['CART']);
                        $find = false;
                        $i = 0;
                        //var_dump($carts);
                        foreach ($carts as $cart){

                            if(!is_null($cart)){
                                if($cart[2] == $_POST['produitsid']){
                                    $cart[1] = (int)$cart[1] + (int)$_POST['qte'];
                                    $find = true;
                                    $carts[$i][1] = $cart[1];

                                }
                            }

                            if(!is_null($carts[$i])){
                                $totalpanier += $carts[$i][1];
                            }
                            $i++;
                        }
                        if(!$find){
                            $data = [$produit, (int)$_POST['qte'], $_POST['produitsid']];

                            array_push($carts, $data);
                            $totalpanier += (int)$_POST['qte'];
                        }
                        $_SESSION['TOTALCART'] = $totalpanier;
                        $_SESSION['CART'] = serialize($carts);
                    }
                    else{
                        $data = [[$produit, (int)$_POST['qte'], $_POST['produitsid']]];

                        $totalpanier = (int)$_POST['qte'];
                        $_SESSION['CART'] = serialize($data);
                        $_SESSION['TOTALCART'] = $totalpanier;
                    }
                    return array('success' => true,
                        'panier' => $totalpanier,
                        'detail' => t('Ce produit a été ajouté à votre panier'));
                }
                else{
                    return array('success' => false,
                        'detail' => t('Produit inexistant'));
                }
            }
            else{
                return array('success' => false,
                    'detail' => t('Quantité invalide'));
            }
        }
    }

    public function listRessource($id = null){
        $products = Product::where("status", 1)->get();
        $result = $products;
        if($id !== null){
            $result = [];
            foreach ($products as $p){
                $paiement = Paiement::where('user_id',$id)->andwhere('product_id',$p->getId())->count();
                $prod = Productpaiement::where('paiement.user_id',$id)->andwhere('this.product_id',$p->getId())->count();
                if($prod == 0 && $paiement == 0){
                    array_push($result , $p);
                }
            }
        }
        return array('success' => true,
            'ressource' => $result);

    }

    public function listAllRessource(){
        $products = Product::where("status", 1)->get();
        
        return array('success' => true,
            'ressource' => $products);

    }





}
