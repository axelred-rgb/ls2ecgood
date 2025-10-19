@extends('board.layoutboard')
@section('content')
    <?php $total = 0;?>
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    @tt("Mes transactions")

                </h4>
            </div>
            <div class="col-md-6" style="padding-left: 25%;">

                <h4 class="box-title mb-0" style="font-weight: 100">
                    @tt("Gain total" ):
                </h4>
                <strong id="gain_total"></strong>
            </div>
        </div>

        <hr>

        <h4>@tt('Liste des transactions au cours de la session ') {{$session->getNumero()}}</h4>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark">@tt("Utilisateur")</span></th>
                    <th><span class="text-dark">@tt("Souscription")</span></th>
                    <th><span class="text-dark">@tt("Durée")</span></th>
                    <th><span class="text-dark">@tt("Montant")</span></th>
                    <th><span class="text-dark">@tt("Date")</span></th>
                    <th><span class="text-dark">@tt("Gain")</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($paiements as $paiement)
                    <tr>
                        <td>{{$paiement->getUSer()->getFirstname()}} {{$paiement->getUser()->getLastname()}} </td>
                        <td>{{$paiement->getMotif()}}</td>
                        <td>{{$paiement->getNbremonth()}}</td>
                        <td>{{$paiement->getMontant()}} €</td>
                        <td><?php $a='this.created_at';?>{{$paiement->$a}}</td>
                        <?php $a = ($paiement->getMontant()*10)/100; $total += $a;?>
                        <td>{{$a}}€</td>
                    </tr>

                @endforeach
                <tr>
                    <td style="text-align: center" colspan="4">
                        <h4>@tt('Total des gains')</h4>
                    </td>
                    <td style="text-align: center" colspan="2">
                        <h4>
                            {{$total}} €
                        </h4>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section("jsimport")
    <script>
        let id;
        let title;
        $total  = '{{$total}}'+'€';
        $('#gain_total').html($total);
        function getDataEnable(user){
            id=user;

            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Voulez vous activer le code') "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){app.updateSimpleattributeinEntity(id,'codepromo',{'state':0},'',null,true) }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

        function getDataDisable(user){
            id=user;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want to disable user') "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){app.enabledisableUser(id,2);return false; }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
@endsection
