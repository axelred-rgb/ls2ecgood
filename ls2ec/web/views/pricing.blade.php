@extends('layout')
@section('content')
	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Pricing")</h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section class="py-50">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-12 text-center">
					<h2 class="text-uppercase mb-15 fw-600">@tt("Our online Learning Plan")<br> <span class="fw-400 fs-24"></span></h2>
					<h3 class="mb-15 fw-600"><span class="fw-400 fs-24">@tt("Paiement par CPF disponible en 2022")</span></h3>
				</div>
			</div>
			<div class="row justify-content-center">
				<ul class="nav nav-tabs justify-content-center bb-0 mb-10" role="tablist">
					<li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tableau1" role="tab">@tt("PARTICULIER")</a> </li>
					<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tableau2" role="tab">@tt("ENTREPRISE")</a> </li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="tableau1" role="tabpanel">
					<div class="row mt-30">
						@foreach(App::$subscription as $subscriptions)
							@if($subscriptions->getTarget()=="i")
								<div class="col-md-4 col-12">
									@if($subscriptions->getY_price()==45)
										<div class="price-table active bg-gray-100 pull-up">
											@else
												<div class="price-table bg-gray-100">
													@endif

													<div class="price-top bg-white">
														<div class="price-title">
															<h3 class="mb-15">{{$subscriptions->getName()}}</h3>
														</div>
														<div class="price-prize">
															<h2>{{$subscriptions->getM_price()}} € /<span> @tt("month")</span> <span>@tt("or")</span> {{$subscriptions->getY_price()}} € / <span>@tt("year")</span></h2>
														</div>
														<div class="price-button">
															<a class="btn btn-primary" href="{{route('cart')}}?id={{$subscriptions->getId()}}">@tt("Get It Now")</a>
														</div>
													</div>
													@if($subscriptions->getName()=="Basic")
														<div class="price-content">
															<div class="price-table-list">
																<ul class="list-unstyled">
																	<li> <i class="fa fa-check"></i> @tt("CCNA 200-301") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
																	<li><i class="fa fa-times"  style="color: red;"></i> @tt("CCNP 350-401 ENCOR") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-check"></i> @tt("NSE4") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-times"  style="color: red;"></i> @tt("NSE7") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-times"  style="color: red;"></i> @tt("CYBERSECUTITY") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																</ul>
															</div>
														</div>
													@elseif($subscriptions->getName()=="Intermediate")
														<div class="price-content">
															<div class="price-table-list">
																<ul class="list-unstyled">
																	<li> <i class="fa fa-times" style="color: red;"></i> @tt("CCNA 200-301") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
																	<li><i class="fa fa-check"></i> @tt("CCNP 350-401 ENCOR") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-times" style="color: red;"></i> @tt("NSE4") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-check" ></i> @tt("NSE7") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-times"  style="color: red;"></i> @tt("CYBERSECUTITY") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																</ul>
															</div>
														</div>
													@else
														<div class="price-content">
															<div class="price-table-list">
																<ul class="list-unstyled">
																	<li> <i class="fa fa-check"></i> @tt("CCNA 200-301") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
																	<li><i class="fa fa-check" ></i> @tt("CCNP 350-401 ENCOR") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-check"></i> @tt("NSE4") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-check"></i> @tt("NSE7") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																	<li><i class="fa fa-check"></i> @tt("CYBERSECUTITY") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
																</ul>
															</div>
														</div>
													@endif
												</div>
										</div>
									@else
									@endif
									@endforeach


								</div>
					</div>

					<div class="tab-pane" id="tableau2" role="tabpanel">
						<div class="row mt-30">
							@foreach(App::$subscription as $subscriptions)
								@if($subscriptions->getTarget()=="e")
									<div class="col-md-4 col-12" style="margin-bottom: 20px;">
										<div class="price-table active bg-gray-100 pull-up">
											<div class="price-top bg-white">
												<div class="price-title">
													<h3 class="mb-15">{{$subscriptions->getName()}}</h3>
												</div>
												<div class="price-prize">
													<h2>{{$subscriptions->getY_price()}} € / 5 @tt("Days")</h2>
												</div>
												<div class="price-button">
													<a class="btn btn-primary" href="{{route('cart')}}?id={{$subscriptions->getId()}}">@tt("Get It Now")</a>
												</div>
											</div>

										</div>
									</div>
								@else
								@endif
							@endforeach
						</div>
					</div>
				</div>
	</section>

@endsection
