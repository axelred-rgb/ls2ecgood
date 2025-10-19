@extends('layout')
@section('content')

    <style>
        .blink {
            animation: blinker 1.5s linear infinite;
            color: #0b8e36;
            font-weight: bold;
            font-size: 25px;
        }
        @keyframes blinker {
            50% { opacity: 0; }
        }
        .blink-one {
            animation: blinker-one 1s linear infinite;
        }
        @keyframes blinker-one {
            0% { opacity: 0; }
        }
        .blink-two {
            animation: blinker-two 1.4s linear infinite;
        }
        @keyframes blinker-two {
            100% { opacity: 0; }
        }
        .labelvideo{
            margin-top: 10px;
           
            
        }
    </style>
	
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
	
		<section style="margin-bottom:50px">
		<div class="container">
                <div class="row" >
                    <div class="col-12" >
                        <h3 style="text-align: center">
                            @tt('Comment effectuer le paiement')
                        </h3>
                    </div>
                    
                    <div class="col-sm-12">
                        <div style="position: relative; padding-top: 40%;"><iframe src="https://iframe.mediadelivery.net/embed/32653/fd127992-145d-4294-8676-39c2ea714aa5?autoplay=false" loading="lazy" style="border: none; position: absolute; top: 0; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" allowfullscreen="true"></iframe></div>
                    </div>
                </div>
		</div>
	</section>

	<section class="">
		<div class="container">


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
                                <div class="col-md-4 col-sm-12">
                                    @if($subscriptions->getType()==1)
                                        <div class="price-table active bg-gray-100 pull-up">
                                            @else
                                                <div class="price-table bg-gray-100">
                                                    @endif
                                                    @if($subscriptions->getOnlyname() == 'annuel')
                                                        <div class="price-top bg-white">
                                                            <div class="price-title">
                                                                <h3 class="mb-15">{{$subscriptions->getCompletename()}}</h3>
                                                            </div>
                                                            <div class="col-12">

                                                                
                                                            </div>
                                                            <div class="price-prize">
                                                                <?php
                                                                $pricem = ($subscriptions->getM_price()*0.2)+$subscriptions->getM_price();
                                                                $pricet = ($subscriptions->getY_price()*0.2)+$subscriptions->getY_price();

                                                                //$pricem = number_format($pricem);
                                                                ?>
                                                                
                                                                <h2 style="font-size: 1.3rem"> <span style="text-decoration: line-through">{{$pricet}} €</span> {{$pricem}} € <span>@tt("TTC") @tt('avec') {{$subscriptions->getRedu()}}% @tt('de réduction') (@tt('recommandé')).</span></h2>
                                                                <!--label class="blink">@tt('BLACK FRIDAY') -40%</label>-->
                                                                
                                                                <hr>
                                                                
                                                            </div>
                                                            <div class="price-button">
                                                                <a class="btn btn-primary" href="{{route('cart')}}?id={{$subscriptions->getId()}}">@tt("Get It Now")</a>
                                                            </div>
                                                        </div>
                                                        <div class="price-content">
                                                            <div class="price-table-list">
                                                                <ul class="list-unstyled">
                                                                    <li style="text-transform: uppercase;">
                                                                        <i class="fa fa-check"></i>
                                                                        <strong>
                                                                            {{$subscriptions->getToken()}} @tt(" Jetons pour accéder aux labs (32h de pratique)")
                                                                        </strong>
                                                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                                                    </li>
                                                                    <li> <i class="fa fa-check"></i> @tt("CCNA 200-301") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
                                                                    <li><i class="fa fa-check" ></i> @tt("CCNP 350-401 ENCOR") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("NSE4") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("NSE7") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("CYBERSECUTITY") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li style="text-transform: uppercase;"><i class="fa fa-check"></i> @tt("Accès au groupe privé Facebook") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @elseif($subscriptions->getOnlyname() == 'trimestriel')
                                                        <div class="price-top bg-white">
                                                            <div class="price-title">
                                                                <h3 class="mb-15">{{$subscriptions->getCompletename()}}</h3>
                                                            </div>
                                                            <div class="col-12">
                                                                
                                                            </div>
                                                            <div class="price-prize">
                                                                <?php
                                                                $pricem = ($subscriptions->getM_price()*0.2)+$subscriptions->getM_price();
                                                                $pricet = ($subscriptions->getY_price()*0.2)+$subscriptions->getY_price();

                                                                //$pricem = number_format($pricem);
                                                                ?>
                                                                <h2 style="font-size: 1.3rem"> <span style="text-decoration: line-through">{{$pricet}} €</span> {{$pricem}} € <span>@tt("TTC") @tt('avec') {{$subscriptions->getRedu()}}% @tt('de réduction') .</span></h2>
                                                                <!--<label class="blink">@tt('BLACK FRIDAY') -40%</label>-->
                                                                <hr>
                                                                
                                                            </div>
                                                            <div class="price-button">
                                                                <a class="btn btn-primary" href="{{route('cart')}}?id={{$subscriptions->getId()}}">@tt("Get It Now")</a>
                                                            </div>
                                                        </div>
                                                        <div class="price-content">
                                                            <div class="price-table-list">
                                                                <ul class="list-unstyled">
                                                                    <li style="text-transform: uppercase;">
                                                                        <i class="fa fa-check"></i>
                                                                        <strong>
                                                                            {{$subscriptions->getToken()}} @tt("Jetons pour accéder aux labs (8h de pratique)")
                                                                        </strong>
                                                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                                                    </li>
                                                                    <li> <i class="fa fa-check"></i> @tt("CCNA 200-301") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
                                                                    <li><i class="fa fa-check" ></i> @tt("CCNP 350-401 ENCOR") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("NSE4") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("NSE7") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("CYBERSECUTITY") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li style="text-transform: uppercase;"><i class="fa fa-check"></i> @tt("Accès au groupe privé Facebook") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @elseif($subscriptions->getOnlyname() == 'mensuel')
                                                        <div class="price-top bg-white">
                                                            <div class="price-title">
                                                                <h3 class="mb-15">{{$subscriptions->getCompletename()}}</h3>
                                                            </div>
                                                            <div class="price-prize">
                                                                <?php
                                                                $pricem = ($subscriptions->getM_price()*0.2)+$subscriptions->getM_price();

                                                                $pricem = number_format($pricem);
                                                                ?>
                                                                <h2 style="font-size: 1.3rem"> {{$pricem}} € <span>@tt("TTC").</span></h2>
                                                                <hr>
                                                                {{--                                                                <label style="font-size: 18px; font-weight: bold" for="">@tt('Afrique')</label>--}}

                                                                {{--                                                            <h2 style="font-size: 1.3rem">{{$priceafricam}} € /<span> @tt("month")</span> <span>@tt("or")</span> {{$priceafrica}} € / <span>@tt("year")</span></h2>--}}
                                                            
                                                            </div>
                                                            <div class="price-button">
                                                                <a class="btn btn-primary" href="{{route('cart')}}?id={{$subscriptions->getId()}}">@tt("Get It Now")</a>
                                                            </div>
                                                        </div>
                                                        <div class="price-content">
                                                            <div class="price-table-list">
                                                                <ul class="list-unstyled">
                                                                    <li style="text-transform: uppercase;">
                                                                        <i class="fa fa-check"></i>
                                                                        <strong>
                                                                            {{$subscriptions->getToken()}} @tt("Jetons pour accéder aux labs (3h de pratique)")
                                                                        </strong>
                                                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                                                    </li>
                                                                    <li> <i class="fa fa-check"></i> @tt("CCNA 200-301") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
                                                                    <li><i class="fa fa-check" ></i> @tt("CCNP 350-401 ENCOR") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("NSE4") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("NSE7") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("CYBERSECUTITY") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li style="text-transform: uppercase;"><i class="fa fa-check"></i> @tt("Accès au groupe privé Facebook") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    
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
							@include('learningplan')
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
