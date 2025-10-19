@extends('board.layoutboard')
@section('cssimport')
    <style>
        .error>label{
            color:#e31313!important;
        }
        .error>input, .error>textarea{
            border-color:#e31313!important;
        }
        .error>.cke_chrome{
            border-color:#e31313!important;
        }
    </style>
@endsection
@section('content')
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    @tt("PROGRAMME D'AFFILIATION")
                </h4>
            </div>
            <div class="col-md-6">

                <a href="{{route('affiliationprogram')}}" class="btn btn-md btn-success pull-right"> <i class="fa fa-eye"></i> @tt("Mes transactions")</a>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12">
                <form action="" class="form-control" id="form-update-infos">
                    <div class="row mb-4">
                        <div class="col-sm-12 form-group" data-id="usertype" id="titre">
                            <label for="titreInput">@tt("Etes vous") </label>
                            <select class="form-control" onchange="if($('#persontype').val() == 1){
                $('#particular').removeAttr('hidden');
                $('#entreprise').attr('hidden','hidden');
            }
            else{
                $('#entreprise').removeAttr('hidden');
                $('#particular').attr('hidden','hidden');
            }

                            " name="" id="persontype" >
                                <option value="">@tt('Etes vous?')</option>
                                <option {{App::$user->getUsertype() == 1 ? 'selected' : ''}} value="1">@tt('Un Particulier')</option>
                                <option {{App::$user->getUsertype() == 2 ? 'selected' : ''}}  value="2">@tt('Une Entreprise')</option>
                            </select>
                            <label for="" class="errormessage"></label>
                        </div>
                        @if(App::$user->getUsertype() == 2)
                            <div class="col-12">
                                <div class="bg-img box box-body py-50" style="background-color: #0b8e36;" data-overlay="7">

                                    <div class="message"></div>
                                    <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                                        <p style="text-align: center;font-size: 30px;color: #ffffff;margin-bottom: 0px;">
                                            @if(App::$user->getEntreprisestatut() == 0)
                                                @tt('Vos informations sont en attente de validation')
                                            @elseif(App::$user->getEntreprisestatut() == 1)
                                                @tt('Vos informations ont été validées')
                                            @else
                                                @tt('Vos informations ont été rejettées. Verifiez les et soumettez les à nouveau')
                                            @endif
                                        </p>
                                    </div>
                                </div>

                            </div>

                        @endif
                    </div>
                    <hr>
                    <div class="row mb-4" {{App::$user->getUsertype() != 1   ? 'hidden' : ''}}  id="particular" >
                        <div class="col-sm-12" id="resume">
                            <p style="text-align: center; font-size: 25px">
                                @tt('En tant que particulier, vos paiements seront traités par notre partenaire SPACEKOLA et cela engendrerait 6% comme frais de transaction')
                            </p>
                        </div>
                        <hr>

                        <div class="col-12">
                            <h4 style="text-align: center">@tt('Choisissez un moyen de paiement')</h4>
                        </div>
                        <div class="col-12 form-group"  data-id="orangemoney">
                            <label for="summaryInput">@tt("Numero de téléphone Orange mobile money")</label>
                            <input class="form-control" value="{{App::$user->getOrangemoney()}}" type="tel">
                        </div>
                        <div class="col-12 form-group"  data-id="mobilemoney">
                            <label for="summaryInput">@tt("Numero de téléphone MOMO")</label>
                            <input class="form-control" value="{{App::$user->getMobilemoney()}}" type="tel">
                        </div>
                        <div class="col-12 form-group"  data-id="emailpaypal">
                            <label for="summaryInput">@tt("Adresse mail paypal")</label>
                            <input class="form-control" value="{{App::$user->getemailpaypal()}}" type="email">
                        </div>
                        <div class="col-6 form-group"  data-id="nomretrait">
                            <label for="summaryInput">@tt("Nom") (Compte Moneygram / Western union)</label>
                            <input class="form-control" value="{{App::$user->getNomretrait()}}" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="prenomretrait">
                            <label for="summaryInput">@tt("Prénom") (Compte Moneygram / Western union)</label>
                            <input class="form-control" value="{{App::$user->getPrenomretrait()}}" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="telretrait">
                            <label for="summaryInput">@tt("Telephone") (Compte Moneygram / Western union)</label>
                            <input class="form-control" value="{{App::$user->getTelretrait()}}" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="countryretraitid">
                            <label for="summaryInput">@tt("Country") (Compte Moneygram / Western union)</label>
                            <select name="" id="" class="form-control">
                                <option value="">@tt('Select country')</option>
                                @foreach(Country::all() as $country)
                                    <option {{$country->getId() == App::$user->getCountryretrait()->getId() ? 'selected' : ''}} value="{{$country->getId()}}">{{$country->getName()}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4" {{App::$user->getUsertype() != 2 ? 'hidden' : ''}} id="entreprise">

                        <div class="col-6 form-group" data-id="denomination">
                            <label for="summaryInput">@tt("Dénomination")</label>
                            <input class="form-control" value="{{App::$user->getDenomination()}}" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="sigle">
                            <label for="summaryInput">@tt("Sigle")</label>
                            <input class="form-control" value="{{App::$user->getSigle()}}" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="siret">
                            <label for="summaryInput">@tt("Siret")</label>
                            <input class="form-control " value="{{App::$user->getSiret()}}" type="text">
                        </div>
                        <div class="col-6 form-group" data-id="banque">
                            <label for="summaryInput">@tt("Banque")</label>
                            <input class="form-control" value="{{App::$user->getBanque()}}" type="text">
                        </div>
                        <div class="col-12 form-group" data-id="iban">
                            <label for="summaryInput">@tt("IBAN")</label>
                            <input class="form-control" value="{{App::$user->getIban()}}" type="text">
                        </div>
                    </div>
                    <div class="message"></div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-md btn-success" onclick="app.updatesimpleObject(this,{{App::$user->getId()}},'user','form-update-infos',false,false,function (){
                                        if($('#persontype').val() == '2'){
                                            successAlert('{{tt("Vos informations ont bien été envoyé. Nous les verifierons et vous serez notifié en cas de validation")}}');

                                        }
                                        else{
                                            successAlert('{{tt("Opération effectué avec succès")}}');
                                        }
                                        setTimeout(function () {
                                            window.location.href = '';
                                        }, 2000)
                                    })" type="button" style="width:100%">@tt("Update")</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@section("jsimport")

    <script>
        //alert('pardon');
        function persontype(){

        }

    </script>
@endsection
