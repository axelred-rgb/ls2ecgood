<?php


namespace spacekola\ModuleCatalog;


use dclass\devups\Controller\ModuleController;
use Genesis as g;
use Request;

class ModuleCatalog // extends ModuleController
{

    public $moduledata;

    public function __construct()
    {

    }

    public function web()
    {

        $this->moduledata = Dvups_module::init('ModuleData');


        (new Request('layout'));

        switch (Request::get('path')) {

            case 'layout':
                g::renderView("overview");
                break;

            default:
                g::renderView('404', ['page' => Request::get('path')]);
                break;
        }
    }

    public function services()
    {

        (new Request('hello'));

        switch (Request::get('path')) {

            default:
                g::json_encode(['success' => false, 'error' => ['message' => "404 : action note found", 'route' => R::get('path')]]);
                break;
        }
    }

    public function webservices()
    {

        (new Request('hello'));

        switch (Request::get('path')) {

        }
    }

}