@extends('layoutnewlook')
@section('cssimport')
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/web/assets/mobirise-icons2/mobirise2.css">
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/web/assets/mobirise-icons/mobirise-icons.css">
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/dropdown/css/style.css">
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/socicon/css/styles.css">
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/theme/css/style.css">
	<link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/theme/css/style.css">
	<link rel="preload" href="https://fonts.googleapis.com/css?family=Space+Grotesk:300,400,500,600,700&amp;display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Space+Grotesk:300,400,500,600,700&amp;display=swap"></noscript>
	<link rel="preload" as="style" href="https://systemev3.ls2ec.com/assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="https://systemev3.ls2ec.com/assets/mobirise/css/mbr-additional.css" type="text/css">
	<style>

		.display-2 {
			font-family: 'Space Grotesk', sans-serif!important;
			font-size: 2.3rem!important;
			line-height: 1.1!important;
			font-weight: bold!important;
		}
		.display-4 {
			font-family: 'Space Grotesk', sans-serif!important;
			font-size: 1rem!important;
			line-height: 1.5!important;
		}
		h1, h2, h3, h4, h5, h6, .display-1, .display-2, .display-4, .display-5, .display-7, span, p, a {
			line-height: 1!important;
			word-break: break-word!important;
			word-wrap: break-word!important;
			font-weight: 400!important;
		}
		.pb-5 {
			padding-bottom: 3rem!important;
		}
		@media (min-width: 992px){
			.cid-tgEAhJpS0b .wrapper.wrapls {
				max-width: 470px!important;
			}
		}

		.stat{
			color: #186209!important;
			font-size: 18px!important;
			font-weight: bold!important;
		}

	</style>

