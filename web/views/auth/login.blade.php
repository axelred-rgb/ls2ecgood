@extends('layout')
@section('content')
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Login")</h2>
						
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
							<h2 class="text-primary">@tt("Let's Get Started")</h2>
							<p class="mb-0">@tt("Sign in to continue.")</p>
						</div>
						<div class="login2-error"></div>
						<div class="p-40">
							<form id="login-form" method="post">
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										<input type="email"  name="login" class="form-control ps-15 bg-transparent" placeholder="{{t('Email Address or username')}}">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
										<input type="password" name="password" class="form-control ps-15 bg-transparent" placeholder="{{t('Password')}}">
									</div>
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox ms-5">
										<input type="checkbox" id="basic_checkbox_1">
										<label for="basic_checkbox_1" class="form-label">@tt("Remember Me")</label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-6">
									 <div class="fog-pwd text-end">
										<a href="{{route('forgotpassword')}}" class="hover-warning"><i class="ion ion-locked"></i> @tt("Forgot password?")</a><br>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button onclick="app.connexion(this)" type="button" class="btn btn-info w-p100 mt-15">@tt("SIGN UP")</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>
							<div class="text-center">
								<p class="mt-15 mb-0">@tt("Don't have an account?") <a href="{{route('register')}}" class="text-danger ms-5">@tt("Register")</a></p>
							</div>	
						</div>
					</div>								

					
				</div>
			</div>
		</div>
	</section>
@endsection