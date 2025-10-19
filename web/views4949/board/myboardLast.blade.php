@extends('board.layoutboard')
@section('content')								
	<div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
		<h4 class="box-title mb-0">
			@tt("My Courses")
		</h4>
		<hr>
		<div class="table-responsive">
			<table class="table no-border">
				<thead>
					<tr class="text-uppercase bg-lightest">
						<th><span class="text-dark">@tt("Coursed")</span></th>
						<th><span class="text-fade">@tt("Category")</span></th>
						<th><span class="text-fade">@tt("Fees")</span></th>
						<th><span class="text-fade">@tt("Faculty")</span></th>
						<th><span class="text-fade">@tt("Status")</span></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($mycourses as $u_courses)
					<tr>
						<td>
							{{$u_courses->courses->getName()}}
						</td>
						<td>
							{{$u_courses->courses->academies->getName()}}
						</td>
						<td>
							@tt("paid")
						</td>
						<td>
							{{$u_courses->courses->provider->getId()}}
						</td>
						<td>
						<a target="_blank" href="{{'gotocourse'}}?id={!! $u_courses->courses->getProvidercoursesid() !!}"><span  class="badge badge-success badge-lg">@tt("continue")</span>
						</a>
						<td>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>								
@endsection
