<?php

use dclass\devups\Datatable\Lazyloading;

class CodepromoFrontController extends CodepromoController
{

    public function ll($next = 1, $per_page = 10)
    {

        $ll = new Lazyloading();
        $ll->lazyloading(new Codepromo());
        return $ll;

    }

    public function createAction($codepromo_form = null)
    {
        $rawdata = \Request::raw();
        $codepromo = $this->hydrateWithJson(new Codepromo(), $rawdata["codepromo"]);


        $id = $codepromo->__insert();
        return array('success' => true,
            'codepromo' => $codepromo,
            'detail' => '');

    }

    public function updateAction($id, $codepromo_form = null)
    {
        $rawdata = \Request::raw();

        $codepromo = $this->hydrateWithJson(new Codepromo($id), $rawdata["codepromo"]);


        $codepromo->__update();
        return array('success' => true,
            'codepromo' => $codepromo,
            'detail' => '');

    }


    public function detailAction($id)
    {

        $codepromo = Codepromo::find($id);

        return array('success' => true,
            'codepromo' => $codepromo,
            'detail' => '');

    }

    public function saveCode()
    {
        if (isset($_POST['code']) && isset($_POST['value'])) {
            $codepromo = new Codepromo();
            $codepromo->setCode($_POST['code']);
            $codepromo->setValeur($_POST['value']);
            $codepromo->setNbremonth($_POST['nbremonth']);
            $codepromo->__insert();
            return array('success' => true,
                'code_promo' => $codepromo,
                'detail' => '');
        } else {
            return array('success' => false,
                'detail' => 'Parametre manquant');
        }
    }

    public function deleteCode()
    {
        $id = $_POST['id'];
        $code = Codepromo::where('this.id', $id)->delete();
        return array('success' => true,
            'detail' => 'ok');
    }


}
