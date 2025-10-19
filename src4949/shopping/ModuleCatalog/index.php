<?php
//ModuleCatalog

require '../../../admin/header.php';

// move comment scope to enable authentication
if (!isset($_SESSION[ADMIN]) and $_GET['path'] != 'connexion') {
    header("location: " . __env . 'admin/login.php');
}

global $viewdir, $moduledata;
$viewdir[] = __DIR__ . '/Resource/views';

$moduledata = Dvups_module::init('ModuleCatalog');


$categoryCtrl = new CategoryController();
$productCtrl = new ProductController();


(new Request('layout'));

switch (Request::get('path')) {

    case 'layout':
        Genesis::renderView("admin.overview");
        break;

    case 'category/index':
        $categoryCtrl->listView();
        break;
    case 'category/manager':
        $categoryCtrl->managerView();
        break;

    case 'product/index':
        $productCtrl->listView();
        break;
    case 'product/manager':
        $productCtrl->manageView();
        break;



    default:
        Genesis::renderView('404', ['page' => Request::get('path')]);
        break;
}
    
    