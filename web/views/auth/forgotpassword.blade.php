@extends('layout')
@section('content')
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Mot de passe oublié")</h2>
						
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
							<h2 class="text-primary">@tt("Entrez votre Email")</h2>
						</div>
						<div class="p-40">

							<form id="forgot-form" method="post">

								<div class="forgot-error"></div>
								<div class="form-group">
									<input type="email" name="email" class="form-control" id="forgot-form" placeholder="{{t('Email Address')}}">
								</div>
								<button onclick="app.forgotpassword(this)" type="button" class="btn btn-info w-p100 mt-15">@tt("valider")</button>
								<hr>
							</form>


						</div>
					</div>								

					
				</div>
			</div>
		</div>
	</section>
@endsection