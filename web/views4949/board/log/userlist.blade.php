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
						<th><span class="text-dark">@tt("Name")</span></th>
						<th><span class="text-fade">@tt("Contacts")</span></th>
						<th><span class="text-fade">@tt("Date d'inscription")</span></th>
                        <th><span class="text-fade">@tt("Country")</span></th>
						<th><span class="text-fade">@tt("Tokens")</span></th>
						<th><span class="text-fade">@tt("Status")</span></th>
                        <th><span class="text-fade">*</span></th>
						
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<tr>
						<td id="title{{$user->getId()}}">
							{{$user->firstname}} {{$user->lastname}}
						</td>
						
						<td>
                            {{$user->email}} <br> {{$user->phonenumber}}

						</td>
                        <td>
                            <?php $a = 'this.created_at';?>
							{{$user->$a}}
						</td>
						<td>
							{{$user->getCountry()->getName()}}
						</td>
                        <td>
							{{$user->token}}
						</td>
						<td>
							@if($user->is_activated == 1)
                                <label class="badge badge-warning">@tt("Active")</label>
                            @else
                                <label class="badge badge-secondary">@tt("Inactive")</label>
                            @endif
						</td>
						<td>
                            @if($user->is_activated == 1)
                                <button class="btn btn-sm btn-danger" onclick="getDataDisable('{{$user->getId()}}')" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-times"></i></button>
                            @else
                                <button class="btn btn-sm btn-success" onclick="getDataEnable('{{$user->getId()}}')" id="buttonEnable" > <i class="fa fa-check"></i></button>
                            @endif
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
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){app.updateSimpleattributeinEntity(id,'user',{'is_activated':1},'') }},
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
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){app.updateSimpleattributeinEntity(id,'user',{'is_activated':2},'')}},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>
@endsection
