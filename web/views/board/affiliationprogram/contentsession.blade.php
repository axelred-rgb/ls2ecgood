@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0 ">
                    @tt("Liste des operation au cours de la session") {{$sessionpaiement->getNumero()}}
                </h4>
            </div>
            <div class="col-md-6" style="padding-left: 30%;">
                <h4 class="box-title mb-0 " style="font-weight: 100">
                    @tt("Total à payer" ):
                </h4>
                <strong id="gain_total"></strong>
                <div class="row">
                    @if(App::$user->getRole() == 2)
                        <div class="col-12">
                            <a class="btn btn-sm btn-success" href="{{route('paiementspacekola')}}?session={{$sessionpaiement->getId()}}" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f">
                                <i class="fa fa-dollar"></i> @tt('Paiement spacekola')
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            @if(!isset($reference))
                <div class="col-4">
                    <label for="" id="stat_ets">@tt('Paiement entreprise') :</label>
                    <strong id="stat_ets_value"></strong>
                </div>
                <div class="col-4">
                    <label for="" id="stat_space">@tt('Paiement spacekola') :</label>
                    <strong id="stat_space_value">
                        <?php
                            $spacekola = Sessioncodepromo::where('sessionpaiement_id',$sessionpaiement->getId())
                                ->andwhere('ispacekola',1)
                                ->whereIsNull('codepromo_id')->__getOne();
                            echo $spacekola->getStateName();
                            $a = 'this.state';
                            if($spacekola->$a !== 0){
                        ?>
                        <a target="__blank" style="margin-top:2px;" href="{{route('generateinvoiceaffiliation')}}?id={{$spacekola->getId()}}">
                            <label for="" class="badge badge-primary">@tt('Téléchargez la facture')</label>
                        </a>
                        <?php } ?>

                    </strong>
                </div>
            @endif
            <div class="col-4">
                <label for="" id="stat_part">@tt('Paiement particulier') :</label>
                <strong id="stat_part_value"></strong>
            </div>

        </div>
        <hr>

        <div class="table-responsive mt-30">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th>@tt("Code")</th>
                    <th>@tt("Utilisateur")</th>
                    <th>@tt("Date de creation")</th>
                    <th>@tt('Type')</th>
                    <th>@tt("Montant total")</th>
                    <th>@tt("Etat du paiement") </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;$totaux=0; $isOk = true; $totalets = 0; $total_ets_pay = 0; $total_par = 0 ; $total_par_pay = 0 ?>
                @foreach(array_reverse($codes) as $code)

                    @if($code->getIspacekola() != 1)
                        @if(isset($reference) && $reference == 1)
                            @if($code->getCodepromo()->getUser()->getUsertype() != 2)
                                <?php $isOk = true;?>
                            @else
                                <?php $isOk = false;?>
                            @endif
                        @else
                            <?php $isOk = true;?>
                        @endif

                        <?php
                           if($code->getCodepromo()->getUser()->getUsertype() == 2){
                               $totalets++;
                               if($code->getState() == 1){
                                   $total_ets_pay++;
                               }
                           }
                           else{
                               $total_par++;
                               if($code->getState() == 1){
                                   $total_par_pay++;
                               }
                           }

                        ?>


                        @if($isOk)
                            <tr style="cursor: pointer;" >

                                <td onclick="window.location.href = '{{route('affiliationtransactionbysession')}}?code={{$code->getCodepromo()->getCode()}}&session={{$sessionpaiement->getId()}}'">
                                    {{$code->getCodepromo()->getCode()}}
                                </td>
                                <td onclick="window.location.href = '{{route('affiliationtransactionbysession')}}?code={{$code->getCodepromo()->getCode()}}&session={{$sessionpaiement->getId()}}'">
                                    {{$code->getCodepromo()->getUser()->getFirstname()}}
                                    {{$code->getCodepromo()->getUser()->getLastname()}} <br>
                                    {{$code->getCodepromo()->getUser()->getEmail()}}

                                </td>
                                <td onclick="window.location.href = '{{route('affiliationtransactionbysession')}}?code={{$code->getCodepromo()->getCode()}}&session={{$sessionpaiement->getId()}}'">
                                    <?php $b='this.created_at';?>{{$code->getCodepromo()->$b}}
                                </td>
                                <td onclick="window.location.href = '{{route('affiliationtransactionbysession')}}?code={{$code->getCodepromo()->getCode()}}&session={{$sessionpaiement->getId()}}'">
                                    <label class="badge badge-primary">
                                        {{$code->getCodepromo()->getUser()->getUsertypeName()}}
                                    </label>
                                </td>
                                <td onclick="window.location.href = '{{route('affiliationtransactionbysession')}}?code={{$code->getCodepromo()->getCode()}}&session={{$sessionpaiement->getId()}}'">
                                        <?php $totaux += $code->getMontant(); ?>
                                        {{$code->getMontant()}} €
                                </td>
                                <td>
                                    {{$code->getStateName()}}
                                    @if($code->getState() == 1)
                                        <a target="__blank" href="{{$code->getPreuve()}}">
                                            <label for="" class="badge badge-success">@tt('Téléchargez la preuve ')</label>
                                        </a>
                                        <a target="__blank" style="margin-top:2px;" href="{{route('generateinvoiceaffiliation')}}?id={{$code->getId()}}">
                                            <label for="" class="badge badge-primary">@tt('Téléchargez la facture')</label>
                                        </a>
                                    @endif
                                </td>

                            </tr>
                        @endif
                    @endif

                @endforeach
                <?php
                    $etspercent = 0;
                    if($totalets == 0){
                        $etspercent = tt('Aucun à effectuer');
                    }
                    else{
                        $etspercent = ($total_ets_pay/$totalets)*100;
                        $etspercent = $etspercent.' %';
                    }

                    $partpercent = 0;
                    if($total_par == 0){
                        $partpercent = tt('Aucun à effectuer');
                    }
                    else{
                        $partpercent = ($total_par_pay/$total_par)*100;
                        $partpercent = $partpercent.' %';
                    }
                ?>

                </tbody>
            </table>
        </div>


    </div>
@endsection
@section("jsimport")

    <script>
        @if(!isset($reference))
            $('#stat_ets_value').html('{{$etspercent}}');
        @endif
        $('#stat_part_value').html('{{$partpercent}}');

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
        $('#gain_total').html($total);

    </script>
@endsection
