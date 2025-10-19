@extends('layout')
@section('content')
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">Activation du compte</h2>
						
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
							<h2 class="text-primary">@tt("Activation du compte")</h2>
							<p class="mb-0">@tt("Entrer le code recu par Mail")</p>
						</div>
						<div class="p-40">
							<form id="confirm-form" method="post" >


								<div class="form2-error"></div>

								<div class="form-group">
									<input type="text" name="activationcode" class="form-control" id="confirm-form" placeholder="{{t("code d'activation")}}">
								</div>


								<button onclick="app.confirmregister(this)" type="button" class="btn btn-info w-p100 mt-15">@tt("Login")</button>
								<hr>
								<a  href="{{route('resendcode')}}">@tt("Resend code")</a> @tt("or") <a class="tdu text-thm float-right" href="{{route('logout')}}">@tt("Deconnexion")</a>
							</form>

						</div>
					</div>								

					
				</div>
			</div>
		</div>
	</section>
@endsection