<?php

global $_start;
$_start = microtime(true);

require __DIR__ . '/header.php';

use Genesis as g;
use Request as R;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

global $user;
$treeCtrl = new TreeFrontController();
$treeitemCtrl = new Tree_itemFrontController();
$local_contentCtrl = new Local_contentController();
$dv_imageCtrl = new Dv_imageController();
$instructorCtrl = new InstructorController();
$academyCtrl = new AcademiesController();
$coursesCtrl = new CoursesController();
$productCtrl = new ProductController();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

(new \spacekola\ModuleUser\ModuleUser())->webservices();
(new \ls2ec\ModuleTraining\ModuleTraining())->webservices();

(new Request('hello'));

switch (Request::get('path')) {

    case 'product._new':
        g::json_encode($productCtrl->formFrontView());
        break;
    case 'product.create':
        g::json_encode($productCtrl->createAction());
        break;
    case 'product.form':
    case 'product._edit':
        g::json_encode($productCtrl->formFrontView(R::get("id")));
        break;
    case 'product.update':
        g::json_encode($productCtrl->updateAction(R::get("id")));
        break;
    case 'product._delete':
        g::json_encode($productCtrl->deleteAction(R::get("id")));
        break;

    case 'hello':
        g::json_encode(["success" => true, "message" => "hello devups you made your first apicall"]);
        break;
    case 'create':
        g::json_encode((new dclass\devups\Controller\Controller())->createCore());
        break;
    case 'upload':
        g::json_encode((new dclass\devups\Controller\Controller())->uploadCore(Request::get("id")));
        break;
    case 'update':
        g::json_encode((new dclass\devups\Controller\Controller())->updateCore(Request::get("id")));
        break;
    case 'delete':
        g::json_encode((new dclass\devups\Controller\Controller())->deleteCore(Request::get("id")));
        break;
    case 'detail':
        g::json_encode((new dclass\devups\Controller\Controller())->detailCore(Request::get("id")));
        break;
    case 'lazyloading':
        g::json_encode((new dclass\devups\Controller\Controller())->ll());
        break;

    case 'add.tocart':
        g::json_encode((new ProductController())->addTocart());
        break;
    case 'updateto.cart':
        g::json_encode((new ProductController())->updatecart());
        break;
    case 'deleteto.cart':
        g::json_encode((new ProductController())->removetocart());
        break;

    case 'get.courses':
        g::json_encode((new User_subscriptionController())->mycourse(Request::get("user_id")));
        break;

    case 'get.exercices':
        g::json_encode((new User_subscriptionController())->myexercices(Request::get("course_id")));
        break;

    case 'get.allexercices':
        g::json_encode((new User_subscriptionController())->allexercices());
        break;

    case 'get.allressources':
        g::json_encode((new ProductController())->listAllRessource());
        break;
    case 'get.ressources':
        g::json_encode((new ProductController())->listRessource(Request::get("user_id")));
        break;

    case 'get.moodlecourse':
        g::json_encode((new CoursesController())->generatemoodleurl());
        break;
    
    

    default :
        g::json_encode(["success" => false, "message" => "404 :".Request::get('path')." page note found"]);
        break;
}
