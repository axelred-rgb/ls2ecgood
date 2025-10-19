@extends('layoutnewlook')
@section('content')
	<style>
		p, h5, span, h2, h3, h4, li{
			letter-spacing: 1px!important;
		}
	</style>

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

	<section data-bs-version="5.1" class="video03 digitalm4_video03 cid-thNjjzg15m mbr-fullscreen" id="video03-3f">
		<div class="container align-center">
			<div class="col-md-12 col-lg-12 text">
				<div class="badge_wrap align-center">
					<h5 class="badge mbr-bold mbr-fonts-style display-7">@tt("Félicitations pour votre abonnement") !</h5>
				</div>
				<h3 class="mbr-fonts-style mbr-section-subtitle align-center mbr-light display-2">
					@tt("Prenez 5 min pour écouter cette vidéo importante")<br></h3>
				<h4 class="mb-4 mbr-fonts-style mbr-section-title align-center display-7">
					@tt("Je vous explique comment profiter de tous vos avantages LS2EC pour avoir d'excellents résultats pendant et après votre formation.")</h4>
			</div>

			<div class="row justify-content-center mt-5">
				<div class="box col-lg-8">
					<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/5i57xphc4t?videoFoam=true" title="Remerciement Video" allow="autoplay; fullscreen" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" msallowfullscreen="" width="100%" height="100%"></iframe></div></div>
					<script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>
				</div>
				<div class="col-lg-4 pl-lg-5 pl-md-0 pr-md-0">
					<p class="mbr-text pb-2 align-left mbr-fonts-style display-5">
						@tt("Notre système vous permettra") :
					</p>
					<div class="mbr-list mbr-fonts-style display-7">
						<ul class="list">
							<li>@tt("De monter en compétences en 6 mois")</li>
							<li>@tt("D’augmenter votre employabilité")</li>
							<li>@tt("De pouvoir facturer vos services plus cher")</li>
						</ul>
					</div>
					<div class="mbr-section-btn"><a type="submit" class="btn btn-primary display-7" href="https://www.facebook.com/groups/1150501729046088/?ref=share_group_link" target="_blank">
							@tt("Cliquez ici pour rejoindre le groupe d’entraide Facebook")</a></div>
				</div>
			</div>
		</div>
		<div>
			<div class="modalWindow" style="display: none;">
				<div class="modalWindow-container">
					<div class="modalWindow-video-container">
						<div class="modalWindow-video">
							<iframe width="100%" height="100%" frameborder="0" allowfullscreen="1" data-src="https://www.youtube.com/watch?v=QIs695Irf6Y"></iframe>
						</div>
						<a class="close" role="button" data-dismiss="modal" data-bs-dismiss="modal">
							<span aria-hidden="true" class="mbri-close mbr-iconfont closeModal"></span>
							<span class="sr-only visually-hidden">@tt("Close")</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mb-5">
		<div class="row">
			<div class="col-4 offset-sm-4">
				@if(isset($product))
					<button onclick="location.href='{{route('myresources')}}';" type="button" style="border-radius: 56px" class="btn btn-info w-p100 mt-15">@tt("Continuer")</button>
				@else
					<button onclick="location.href='{{route('myboard')}}';" style="border-radius: 56px" type="button" class="btn btn-info w-p100 mt-15">@tt("Continuer")</button>
				@endif
			</div>
		</div>
	</section>

@endsection
