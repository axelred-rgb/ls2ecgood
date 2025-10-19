@extends('layout')
@section('content')
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Resources")</h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section class="py-50">
		<div class="container">

			<div class="row justify-content-center">

				@foreach(array_reverse(Article::all()) as $articles)
				<div class="col-lg-9 col-12">
					<div class="box">


						<div class="row g-0">
							<div class="col-md-4 col-12 bg-img h-md-auto h-250" style="background-image: url({{__env}}uploads/article/{{$articles->getImage()}})"></div>
							<div class="col-md-8 col-12">
								<div class="box-body">
									<h4><a href="{{route('blog')}}/{{$articles->getId()}}">{{$articles->getTitle()}}</a></h4>
									<div class="d-flex mb-10">
										<div class="me-10">
											<i class="fa fa-user me-5"></i> LS2EC
										</div>
									</div>

									<p>{{$articles->getResume()}}</p>

									<div class="flexbox align-items-center mt-3">
										<a class="btn btn-sm btn-primary" href="{{route('blog')}}/{{$articles->getId()}}">@tt("Read more")</a>

									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

@endsection
