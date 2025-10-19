@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-payments" role="tabpanel" aria-labelledby="pills-payments-tab">
        @if(isset($reference))
            <h4 class="box-title mb-0">
                @tt("Purshase")
            </h4>
        @else
            <h4 class="box-title mb-0">
                @tt("My Resources")
            </h4>
        @endif
        <hr>


        <!-- Tab panes -->

        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    @if(isset($reference))
                        @if(App::$user->getRole() == 2 || App::$user->getRole() == 3)
                            <th>@tt("User")</th>
                        @endif
                    @endif
                    <th>@tt("Product")</th>
                    <th>@tt("Montant")</th>
                    <th>@tt("Download")</th>
                    <th>@tt("Date")</th>
                    <th>@tt("Invoice")</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($reference)){
                        if(App::$user->getRole() == 2 || App::$user->getRole() == 3) {
                            $paiements = array_reverse(Paiement::select()->whereNotNull("this.product_id", "WHERE")->get());
                        }
                        else{
                            $paiements = array_reverse(App::$myressources);
                        }
                    }
                    else{
                        $paiements = array_reverse(App::$myressources);
                    }
                    ?>
                    @foreach($paiements as $paiement)
                        <tr>
                            @if(isset($reference))
                                @if(App::$user->getRole() == 2 || App::$user->getRole() == 3)
                                    <td>{{$paiement->getUser()->getFirstname()}} {{$paiement->getUser()->getLastname()}}</td>
                                @endif
                            @endif
                            <td>{{$paiement->getMotif()}}</td>
                            <td>{{$paiement->getMontant()}} €</td>
                            <td>
                                {!! $paiement->getProduct()->showDocument() !!}

                            </td>
                            <td><?php $a='this.created_at';?>{{$paiement->$a}}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{route('invoiceproduct')}}?id={{$paiement->getId()}}"  id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-download"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection