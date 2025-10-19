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
                    @if(App::$user->getRole() == 2 || App::$user->getRole() == -2)
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
                    <?php $typepaiement = 'subscription';?>
                    @if($paiement->getNbremonth() == 0)
                            <?php $typepaiement = 'produit';?>
                    @endif
                    <tr>
                        <td>{{$paiement->getMotif()}}</td>
                        <td>{{$paiement->getMontant()}} €</td>
                        <td>{{$paiement->getReduction()}}%</td>
                        <td>{{$paiement->getCodepromo()}}</td>

                        @if(App::$user->getRole() == 2 || App::$user->getRole() == -2)
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
                            @if($typepaiement == 'subscription')
                                <a class="btn btn-sm btn-success" href="{{route('invoice')}}?id={{$paiement->getId()}}"  id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-download"></i></a><br>

                                <a target="__blank" href="{{__front}}document/formulaire_retractation.pdf">@tt('Formulaire de retractation')</a><br>
                                <a target="__blank" href="{{__front}}document/CGV.pdf">@tt('CGV LS2EC')</a>
                            @else
                                <a class="btn btn-sm btn-success" href="{{route('invoiceproduct')}}?id={{$paiement->getId()}}"  id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-download"></i></a><br>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection