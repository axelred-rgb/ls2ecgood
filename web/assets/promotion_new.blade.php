@extends('layout')
@section('cssimport')
    <link rel="stylesheet" href="{{ assets  }}promotion/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ assets  }}promotion/css/animate.min.css">
    <link rel="stylesheet" href="{{ assets  }}promotion/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ assets  }}promotion/css/templatemo-style.css">
    <!-- google web font css -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
@endsection
@section('content')

    <script>
        gtag('event', 'conversion', {'send_to': 'AW-332951563/Y2V4CNKbsOEDEIvg4Z4B'});
    </script>
    <script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>
    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7"  id="home"
             style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-10 col-sm-10 col-sm-offset-2">
                    <h2 class="wow bounceIn" data-wow-delay="0.9s">@tt("PROMOTION SPECIALE")</h2>
                    <h1 class="wow bounceInUp" style="font-weight: bold" data-wow-delay="1s">@tt("Saint Valentin")</h1>
                </div>

            </div>
        </div>
    </section>

    <div id="countdown">
        <div class="container">
            <div class="row" >
                <div class="col-md-12 col-sm-12 countdown-des">
                    <h2 class="wow bounceIn" data-wow-delay="1.9s">@tt("Promotion spéciale Saint Valentin")</h2>
                    <h1>@tt("Pour les amoureux de la cybersécurité")</h1>
                    <p></p>
                    <ul class="countdown row" style="display: inline-block">
                        <li class="wow bounceIn col-md-3 col-sm-6" data-wow-delay="0.3s">
                            <span class="days" id="days"></span>
                            <h3>@tt("Jours")</h3>
                        </li>
                        <li class="wow bounceIn col-md-3 col-sm-6" data-wow-delay="0.6s">
                            <span class="hours" id="hours"></span>
                            <h3>@tt("Heures")</h3>
                        </li>
                        <li class="wow bounceIn col-md-3 col-sm-6" data-wow-delay="0.9s">
                            <span class="minutes" id="minutes"></span>
                            <h3>@tt("Minutes")</h3>
                        </li>
                        <li class="wow bounceIn col-md-3 col-sm-6" data-wow-delay="1s">
                            <span class="seconds" id="seconds"></span>
                            <h3>@tt("Secondes")</h3>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-sm-12 col-md-6" style="background: #0b8e36; padding:60px 75px;">
                    <h4 style="color: #ffffff!important;text-align: center;font-size: 30px;text-transform: initial">
                        @tt("Pour étancher votre soif de connaissance en cybersecurité, nous vous offrons:")
                    </h4>
                    <div class="row mt-40">
                        <div class="col-sm-6 offset-sm-3 col-lg-6">
                            <div class="box ribbon-box">
                                <div  hidden="true" class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                                <div class="box-header no-border p-0">
                                    <a href="#">
                                        <img class="img-fluid" src="{{__front}}promotion/images/ebooks.png" alt="">
                                    </a>
                                </div>
                                <div class="box-body">
                                    <div class="text-center">

                                        <h3 class="my-10"><a href="#">@tt("10 Ebooks")</a></h3>
                                        <h2 style="font-size: 1.3rem">
                                            <span style="text-decoration: line-through">150 €</span>
                                            50 €
                                        </h2>
                                        @if(App::$user->getId())
                                            <button onclick="showformpaiement('ebook','p')" class="btn btn-primary">@tt("Acheter")</button>
                                        @else
                                            <a href="{{route('login')}}" class="btn btn-primary">@tt("Connectez vous pour acheter")</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row" id="ebook">

                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="col-sm-12 col-md-12" style="background: #f5f5f5; padding:60px 80px;">
                    <h4 style="color: #0b8e36!important;text-align: center;font-size: 30px;text-transform: initial">
                        @tt("La pratique c'est la clé de l'expertise en cybersecurité, nous vous offrons:")
                    </h4>
                    <div class="row mt-40">
                        <div class="col-12 col-lg-3">
                            <div class="box ribbon-box">
                                <div hidden="true"  class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                                <div class="box-header no-border p-0">
                                    <a href="#">
                                        <img class="img-fluid" src="{{__front}}promotion/images/jetons1000.png" alt="">
                                    </a>
                                </div>
                                <div class="box-body">
                                    <div class="text-center">

                                        <h3 class="my-10"><a href="#">@tt("100 jetons")</a></h3>
                                        <h2 style="font-size: 1.3rem">
                                            <span style="text-decoration: line-through">40 €</span>
                                            35 €
                                        </h2>
                                        @if(App::$user->getId())
                                            <button onclick="showformpaiement('tokken','p1')" class="btn btn-primary">@tt("Acheter")</button>
                                        @else
                                            <a href="{{route('login')}}" class="btn btn-primary">@tt("Connexion")</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="box ribbon-box">
                                <div hidden="true"  class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                                <div class="box-header no-border p-0">
                                    <a href="#">
                                        <img class="img-fluid" src="{{__front}}promotion/images/jetons2000.png" alt="">
                                    </a>
                                </div>
                                <div class="box-body">

                                    <div class="text-center">
                                        <h3 class="my-10"><a href="#">@tt("200 jetons")</a></h3>
                                        <h2 style="font-size: 1.3rem">
                                            <span style="text-decoration: line-through">70 €</span>
                                            55 €
                                        </h2>
                                        @if(App::$user->getId())
                                            <button onclick="showformpaiement('tokken','p2')" class="btn btn-primary">@tt("Acheter")</button>
                                        @else
                                            <a href="{{route('login')}}" class="btn btn-primary">@tt("Connexion")</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-12 col-lg-2">
                            <div class="box ribbon-box">
                                <div hidden="true"  class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                                <div class="box-header no-border p-0">
                                    <a href="#">
                                        <img class="img-fluid" src="{{__front}}promotion/images/jetons2000.png" alt="">
                                    </a>
                                </div>
                                <div class="box-body">

                                    <div class="text-center">
                                        <h3 class="my-10"><a href="#">@tt("300 jetons")</a></h3>
                                        <h2 style="font-size: 1.3rem">
                                            <span style="text-decoration: line-through">110 €</span>
                                            95 €
                                        </h2>
                                        @if(App::$user->getId())
                                            <button onclick="showformpaiement('tokken','p3')" class="btn btn-primary">@tt("Acheter")</button>
                                        @else
                                            <a href="{{route('login')}}" class="btn btn-primary">@tt("Connexion")</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-12 col-lg-2">
                            <div class="box ribbon-box">
                                <div hidden="true"  class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                                <div class="box-header no-border p-0">
                                    <a href="#">
                                        <img class="img-fluid" src="{{__front}}promotion/images/jetons2000.png" alt="">
                                    </a>
                                </div>
                                <div class="box-body">

                                    <div class="text-center">
                                        <h3 class="my-10"><a href="#">@tt("400 jetons")</a></h3>
                                        <h2 style="font-size: 1.3rem">
                                            <span style="text-decoration: line-through">150 €</span>
                                            125 €
                                        </h2>
                                        @if(App::$user->getId())
                                            <button onclick="showformpaiement('tokken','p4')" class="btn btn-primary">@tt("Acheter")</button>
                                        @else
                                            <a href="{{route('login')}}" class="btn btn-primary">@tt("Connexion")</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-12 col-lg-3">
                            <div class="box ribbon-box">
                                <div hidden="true"  class="ribbon-two ribbon-two-danger"><span>2023</span></div>
                                <div class="box-header no-border p-0">
                                    <a href="#">
                                        <img class="img-fluid" src="{{__front}}promotion/images/jetons2000.png" alt="">
                                    </a>
                                </div>
                                <div class="box-body">

                                    <div class="text-center">
                                        <h3 class="my-10"><a href="#">@tt("500 jetons")</a></h3>
                                        <h2 style="font-size: 1.3rem">
                                            <span style="text-decoration: line-through">190 €</span>
                                            175 €
                                        </h2>
                                        @if(App::$user->getId())
                                            <button onclick="showformpaiement('tokken','p5')" class="btn btn-primary">@tt("Acheter")</button>
                                        @else
                                            <a href="{{route('login')}}" class="btn btn-primary">@tt("Connexion")</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row" id="tokken">

                            </div>
                        </div>
                        <div class="col-sm-12" hidden="true">
                            <div class="row" id="methodPayment">
                                <div class="col-12">
                                    <div id="paypal-payment">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div id="cinetpay-form">
                                        <select name="" id="devise" style="width: 40%;
                                    height: 45px;
                                    border: 2px solid #0b8e36;
                                    border-radius: 5px;">
                                            <option value="">@tt('Selectionnez la devise')</option>
                                            <option value="XAF">@tt('XAF')</option>
                                            <option value="XOF">@tt('XOF')</option>
                                            <option value="CDF">@tt('CDF')</option>
                                            <option value="GNF">@tt('GNF')</option>
                                        </select>
                                        <button id="cinetpay" style="width: 50%;
                                    height: 45px;
                                    border-radius: 5px;
                                    background-color: #000000;
                                    border: 2px solid #0b8e36;
                                    color: #ffffff;" >@tt('Mobile money')</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section("jsimport")
    <script src="{{ assets  }}promotion/js/jquery.js"></script>
    <script src="{{ assets  }}promotion/js/bootstrap.min.js"></script>
    <script src="{{ assets  }}promotion/js/smoothscroll.js"></script>
    <script src="{{ assets  }}promotion/js/jquery.nav.js"></script>
    <script src="{{ assets  }}promotion/js/countdown.js"></script>
    <script src="{{ assets  }}promotion/js/init.js"></script>
    <script src="{{ assets  }}promotion/js/wow.min.js"></script>
    <script src="{{ assets  }}promotion/js/custom.js"></script>

    @if(App::$user->getRole() == 3)
        <script src="https://www.paypal.com/sdk/js?client-id=ASq4h0hB7HT_bFKcGu8HFqqPHKOLlu0qszDornLOeSuMOPp9xXbbtQuQ0csML6egXOBLExP-aZDK0kOV&currency=EUR"></script>
    @else
        <script src="https://www.paypal.com/sdk/js?client-id=AX-b9tAA43U18tmHWrPdzgbVRmMTtk4IsqLnkJufx-pSutyEUSQCjnoLTPNaG6ayGUcqcKAd_OtZcpQ1&currency=EUR"></script>
    @endif
    <script src="{{ assets   }}js/cinetpay.js"></script>




    <script src="{{ assets   }}js/paypal.js"></script>

    <script type="text/javascript">
    @if(App::$user->getId())
            function showformpaiement(locateId, product){
                $("#tokken").html("");
                $("#ebook").html("");
                let html = $("#methodPayment").html();
                $("#"+locateId).html(html);

                let route2 = '{{route('promotionpurshased')}}?product='+product;
            if(product == 'p1'){
                price = 35;
                product = "100 Tokkens";
            }
            if(product == 'p2'){
                price = 55;
                product = "200 Tokkens";
            }
            if(product == 'p3'){
                price = 95;
                product = "300 Tokkens";
            }
			if(product == 'p4'){
                price = 125;
                product = "400 Tokkens";
            }
            if(product == 'p5'){
                price = 175;
                product = "500 Tokkens";
            }

            let devise = 'XAF';
            let description = 'PROMOTION '+product;
            let name = '{{App::$user->getFirstname()}}';
            let surname = '{{App::$user->getLastname()}}';
            let email = '{{App::$user->getEmail()}}';
            let phonenumber = '{{App::$user->getPhonenumber()}}';
            let country = '{{App::$user->getCountry()->iso}}';
            let countryname = '{{App::$user->getCountry()->getName()}}';

            $('#cinetpay').attr('onclick',`checkout('`+route2+`',`+price+`,'`+devise+`','`+description+`','`+name+`','`+surname+`','`+email+`','`+phonenumber+`','`+country+`','`+countryname+`')`);

            purchase(price, 'Euro', 'EUR', description, 1, '#paypal-payment',function(){ location.href = route2; })

        }
    @endif
        const targetDate = new Date('February 29, 2024 23:59:59').getTime();

// Mettre à jour le compte à rebours toutes les secondes
const countdown = setInterval(() => {
  // Date actuelle
  const now = new Date().getTime();

  // Calcul du temps restant
  const distance = targetDate - now;

  // Calcul des jours, heures, minutes et secondes
  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Affichage du compte à rebours dans un élément HTML

    document.getElementById('days').innerHTML = `${days}`;
  document.getElementById('hours').innerHTML = `${hours}`;
  document.getElementById('minutes').innerHTML = `${minutes}`;
  document.getElementById('seconds').innerHTML = `${seconds}`;

  // Si le compte à rebours est terminé, afficher un message
  if (distance < 0) {
    clearInterval(countdown);
    document.getElementById('countdown').innerHTML = "<h2>Le compte à rebours est terminé !</h2>";
  }
}, 1000); // Mise à jour toutes les secondes

    </script>
@endsection