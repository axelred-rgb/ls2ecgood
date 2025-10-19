@extends('board.layoutboard')
@section('content')								
	<div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
		<h4 class="box-title mb-0">
			@tt("Token purchase list")
		</h4>
		<hr>
		<div class="table-responsive">
			<table class="table no-border">
				<thead>
					<tr class="text-uppercase bg-lightest">
						<th><span class="text-dark">@tt("Name")</span></th>
						<th><span class="text-fade">@tt("Pack")</span></th>
                        <th><span class="text-fade">@tt("Price")</span></th>
						<th><span class="text-fade">@tt("Quantite")</span></th>
                        <th><span class="text-fade">@tt("Total price")</span></th>
						<th><span class="text-fade">@tt("Date")</span></th>
					</tr>
				</thead>
				<tbody>
                @foreach(array_reverse($results) as $user_token)
                        <tr>
                            <td id="title{{$user_token->getId()}}" >
                                {{$user_token->getUser()->firstname}} {{$user_token->getUser()->lastname}}
                            </td>
                            
                            <td>
                                {{$user_token->getPacktokken()->getNombre()}}
                            </td>
                            <td>
                                {{$user_token->getPacktokken()->getPrix()}}
                            </td>
                            <td>
                                {{$user_token->getQuantite()}}
                            </td>
                            <td>
                                {{$user_token->getPacktokken()->getPrix()*$user_token->getQuantite()}} €
                            </td>
                            <td>
                                {{$user_token->getDate()}}
                            </td>
                        </tr>
                @endforeach
				</tbody>
			</table>
		</div>
	</div>								
@endsection

