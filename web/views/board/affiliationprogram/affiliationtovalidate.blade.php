@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
        <h4 class="box-title mb-0">
            @tt("Liste des affiliés à valider")
        </h4>
        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark">@tt("Name")</span></th>
                    <th><span class="text-fade">@tt("Email")</span></th>
                    <th><span class="text-fade">@tt("Phone")</span></th>
                    <th><span class="text-fade">@tt("Country")</span></th>
                    <th><span class="text-fade">@tt("Code")</span></th>
                    <th><span class="text-fade">@tt("Date de creation")</span></th>
                    <th><span class="text-fade">*</span></th>

                </tr>
                </thead>
                <tbody>
                @foreach($codes as $code)
                    <tr>
                        <td id="title{{$code->getId()}}">
                            {{$code->getUser()->getFirstname()}} {{$code->getUser()->getLastname()}}
                        </td>

                        <td>
                            {{$code->getUser()->getEmail()}}
                        </td>
                        <td>
                            {{$code->getUser()->getPhonenumber()}}
                        </td>
                        <td>
                            {{$code->getUser()->getCountry()->getName()}}
                        </td>
                        <td>
                            {{$code->getCode()}}
                        </td>

                        <td>
                            <?php $b='this.created_at';?>{{$code->$b}}
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="getDataDisable('{{$code->getId()}}')" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-times"></i></button>
                            <button class="btn btn-sm btn-success" onclick="getDataEnable('{{$code->getId()}}')" id="buttonEnable" > <i class="fa fa-check"></i></button>
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
                'content': "@tt('Voulez vous activer le code') "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){app.updateSimpleattributeinEntity(id,'codepromo',{'state':0},'',null,true) }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

        function getDataDisable(user){
            id=user;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Voulez vous rejetter ce code?') "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){app.updateSimpleattributeinEntity(id,'codepromo',{'state':-2},'',null,true) }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
@endsection
