<?php 

            
use dclass\devups\Controller\Controller;
use Dompdf\Dompdf;

class PaiementController extends Controller{

    public function listView($next = 1, $per_page = 10){

        $this->datatable = PaiementTable::init(new Paiement())->buildindextable();

        self::$jsfiles[] = Paiement::classpath('Resource/js/paiementCtrl.js');

        $this->entitytarget = 'Paiement';
        $this->title = "Manage Paiement";
        
        $this->renderListView();

    }

    public function datatable($next, $per_page) {
    
        return ['success' => true,
            'datatable' => PaiementTable::init(new Paiement())->router()->getTableRest(),
        ];
        
    }

    public function formView($id = null)
    {
        $paiement = new Paiement();
        $action = Paiement::classpath("services.php?path=paiement.create");
        if ($id) {
            $action = Paiement::classpath("services.php?path=paiement.update&id=" . $id);
            $paiement = Paiement::find($id);
        }

        return ['success' => true,
            'form' => PaiementForm::init($paiement, $action)
                ->buildForm()
                ->addDformjs()
                ->renderForm(),
        ];
    }

    public function createAction($paiement_form = null ){
        extract($_POST);

        $paiement = $this->form_fillingentity(new Paiement(), $paiement_form);
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'paiement' => $paiement,
                            'action' => 'create', 
                            'error' => $this->error);
        } 
        

        $id = $paiement->__insert();
        return 	array(	'success' => true,
                        'paiement' => $paiement,
                        'tablerow' => PaiementTable::init()->router()->getSingleRowRest($paiement),
                        'detail' => '');

    }

    public function updateAction($id, $paiement_form = null){
        extract($_POST);
            
        $paiement = $this->form_fillingentity(new Paiement($id), $paiement_form);
     
        if ( $this->error ) {
            return 	array(	'success' => false,
                            'paiement' => $paiement,
                            'action_form' => 'update&id='.$id,
                            'error' => $this->error);
        }
        
        $paiement->__update();
        return 	array(	'success' => true,
                        'paiement' => $paiement,
                        'tablerow' => PaiementTable::init()->router()->getSingleRowRest($paiement),
                        'detail' => '');
                        
    }
    

    public function detailView($id)
    {

        $this->entitytarget = 'Paiement';
        $this->title = "Detail Paiement";

        $paiement = Paiement::find($id);

        $this->renderDetailView(
            PaiementTable::init()
                ->builddetailtable()
                ->renderentitydata($paiement)
        );

    }
    
    public function deleteAction($id){
    
        Paiement::delete($id);
        
        return 	array(	'success' => true, 
                        'detail' => ''); 
    }
    

    public function deletegroupAction($ids)
    {

        Paiement::where("id")->in($ids)->delete();

        return array('success' => true,
                'detail' => ''); 

    }

    public function generateProductInvoice($id){
        $paiement = Paiement::find($id);

        // instantiate and use the dompdf class

        $dompdf = new Dompdf(array('enable_remote' => true));
        $url = __env.'web/assets/';

        $price = $paiement->getMontant();
        $tva = $price*0.2;
        $ttc = $price + $tva;

        $url = __env.'web/assets/';

        $html2 = Genesis::getView('layout.facture',compact('price','tva','ttc','paiement','url'));

        $dompdf->loadHtml($html2);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($paiement->getUser()->firstname."-".$paiement->getUser()->lastname."-LS2EC-INVOICE".".pdf");

        //Genesis::render('layout.facture',compact('price','tva','ttc','paiement','url'));

    }
    public function generateProductInvoicelast($id){
        $paiement = Paiement::find($id);

        // instantiate and use the dompdf class

        $dompdf = new Dompdf(array('enable_remote' => true));
        $url = __env.'web/assets/';

        $price = $paiement->getMontant();
        $tva = $price*0.2;
        $ttc = $price + $tva;

        $url = __env.'web/assets/';

        $listpaiements = '';
        if($paiement->getProduct()->getId()){
            $listpaiements ='<tr>
                                <td>'.$paiement->getMotif().'</td>
                                <td> <img width="70px" src="'.$paiement->getProduct()->srcCover().'"></td>
                                <td>'.$paiement->getProduct()->getDescription().'</td>
                                <td>'.$paiement->getProduct()->getPriceofsale().' €</td>
                                <td>1</td>
                            </tr>';
        }
        else{
            $productpaiements = Productpaiement::where('this.paiement_id',$paiement->getId())->get();
            foreach ($productpaiements as $p){
                $listpaiements .='<tr>
                                <td>'.$p->getProduct()->getName().'</td>
                                <td> <img width="70px" src="'.$p->getProduct()->srcCover().'"></td>
                                <td>'.$p->getProduct()->getDescription().'</td>
                                <td>'.$p->getProduct()->getPriceofsale().' €</td>
                                <td>1</td>
                            </tr>';
            }
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
                                        <th class="product" colspan="2">'.tt('Désignation').'</th>
                                        <th class="price">'.tt('Description').'</th>
                                        <th class="price">'.tt('Prix').' </th>
                                        <th class="price">'.tt('Quantite').'</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    '.$listpaiements.'
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
                                                    <td class="price"><span class="totals-price"><span class="amount">'.$price.' €</span></span></td>
                                                </tr>
                                                <tr class="cart_subtotal">
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <th class="description">'.tt("TVA").' (20%)</th>
                                                    <td class="price"><span class="totals-price"><span class="amount">'.$tva.' €</span></span></td>
                                                </tr>
                                                <tr class="order_total">
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <td class="no-borders"></td>
                                                    <th class="description">'.tt("Total TTC").'</th>
                                                    <td class="price"><span class="totals-price"><span class="amount">'.$ttc.' €</span></span></td>
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


}
