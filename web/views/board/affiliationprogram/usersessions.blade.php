@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        @if(!isset($reference))
            @if(App::$user->getUsertype()!=1 && App::$user->getUsertype()!=2)
                <div class="col-12">
                    <div class="bg-img box box-body py-50" style="background-color: #0b8e36;" data-overlay="7">

                        <div class="message"></div>
                        <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                            <p style="text-align: center;font-size: 30px;color: #ffffff;margin-bottom: 0px;">
                                @tt('Vous devez mettre à jour vos information afin de pouvoir recevoir vos gains')<br>
                                <a href="{{route('updateinfosaffiliation')}}" class="btn btn-md btn-success pull-right"> <i class="fa fa-plus"></i> @tt("Mettre à jour mes informations")</a>
                            </p>
                        </div>
                    </div>

                </div>
            @elseif(App::$user->getUsertype()==2)
                @if(App::$user->getEntreprisestatut() != 1)
                    <div class="col-12">
                        <div class="bg-img box box-body py-50" style="background-color: #0b8e36;" data-overlay="7">

                            <div class="message"></div>
                            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                                <p style="text-align: center;font-size: 30px;color: #ffffff;margin-bottom: 0px;">
                                    @tt('Les informations de votre entreprise n\'ont pas encore été validé. Vous ne pouvez pas encore recevoir vos gains')<br>
                                    <a href="{{route('updateinfosaffiliation')}}" class="btn btn-md btn-success pull-right"> <i class="fa fa-plus"></i> @tt("Mettre à jour mes informations")</a>
                                </p>
                            </div>
                        </div>

                    </div>
                @endif
            @endif
        @endif


        <div class="row">
            <div class="col-6">
                <h4 class="box-title mb-0">
                    @tt("Liste des sessions")
                </h4>
            </div>

        </div>

        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark">@tt("Name")</span></th>
                    <th><span class="text-fade">@tt("Periode")</span></th>
                    <th><span class="text-fade">@tt("Etat du paiement")</span></th>
                    @if(!isset($reference))
                        <th><span class="text-fade">@tt("Frais de transation")</span></th>
                    @endif
                    <th><span class="text-fade">@tt("Montant")</span></th>
                    <th><span class="text-fade">@tt("*")</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach(array_reverse($sessioncode) as $sess)
                    <?php $session = $sess->getSessionpaiement();?>
                    <tr>
                        <td id="title{{$session->getId()}}">
                            {{$session->getName()}}
                            <label for="" class="badge badge-warning">{{$session->getSatutName()}}</label><br>
                        </td>

                        <td>
                            {{$session->getDatedebut()}} - {{$session->getDatefin()}}
                        </td>

                        <td>
                            {{$sess->getStateName()}}
                            @if($sess->getState() == 1)
                                <a target="__blank" href="{{$sess->getPreuve()}}">
                                    <label for="" class="badge badge-success">@tt('Téléchargez la preuve ')</label>
                                </a>
                                <a target="__blank" href="{{route('generateinvoiceaffiliation')}}?id={{$sess->getId()}}">
                                    <label for="" class="badge badge-success">@tt('Téléchargez la facture ')</label>
                                </a>
                            @endif
                        </td>
                        @if(!isset($reference))
                            <td>
                                {{$sess->getProcessfees()}}  €
                            </td>
                        @endif
                        <td>
                            @if(is_null($sess->getMontant()))
                                0 €
                            @else
                                {{$sess->getMontant()}} €
                            @endif
                        </td>


                        <td>
                            @if(!isset($reference))
                                <a class="btn btn-sm btn-primary" href="{{route('mypaiementbysession')}}?session={{$session->getId()}}" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                     @tt('Transactions')
                                </a>
                            @else
                                <a class="btn btn-sm btn-primary" href="{{route('codeaffiliationparticulierListbySession')}}?session={{$session->getId()}}" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                    @tt('Transactions')
                                </a>
                            @endif
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
