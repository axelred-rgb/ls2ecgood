<?php


namespace ls2ec\ModuleTraining;


use Dvups_module;
use Genesis as g;
use LabsreservationFrontController;
use Request;


class ModuleTraining
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

        //$userCtrl = new User_tokenFrontController();

        (new Request('hello'));

        switch (Request::get('path')) {

            case 'shedule.labs':
                g::json_encode((new LabsreservationFrontController())->sheduleLabs());
                break;
        }
    }
}