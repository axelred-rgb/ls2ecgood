@extends('layout')
@section('content')
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">@tt("Download ebook")</h2>
						
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
							<h2 class="text-primary">@tt("Provide your email to download your white paper.")</h2>
							<p class="mb-0"></p>
						</div>
						<div class="p-40">
							<div class="downloadent-error"></div>

								<form method="post" id="downloadent-form">
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										<input type="text"  name="name" class="form-control ps-15 bg-transparent" placeholder="{{t('Enterprise name')}}" required>
									</div>
								</div>

								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										<input type="email"  name="email" class="form-control ps-15 bg-transparent" placeholder="{{t('Professionnal Email')}}" required>
									</div>
								</div>
									<input type="text" name="id" value="{{$id}}" class="form-control ps-15 bg-transparent" placeholder="Email" hidden="">

								  <div class="row">

									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="button" onclick="app.downloadent(this)" class="btn btn-info w-p100 mt-15">@tt("Download")</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>
						</div>
					</div>								

					
				</div>
			</div>
		</div>
	</section>
@endsection