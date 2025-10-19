@extends('layout')
@section('content')
	<!---page Title --->
	<section class="bg-img pt-150 pb-100" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">
						<br>
						<br>
						<h2 class="page-title text-white" style="font-size: 5rem; text-transform: lowercase">@tt("Le chemin de l'excellence")</h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section class="py-50 bg-bubbles-white">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="text-center no-border">
						<h1 class="box-title" >@tt("Augmentez votre valeur")</h1>
					</div>
				</div>
				<div class="col-xl-6 col-6" style="text-align: center;">
					<div class="box box-body">
						<div class="box-body" >
							<img src="{{ assets   }}images/avatar/stage.png" alt="..." >
							<br>
							<h1 class="mb-15">@tt("Compétence")</h1>
							<br>
							<p class="fs-22" style="text-align: justify">@tt("desc1_avantage1","Nous vous garantissons la compétence, car nos  formateurs utilisent une pédagogie créative basée des illustrations par l’image et par des exemples concrets et pratiques sur les problèmes rencontrés en entreprise.")</p>

						</div>
					</div>
				</div>
				<div class="col-xl-6 col-6">

				</div>
				<div class="col-xl-6 col-6">

				</div>
				<div class="col-xl-6 col-6">
					<div class="box box-body" style="text-align: center;">
						<div class="box-body">
							<img src="{{ assets   }}images/avatar/confidence.png" alt="..." style="width: 128px; height: 128px;">
							<br>
							<h1 class="mb-15">@tt("Confiance")</h1>
							<p class="fs-20" style="text-align: justify">@tt("Votre niveau de confiance grandira parce que vous serez compétent(e)s.")</p>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-6">
					<div class="box box-body" style="text-align: center;">
						<div class="box-body">
							<img src="{{ assets   }}images/avatar/promotion.png" alt="..." >
							<br>
							<h1 class="mb-15">@tt("Succès à vos entretiens d’embauche")</h1>
							<p class="fs-20" style="text-align: justify">@tt("Vos entretiens d’embauche seront une formalité parce que vous serez compétent(e)s et confiant(e)s.")</p>



						</div>
					</div>
				</div>
				<div class="col-xl-6 col-6">

				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>@tt("Recommandations")</h2>
				<hr>
			</div>
		</div>
		<div class="owl-carousel owl-theme owl-loaded owl-drag" data-nav-arrow="true" data-nav-dots="false" data-items="2" data-md-items="2" data-sm-items="2" data-xs-items="1" data-xx-items="1">
			<div class="owl-stage-outer">
				<div class="owl-stage" style="transform: translate3d(-2638px, 0px, 0px); transition: all 0.25s ease 0s; width: 5276px;">

					<div class="owl-item" style="width: 639.5px; margin-right: 20px;">
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="{{ assets   }}images/avatar/5.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h4 class="name">Brice Njonga</h4>
									<p>Operation Core Voice Network engineer chez Hub One</p>
								</div>
								<div class="testimonial-content">
									<p class="fs-16">J'ai rarement rencontré un collègue aussi professionnel et passionné par son métier. Je reste admiratif devant son implication professionnelle, son veritable sens de la pédagogie et sa facilité pour transmettre son savoir à ceux qui l'entoure. J'espère qu'on aura l'occasion de travailler ensemble de nouveaux.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="owl-item" style="width: 639.5px; margin-right: 20px;">
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="{{ assets   }}images/avatar/2.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h4 class="name">Alexia CATALOGNA</h4>
									<p>Ingénieure Réseaux et Sécurité chez Hub One</p>
								</div>
								<div class="testimonial-content">
									<p class="fs-16">Travailler avec Claude-Marcel c'est apprendre chaque jour, il m'a aidé à grandir professionnellement et je le remercie grandement pour ça. Merci pour ta pédagogie, ta patience et ton professionnalisme</p>
								</div>
							</div>
						</div>
					</div>
					<div class="owl-item" style="width: 639.5px; margin-right: 20px;">
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="{{ assets   }}images/avatar/5.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h4 class="name">Thomas Scainelli</h4>
									<p>ingénieur réseau et sécurité chez Hub One</p>
								</div>
								<div class="testimonial-content">
									<p class="fs-16">Claude Marcel a été un collègue avec lequel j'ai pu apprendre beaucoup de chose et augmenter mon expertise technique. Il a toujours été patient et pédagogue lorsqu'il m'enseignait quelque chose, surtout avec des schémas clair et précis ! Merci a toi pour tout.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="owl-item" style="width: 639.5px; margin-right: 20px;">
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="{{ assets   }}images/avatar/2.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h4 class="name">Soumaya Houari</h4>
									<p>Responsable pôle Développement RH</p>
								</div>
								<div class="testimonial-content">
									<p class="fs-16">J'ai eu le plaisir de collaborer avec Claude Marcel principalement sur des sujets de formation. Avant tout, j'ai été impressionné par la capacité de Claude Marcel à se fixer des objectifs et se donner les moyens de les atteindre. Sa détermination a été un véritable atout dans son évolution au sein de Hub One, et j’en suis sûre va lui permettre de réussir dans son nouveau projet. Au-delà de sa détermination, c’est quelqu’un avec qui il est très facile d’échanger. Je lui souhaite pleine réussite dans son nouveau projet 😉</p>
								</div>
							</div>
						</div>
					</div>
					<div class="owl-item" style="width: 639.5px; margin-right: 20px;">
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="{{ assets   }}images/avatar/5.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h4 class="name">Julien Lopez</h4>
									<p>Team Leader Service Manager chez Hub One</p>
								</div>
								<div class="testimonial-content">
									<p class="fs-16">Je recommande fortement Claude Marcel pour vos activités Réseaux et Telecom. J'ai eu la chance de travailler avec lui pendant plusieurs années et peut attester de son professionnalisme et de sa motivation #réseau #sécurité #cybersécurité #cloud</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-nav">
				<div class="owl-prev">
					<i class="fa fa-angle-left fa-2x">

					</i>
				</div>
				<div class="owl-next">
					<i class="fa fa-angle-right fa-2x">

					</i>
				</div>
			</div>

		</div>


	</div>

	<section class="py-50 aos-init aos-animate" data-aos="fade-up">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-12 text-center">
					<h1 class="mb-15">@tt("Nos formateurs sont certifiés")</h1>
					<hr class="w-100 bg-primary">
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-1">

				</div>
				<div class="col-2">
					<div class="owl-stage-outer">
						<div class="owl-stage" >
							<div class="owl-item cloned" >
								<div class="item">
									<img src="{{ assets   }}images/avatar/ccna.png" style="width: 199.833px; height: 133px;" class="img-fluid my-15 rounded box-shadowed pull-up" alt="">
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-2">
					<div class="owl-stage-outer">
						<div class="owl-stage" >
							<div class="owl-item cloned" >
								<div class="item">
									<img src="{{ assets   }}images/avatar/ccnp1.png" style="width: 199.833px; height: 133px;" class="img-fluid my-15 rounded box-shadowed pull-up" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-2">
					<div class="owl-stage-outer">
						<div class="owl-stage" >
							<div class="owl-item cloned" >
								<div class="item">
									<img src="{{ assets   }}images/avatar/ccie.png" style="width: 199.833px; height: 133px;" class="img-fluid my-15 rounded box-shadowed pull-up" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-2">
					<div class="owl-stage-outer">
						<div class="owl-stage" >
							<div class="owl-item cloned" >
								<div class="item">
									<img src="{{ assets   }}images/avatar/nse4.png" style="width: 150px; height: 133px;" class="img-fluid my-15 rounded box-shadowed pull-up" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-2">
					<div class="owl-stage-outer">
						<div class="owl-stage" >
							<div class="owl-item cloned" >
								<div class="item">
									<img src="{{ assets   }}images/avatar/nse7.png" style="width: 150px; height: 133px;" class="img-fluid my-15 rounded box-shadowed pull-up" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-1">

				</div>
			</div>
		</div>
	</section> 

	

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
															<span>@tt('Available from January 2022')</span>
														</div>
														<div class="price-prize">
															<?php
															$pricem = $subscriptions->getM_price();
															$priceafricam = $subscriptions->getM_a_price();

															$price = $subscriptions->getY_price();
															$priceafrica = $subscriptions->getY_a_price();
															$priceafrica =  number_format($priceafrica);
															$price = number_format($price);

															$priceafricam =  number_format($priceafricam);
															$pricem = number_format($pricem);
															?>
																<label style="font-size: 18px; font-weight: bold" for="">@tt('Europe-Amerique-Asie')</label>
																<h2 style="font-size: 1.3rem">{{$pricem}} € /<span> @tt("month")</span> <span>@tt("or")</span> {{$price}} € / <span>@tt("year")</span></h2>
																<hr>
																<label style="font-size: 18px; font-weight: bold" for="">@tt('Afrique')</label>

																<h2 style="font-size: 1.3rem">{{$priceafricam}} € /<span> @tt("month")</span> <span>@tt("or")</span> {{$priceafrica}} € / <span>@tt("year")</span></h2>
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
				</div>
			</div>
		</div>
	</section>





	

	@endsection
	
	
