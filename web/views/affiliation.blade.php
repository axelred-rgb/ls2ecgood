@extends('layout')
@section('content')
    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white">@tt("Programme d'affiliation de LS2EC TRAINING")</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->

    <section class="py-50 bg-white">
	
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-12">
				
                    <h2 class="mb-10">@tt("Qu'est ce que c'est?")</h2>
                    <p class="fs-16">
                        <br>
                        @tt("Le programme d'affiliation LS2EC TRAINING est un programme qui vous permet d'être rémunéré lorsque vous recommandez des prospects vers notre site internet et qu’ils payent des formations. ")
                        <br>
                        <br>
                    </p>
					
					<a href="{{route('affiliationprogram')}}" class="btn btn-primary">Participer au programme</a>
					

                </div>
                <div class="col-lg-5 col-12 position-relative">
                    <div class="popup-vdo mt-30 mt-md-0">
                        <img src="{{ assets   }}images/affiliate/affiliateprogram.jpg" class="img-fluid rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<section class="py-50">
	
        <div class="container">
            <div class="row align-items-center">
			<div class="col-lg-5 col-12 position-relative">
                    <div class="popup-vdo mt-30 mt-md-0">
                        <img src="{{ assets   }}images/affiliate/commentparticiper.jpg" class="img-fluid rounded" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-12">
				

					
					
					<h2 class="mb-10">@tt("Comment y participer ?")</h2>
                    <p class="fs-16">
                        <br>
                        @tt("Pour participer au programme et recevoir des commissions, il vous suffit de créer votre code promo et de le communiquer à vos prospects.")
                        <br>
						<br>
                    </p>

                </div>
                
            </div>
        </div>
    </section>
	
	  <section class="py-50 bg-white">
	
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-12">
					<h2 class="mb-10">@tt("Que gagne mes prospects en utilisant mon code ?")</h2>
                    <p class="fs-16">
                        <br>
                        @tt("Vos prospects bénéficieront de 5% de réduction du pack choisi quelque soit leur mode de paiement par Mois ou par An.")
                        <br>
						<br>
                    </p>

                </div>
                <div class="col-lg-5 col-12 position-relative">
                    <div class="popup-vdo mt-30 mt-md-0">
                        <img src="{{ assets   }}images/affiliate/gain.png" class="img-fluid rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
	
		<section class="py-50">
	
        <div class="container">
            <div class="row align-items-center">
			<div class="col-lg-5 col-12 position-relative">
                    <div class="popup-vdo mt-30 mt-md-0">
                        <img src="{{ assets   }}images/affiliate/quiparticipe.jpg" class="img-fluid rounded" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-12">
				
					
					<h2 class="mb-10">@tt("Qui peut etre affilié ?")</h2>
                    <p class="fs-16">
                        <br>
                        @tt("Les affiliations sont ouvertes pour tous les utilisateurs de l'Europe, l'Amérique, l'Asie, et 2 pays d'Afrique à savoir le Cameroun et la Côte d'Ivoire.")
                        <br>
						<br>
                    </p>
					

                </div>
                
            </div>
        </div>
    </section>
	
	
	
	  <section class="py-50 bg-white">
	
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-12">
				
					<h2 class="mb-10">@tt("Combien y gagne t-on ?")</h2>
                    <p class="fs-16">
                        <br>
                        @tt("Le programme d’affiliation vous permettra de gagner 30% du montant payé par le client si vous êtes une entreprise et 28% en passant par notre partenaire SPACEKOLA si vous êtes un particulier.")
                        <br>
						<br>
                    </p>
					 

                </div>
                <div class="col-lg-5 col-12 position-relative">
                    <div class="popup-vdo mt-30 mt-md-0">
                        <img src="{{ assets   }}images/affiliate/gagne.jpg" class="img-fluid rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
	


@endsection


