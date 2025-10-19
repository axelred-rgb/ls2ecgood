@extends('layout.layoutfacturesortie')
@section('content')
    <table class="order-details">
        <thead>
            <tr>
                <th class="product">{{tt('Désignation')}}</th>
                <th class="price">{{tt('Session')}}</th>
                <th class="quantity">{{tt('Montant')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$designation}}</td>
                <td>{{$session}}</td>
                <td>{{$montant}} €2</td>
            </tr>

        </tbody>
    </table>
@endsection