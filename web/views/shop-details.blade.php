@extends('layout')
@section('cssimport')
	<link rel="stylesheet" type="text/css" href="{{ assets   }}vendor_components/jAlert/jAlert.css">
@endsection
@section('content')
	<style>
		.btn-cart {
			background-color: #0b8e36;
			border-color: #0b8e36;
			color: #ffffff;
			padding: 8px!important;
			border-radius:10px!important;
		}
		.btn-cart i{
			font-size: 70px;
		}
		.btn-cart:hover i{
			color: #ffffff;
		}
		.btn-cart i:hover{
			color: #ffffff;
		}
		#dot{
			background-color: #ffffff;
			border-radius: 50%;
			top: 1px;
			right: 2px;
			position: absolute;
			padding: 8px;
			color: #000000;
			border-color: #0b8e36;
			border: solid 1px #0b8e36;
		}

	</style>


	<script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>

	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Shop Details")</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->
	<?php
		$cartnumber = 0;
		if(isset($_SESSION['CART'])){
			$panier = unserialize($_SESSION['CART']);
			foreach ($panier as $pan){
				if(!is_null($pan)){
					$cartnumber ++ ;
				}
			}
		}
		else{
			$panier = [];
			$cartnumber = 0;
		}
	?>
	<div class="icon-bar-sticky" style="top:20%">
		<a href="{{route('panier')}}" class="waves-effect waves-light btn btn-social-icon btn-cart">
			<i class="fa fa-shopping-cart "></i>
			<p id="dot" class="count">{{$cartnumber}}</p>
		</a>
	</div>

	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="box mb-0">
						<div class="box-body">
							<div class="row">
								<div class="col-md-4 col-sm-6">
									<div class="box box-body b-1 text-center no-shadow">
										<img src="{{$product->srcCover()}}" id="product-image" class="img-fluid" alt="" />
									</div>

									<div class="clear"></div>
								</div>
								<div class="col-md-8 col-sm-6">
									<h2 class="box-title mt-0">{{$product->getName()}}</h2>

									<h1 class="pro-price mb-0 mt-20"> {{round((($product->priceofsale*0.2)+$product->priceofsale),1)}} € TTC</h1>
									<hr>
									<p> {{$product->getDescription()}} </p>
									<br>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
											<tr>
												<th>@tt("Product")</th>
												<th>@tt("Price")</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>{{$product->getName()}}
													<input hidden type="number" value="1" min="1" id="qte" style="border-color:#0b8e36" class="form-control">
												</td>
												<td id="price">
													0 €
												</td>
											</tr>

											<tr>
												<th class="text-end">@tt("Total HT")</th>
												<th id="pricetotal">
													0 €
												</th>
											</tr>
											<tr>
												<th class="text-end">@tt("TVA") (20%)</th>
												<th id="pricetva">
													0 €
												</th>
											</tr>
											<tr>
												<th class="text-end">@tt("Total TTC")</th>
												<th id="pricetotalttc">
													0 €
												</th>
											</tr>
											</tbody>
										</table>
									</div>

									@if(App::$user->getId())
										<?php $c_product = Paiement::where("this.user_id", App::$user->getId())->andwhere('this.product_id',$product->getId())->count() ?>

										@if($c_product == 0)

											<?php $find = false;?>
											@if(count($panier) > 0)
												@foreach($panier as $pan)
													@if(!is_null($pan))
														@if($pan[2] == $product->getId())
															<?php $find = true;?>
														@endif
													@endif
												@endforeach
											@endif

											<div class="row">

												<div class="col-sm-12 col-md-6">
													@if(!$find)
														<a onclick="app.addtocart(this)" data-id="{{$product->getId()}}" class="btn" style="width: 100%;
															height: 45px;
															border-radius: 5px;
															background-color: #0b8e36;
															border: 2px solid #0b8e36;
															color: #ffffff;" >@tt('Ajouter au panier')
														</a>
													@else
														<a href="{{route('panier')}}" data-id="{{$product->getId()}}" class="btn" style="width: 100%;
															height: 45px;
															border-radius: 5px;
															background-color: #0b8e36;
															border: 2px solid #0b8e36;
															color: #ffffff;" >@tt('Mon panier')
														</a>
													@endif
												</div>
												<div class="col-sm-12 col-md-6">
													<button onclick="showpayment()" style="width: 100%;
    height: 45px;
    border-radius: 5px;
    background-color: #ffffff;
    border: 2px solid #0b8e36;
    color: #0b8e36;" onclick="checkout()">@tt('Effectuer directement le paiement')</button>
												</div>
											</div>



											<hr>
											<div id="payment_method" hidden="true">
												<h4 class="box-title mb-15">@tt("Choose payment Option")</h4>
												<div class="tab-content tabcontent-border" >
													<div class="tab-pane active" id="pay" role="tabpanel">
														<div class="p-30">
															<div id="smart-button-container">
																<div id="messageF"></div>
																<div style="text-align: center;">
																	<div id="paypal-button-container"></div>
																	<div style="text-align: center;">
																	<div id="paypal-button-container"></div>
																	<select name="" id="devise" style="width: 40%;
    height: 45px;
    border: 2px solid #0b8e36;
    border-radius: 5px;">
																		<option value="">@tt('Selectionnez la devise')</option>
																		<option value="XAF">@tt('XAF')</option>
																		<option value="XOF">@tt('XOF')</option>
																	</select>
																	<button id="cinetpay" style="width: 57%;
    height: 45px;
    border-radius: 5px;
    background-color: #0b8e36;
    border: 2px solid #0b8e36;
    color: #ffffff;" onclick="checkout()">@tt('Mobile money')</button>

																</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@else

											<hr>
											<div id="payment_method">
												<h4 class="box-title mb-15">@tt("Choose payment Option")</h4>
												<div class="tab-content tabcontent-border" >
													<div class="tab-pane active" id="pay" role="tabpanel">
														<div class="p-30">
															<div id="smart-button-container">
																<div id="messageF"></div>
																<div style="text-align: center;">
																	<div id="paypal-button-container"></div>
																	<div style="text-align: center;">
																	<div id="paypal-button-container"></div>
																	<select name="" id="devise" style="width: 40%;
    height: 45px;
    border: 2px solid #0b8e36;
    border-radius: 5px;">
																		<option value="">@tt('Selectionnez la devise')</option>
																		<option value="XAF">@tt('XAF')</option>
																		<option value="XOF">@tt('XOF')</option>
																	</select>
																	<button id="cinetpay" style="width: 57%;
    height: 45px;
    border-radius: 5px;
    background-color: #0b8e36;
    border: 2px solid #0b8e36;
    color: #ffffff;" onclick="checkout()">@tt('Mobile money')</button>

																</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endif
									@else
										<button onclick="location.href='{{route('login')}}';" type="button" class="btn btn-info w-p100 mt-15">@tt("Login to Pay")</button>
									@endif

								</div>

							</div>
						</div>				
					</div>
				</div>
			</div>
		</div>
	</section>		


@endsection

@section("jsimport")

	<script type="text/javascript" src="{{ assets   }}vendor_components/jAlert/jAlert.js"></script>

	<script type="text/javascript" src="{{ assets   }}vendor_components/jAlert/jAlert-functions.js"></script>
	@if(App::$user->getRole() == 3)
		<script src="https://www.paypal.com/sdk/js?client-id=ASq4h0hB7HT_bFKcGu8HFqqPHKOLlu0qszDornLOeSuMOPp9xXbbtQuQ0csML6egXOBLExP-aZDK0kOV&currency=EUR"></script>
	@else
		<script src="https://www.paypal.com/sdk/js?client-id=AX-b9tAA43U18tmHWrPdzgbVRmMTtk4IsqLnkJufx-pSutyEUSQCjnoLTPNaG6ayGUcqcKAd_OtZcpQ1&currency=EUR"></script>
	@endif
	<script src="{{ assets   }}js/paypal.js"></script>
	<script src="{{ assets   }}js/cinetpay.js"></script>
	<script>

		var product = '{{$product->getId()}}';
		var initprice = parseFloat('{{$product->priceofsale}}');
		var inityear = parseFloat('{{$product->priceofsale}}');
		var initpricemonth = parseFloat('{{$product->priceofsale}}');
		var tva = (20*initprice)/100;
		var ttc = initprice + tva;
		var route = '{{route('confirmpurchasesimpleproduct')}}?id='+product;
		let nbre_month ;

		function showpayment(){
			$("#payment_method").removeAttr('hidden');
		}

		function checkCode(el){
			model.addLoader($(el));
			var price = initprice;
			let code = $("#codepromo").val();
			$.get(__env+"api/lazyloading.codepromo?dfilters=on&code:eq="+code, function(data, status){
				//data.listEntity;
				model.removeLoader();
				//console.log(data.listEntity[0].valeur);
				//alert(data.listEntity[0].valeur);
				$p = price;

				if(data.listEntity.length > 0){
					//price = price * parseInt(data.listEntity[0].valeur);

					if(data.listEntity[0].nbremonth == 0 || data.listEntity[0].state != 0){
						$('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
					}
					else{
						if(data.listEntity[0].nbremonth !== -1){
							if(data.listEntity[0].nbremonth <= nbre_month){
								route += '&code=' + data.listEntity[0].id;

								price = setAllprice(price, parseInt(data.listEntity[0].valeur) / 100);

								$('#errorcode').html('<span style="color:#0b8e36">' + data.listEntity[0].valeur + ' % @tt("de réduction")</span>');
							}
							else{
								$('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
							}
						}
						else{
							route += '&code=' + data.listEntity[0].id;

							price = setAllprice(price, parseInt(data.listEntity[0].valeur) / 100);

							$('#errorcode').html('<span style="color:#0b8e36">' + data.listEntity[0].valeur + ' % @tt("de réduction")</span>');
						}
					}

				}
				else{
					$('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
				}
			});
		}

		function setAllprice(price, reduction = 0){
			$p = price;
			price = price * reduction;

			price = $p - price;
			price = Math.round(price * 100) / 100;
			tva = (20*price)/100;
			tva = Math.round(tva * 100) / 100;
			ttc = price + tva;
			ttc = Math.round(ttc * 100) / 100;
			route += '&price='+price;
			route += '&tva='+tva;
			route += '&ttc='+ttc;

			$('#paypal-button-container').empty();
			$a = '';

			$a += '<span>'+price+' €</span>';
			$('#pricetotal').html('<span>'+price+' €</span>');
			$('#pricetva').html('<span>'+tva+' €</span>');
			$('#pricetotalttc').html('<span>'+ttc+' €</span>');
			$('#price').html($a);
			price = ttc;
			route += '&montant='+price;
			//return price;

			@if(App::$user->getId())
				let devise = 'XAF';
				let description = '{{$product->getName()}}';
				let name = '{{App::$user->getFirstname()}}';
				let surname = '{{App::$user->getLastname()}}';
				let email = '{{App::$user->getEmail()}}';
				let phonenumber = '{{App::$user->getPhonenumber()}}';
				let country = '{{App::$user->getCountry()->iso}}';
				let countryname = '{{App::$user->getCountry()->getName()}}';
			@endif

			$('#cinetpay').attr('onclick',`checkout('`+route+`',`+price+`,'`+devise+`','`+description+`','`+name+`','`+surname+`','`+email+`','`+phonenumber+`','`+country+`','`+countryname+`')`);

			purchase(price, 'Euro', 'EUR', "{{$product->getName()}}" , $a, '#paypal-button-container',function(){ location.href = route; });

		}


		function reset(){
			//alert("maff");
			$("#message").html("");
			$("#paypal-button-container").html("");
			$('#payment_method').attr('hidden','hidden');
		}
		function  aaa(product, date){
			alert(product);
			alert(date);
		}
		function payment(){
			reset();

			if($('#begindate').val() == ""){
				alert($('#begindate').val());
				$('#message').html(`
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
					</button>
					${'@tt("Vous devez selectionner une date")'}
				</div>
				`);
			}
			else{
				$("#payment_method").removeAttr('hidden');
				var date  = $('#begindate').val();

			}
		}

		setTimeout(()=>setAllprice(initprice), 500);


	</script>
@endsection

