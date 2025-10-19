@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <div class="row">
            <div class="col-6">
                <h4 class="box-title mb-0">
                    @tt("Liste des sessions")
                </h4>
            </div>
            <div class="col-6 pull-right">
                <button class="btn btn-success btn-md pull-right" onclick="app.createSimpleattributeinEntity('sessionpaiement',{'pourcentagegain':30},'',this,true)">
                    <i class="fa fa-plus"></i> @tt('Nouvelle session')
                </button>
            </div>
        </div>

        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark">@tt("Name")</span></th>
                    <th><span class="text-fade">@tt("Taux")</span></th>

                    <th><span class="text-fade">@tt("Date de debut")</span></th>
                    <th><span class="text-fade">@tt("Date de fin")</span></th>
                    <th><span class="text-fade">@tt("Etat")</span></th>
                    <th><span class="text-fade">@tt("Paiement")</span></th>
                    <th><span class="text-fade">@tt("*")</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach(array_reverse(Sessionpaiement::all()) as $session)
                    <tr>
                        <td id="title{{$session->getId()}}">
                            {{$session->getName()}}
                        </td>
                        <td>
                            {{$session->getPourcentagegain()}} %
                        </td>
                        <td>
                            {{$session->getDatedebut()}}
                        </td>
                        <td>
                            {{$session->getDatefin()}}
                        </td>
                        <td>
                            {{$session->getSatutName()}}
                        </td>
                        <td>

                        </td>

                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('codeaffiliationListbySession')}}?session={{$session->getId()}}" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                <i class="fa fa-dollar"></i> @tt('Liste des paiements de la session')
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section("jsimport")
    <script>
        let id;
        let title;
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
                'content': "@tt('Voulez vous rejetter ce code?') "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){app.updateSimpleattributeinEntity(id,'codepromo',{'state':-2},'',null,true) }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
@endsection
