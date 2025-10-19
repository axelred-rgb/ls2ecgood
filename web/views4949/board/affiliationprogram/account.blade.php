@extends('board.layoutboard')
@section('content')
    <style>
        [data-overlay="7"]::before {
            opacity: 0.3!important;
        }
    </style>
    <?php $total = 0 ;$code = Codepromo::where('user_id',App::$user->getId())->andwhere('type',1)->__getAll();?>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            @if( count($code) > 0)
                <div class="col-md-6">
                    <h4 class="box-title mb-0">
                        @tt("PROGRAMME D'AFFILIATION")
                    </h4>
                </div>
                <div class="col-md-4">
                    <h4 class="box-title mb-0" style="font-weight: 100">
                        @tt("Code d'affiliation"):
                    </h4>
                     <strong>{{$code[0]->getCode()}}</strong><br>
                    <h4 class="box-title mb-0" style="font-weight: 100">
                        @tt("Gain total" ):
                    </h4>
                    <strong id="gain_total"></strong>
                </div>
                <div class="col-md-2">
                    <a href="{{route('updateinfosaffiliation')}}" class="btn btn-md btn-success pull-right"> <i class="fa fa-plus"></i> @tt("Mettre à jour mes information")</a>
                </div>
            @else
                <div class="col-md-12">
                    <h4 class="box-title mb-0">
                        @tt("PROGRAMME D'AFFILIATION")
                    </h4>
                </div>
            @endif
        </div>

        <hr>

        @if( count($code) == 0)
            <div class="col-12" style="text-align: center; margin-top: 2rem">
                <h3 class="box-title mb-0" style="text-decoration: underline">
                    @tt("DESCRIPTION DU PROGRAMME D'AFFILIATION")
                </h3>
            </div>
            <div class="col-12 mt-60">

                <div>
                    <p style="text-align: justify; font-size: 20px;">
                        @tt("Le programme d'affiliation LS2EC TRAINING vous permet d'être rémunéré lorsque vous recommandez des prospects vers notre site internet et qu’ils payent des formations.")<br><br>
                        @tt("Pour participer au programme et recevoir des commissions, il vous suffit de créer votre code promo et de le communiquer à vos prospects.")<br><br>
                        @tt("Vos prospects bénéficieront de 5% de réduction du pack choisi quelque soit leur mode de paiement par Mois ou par An.")<br><br>
                        @tt("Les affiliations sont ouvertes pour l'Europe, l'Amérique, l'Asie, et 2 pays d'Afrique à savoir le Cameroun et la Côte d'Ivoire.")<br><br>
                        @tt("Le programme d’affiliation vous permettra de gagner 30% du montant payé par le client si vous êtes une entreprise et 28% en passant par notre partenaire SPACEKOLA si vous êtes un particulier.")
                    </p>
                </div>
            </div>
            <div class="col-12" style="text-align: center; margin-top: 8rem; margin-bottom: 2rem">
                <h4 class="box-title mb-0" style="text-decoration: underline">
                    @tt("CREER VOTRE CODE PROMO")
                </h4>
            </div>
            <div class="col-12">
                <div class="bg-img box box-body py-50"  data-overlay="7">

                    <div class="message"></div>
                    <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                        <div class="form-group col-xl-10 col-lg-9 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                            <input type="text" name="quantity" id="codepromo" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('code promo')">
                        </div>
                        <div class="col-xl-2 col-lg-3 col-12 mb-0">
                            <button onclick="app.createSimpleattributeinEntity('codepromo',{'type':1,'code':$('#codepromo').val()},'',this,true)"  class="btn w-p100 btn-danger rounded-0">@tt("Save")</button>
                        </div>
                        <div id="payment"></div>
                    </div>
                </div>

            </div>
        @else
            @if($code[0]->getState() == -1)
                <div class="col-12">
                    <div class="bg-img box box-body py-50" style="background-color: #0b8e36;" data-overlay="7">

                        <div class="message"></div>
                        <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                            <p style="text-align: center;font-size: 30px;color: #ffffff;margin-bottom: 0px;">
                                @tt('Votre code est en attente de validation')
                            </p>
                        </div>
                    </div>

                </div>
            @else
                @if($code[0]->getState() == -2)
                    <div class="col-12">
                        <div class="bg-img box box-body py-50" style="" data-overlay="7">

                            <div class="message"></div>
                            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token">
                                <p style="text-align: center;font-size: 20px;color: #ffffff;margin-bottom: 0px;">
                                    @tt('Votre code a été rejetté. Veuillez le modifier')
                                </p>
                                <div class="form-group col-xl-10 col-lg-9 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                                    <input type="text" name="quantity" value="{{$code[0]->getCode()}}" id="codepromoupdate" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('code promo')">
                                </div>
                                <div class="col-xl-2 col-lg-3 col-12 mb-0">
                                    <button onclick="app.updateSimpleattributeinEntity({{$code[0]->getId()}},'codepromo',{'state':-1,'code':$('#codepromoupdate').val()},'',this,true)"  class="btn w-p100 btn-danger rounded-0">@tt("Update")</button>
                                </div>
                                <div id="payment"></div>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="row">
                        <div class="col-12" style="text-align: center">
                            <h4 class="box-title mb-0" style="text-decoration: underline">
                                @tt("Achats effectué avec mon code ") {{}}

                            </h4>
                        </div>
                    </div>


                    <div class="table-responsive mt-30">
                        <table class="table table-striped">
                            <thead>
                            <tr class="bg-dark">
                                <th>@tt("Session")</th>
                                <th>@tt("Utilisateur")</th>
                                <th>@tt("Souscription")</th>
                                <th>@tt("Durée")</th>
                                <th>@tt("Montant")</th>
                                <th>@tt("Date")</th>
                                <th>@tt("Gain")</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $total = 0;
                            $paiements = array_reverse(Paiement::where('codepromo','=',$code[0]->getCode())->__getAll());
                            ?>
                            @foreach($paiements as $paiement)
                                <tr>
                                    <td>
                                        @tt('Session') {{$paiement->getSessionpaiement()->getNumero()}}

                                        <?php $pourcentage = $paiement->getSessionpaiement()->getPourcentagegain();?>

                                    </td>
                                    <td>{{$paiement->getUSer()->getFirstname()}} {{$paiement->getUser()->getLastname()}} </td>
                                    <td>{{$paiement->getMotif()}}</td>
                                    <td>{{$paiement->getNbremonth()}}</td>
                                    <td>{{$paiement->getMontant()}} €</td>
                                    <td><?php $a='this.created_at';?>{{$paiement->$a}}</td>
                                    <?php $a = ($paiement->getMontant()*$pourcentage)/100; ?>
                                    <?php
                                        if($a > 0 && $code[0]->getType() == "1"){
                                            $b = ($paiement->getMontant()*2)/100;
                                            $a = $a - $b;
                                        }
                                        $total += $a;
                                    ?>

                                    <td>{{$a}}€</td>
                                </tr>

                            @endforeach
                                @if($total == 0)
                                    <tr>
                                        <td colspan="7">@tt("Aucun achat n'a encore été effectué avec votre code")</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td style="text-align: center" colspan="5">
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
                @endif
            @endif
        @endif


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

        $total  = '{{$total}}'+'€';
        $('#gain_total').html($total);

    </script>
@endsection
