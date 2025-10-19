@extends('layout')
@section('content')
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">
						<h2 class="page-title text-white">@tt("Courses Details")</h2>

					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Page content -->

	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-md-7 col-12">
					<div class="box">
						<div class="box-body">
							<h3 class="box-title">{{$course->getName()}}</h3>
							<div class="cour-stac d-lg-flex align-items-center text-fade">
								<div class="d-flex align-items-center">
									<p>@tt("Start Date") @tt("Imediatly")</p>
									<p class="lt-sp">|</p>
									<p>{{$course->provider->getName()}}</p>
									<p class="lt-sp">|</p>
								</div>
								<div class="d-flex align-items-center">
									<p><i class="fa fa-calendar text-muted me-5"></i> 60 @tt("hours")</p>
									<p class="lt-sp">|</p>
								</div>
								<div class="d-flex align-items-center">
									<p>@tt("English - French")</p>
								</div>
							</div>

						</div>
					</div>
					<div class="box">
						<div class="box-body">
							<h4 class="box-title mb-0 fw-500">@tt("Description")</h4>
							<hr>
							<p class="fs-16 mb-30">
								{!! $course->getDescription() !!}
								</p>
							<hr>
							<h4 class="box-title mb-0 fw-500">@tt("Certification")</h4>
							<p class="fs-16 mb-30">@tt("At the end of this courses you are able to run for certification.")</p>
						</div>
					</div>

					<div class="box">
						<div class="box-body">
							<h4 class="box-title mb-0 fw-500">@tt("Curriculum Details")</h4>
							<hr>
							<ul class="course-curriculum">
								@foreach($sections as $section)
								<li>
									<h5 class="text-primary fw-500">{{$section->getTitle()}}</h5>
									<ul class="list-unstyled">
										@foreach($section->getActivities() as $activity)
										<li>
											<div class="list-bx">
												{{$activity->getTitle()}}
											</div>
										</li>
										@endforeach
									</ul>
								</li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>
				<div class="col-xl-4 col-md-5 col-sm-12">
					<div class="course-detail-bx">
						<div class="box box-body">

							<div class="text-center">
								<button type="button" onclick="location.href='{{route('pricing')}}';" class="waves-effect waves-light btn w-p100 btn-success mb-10">Enroll Now</button>
							</div>
						</div>
						<div class="box box-body">
							<ul class="course-overview list-unstyled b-1 bg-gray-100">
								<li><i class="ti-calendar"></i> <span class="tag">@tt("Start Date") </span> <span class="value">@tt("Immediatly")</span></li>
								<li><i class="fa fa-language"></i> <span class="tag">@tt("Language") </span> <span class="value">@tt("English, Spanish")</span></li>
								<li><i class="ti-book"></i> <span class="tag">@tt("Sessions") </span> <span class="value">10</span></li>
								<li><i class="ti-help-alt"></i> <span class="tag">@tt("Exam")</span> <span class="value">2</span></li>
								<li><i class="ti-time"></i> <span class="tag">@tt("Duration")</span> <span class="value">60 @tt("hours")</span></li>
								<li><i class="ti-stats-up"></i> <span class="tag">@tt("Level")</span> <span class="value">@tt("Beginner")</span></li>
								<li><i class="ti-smallcap"></i> <span class="tag">@tt("Language")</span> <span class="value">@tt("English")</span></li>
								<li><i class="ti-user"></i> <span class="tag">@tt("Students")</span> <span class="value">15</span></li>
								<li><i class="ti-check-box"></i> <span class="tag">@tt("Assessments")</span> <span class="value">@tt("Yes")</span></li>
							</ul>
						</div>
						<div class="box box-body">
							<div class="staff-bx">
								<div class="staff-info d-flex align-items-center">
									<div class="staff-thumb me-10">
										<img src="{{ assets   }}images/avatar/avatar-1.png" alt="" class="bg-secondary-light rounded-circle max-w-60">
									</div>
									<div class="staff-name">
										<h5 class="mb-0">{{$course->provider->getName()}}</h5>
										<span>Instructor</span>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
