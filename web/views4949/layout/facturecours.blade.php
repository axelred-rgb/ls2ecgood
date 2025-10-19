@extends('layout.layoutfacture')
@section('content')
    <table class="order-details">
        <thead>
        <tr>
            <th class="product">{{tt('Désignation')}}</th>
            <th class="price">{{tt('Prix unitaire')}}</th>
            <th class="price">{{tt('Réduction')}}</th>
            <th class="quantity">{{tt('Durée')}}</th>
            <th class="quantity">{{tt('Prix')}}</th>

        </tr>
        </thead>
        <tbody>
        <tr>

            <td>{{$paiement->getMotif()}}</td>
            <td>{{$priceunitmois}}</td>
            <td>{{$paiement->getReduction()}}%</td>
            <td>{{$paiement->getNbremonth()}} mois</td>
            <td>{{$paiement->getPrice()}} €</td>
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
                        <th class="description">{{tt("Total HT")}}</th>
                        <td class="price"><span class="totals-price"><span class="amount">{{$paiement->getPrice()}} €</span></span></td>
                    </tr>
                    <tr class="cart_subtotal">
                        <td class="no-borders"></td>
                        <td class="no-borders"></td>
                        <td class="no-borders"></td>
                        <th class="description">{{tt("TVA")}} (20%)</th>
                        <td class="price"><span class="totals-price"><span class="amount">{{$paiement->getTva()}} €</span></span></td>
                    </tr>
                    <tr class="order_total">
                        <td class="no-borders"></td>
                        <td class="no-borders"></td>
                        <td class="no-borders"></td>
                        <th class="description">{{tt("Total TTC")}}</th>
                        <td class="price"><span class="totals-price"><span class="amount">{{$paiement->getMontant()}} €</span></span></td>
                    </tr>
                    </tfoot>
                </table>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection