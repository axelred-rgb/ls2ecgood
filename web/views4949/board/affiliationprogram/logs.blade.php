@extends('board.layoutboard')
@section('content')
    <?php $codes = Codepromo::where('type',1)->andwhere('this.state','=',0)->__getAll();?>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    @tt("PROGRAMME D'AFFILIATION")
                </h4>
            </div>
            <div class="col-md-6">
                <h4 class="box-title mb-0" style="font-weight: 100">
                    @tt("Total à payer" ):
                </h4>
                <strong id="gain_total"></strong>
            </div>
        </div>

        <hr>


            <div class="table-responsive mt-30">
                <table class="table table-striped">
                    <thead>
                    <tr class="bg-dark">
                        <th>@tt("Code")</th>
                        <th>@tt("Nom")</th>
                        <th>@tt("Email")</th>
                        <th>@tt("Phonenumber")</th>
                        <th>@tt("Date de creation")</th>
                        <th>@tt("Montant total")</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;$totaux=0;?>
                    @foreach(array_reverse($codes) as $code)
                        <?php
                        $total = 0;$a=0;
                        $paiements = array_reverse(Paiement::where('codepromo','=',$code->getCode())->__getAll());
                        ?>
                        <tr style="cursor: pointer;" onclick="window.location.href = '{{route('affiliationtransaction')}}?code={{$code->getCode()}}'">
                            @foreach($paiements as $paiement)
                                <?php $pourcentage = $paiement->getSessionpaiement()->getPourcentagegain();?>
                                <?php $a = ($paiement->getMontant()*$pourcentage)/100; $total += $a;?>
                            @endforeach
                            <?php $a = $total;?>
                            <td>{{$code->getCode()}}</td>
                            <td>{{$code->getUser()->getFirstname()}} {{$code->getUser()->getLastname()}}</td>
                            <td>{{$code->getUser()->getEmail()}}</td>
                            <td>{{$code->getUser()->getTelephone()}}</td>
                                <td><?php $b='this.created_at';?>{{$code->$b}}</td>
                            <td><?php $totaux += $a; ?>{{$a}} €</td>

                        </tr>

                    @endforeach
                        <tr>
                            <td colspan="5">
                                <h4>@tt('Total à payer')</h4></td>
                            <td>
                                <h4>{{$totaux}}  €</h4>
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
