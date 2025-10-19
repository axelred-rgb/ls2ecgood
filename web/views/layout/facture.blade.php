@extends('layout.layoutfacture')
@section('content')
<table class="order-details" style="width: 100%!important;">
    <thead>
    <tr>
        <th style="width: 33%!important;" class="product">{{tt('Désignation')}}</th>
        <th style="width: 33%!important;" class="price">{{tt('Quantite')}}</th>
        <th style="width: 33%!important;" class="price">{{tt('Prix')}} </th>
    </thead>
    <tbody>
    @if($paiement->getProduct()->getId())
        <tr>
            <td>{{$paiement->getMotif()}}</td>
            <td>1</td>
            <td>{{$paiement->getProduct()->getPriceofsale()}} €</td>

        </tr>
    @else
    <?php $productpaiements = Productpaiement::where('this.paiement_id',$paiement->getId())->get();?>
        @foreach ($productpaiements as $p)
            <tr>
                <td>{{$p->getProduct()->getName()}}</td>
                <td>1</td>
                <td>{{$p->getProduct()->getPriceofsale()}} €</td>

            </tr>
        @endforeach
    @endif

        <tr>
            <th  class="description" colspan="2" style="text-align: center">
                {{tt("Total HT")}}
            </td>
            <td > {{$price}} €</td>
        </tr>
        <tr>
            <th  class="description" colspan="2"  style="text-align: center">
                {{tt("TVA")}} (20%)
            </td>
            <td> {{$tva}} €</td>
        </tr>
        <tr>
            <th  class="description" colspan="2"  style="text-align: center">
                {{tt("Total TTC")}}
            </th>
            <td > {{$ttc}} €</td>
        </tr>

    </tbody>

</table>
@endsection