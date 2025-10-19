<!DOCTYPE html>
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
<table class="head container" style="margin-bottom: 0px!important;">
    <tr>
        <td class="shop-info" style="width: 60%">
            <div class="shop-name">
                <h3 style="margin:0px!important; text-align: left!important;">
                    <img style="width: 150px!important;" src="{{$url}}images/attestation/ri_1.png" />
                </h3>
            </div>
        </td>
        <td  style="width: 40%">
            <span style="color: #0b8e36;font-weight: bold">@tt("Numéro SIREN")</span> 900286477<br>
            <span style="color: #0b8e36;font-weight: bold">@tt("Numéro SIRET (siège)")</span> 90028647700014 <br>
            <span style="color: #0b8e36;font-weight: bold">@tt("Numéro TVA Intracommunautaire")</span> FR76900286477 <br>
            <span style="color: #0b8e36;font-weight: bold">@tt("Numéro RCS")</span> Pontoise B 900 286 477<br>
        </td>
    </tr>
</table>

<table class="head container" style="margin-bottom: 0px!important;width: 100%!important;">
    <tr style="padding:5px!important;">
        <td style="padding-right: 50px;padding-left: 20px" >
            <span>Payer à</span> <br>
            <table class="order-data-addresses" style="background: #0b8e36;color:#ffffff;padding: 10px; width: 80%!important;min-width: 250px">
                <tr>
                    <td class="address billing-address" style="padding:20px">

                        {{$user->getFirstname()}} {{$user->getLastname()}}<br>
                        {{$user->getTelephone()}}<br>{{$user->getEmail()}}
                    </td>

                </tr>
            </table>

        </td>
        <td style="padding-left: 50px;padding-right: 20px" >
            <span>Facture pour</span> <br>
            <table class="order-data-addresses" style="background: #0b8e36;color:#ffffff;padding: 10px;; width: 90%!important;min-width: 250px">
                <tr>
                    <td class="address billing-address" style="padding:20px">
                        LS2EC TRAINING <br>
                        15 RUE DE VIENNE 95380 LOUVRES <br>
                        cm.biyihamang@ls2ec.com
                    </td>
                </tr>
            </table>

        </td>

    </tr>
</table>

@yield('content')


</body>
</html>
