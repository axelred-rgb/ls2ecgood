@extends('layout')
@section('content')

	
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Comfirm order")</h2>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section class="py-50">
		<div class="container">
			<div class="row justify-content-center g-0">
				<div class="col-lg-5 col-md-5 col-12">
					<div class="box box-body">

						<div class="content-top-agile pb-0 pt-20">
							@if($subscription == 'ok')
							<h2 class="text-primary">@tt("Felicitation ! ")</h2>
							</br>
							<h2 class="text-primary">@tt("Votre paiement a été accepté")</h2>
							@else
								<h2 class="text-primary">@tt("Vous avez déja souscrit à cet abonnement ! ")</h2>

							@endif


						</div>
						<div class="p-40">

							<button onclick="location.href='{{route('myboard')}}';" type="button" class="btn btn-info w-p100 mt-15">@tt("Continuer")</button>

						</div>

					</div>

				</div>
			</div>
		</div>
	</section>


@endsection
