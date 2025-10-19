@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-payments" role="tabpanel" aria-labelledby="pills-payments-tab">

        <h4 class="box-title mb-0">
            @tt("My Resources")
        </h4>
        <hr>


        <!-- Tab panes -->

        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th>@tt("Product")</th>
                    <th>@tt("Montant")</th>
                    <th>@tt("Download")</th>
                    <th>@tt("Date")</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $ressources = Productpaiement::where('paiement.user_id',App::$user->GetId())->get();
                    ?>
                    @foreach(array_reverse($ressources) as $r)
                        <tr>
                            <td>{{$r->getProduct()->getName()}}</td>
                            <td>{{$r->getProduct()->getPriceofsale()}} €</td>
                            <td>
                                {!! $r->getProduct()->showDocument() !!}
                            </td>
                            <td><?php $a='this.created_at';?>{{$r->$a}}</td>

                        </tr>
                    @endforeach
                    <?php $paiements = array_reverse(App::$myressources); ?>
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

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection