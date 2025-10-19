@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <h4 class="box-title mb-0">
            @tt("Users list")
        </h4>
        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark">@tt("Code promo")</span></th>
                    <th><span class="text-fade">@tt("Dénomination")</span></th>
                    <th><span class="text-fade">@tt("Sigle")</span></th>
                    <th><span class="text-fade">@tt("Siret")</span></th>
                    <th><span class="text-fade">@tt("Banque")</span></th>
                    <th><span class="text-fade">@tt("IBAN")</span></th>
                    <th><span class="text-fade">@tt("Statut")</span></th>

                    <th><span class="text-fade">*</span></th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td id="title{{$user->getId()}}">
                            <?php $code = Codepromo::where('user_id',$user->getId())->__getOne(); ?>
                            {{$code->getCode()}}
                        </td>
                        <td>
                            {{$user->getDenomination()}}
                        </td>

                        <td>
                            {{$user->getSigle()}}
                        </td>
                        <td>
                            {{$user->getSiret()}}
                        </td>
                        <td>
                            {{$user->getBanque()}}
                        </td>
                        <td>
                            {{$user->getIban()}}
                        </td>

                        <td>
                            @if($user->getEntreprisestatut() == 0)
                                <label style="background-color: #9d9105!important;" class="badge badge-primary">@tt("En attente de validation")</label>
                            @elseif($user->getEntreprisestatut() == 1)
                                <label class="badge badge-primary">@tt("Validées")</label>
                            @else
                                <label style="background-color: #ff0000!important;" class="badge badge-danger">@tt("Rejettées")</label>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="getDataDisable('{{$user->getId()}}')" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-times"></i></button>
                            <button class="btn btn-sm btn-success" onclick="getDataEnable('{{$user->getId()}}')" id="buttonEnable" > <i class="fa fa-check"></i></button>
                        </td>
                    </tr>
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
        function getDataEnable(user){
            id=user;

            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want to enable user') "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){
                            app.updateSimpleattributeinEntity(id,'user',{'entreprisestatut':1},'');
                            return false;
                        }
                    },
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

        function getDataDisable(user){
            id=user;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want to disable user') "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){
                        app.updateSimpleattributeinEntity(id,'user',{'entreprisestatut':-1},'');
                        return false; }
                    },
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
@endsection
