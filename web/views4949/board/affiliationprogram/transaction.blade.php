@extends('board.layoutboard')
@section('content')
    <style>
        .message{
            color: #FFFFFF;
            font-size: 1.5rem;
            margin-bottom: 8px;
        }
        .information{
            font-weight: bold;
            font-size: 15px;
            text-transform: uppercase;
        }
    </style>
    <?php $total = 0;?>
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    @tt("Liste des transactions associées au code") {{$code->getCode()}}
                    @if($session->getId())
                        @tt('Au cours de la session') {{$session->getNumero()}}
                    @endif
                </h4>
            </div>
            <div class="col-md-6" style="padding-left: 25%;">
                <h4 class="box-title mb-0" style="font-weight: 100">
                    @tt("Utilisateur"):
                </h4>
                <strong>{{$code->getUser()->getFirstname()}} {{$code->getUser()->getLastname()}}</strong><br>
                <h4 class="box-title mb-0" style="font-weight: 100">
                    @tt("Gain total" ):
                </h4>
                <strong id="gain_total"></strong>
            </div>
        </div>

        <hr>

        <?php $user = $code->getUser(); ?>
        <div class="row">

            @if($user->getUsertype() == 2)
                <div class="table-responsive">
                    <table class="table">

                        <tbody>
                            <tr>
                                <td colspan="2" style="text-align: center; font-size: 1.8rem">
                                    @tt('Informations ')
                                    @if($user->getEntreprisestatut() == 0)
                                        <label style="background-color: #9d9105!important;" class="pull-right badge badge-primary">@tt("Entreprise En attente de validation")</label>
                                    @elseif($user->getEntreprisestatut() == 1)
                                        <label class=" pull-rightbadge badge-primary">@tt("Entreprise Validées")</label>
                                    @else
                                        <label style="background-color: #ff0000!important;" class="pull-right badge badge-danger">@tt("Entreprise Rejettées")</label>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="information">@tt("Type d'utilisateur")</td>
                                <td>{{$user->getUsertype() == 2 ? tt('Entreprise') : tt('Particulier') }}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Denomination')</td>
                                <td>{{$user->getDenomination()}} </td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Sigle')</td>
                                <td>{{$user->getSigle()}}<</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Siret')</td>
                                <td>{{$user->getSiret()}}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Banque')</td>
                                <td>{{$user->getBanque()}}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Iban')</td>
                                <td>{{$user->getIban()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table">

                        <tbody>
                            <tr>
                                <td class="information" style="text-align: center; font-size: 1.8rem" colspan="2">
                                    @tt('Informations ')
                                </td>
                            </tr>
                            <tr>
                                <td class="information">@tt("Type d'utilisateur")</td>
                                <td>{{$user->getUsertype() == 2 ? tt('Entreprise') : tt('Particulier') }}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Numero OM')</td>
                                <td>{{$user->getOrangemoney()}}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Email Paypal')</td>
                                <td>{{$user->getEmailpaypal()}}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Nom')</td>
                                <td>{{$user->getNomretrait()}}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Prenom')</td>
                                <td>{{$user->getPrenomretrait()}}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Telephone')</td>
                                <td>{{$user->getTelretrait()}}</td>
                            </tr>
                            <tr>
                                <td class="information">@tt('Pays')</td>
                                <td>{{$user->getCountryretrait()->getName()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            @endif
        </div>
        <hr>
        @if((App::$user->getRole() == 2 && $user->getUsertype() == 2) || (App::$user->getRole() == 3 && $user->getUsertype() !== 2))
            <div class="row">
                <div class="col-4">
                    <h4>@tt('Effectuez le paiement')</h4>

                </div>
                @if($sessioncode->getState() == 1)
                    <div class="col-4">
                        <strong style="color:#0b8e36; font-size:2rem">@tt('PAIEMENT EFFECTUE')</strong>
                    </div>
                    <div class="col-4">
                    <span>
                        <a target="__blank" href="{{$sessioncode->getPreuve()}}">@tt('Preuve du paiement')</a>
                    </span>
                    </div>
                @endif
            </div>

            <div class="col-12">
                <div class="bg-img box box-body py-50"  data-overlay="7">

                    <div class="message">@tt('Envoyez la preuve du paiement')</div>
                    <div class="form row g-0 align-items-center cours-search max-w-950" id="send-proofs">
                        <div class="form-group col-xl-10 col-lg-9 col-12 mb-lg-0 mb-5 bg-white ser-slt" data-id="preuve">
                            <input type="file" name="quantity" id="codepromo" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('code promo')">
                        </div>
                        <div class="form-group" hidden data-id="state">
                            <input type="text" value="1" class="form-control">
                        </div>
                        <div class="form-group" hidden data-id="processfees">
                            <input type="text" value="1" id="processfees" class="form-control">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-12 mb-0">
                            <button onclick="app.updatesimpleObject(this,{{$sessioncode->getId()}},'sessioncodepromo','send-proofs','')"  class="btn w-p100 btn-danger rounded-0">@tt("Save")</button>
                        </div>
                        <div id="payment"></div>
                    </div>
                </div>

            </div>
            <hr>
        @endif
        <h4>@tt('Liste des paiements')</h4>
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
                        <?php $pourcentage = $paiement->getSessionpaiement()->getPourcentagegain();?>
                        <td>{{$paiement->getMotif()}}</td>
                        <td>{{$paiement->getNbremonth()}}</td>
                        <td>{{$paiement->getMontant()}} €</td>
                        <td><?php $a='this.created_at';?>{{$paiement->$a}}</td>
                        <?php $a = ($paiement->getMontant()*$pourcentage)/100; $total += $a;?>
                        <td>{{$a}}€</td>
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
        $total  = '{{$total}}'+'€';
        $('#gain_total').html($total);
        $process = 0;
        @if($user->getUsertype() != 2)
            <?php $fees = 20*$total/100; ?>
            $process = {{$fees}}
        @else
            $process = 0;
        @endif

        $('#processfees').val(''+$process);
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
