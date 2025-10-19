@extends('layout')
@section('content')
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt('Resources')</h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-8 col-12">
					<div class="blog-post mb-30">
						<div class="entry-image clearfix">
							<img class="img-fluid" src="{{__env}}uploads/article/{{$article->getImage()}}" alt="">
						</div>
						<div class="blog-detail">
							<div class="entry-meta mb-10">
								<ul class="list-unstyled">
									<div class="me-10">
										<i class="fa fa-user me-5"></i> LS2EC
									</div>
								</ul>
							</div>
							<hr>
							<div class="entry-title mb-10">
								<a href="#" class="fs-24">{{$article->getTitle()}}</a>
							</div>
							<div class="entry-content">
								<p style="text-align: justify;">{!! $article->getDescription() !!}</p>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection