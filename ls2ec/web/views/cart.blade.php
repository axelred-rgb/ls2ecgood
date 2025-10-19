@extends('layout')
@section('content')

	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Checkout")</h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section class="py-50">
		<div class="container">
			<div class="row">


				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">@tt("Product Summary")</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th>@tt("Target")</th>
										<th>@tt("Plan")</th>
										<th>@tt("Period")</th>
										<th class="w-200">@tt("Price")</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										@if($subscription->getTarget()=="i")
											<td>@tt("Individuals")</td>
										@else
											<td>@tt("Enterprise")</td>
										@endif
										<td>{{$subscription->getName()}}</td>
										@if($subscription->getTarget()=="i")
											<td>12 @tt("month")</td>
										@else
											<td>5 @tt("days")</td>
										@endif
										<td>{{$subscription->getY_price()}} €</td>
									</tr>

									<tr>
										<th colspan="3" class="text-end">@tt("Total")</th>
										<th>{{$subscription->getY_price()}} €</th>
									</tr>
									</tbody>
								</table>
							</div>


							@if(App::$user->getId())
								<hr>
								<h4 class="box-title mb-15">@tt("Choose payment Option")</h4>
								<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#pay" role="tab"><span class="hidden-sm-up"><i class="fa fa-paypal"></i></span> <span class="hidden-xs-down">Paypal</span></a> </li>
								<li class="nav-item"> <a href="{{route("confirmorder")}}?id={{$subscription->getId()}}" role="tab">@tt("Continue as Guest")</a> </li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content tabcontent-border">
								<div class="tab-pane active" id="pay" role="tabpanel">
									<div class="p-30">
										@tt("You can pay your money through paypal") <br><br>

										<div id="smart-button-container">
											<div style="text-align: center;">
												<div id="paypal-button-container"></div>
											</div>
										</div>


									</div>
								</div>
							</div>
							@else
								<button onclick="location.href='{{route('login')}}';" type="button" class="btn btn-info w-p100 mt-15">@tt("Login to Pay")</button>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>





	


@endsection
@section("jsimport")

	<script src="https://www.paypal.com/sdk/js?client-id=AdRmD1doHOXZyBuA2rUZLZ5wT0Uts695SI07WnLkWWlMKQeKE5OQKiT6ZFruzr7F949m-F9_TF2WmFHG&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
	<script>




		function initPayPalButton() {
			paypal.Buttons({
				style: {
					shape: 'rect',
					color: 'gold',
					layout: 'vertical',
					label: 'paypal',

				},

				createOrder: function(data, actions) {
					return actions.order.create({
						purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
					});
				},

				onApprove: function(data, actions) {
					return actions.order.capture().then(function(orderData) {

						// Full available details
						console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

						// Show a success message within this page, e.g.
						//const element = document.getElementById('paypal-button-container');
						//element.innerHTML = '';
						//element.innerHTML = '<h3>Thank you for your payment!</h3>';

						// Or go to another URL:
						actions.redirect('confirmorder');

					});
				},

				onError: function(err) {
					console.log(err);
				}
			}).render('#paypal-button-container');
		}
		initPayPalButton();
	</script>
@endsection