@endsection
@section('content')
	<!---page Title --->
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">
						<h2 class="page-title text-white">@tt("About us")</h2>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->

	<section data-bs-version="5.1" class="features1 cid-tgEAhJpS0b" id="features01-3z">

		<div class="container">
			<div class="row justify-content-end">
				<div class="col-12 col-md-12 md-pb col-lg-5 image-wrapper">
					<img src="https://ls2ec.com/web/assets/images/pays.jpg" alt="">
					<div class="row">
						<div class="col-12">
							<div style="border: 1px solid #f4f9fe;margin-top: 10px;border-radius: 20px;padding:20px!important;background: #f4f9fe;text-align: center">
								<strong class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2 stat">
									<span class="mbri-users mbr-iconfont"></span>
								</strong> <br>
								<strong class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2 stat">
									@tt("+ 10 000 personnes formées dans 12 pays")
								</strong>
							</div>
							<div style="border: 1px solid #f4f9fe;margin-top: 10px;border-radius: 20px;padding:20px!important;background: #f4f9fe;text-align: center">
								<strong class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2 stat">
									<span class="mbri-contact-form mbr-iconfont"></span>
								</strong> <br>
								<strong class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2 stat">

									@tt("5 Cours")
								</strong>
							</div>
							<div style="border: 1px solid #f4f9fe;margin-top: 10px;border-radius: 20px;padding:20px!important;background: #f4f9fe;text-align: center">
								<strong class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2 stat">
									<span class="mbri-user mbr-iconfont"></span>
								</strong> <br>
								<strong class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2 stat">
									@tt("5 Formateurs")
								</strong>

							</div>
							<div style="border: 1px solid #f4f9fe;margin-top: 10px;border-radius: 20px;padding:20px!important;background: #f4f9fe;text-align: center">
								<strong class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2 stat">
									<span class="mbri-growing-chart mbr-iconfont"></span>
								</strong> <br>
								<strong class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2 stat">
									@tt("98% Taux de satisfaction")
								</strong>
							</div>
						</div>
					</div>
				</div>
				<div class="counter-container col-12 col-md-12 col-lg-7">
					<div class="card">
						<div class="wrapper wrapls">

							<h2 class="mbr-section-title align-left mbr-fonts-style mb-3 display-5"><strong>@tt("C'est quoi LS2EC TRAINING ?")</strong></h2>

							<div class="mbr-list mbr-fonts-style display-7">
								<p class="fs-16" style="text-align: justify!important;">
									<br>
									@tt("C'est la réponse contre le syndrome de l'imposteur vécu par les étudiants/élèves ingénieurs en fin d'études auprès de certaines ESN.")
									<br>
									<br>	@tt("C'est aussi la réponse pour aider des personnes en reconversion professionnelle afin qu'elles puissent apprendre la cybersécurité grâce à une approche en douceur.")
									<br>
									<br>	@tt("C'est une approche en douceur en 3 étapes claires :")
									<br>
									<br>	<b>- @tt("Étape 1 : Notion de base et avancée en réseau informatique")</b>
									<br>	@tt("Ici on vous apprend ce qu'est un réseau, ce qu'est internet, car aujourd'hui les cyberattaques exploitent internet et les réseaux d'entreprise.")
									<br>
									<br>	<b>- @tt("Étape 2: Notion de base et avancée en sécurité informatique.")</b>
									<br>	@tt("Ici on vous apprend tout ce qui constitue les infrastructures de sécurité, et comment mettre en place des règles et politiques de sécurité.")
									<br>
									<br>	<b>- @tt("Étape 3: La cybersécurité")</b>
									<br>	@tt("Ici on vous embarque dans l'univers des cyberattaquants , on vous apprend comment ils pensent et surtout comment les contrer.")
									<br>
									<br>	@tt("C'est une culture d'entreprise reposant sur 3 valeurs fortes: ")
									<br>
									<br>	- <b>@tt("Passion :")</b> @tt(" Être passionné de technologie dans le domaine informatique.")
									<br>
									<br>	- <b>@tt("Pédagogie :")</b> @tt(" Savoir vulgariser les savoirs techniques complexes en fonction du niveau des clients et Savoir être.")
									<br>
									<br>	- <b>@tt("Créativité :")</b> @tt(" Être sans cesse en capacité d'innover dans la manière de transmettre le savoir-faire.")

									<br>
									<br>
								</p>
							</div>
							<p class="mbr-text align-left mbr-fonts-style mb-4 display-7">@tt("Alors, il n’y a pas de hasard : vous êtes exactement au bon endroit pour trouver une solution adaptée !") </p>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<section data-bs-version="5.1" class="content1 cid-tgtrHFDlUo" id="content1-2h">


		<div class="container">
			<div class="row justify-content-center">
				<div class="title col-md-12 col-lg-7 d-flex align-items-center justify-content-center">
					<h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2"><strong>@tt("Qui suis-je pour vous parler de carrière et de cybersécurité ?")</strong></h4>
				</div>
			</div>
		</div>
	</section>

	<section data-bs-version="5.1" class="people1 cid-tgtryRlyRl" id="people1-2g">


		<div class="container">
			<div class="row">
				<div class="сol-12 col-md-3 col-lg-2">
					<div class="people-wrapper">
						<img src="https://systemev3.ls2ec.com/assets/images/1662448446861.jpg" alt="">
						<div class="people-title">
							<h5 class="mbr-title mbr-fonts-style display-7"><strong>Claude Marcel Biyiha Mang</strong></h5>
							<p class="people-desc mbr-fonts-style display-4">@tt("Founder, LS2EC TRAINING")</p>
						</div>
					</div>
				</div>
				<div class="item сol-12 col-md-9 col-lg-10">
					<div class="people-content">
						<span class="mbr-iconfont m-auto fa-play fa"></span>
						<p class="mbr-text mbr-fonts-style display-4">
							{!! tt("Je suis Claude Marcel Biyiha Mang.<br><br>Je suis arrivé en France en 2009 avec plein rêves mais je n'avais jamais osé me lancer.<br><br>J'ai été frustré quand j'ai fini mes études en France et commencé à travailler en 2012 en tant que consultant dans les Entreprises de services numériques (ESN). <br><br>Les ESN recrutent, au poste de consultant(e), les profils juniors, et font du chiffre d'affaires en fonction de leurs prestations. <br><br>J'ai été frustré en tant que jeune diplômé, d'avoir parfois été présenté comme un expert par certaines ESN auprès de leurs clients 💔<br><br>J'en ai souffert, de constater parfois que mes compétences ne correspondaient ou ne suffisaient pas toujours pour répondre aux besoins très spécifiques de ces grosses entreprises.<br><br>Mais je ne pouvais pas me permettre de ne pas travailler car ma mère comptait énormément sur moi au Cameroun. <br><br>Certaines ESN ne m'ont pas accompagné via des formations sur les besoins spécifiques de leurs clients, que j'ai toujours activé mon côté autodidacte pour m'en sortir et d'ailleurs c'est de cette façon que j'ai développé une certaine confiance en moi au fil du temps. <br><br>Je quitte le monde des ESN en 2015, j'intègre une très belle entreprise mais j'ai une idée derrière la tête : accompagner à ma façon les consultant(e)s pour que désormais <br><br><strong>- leur parcours en ESN soit agréable<br>- leur niveau de confiance ne souffre pas d'un iota</strong><br><br>Et d'accompagner également les ESN afin de les décharger du volet formation afin que leurs consultant(e)s se démarquent grâce à leurs performances. <br><br>C'est ainsi qu'en 2021, je crée la société LS2EC TRAINING, une entreprise de formation en réseaux, sécurité, cybersécurité informatique.<br><br>Comme un passionné d’informatique qui, parce qu'il a été frustré en tant que consultant, veut apporter sa pierre à la construction d'un édifice pour apporter une solution à la fois aux ESN et aux consultant(e)s.<br>")!!}
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section data-bs-version="5.1" class="features5 cid-tgtvQ4RHAm" id="features014-2k">



		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12 title-col pb-5" style="padding-bottom: 3rem!important">
					<h2 class="main-title align-center mbr-black m-0 mbr-fonts-style display-2">
						<strong>{!! tt("Les avantages de notre système de formation")!!}</strong>
						<br>
					</h2>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="card-wrapper">
						<div class="card-box align-left">
							<span class="mbr-iconfont mbri-like"></span>

							<p class="card-text mbr-fonts-style display-7">@tt("Vous êtes préparé aux certifications les plus importantes : CCNA 200-301, CCNP 350-401 ENCOR, Fortinet NSE4, Fortinet NSE7.")<br></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="card-wrapper">
						<div class="card-box align-left">
							<span class="mbr-iconfont mbri-responsive"></span>

							<p class="card-text mbr-fonts-style display-7">@tt("Vous avez un environnement de travail pratique qui coûte généralement plus de 1000€ à construire car il faut obtenir diverses licences payantes.")<br></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="card-wrapper">
						<div class="card-box align-left">
							<span class="mbr-iconfont mbri-users"></span>

							<p class="card-text mbr-fonts-style display-7">@tt("Vous n’êtes pas tout seul devant votre écran :")<br><strong>*</strong>&nbsp;@tt("Vous pouvez poser des questions et obtenir des réponses rapidement.")<br><strong>*</strong>@tt(" Vous êtes suivi de près tout au long de votre formation pour assurer votre réussite.")<br></p>
						</div>
					</div>
				</div>






			</div>
		</div>
	</section>

	<section data-bs-version="5.1" class="header10 cid-tyjdO0f1r1" id="header10-5o">






		<div class="align-center container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-9">



					<div class="image-wrap mt-4">
						<img src="https://systemev3.ls2ec.com/assets/images/ls2ecintegrator.gif" alt="Ls2ec Training" title="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section data-bs-version="5.1" class="features1 solutionm4_features1 cid-typeZ0XDwY" id="features1-65">


		<div class="container">
			<div class="row align-center justify-content-center">
				<div class="col-12 col-md-12">
					<h3 class="main-title align-center pb-5 mbr-semibold mbr-white mbr-fonts-style display-2" style="padding-bottom: 3rem!important">
						@tt("Notre méthode fonctionnera pour vous si :")</h3>
				</div>
				<div class="card md-pb col-12 col-md-6 col-lg-4">
					<div class="card-wrapper">
						<span class="mbr-iconfont mobi-mbri-idea mobi-mbri"></span>
						<div class="card-box">
							<h5 class="card-title mbr-semibold pb-2 mbr-white mbr-fonts-style display-7">@tt("Si vous êtes passionné(e) d'informatique.")</h5>

						</div>
					</div>
				</div>
				<div class="card md-pb col-12 col-md-6 col-lg-4">
					<div class="card-wrapper">
						<span class="mbr-iconfont mobi-mbri-edit mobi-mbri"></span>
						<div class="card-box">
							<h5 class="card-title mbr-semibold pb-2 mbr-white mbr-fonts-style display-7">
								@tt("Vous êtes prêt à consacrer 1h par jour à votre formation pour avoir le statut d’expert dans 6 mois au moins.")</h5>

						</div>
					</div>
				</div>
				<div class="card col-12 col-md-6 col-lg-4">
					<div class="card-wrapper">
						<span class="mbr-iconfont mobi-mbri-paper-plane mobi-mbri"></span>
						<div class="card-box">
							<h5 class="card-title mbr-semibold pb-2 mbr-white mbr-fonts-style display-7">
								@tt("Vous êtes ambitieux et savez qu’il est important d’investir en soi pour franchir de nouveaux caps.")</h5>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section data-bs-version="5.1" class="content1 cid-tgRiodWMUc" id="content1-4h">


		<div class="container">
			<div class="row justify-content-center">
				<div class="title col-md-12 col-lg-12 d-flex align-items-center justify-content-center">
					<h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-0 display-2"><strong>@tt("Découvrez nos équipes")</strong></h4>
				</div>
			</div>
		</div>
	</section>

	<section data-bs-version="5.1" class="people2 bistro_people cid-tgRhQHqbEQ" id="people2-4g">



		<div class="two_background"></div>

		<div class="container" style="display: none!important;">
			<div class="row" style="display: block; text-align: center">
				<div class="item features-image сol-12 offset-lg-3 col-md-6 col-lg-3 active " style="display: inline-block;margin-bottom: 33px!important;">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/dtt.png" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Brice NOUJA</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Directeur technique - Co founder SPACEKOLA")</p>
						</div>
					</div>
				</div>
				<div class="item features-image сol-12 col-md-6 col-lg-3 active " style="display: inline-block;margin-bottom: 33px!important;">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/comptable.png" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Fatoumata NIAKATE</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Expert comptable - CEO & Founder at FLOWEXCO")</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="padding-top: 34px;padding-bottom: 34px;padding-left:0px!important;padding-right: 0px!important;margin-bottom: 33px!important;">

			<div class="row" style="margin-top: 5rem!important;">

				<div class="item features-image сol-12 offset-lg-2 col-md-6 col-lg-3 active ">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/dtt.png" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Brice NOUDJA</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Directeur technique - Co founder SPACEKOLA")</p>
						</div>
					</div>
				</div>
				<div class="item features-image сol-12 col-md-6 col-lg-3 active">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/comptable.png" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Fatoumata NIAKATE</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Expert comptable - CEO & Founder at FLOWEXCO")</p>
						</div>
					</div>
				</div>
				<div class="item features-image сol-12 col-md-6 col-lg-3 active">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/crc.png" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Morelle TCHAKOUTE</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Chargée de Relation Client")</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid" style="background: #f4f9fe;padding-top: 34px;padding-bottom: 34px;padding-left:0px!important;padding-right: 0px!important;margin-bottom: 33px!important;display:none!important;">
			<div class="row" style="margin-top: 1rem!important;">
				<div class="col-12" style="text-align: center">
					<img src="https://systemev3.ls2ec.com/assets/images/EVODROIT.png" style="width: 250px; height: auto!important; display: initial" data-slide-to="0" data-bs-slide-to="0" alt="">
					<p style="font-size: 20px!important; margin-top: 1rem">@tt("EVODROIT a conseillé et accompagné LS2EC TRAINING") <br> @tt("dans la modification de son actionnariat")</p>
				</div>
			</div>
			<div class="row" style="margin-top: 5rem!important;display:none!important;">

				<div class="item features-image сol-12 offset-lg-3 col-md-6 col-lg-3 active ">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/avocat1.png" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Sébastien TO</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Avocat Associé")</p>
						</div>
					</div>
				</div>
				<div class="item features-image сol-12 col-md-6 col-lg-3 active">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/avocat2.png" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Anne BAUDOIN</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Avocat")</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="item features-image сol-12 col-md-6 col-lg-3 active">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/2022-09-08-14.26.28.jpg" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Kevin BIKOKO</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Formateur Cisco CCNA et Fortinet NSE4")</p>
						</div>

					</div>
				</div>
				<div class="item features-image сol-12 col-md-6 col-lg-3">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/2022-09-08-14.26.40.jpg" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Arthur Brice NDANGA</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Formateur Cisco CCNP")</p>
						</div>

					</div>
				</div>
				<div class="item features-image сol-12 col-md-6 col-lg-3">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/2022-09-08-14.26.49.jpg" data-slide-to="0" data-bs-slide-to="0" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Christian FOZIN</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Formation Fortinet NSE7")</p>
						</div>

					</div>
				</div><div class="item features-image сol-12 col-md-6 col-lg-3">
					<div class="item-wrapper">
						<div class="item-img">
							<img src="https://systemev3.ls2ec.com/assets/images/2022-09-08-14.30.24.jpg" data-slide-to="3" data-bs-slide-to="4" alt="">
						</div>
						<div class="card_content text-center">
							<h4 class="card_title mbr-fonts-style display-5">Chantal TSAMO</h4>
							<p class="mbr-text px-2 mb-0 mbr-fonts-style display-4">@tt("Formatrice Cybersécurité")</p>
						</div>

					</div>
				</div>



			</div>
		</div>
	</section>


	<section data-bs-version="5.1" class="header2 cid-tgtBd7J3DX" id="header02-2p">


		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 align-center col-lg-8">
					<h1 class="mbr-section-title mbr-fonts-style mb-3 display-5">
						<strong>
							@tt("Devenir consultant en cybersécurité en 3 étapes simples et gagner jusqu’à 500€ (327000 Fr CFA) par jour ?")&nbsp;
						</strong><strong>@tt("C'est possible grâce au système LS2EC Training.")</strong></h1>


					<div class="mbr-section-btn mt-3"><a class="btn btn-primary display-5" href="https://forms.aweber.com/form/02/851692102.htm"><span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span><strong>@tt("Testez notre système gratuitement")</strong></a></div>
				</div>
			</div>
		</div>
	</section>

	<section data-bs-version="5.1" class="list2 cid-tgtBOw5NKf" id="list2-2q">





		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-">
					<div class="section-head align-center">

						<h4 class="mbr-section-subtitle mbr-fonts-style display-2">@tt("Foire aux questions")</h4>
					</div>
					<div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse1_27" aria-expanded="false" aria-controls="collapse1">
									<h6 class="panel-title-edit mbr-fonts-style display-5">“@tt("Est-ce que je peux vraiment gagner 500€/jour chez un client ?")”</h6>
									<span class="mbr-iconfont mobi-mbri-plus mobi-mbri display-4"></span>
								</a>
							</div>
							<div id="collapse1_27" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-4">
										@tt("Oui absolument pour un profil junior entre 0 et 3 ans en France dans le domaine de la cybersécurité c'est le tarif journalier moyen qui est payé aux freelances ou indépendants. Pour plus d'informations sur les salaires possibles en cybersécurité, visitez ce site")
										<a href="https://www.blogdumoderateur.com/salaires-metiers-cybersecurite-2022/" class="text-primary" target="_blank">
											https://www.blogdumoderateur.com/salaires-metiers-cybersecurite-2022/</a><br>
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse2_27" aria-expanded="false" aria-controls="collapse2">
									<h6 class="panel-title-edit mbr-fonts-style display-5">“@tt("Quelle différence entre ce programme de formations et les centaines qui existent déjà en ligne ou dans les écoles ?")”</h6>
									<span class="mbr-iconfont mobi-mbri-plus mobi-mbri display-4"></span>
								</a>
							</div>
							<div id="collapse2_27" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-4">@tt("La différence fondamentale réside dans l’approche pédagogique..")<br>@tt("Chez nous, l'expertise en cybersécurité se développe étape-par-étape en tenant compte des personnes qui n'ont jamais été techniques mais qui développent une envie de monter en compétences en cybersécurité.") <br><br>@tt("On ne vous plonge pas directement dans la cybersécurité sans passer par les bases en réseaux et sécurité informatique. D'où le fait que nous nous définissons comme le système vers l'expertise en cybersécurité en 3 étapes.")<br>
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse3_27" aria-expanded="false" aria-controls="collapse3">
									<h6 class="panel-title-edit mbr-fonts-style display-5">“@tt("Combien de temps me faudra-t-il pour me former ?")”</h6>
									<span class="mbr-iconfont mobi-mbri-plus mobi-mbri display-4"></span>
								</a>
							</div>
							<div id="collapse3_27" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-4">@tt("Il vous faut minimum 6 mois et maximum 1 an pour vous former en suivant notre méthode.")<br>
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse4_27" aria-expanded="false" aria-controls="collapse4">
									<h6 class="panel-title-edit mbr-fonts-style display-5">“@tt("Aurais-je le temps entre ma vie professionnelle et ma vie familiale pour une formation ?")”</h6>
									<span class="mbr-iconfont mobi-mbri-plus mobi-mbri display-4"></span>
								</a>
							</div>
							<div id="collapse4_27" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-4">@tt("Nous avons pensé à vous , et justement la recommandation que nous faisons c'est de travailler 1h-2h/jour. En plus, vous avez la chance d'appartenir à notre groupe privé Facebook pour vous motiver à poursuivre et à y aller jusqu'au bout.")<br>
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse5_27" aria-expanded="false" aria-controls="collapse5">
									<h6 class="panel-title-edit mbr-fonts-style display-5">“@tt("Quels sont les prérequis pour rejoindre ce programme ?")”</h6>
									<span class="mbr-iconfont mobi-mbri-plus mobi-mbri display-4"></span>
								</a>
							</div>
							<div id="collapse5_27" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-4">@tt("Que vous ayez ou pas de solides bases en informatique, nos formateurs utilisent des méthodes pédagogiques pour vulgariser les concepts complexes en des termes vraiment simples.")<br>
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse6_27" aria-expanded="false" aria-controls="collapse6">
									<h6 class="panel-title-edit mbr-fonts-style display-5">“@tt("Pendant combien de temps ai-je accès à la formation ?")”</h6>
									<span class="mbr-iconfont mobi-mbri-plus mobi-mbri display-4"></span>
								</a>
							</div>
							<div id="collapse6_27" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-4">@tt("Vous avez accès à la formation en illimité pendant un an sous réserve d’avoir finalisé votre paiement. En cas de défaut de paiement, les accès sont bloqués.") <br><br>@tt("Nous limitons l’accès à un an pour vous inciter à finir votre formation en moins d’un an et atteindre vos objectifs professionnels sans procrastiner.")<br>
									</p>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>

	<section data-bs-version="5.1" class="contacts1 cid-tgtDcVqYZq" id="contacts1-2r">
		<!---->


		<div class="container">
			<div class="mbr-section-head">
				<h2 class="mbr-section-title mbr-fonts-style align-center display-5">@tt("Vous avez une question ?")</h2>
			</div>
			<div class="row justify-content-center ">
				<div class="card col-12 col-md-6">
					<div class="card-wrapper">
						<div class="image-wrapper">
							<span class="mbr-iconfont mbri-letter"></span>
						</div>
						<div class="text-wrapper">
							<h6 class="card-title mbr-fonts-style display-5">@tt("Envoyez-nous un email à")</h6>
							<p class="mbr-text mbr-fonts-style display-7">
								<a href="mailto:info@ls2ec.com" class="text-primary">info@ls2ec.com</a>
							</p>
						</div>
					</div>
				</div>



			</div>
		</div>
	</section>




	<script src="https://systemev3.ls2ec.com/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="https://systemev3.ls2ec.com/assets/smoothscroll/smooth-scroll.js"></script>
	<script src="https://systemev3.ls2ec.com/assets/ytplayer/index.js"></script>
	<script src="https://systemev3.ls2ec.com/assets/embla/embla.min.js"></script>
	<script src="https://systemev3.ls2ec.com/assets/embla/script.js"></script>
	<script src="https://systemev3.ls2ec.com/assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>
	<script src="https://systemev3.ls2ec.com/assets/dropdown/js/navbar-dropdown.js"></script>
	<script src="https://systemev3.ls2ec.com/assets/theme/js/script.js"></script>
@endsection