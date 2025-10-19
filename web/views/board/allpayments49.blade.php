@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-payments" role="tabpanel" aria-labelledby="pills-payments-tab">
        <h4 class="box-title mb-0">
            @tt("All payments")
        </h4>
        <hr>


        <!-- Tab panes -->

        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th>@tt("Souscription")</th>
                    <th>@tt("Montant")</th>
                    <th>@tt("Reduction")</th>
                    <th>@tt("Code promo")</th>
                    @if(App::$user->getRole() == 2)
                        <th>@tt("User")</th>
                    @endif
                    <th>@tt("Date")</th>
                    <th>@tt("Date expiration")</th>
                    <th>@tt("Invoice")</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $paiements = array_reverse(Paiement::select('*')->whereIsNull("this.product_id")->__getAll());

                ?>
                @foreach($paiements as $paiement)
                    <tr>
                        <td>{{$paiement->getMotif()}}</td>
                        <td>{{$paiement->getMontant()}} €</td>
                        <td>{{$paiement->getReduction()}}%</td>
                        <td>{{$paiement->getCodepromo()}}</td>

                        @if(App::$user->getRole() == 2)
                            <td>{{$paiement->getUser()->getFirstname()}} {{$paiement->getUser()->getLastname()}}</td>
                        @endif
                        <td><?php $a='this.created_at';?>{{$paiement->$a}}</td>
                        <td>
                            <?php
                            $your_date = strtotime($paiement->$a);
                            $effectiveDate = date('Y-m-d', strtotime("+" . $paiement->getNbremonth() . " months", $your_date));?>
                            {{$effectiveDate}}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{route('invoice')}}?id={{$paiement->getId()}}"  id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-download"></i></a><br>
                            <a target="__blank" href="{{__front}}uploads/formulaire_retractation.pdf">@tt('Formulaire de retractation')</a><br>
                                <a target="__blank" href="{{__front}}uploads/CGV.doc">@tt('CGV LS2EC')</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection