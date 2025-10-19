@extends('board.layoutboard')
@section('content')
    <style>
        .message{
            color: #FFFFFF;
            font-size: 1.5rem;
            margin-bottom: 8px;
        }
    </style>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0 ">
                    @tt("Liste des operation au cours de la session") {{$sessionpaiement->getNumero()}}
                    @if(isset($reference))
                        @tt('Pour les utilisateurs ayant un compte particulier')
                    @endif
                </h4>
            </div>
            <div class="col-md-6" style="padding-left: 30%;">
                <h4 class="box-title mb-0 " style="font-weight: 100">
                    @tt("Total à payer" ):
                </h4>
                <strong id="gain_total"></strong>
                @if(!isset($reference))
                    <div class="row">
                        @if(App::$user->getRole() == 2)
                            <div class="col-12">
                                <a class="btn btn-sm btn-success" href="{{route('paiementspacekola')}}?session={{$sessionpaiement->getId()}}" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                    <i class="fa fa-dollar"></i> @tt('Paiement spacekola')
                                </a>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <hr>

        @if(App::$user->getRole() == 2)
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
                    <div class="form-group" hidden data-id="montant">
                        <input type="text" id="montantinput" value="1" class="form-control">
                    </div>
                    <div class="col-xl-2 col-lg-3 col-12 mb-0">
                        <button onclick="app.updatesimpleObject(this,{{$sessioncode->getId()}},'sessioncodepromo','send-proofs','')"  class="btn w-p100 btn-danger rounded-0">@tt("Save")</button>
                    </div>
                    <div id="payment"></div>
                </div>
            </div>

        </div>
        @endif


        <div class="table-responsive mt-30">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th>@tt("Code")</th>
                    <th>@tt("Utilisateur")</th>
                    <th>@tt("Date de creation")</th>
                    <th>@tt('Type')</th>
                    <th>@tt("Montant total")</th>
                    <th>@tt("Etat")</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;$totaux=0; $isOk=true;?>
                @foreach(array_reverse($codes) as $code)

                    @if(isset($reference))
                        @if($reference == 'spacekola' && $code->getCodepromo()->getUser()->getUsertype() !== '2')
                            <?php $isOk = true;?>
                        @else
                            <?php $isOk = false;?>
                        @endif
                    @else
                        <?php $isOk = true;?>
                    @endif

                    @if($isOk)
                        @if($code->getIspacekola() != 1)
                        <tr >

                            <td style="cursor: pointer;" onclick="window.location.href = '{{route('affiliationtransactionbysession')}}?code={{$code->getCodepromo()->getCode()}}&session={{$sessionpaiement->getId()}}'">{{$code->getCodepromo()->getCode()}}</td>
                            <td style="cursor: pointer;" onclick="window.location.href = '{{route('affiliationtransactionbysession')}}?code={{$code->getCodepromo()->getCode()}}&session={{$sessionpaiement->getId()}}'">
                                {{$code->getCodepromo()->getUser()->getFirstname()}}
                                {{$code->getCodepromo()->getUser()->getLastname()}} <br>
                                {{$code->getCodepromo()->getUser()->getEmail()}}

                            </td>
                            <td><?php $b='this.created_at';?>{{$code->getCodepromo()->$b}}</td>
                            <td>
                                <label class="badge badge-primary">
                                    {{$code->getCodepromo()->getUser()->getUsertypeName()}}
                                </label>
                            </td>
                            <td><?php $totaux += $code->getMontant(); ?>{{$code->getMontant()}} €</td>
                            <td>
                                {{$code->getStateName()}}
                                @if($code->getState() == 1)
                                    <a target="__blank" href="{{$code->getPreuve()}}">
                                        <label for="" class="badge badge-success">@tt('Téléchargez la preuve ')</label>
                                    </a>
                                @endif
                            </td>

                        </tr>
                        @endif
                    @endif

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
        function getDataDelete(post){
            id=post;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want too delete post') "+title+" ?.<br><strong style='color:#e9182f'>@tt('WARNING!! this action is irreversible')</strong>",
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){app.deletePost(this,id);return false; }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }


        $total  = '{{$totaux}}'+'€';
        $('#montantinput').val({{$totaux}});
        $('#gain_total').html($total);

    </script>
@endsection
