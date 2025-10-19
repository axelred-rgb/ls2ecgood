@extends('board.layoutboard')
@section('content')								
	<div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
		<h4 class="box-title mb-0">
			@tt("Labs reservations list")
		</h4>
		<hr>
		<div class="table-responsive">
			<table class="table no-border">
				<thead>
					<tr class="text-uppercase bg-lightest">
						<th><span class="text-dark">@tt("User Name")</span></th>
						<th><span class="text-fade">@tt("Labs")</span></th>
                        <th><span class="text-fade">@tt("Key")</span></th>
						<th><span class="text-fade">@tt("Start date")</span></th>
                        <th><span class="text-fade">@tt("End date")</span></th>
						<th><span class="text-fade">@tt("Status")</span></th>
                        <th><span class="text-fade">@tt("Action")</span></th>

					</tr>
				</thead>
				<tbody>
                @foreach(array_reverse($results) as $reservation)
                        <tr>
                            <td id="title{{$reservation->getId()}}" >
                                {{$reservation->getUser()->firstname}} {{$reservation->getUser()->lastname}}
                            </td>
                            
                            <td>
                                {{$reservation->getLabs()->getCourses()->getName()}}
                            </td>
                            <td>
                                {{$reservation->getLabs_keys()->getLogin()}}
                            </td>
                            <td>
                                {{$reservation->getDate()}}
                            </td>
                            <td>
                                {{$reservation->getDatefin()}} 
                            </td>
                            <td>
                                
                                @if(strtotime($reservation->getDatefin()) < time() )
                                    <label class="badge badge-primary" style="background-color:#e9182f;border-color:#e9182f">@tt("Is finished")</label>
                                @endif
                                @if(strtotime($reservation->getDate()) > time() )
                                    <label class="badge badge-warning">@tt("Is Waiting")</label>
                                @endif
                                @if(strtotime($reservation->getDate()) < time() && strtotime($reservation->getDatefin()) > time() && $reservation->getStatut() == 0)
                                    <label class="badge badge-dark">@tt("In progress and awaiting launch")</label>
                                @endif
                                @if(strtotime($reservation->getDate()) < time() && strtotime($reservation->getDatefin()) > time() && $reservation->getStatut() == 1)
                                    <label class="badge badge-success">@tt("Running")</label>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger" onclick="getDataDelete('{{$reservation->getId()}}')" id="buttonDelete"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-trash"></i></button>
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
        function getDataDelete(post){
            id=post;
            title = '';
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want too delete this reservation') ?.<br><strong style='color:#e9182f'>@tt('WARNING!! this action is irreversible')</strong>",
                'theme': 'blue',
                'btns': [
                    {'text':'@tt("Yes")', 'closeAlert':false, 'onClick': function(){app.deleteReservation(this,id);return false; }},
                    {'text':'@tt("No")', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

    </script>
@endsection

