@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <h4 class="box-title mb-0">
            @tt("Mes cours PECB")
        </h4>
        <hr>
        <h5 style="color: #0b8e36;font-weight: bold">@tt("Etapes à suivre")</h5>
        <p>
            <ul>
                <li>
                    @tt("Créer un compte sur PECB.COM")
                </li>
                <li>@tt("Connectez vous à votre compte")</li>
                <li>@tt("Suivez le cours")</li>
            </ul>
        </p>
        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark">@tt("Cours")</span></th>
                    <th><span class="text-fade">@tt("Détails")</span></th>

                    <th><span class="text-fade">@tt("Date d'inscription")</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach(array_reverse(App::$userpecbsubscription) as $usersubscription)
                    <?php $subscription = Subscription::find($usersubscription->getSubscription()->getId());?>
                    <tr>
                        <td>
                            {{$subscription->getCompletename()}}
                        </td>
                        <td>
                            @if($subscription->getType() == 3)
                                <label for="" class="badge badge-success">
                                    {{tt("Avec formateur")}}
                                </label> <br>
                                <?php $a = '5'.tt("days")?> {{$a}}
                            @elseif($subscription->getType() == 4)
                                <label for="" class="badge badge-success">
                                    {{tt("Sans formateur")}}
                                </label> <br>
                            @endif

                        </td>
                        <td>
                            <?php $a = 'this.created_at';?>
                            {{$subscription->$a}}

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
