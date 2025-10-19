<?php
//ModuleCatalog

require '../../../admin/header.php';

// verification token
//

use Genesis as g;
use Request as R;

header("Access-Control-Allow-Origin: *");


$categoryCtrl = new CategoryController();
$productCtrl = new ProductController();

(new Request('hello'));

switch (R::get('path')) {

    case 'category._new':
        g::json_encode($categoryCtrl->formView());
        break;
    case 'category.create':
        g::json_encode($categoryCtrl->createAction());
        break;
    case 'category.uploadimage':
        g::json_encode($categoryCtrl->uploadimageAction(Request::get("id")));
        break;
    case 'category.form':
        g::json_encode($categoryCtrl->formView(R::get("id")));
        break;
    case 'category.update':
        g::json_encode($categoryCtrl->updateAction(R::get("id")));
        break;
    case 'category._show':
        $categoryCtrl->detailView(R::get("id"));
        break;
    case 'category._delete':
        g::json_encode($categoryCtrl->deleteAction(R::get("id")));
        break;
    case 'category._deletegroup':
        g::json_encode($categoryCtrl->deletegroupAction(R::get("ids")));
        break;
    case 'category.datatable':
        g::json_encode($categoryCtrl->datatable(R::get('next'), R::get('per_page')));
        break;

    case 'product._new':
        g::json_encode($productCtrl->formView());
        break;
    case 'product.create':
        g::json_encode($productCtrl->createAction());
        break;
    case 'product.form':
        g::json_encode($productCtrl->formView(R::get("id")));
        break;
    case 'product.update':
        g::json_encode($productCtrl->updateAction(R::get("id")));
        break;
    case 'product._show':
        $productCtrl->detailView(R::get("id"));
        break;
    case 'product._delete':
        g::json_encode($productCtrl->deleteAction(R::get("id")));
        break;
    case 'product._deletegroup':
        g::json_encode($productCtrl->deletegroupAction(R::get("ids")));
        break;
    case 'product.datatable':
        g::json_encode($productCtrl->datatable(R::get('next'), R::get('per_page')));
        break;

    default:
        g::json_encode(['success' => false, 'error' => ['message' => "404 : action note found", 'route' => R::get('path')]]);
        break;
}

