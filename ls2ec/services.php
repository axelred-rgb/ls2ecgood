<?php

global $_start;
$_start = microtime(true);

require __DIR__ . '/header.php';

use Genesis as g;
use Request as R;

global $user;
$treeCtrl = new TreeFrontController();
$treeitemCtrl = new Tree_itemFrontController();
$local_contentCtrl = new Local_contentController();
$dv_imageCtrl = new Dv_imageController();
$instructorCtrl = new InstructorController();
$academyCtrl = new AcademiesController();
$coursesCtrl = new CoursesController();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

(new \spacekola\ModuleUser\ModuleUser())->webservices();
(new \ls2ec\ModuleTraining\ModuleTraining())->webservices();

(new Request('hello'));

switch (Request::get('path')) {

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

    default :
        g::json_encode(["success" => false, "message" => "404 :".Request::get('path')." page note found"]);
        break;
}
