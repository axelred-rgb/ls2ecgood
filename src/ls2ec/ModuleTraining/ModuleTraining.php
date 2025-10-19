<?php


namespace ls2ec\ModuleTraining;


use Dvups_module;
use Genesis as g;
use LabsreservationFrontController;
use CoursesFrontController;
use User_coursesFrontController;
use User_tokenFrontController;
use PacktokkenController;
use ArticleController;
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
            case 'save.signature':
                g::json_encode((new CoursesFrontController())->saveSignatureCertificate());
                break;
            case 'getuser.course':
                g::json_encode((new User_coursesFrontController())->getUsersHaveNotCertificate());
                break;
            case 'assign.certificate':
                g::json_encode((new User_coursesFrontController())->assignCertificate());
                break;
            case 'revoke.certificate':
                g::json_encode((new User_coursesFrontController())->revokeCertificate());
                break;
            case 'give.user-token':
                g::json_encode((new User_tokenFrontController())->giveToken());
                break;
            case 'save.codepromo':
                g::json_encode((new \CodepromoFrontController())->saveCode());
                break;
            case 'destroy.codepromo':
                g::json_encode((new \CodepromoFrontController())->deleteCode());
                break;
            case 'get.packTokenInformation':
                g::json_encode((new PacktokkenController())->getPackTokkenInformation());
                break;
            case 'savepayment.course':
                g::json_encode((new User_coursesFrontController())->saveCourse());
                break;
            case 'save.article':
                g::json_encode((new ArticleController())->savePost());
                break;
            case 'updatepost.article':
                g::json_encode((new ArticleController())->updatePost());
                break;
            case 'uploadimage.article':
                g::json_encode((new ArticleController())->uploadImageCkeditor());
                break;
            case 'destroy.article':
                g::json_encode((new ArticleController())->deletePost());
                break;
            case 'destroy.reservation':
                g::json_encode((new LabsreservationFrontController())->deleteLabsreservation());
                break;
        }
    }
}