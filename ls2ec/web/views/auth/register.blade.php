@extends('layout')
@section('content')
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Register")</h2>
						
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
							<h2 class="text-primary">@tt("Get started with Us")</h2>
							<p class="mb-0">@tt("Register a New Membership")</p>
						</div>
						<div class="p-40">
							{!! Form::open(new user(), ["action" => __env."api/user.create", "method" => "post"]) !!}

							<div class='form-group'>
								{!! Form::input('firstname', "", ['class' => 'form-control', 'placeholder' => t('Firstname*')]) !!}
							</div>
							<div class='form-group'>
								{!! Form::input('lastname', "", ['class' => 'form-control', 'placeholder' => t('Lastname*')]) !!}
							</div>
							<div class='form-group'>
								{!! Form::input('username', "", ['class' => 'form-control', 'placeholder' => t('Username*')]) !!}
							</div>
							<div class='form-group'>
								{!! Form::email('email', "", ['class' => 'form-control', 'placeholder' => t('Email*')]) !!}
							</div>
							<div class='form-group'>
								{!! Form::select('country.id',
                                    FormManager::Options_Helper('namecode', Country::allrows()),
                                    "",
                                    ['class' => 'form-control', 'placeholder' => t('Select your country*')]); !!}
							</div>
							<div class='form-group'>
								{!! Form::input('telephone', "", ['class' => 'form-control', 'placeholder' => t('phone number without phone code')]) !!}
							</div>
							<div class='form-group'>
								{!! Form::input('raison', "", ['class' => 'form-control'], 'hidden') !!}
							</div>
							<div class='form-group'>
								{!! Form::password('password', "", ['class' => 'form-control', 'placeholder' => t('password*')]) !!}
							</div>
							<div class='form-group'>
								{!! Form::password('confirmpassword', "", ['class' => 'form-control', 'placeholder' => t('confirm password*')]) !!}
							</div>

							<div class="form-error">
							</div>

							<button onclick="app.register(this)" type="button" class="btn btn-info w-p100 mt-15">@tt("Register")</button>

							{!! Form::close() !!}
							<div class="text-center">
								<p class="mt-15 mb-0">@tt("Already have an account?")<a href="{{route('login')}}" class="text-danger ms-5"> @tt("Log In")</a></p>
							</div>
						</div>
					</div>								

					
				</div>
			</div>
		</div>
	</section>	

		@endsection