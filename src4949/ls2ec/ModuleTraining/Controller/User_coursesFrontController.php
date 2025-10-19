<?php

use Dompdf\Dompdf;


class User_coursesFrontController extends User_coursesController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new User_courses());
            return $ll;

    }

    public function createAction($user_courses_form = null ){
        $rawdata = \Request::raw();
        $user_courses = $this->hydrateWithJson(new User_courses(), $rawdata["user_courses"]);
 

        
        $id = $user_courses->__insert();
        return 	array(	'success' => true,
                        'user_courses' => $user_courses,
                        'detail' => '');

    }

    public function updateAction($id, $user_courses_form = null){
        $rawdata = \Request::raw();
            
        $user_courses = $this->hydrateWithJson(new User_courses($id), $rawdata["user_courses"]);

                  
        
        $user_courses->__update();
        return 	array(	'success' => true,
                        'user_courses' => $user_courses,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $user_courses = User_courses::find($id);

        return 	array(	'success' => true,
                        'user_courses' => $user_courses,
                        'detail' => '');
          
    }

    public function assignCertificate(){
        $courseid = $_POST['courseid'];
        $userid = $_POST['userid'];
        $user_courses = User_courses::where('courses_id',$courseid)
            ->andwhere('certificateavailable','!=',1)
            ->andwhere('this.user_id', $userid)
            ->__getAll();
        $user_course = $user_courses[0];
        $user_course->setCertificateAvailable(1);
        $user_course->setCertificateDate(date("Y-m-d"));
        $user_course->__update();
        return   array(  'success' => true,
            'user_courses' => $user_course,
            'detail' => 'ok');

    }

    public function revokeCertificate(){
        $id = $_POST['id'];
        $user_course = User_courses::find($id);
        $user_course->setCertificateAvailable(0);
        $user_course->setCertificateDate(null);
        $user_course->__update();
        return   array(  'success' => true,
            'user_courses' => $user_course,
            'detail' => 'ok');

    }

    public function generateInvoice($id){
        $paiement = Paiement::find($id);

        // instantiate and use the dompdf class

        $dompdf = new Dompdf(array('enable_remote' => true));
        $url = __env.'web/assets/';

        $ht = $paiement->getMontant() / 1.2;
        $tva = $paiement->getTva();
        $priceunit = 0;
        $priceunitmois = '';
        $priceunitannee = '';
        $url = __env.'web/assets/';
        if($paiement->getNbremonth() < 12){
            $priceunit  = $paiement->getUnitprice('check').' €/ mois';
            $priceunitmois = $priceunit;
        }
        else{
            $priceunit = $paiement->getUnitprice('check');
//            $priceunitannee = $priceunit.' €/ ans';
            $priceunitmois = $priceunit.' €/ ans';
        }

        $html2 = Genesis::getView('layout.facturecours',compact('paiement','priceunitmois','url'));

        $dompdf->loadHtml($html2);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($paiement->getUser()->firstname."-".$paiement->getUser()->lastname."-LS2EC-INVOICE".".pdf");


    }


    public function generateInvoiceaffiliation($id){
        $sessionp = Sessioncodepromo::find($id);

        $code = Codepromo::find($sessionp->getCodepromo()->getId());
        $sessionO = Sessionpaiement::find($sessionp->getSessionpaiement()->getId());


        if($sessionp->getIspacekola() == 1){
            $user = new User();
            $user->setFirstname('Spacekola');
            $user->setLastname('spacekola');
            $user->setEmailnew('infos@spacekola.com');
        }
        else{
            $user = User::find($code->getUser()->getId());
        }
        // instantiate and use the dompdf class

        $dompdf = new Dompdf(array('enable_remote' => true));
        $url = __env.'web/assets/';
        $a = 'this.updated_at';
        $date  =  $code->$a;
        $numero = $code->getId().''.strtotime($date);
        $designation = t("Paiement des frais d'affiliation");
        $session = $sessionO->getName();
        $montant = $sessionp->getMontant();



        $html2 = Genesis::getView('layout.factureaffiliation',compact('montant','date','session','designation','numero','user','url'));

        $dompdf->loadHtml($html2);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($user->getFirstname()."-".$user->getLastname()."-LS2EC-INVOICE-AFFILIATION".".pdf");


    }
    public function generateInvoice49($id){
        $paiement = Paiement::find($id);

        // instantiate and use the dompdf class

        $dompdf = new Dompdf(array('enable_remote' => true));
        $url = __env.'web/assets/';

        $ht = $paiement->getMontant() / 1.2;
        $tva = $paiement->getTva();
        $priceunit = 0;
        $priceunitmois = '';
        $priceunitannee = '';
        $url = __env.'web/assets/';
        if($paiement->getNbremonth() < 12){
            $priceunit  = $paiement->getUnitprice('check').' €/ mois';
            $priceunitmois = $priceunit;
        }
        else{
            $priceunit = $paiement->getUnitprice('check');
//            $priceunitannee = $priceunit.' €/ ans';
            $priceunitmois = $priceunit.' €/ ans';
        }

        $html2 = '<!DOCTYPE html>
                    <html>
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                            <title>Invoice</title>
                            <style type="text/css">
                                
                                @page {
                                    margin-top: 1cm;
                                    margin-bottom: 3cm;
                                    margin-left: 2cm;
                                    margin-right: 2cm;
                                }
                                
                                h2 {
                                    font-size: 14pt;
                                }
                                h3, h4 {
                                    font-size: 9pt;
                                }
                                ol,
                                ul {
                                    list-style: none;
                                    margin: 0;
                                    padding: 0;
                                }
                                li,
                                ul {
                                    margin-bottom: 0.75em;
                                }
                                p {
                                    margin: 0;
                                    padding: 0;
                                }
                                p + p {
                                    margin-top: 1.25em;
                                }
                                a {
                                    border-bottom: 1px solid;
                                    text-decoration: none;
                                }
                                /* Basic Table Styling */
                                table {
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    page-break-inside: always;
                                    border: 0;
                                    margin: 0;
                                    padding: 0;
                                }
                                th, td {
                                    vertical-align: top;
                                    text-align: left;
                                }
                                table.container {
                                    width:100%;
                                    border: 0;
                                }
                                tr.no-borders,
                                td.no-borders {
                                    border: 0 !important;
                                    border-top: 0 !important;
                                    border-bottom: 0 !important;
                                    padding: 0 !important;
                                    width: auto;
                                }
                                /* Header */
                                table.head {
                                    margin-bottom: 12mm;
                                }
                                td.header img {
                                    max-height: 3cm;
                                    width: auto;
                                }
                                td.header {
                                    font-size: 16pt;
                                    font-weight: 700;
                                }
                                td.shop-info {
                                    width: 40%;
                                }
                                .document-type-label {
                                    text-transform: uppercase;
                                }
                                table.order-data-addresses {
                                    width: 100%;
                                    margin-bottom: 10mm;
                                }
                                td.order-data {
                                    width: 40%;
                                }
                                .invoice .shipping-address {
                                    width: 30%;
                                }
                                .packing-slip .billing-address {
                                    width: 30%;
                                }
                                td.order-data table th {
                                    font-weight: normal;
                                    padding-right: 2mm;
                                }
                    
                                table.order-details {
                                    width:100%;
                                    margin-bottom: 8mm;
                                }
                                .quantity,
                                .price {
                                    width: 20%;
                                }
                                .order-details tr {
                                    page-break-inside: always;
                                    page-break-after: auto;
                                }
                                .order-details td,
                                .order-details th {
                                    border-bottom: 1px #ccc solid;
                                    border-top: 1px #ccc solid;
                                    padding: 0.375em;
                                }
                                .order-details th {
                                    font-weight: bold;
                                    text-align: left;
                                }
                                .order-details thead th {
                                    color: white;
                                    background-color: #0b8e36;
                                    border-color: #0b8e36;
                                }
                    
                                .order-details tr.bundled-item td.product {
                                    padding-left: 5mm;
                                }
                                .order-details tr.product-bundle td,
                                .order-details tr.bundled-item td {
                                    border: 0;
                                }
                                dl {
                                    margin: 4px 0;
                                }
                                dt, dd, dd p {
                                    display: inline;
                                    font-size: 7pt;
                                    line-height: 7pt;
                                }
                                dd {
                                    margin-left: 5px;
                                }
                                dd:after {
                                    content: "\A";
                                    white-space: pre;
                                }
                    
                                .customer-notes {
                                    margin-top: 5mm;
                                }
                                table.totals {
                                    width: 100%;
                                    margin-top: 5mm;
                                }
                                table.totals th,
                                table.totals td {
                                    border: 0;
                                    border-top: 1px solid #ccc;
                                    border-bottom: 1px solid #ccc;
                                }
                                table.totals th.description,
                                table.totals td.price {
                                    width: 50%;
                                }
                                table.totals tr:last-child td,
                                table.totals tr:last-child th {
                                    border-top: 2px solid #0b8e36;
                                    border-bottom: 2px solid #0b8e36;
                                    font-weight: bold;
                                }
                                table.totals tr.payment_method {
                                    display: none;
                                }
                    
                                #footer {
                                    position: absolute;
                                    bottom: -2cm;
                                    left: 0;
                                    right: 0;
                                    height: 2cm;
                                    text-align: center;
                                    border-top: 0.1mm solid gray;
                                    margin-bottom: 0;
                                    padding-top: 2mm;
                                }
                    
                                .pagenum:before {
                                    content: counter(page);
                                }
                                .pagenum,.pagecount {
                                    font-family: sans-serif;
                                }
                            </style>
                        </head>
                        <body class="invoice">
                            <table class="head container">
                                <tr>
                                    <td class="header">
                                    </td>
                                    <td class="shop-info">
                                        <div class="shop-name">
                                            <h3>            
                                                <img style="" src="'.$url.'images/attestation/ri_1.png" />
                                            </h3>
                                        </div>
                                        <div class="shop-address"></div>
                                    </td>
                                </tr>
                            </table>
                            <h1 class="document-type-label"></h1>
                            <table class="order-data-addresses">
                                <tr>
                                    <td class="address billing-address">
                                       
                                        '.$paiement->getUser()->getFirstname().' '.$paiement->getUser()->getLastname().'<br>
                                         '.$paiement->getUser()->getTelephone().'<br>'.$paiement->getUser()->getEmail().'
                                    </td>
                                    <td class="address shipping-address">
                                        
                                    </td>
                                    <td class="order-data">
                                        <table>
                                            <tr class="order-number">
                                                <th>'.tt('Numero de la commande').':</th>
                                                <td>'.$paiement->getNumero().'</td>
                                            </tr>
                                            <tr class="order-date">
                                                <th>Date</th>
                                                <td>'.$paiement->getCreatedAt().'</td>
                                            </tr>
                                        
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="order-details">
                                <thead>
                                    <tr>
                                        <th class="product">'.tt('Désignation').'</th>
                                        <th class="price">'.tt('Prix unitaire').'</th>
                                        <th class="price">'.tt('Réduction').'</th>
                                        <th class="quantity">'.tt('Durée').'</th>
                                        <th class="quantity">'.tt('Prix').'</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td>'.$paiement->getMotif().'</td>
                                        <td>'.$priceunitmois.'</td>
                                        <td>'.$paiement->getReduction().'%</td>
                                        <td>'.$paiement->getNbremonth().' mois</td>
                                        <td>'.$paiement->getPrice().' €</td>
                                    </tr>
                                   
                                </tbody>
                                <tfoot>
                                    <tr class="no-borders">
                                        <td class="no-borders">
                                            <div class="customer-notes">
                                            </div>
                                        </td>
                                        <td class="no-borders">
                                            <div class="customer-notes">
                                            </div>
                                        </td>
                                        <td class="no-borders">
                                            <div class="customer-notes">
                                            </div>
                                        </td>
                                        <td class="no-borders" colspan="2">
                                            <table class="totals">
                                                <tfoot>
                                                <tr class="cart_subtotal">
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <th class="description">'.tt("Total HT").'</th>
                                                    <td class="price"><span class="totals-price"><span class="amount">'.$paiement->getPrice().' €</span></span></td>
                                                </tr>
                                                <tr class="cart_subtotal">
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <th class="description">'.tt("TVA").' (20%)</th>
                                                    <td class="price"><span class="totals-price"><span class="amount">'.$paiement->getTva().' €</span></span></td>
                                                </tr>
                                                <tr class="order_total">
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <th class="description">'.tt("Total TTC").'</th>
                                                    <td class="price"><span class="totals-price"><span class="amount">'.$paiement->getMontant().' €</span></span></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </body>
                    </html>';

        $dompdf->loadHtml($html2);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($paiement->getUser()->firstname."-".$paiement->getUser()->lastname."-LS2EC-INVOICE".".pdf");


    }




    public function generateAttestation($id){
        $user_course = User_courses::find($id);

        // instantiate and use the dompdf class

        $dompdf = new Dompdf(array('enable_remote' => true));
        $url = __env.'web/assets/';

        $html2=    '<html><style>        
                        @page {
                            margin: 0px 0px 0px 0px !important;
                            padding: 0px 0px 0px 0px !important;
                        }
                        table, th, td {
                            border: 2px solid #c8efc9;
                            
                          }
                          .fristTd{
                              width:25%;
                              height: 50px;
                          }
                          .secondTd{
                              width:75%;
                              height: 50px;
                          }

                          td span{
                              padding-top:10px;
                              margin-left:10px;
                              margin-bottom:30px;
                              margin-right:30px;
                              
                          }
                          .active{
                              background: #c8efc9;
                          }
                      
            </style>
            <head><link rel="stylesheet" type="text/css" href="style.css"/></head><body><img style="position:absolute;top:0.00in;left:0.00in;width:12.76in;height:9.02in" src="'.$url.'images/attestation/vi_1.png" /><img style="position:absolute;top:0.16in;left:0.16in;width:11.4in;height:7.9in" src="'.$url.'images/attestation/vi_2.png" />
            <img style="position:absolute;top:6.8in;left:10.92in;width:0.91in;height:1.50in" src="'.$url.'images/attestation/vi_3.png" />
            <img style="position:absolute;top:0.00in;left:0.00in;width:0.91in;height:1.50in" src="'.$url.'images/attestation/vi_4.png" />
            <img style="position:absolute;top:0.00in;left:0.00in;width:11.94in;height:8.52in" src="'.$url.'images/attestation/ci_1.png" />
            <div style="text-align:center;position:absolute;top:1.62in;left:0.87in;width:9.16in;line-height:0.53in;">
                <span style="font-style:normal;font-weight:bold;font-size:23pt;font-family:Merriweather Sans ExtraBold;color:#096633">
                    ATTESTATION DE SUIVI DE FORMATION 
                </span>
                </SPAN>
                <br/>
            </div>
            <div style="position:absolute;top:3.80in;left:0.9in;width:10.12in;line-height:0.28in;">
                <table style="width:100%">
                <tr>
                    <td class="firstTd"><span><strong>Objectifs de la formation</strong></span></td>
                    <td class="secondTd"><span>'.$user_course->getCourses()->getObjectif().'</span></td>
                </tr>
                <tr class="active">
                    <td class="firstTd" style="height:35px;"><span><strong>Durée</strong></span></td>
                    <td class="secondTd" style="height:35px"><span>35 Heures</span></td>
                </tr>
                <tr>
                    <td class="firstTd"><span><strong>Modules du parcours</strong></span></td>
                    <td class="secondTd"><span>'.$user_course->getCourses()->getModule().'</span></td>
                </tr>
                <tr class="active">
                    <td class="firstTd"><span><strong>Résultat de l\'évaluation</strong></span></td>
                    <td class="secondTd"><span>Le formateur atteste de l’atteinte des objectifs pédagogiques 
                    à travers l’évaluation des acquis durant la formation</span></td>
                </tr>
                </table>
                </div>
            <img style="position:absolute;top:7.27in;left:5.22in;width:0.26in;height:0.63in" src="'.$url.'images/attestation/vi_5.png" />
            <img style="position:absolute;top:7.25in;left:5.22in;width:0.26in;height:0.42in" src="'.$url.'images/attestation/ci_2.png" />
            <img style="position:absolute;top:7.07in;left:5.06in;width:0.59in;height:0.58in" src="'.$url.'images/attestation/ci_3.png" />
            <img style="position:absolute;top:7.16in;left:5.15in;width:0.40in;height:0.40in" src="'.$url.'images/attestation/ci_4.png" />
            <img style="position:absolute;top:7.15in;left:5.14in;width:0.41in;height:0.41in" src="'.$url.'images/attestation/ci_5.png" />
            <img style="position:absolute;top:7.24in;left:5.24in;width:0.23in;height:0.22in" src="'.$url.'images/attestation/ci_6.png" />
            <img style="position:absolute;top:0.00in;left:4.13in;width:2.43in;height:1.68in" src="'.$url.'images/attestation/ri_1.png" />
            <div style="position:absolute;top:2.46in;left:2.32in;width:8.12in;line-height:0.28in;"><span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Merriweather Sans;color:#000000"> </span></SPAN><br/></div>

            <div style="position:absolute;top:2.26in;left:1.29in;width:8.12in;line-height:0.28in;">
                <DIV style="text-align:center;position:relative; left:0.13in;">
                    <p style="font-style:normal;font-weight:normal;font-size:15pt;font-family:Merriweather Sans;color:#000000"> 
                        Je soussigné, <strong>CLAUDE MARCEL BIYIHA MANG</strong> gérant de la société <strong>LS2EC TRAINING</strong>, atteste que Madame/Monsieur <strong style="text-transform: uppercase;">'.$user_course->getUser()->firstname.' '.$user_course->getUser()->lastname.'</strong>, inscrit(e) au parcours de formation en elearning 
                        <strong>'.$user_course->getCourses()->getName().' </strong>, a suivi la formation conformément au programme convenu 
                    </p>
                    </SPAN>
                </DIV><br/>
            </div>

            <div style="position:absolute;top:7.07in;left:8.2in;width:3.88in;line-height:0.28in;">
                <span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Merriweather Sans;color:#000000">
                    Fait à Paris le '.$user_course->getCertificateDate().'
                </span></SPAN><br/></div>

            <div style="position:absolute;top:7.34in;left:7.43in;width:3.88in;line-height:0.28in;"><DIV style="position:relative; left:0.58in;">
                <span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Merriweather Sans;color:#000000">
                    Pour faire valoir ce que de droit
                </span></SPAN>
                </DIV><br/>
            </div>
            
            <img style="position:absolute;top:6.8in;left:1.8in;width:3in;height:1.2in" src="'.$url.'uploads/signature.png" />
            <div style="position:absolute;top:7.07in;left:1.19in;width:0.87in;line-height:0.28in;">
                <span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Merriweather Sans;color:#000000">
                    Signature
                </span>
                <span style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Merriweather Sans;color:#000000"> 
                </span><br/></SPAN>
            </div>
 

            </body>
            </html>';

        $html3 = '<img  src="'.$url.'images/attestation/ri_1.png" />';
        $dompdf->loadHtml($html2);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($user_course->getUser()->firstname."-".$user_course->getUser()->lastname."-LS2EC-CERTIFICATE".".pdf");


    }

    public function getUsersHaveNotCertificate(){
        $courseId = $_POST['courseId'];

        $user_courses = User_courses::where('courses_id',$courseId)->andwhere('certificateavailable','!=',1)->__getAll();

        return   array(  'success' => true,
            'user_courses' => $user_courses,
            'detail' => '');
    }


}
