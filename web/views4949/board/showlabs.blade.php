<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Keywords" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>@yield("page_title", "LS2EC TRAINING - L'Expertise c'est notre garantie")</title>

    <script>
        var __lang = '<?= local() ?>';
        var __env = '<?= __env ?>';
        var __assets = "<?= __env; ?>web/assets/";
        var __asset = "<?= __env; ?>web/assets/";

    </script>
	

    @yield("page_meta")

    @yield("cssimport")

    <!-- Style-->
    <?php foreach (App::$cssfiles as $cssfile){ ?>
    <link rel="stylesheet" href="{{ $cssfile }}">
    <?php } ?>

<!-- Vendors Style-->
    <link rel="stylesheet" href="{{ assets  }}css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{ assets   }}css/style.css">
    <link rel="stylesheet" href="{{ assets   }}css/skin_color.css">

    <link rel="stylesheet" href="{{ assets   }}vendor_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ assets   }}vendor_components/jAlert/jAlert.css">


    <link rel="icon" href="{{ assets   }}images/logo.ico" type="image/icon type">

</head>

<body class="theme-primary">

<!-- The social media icon bar -->
<div class="icon-bar-sticky">
    <a href="https://web.facebook.com/ls2ectraining/" class="waves-effect waves-light btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
    <a href="https://www.linkedin.com/company/ls2ec-training" class="waves-effect waves-light btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>

</div>
<header class="top-bar">
    
    <nav class="nav-white nav-transparent" style="top:10px!important">
        <div class="nav-header">
            <a href="{{route('home')}}" class="brand" style="
    padding: unset;
">
                <img src="{{ assets   }}images/logo-training.png" alt="" style="
    margin-top: -25px;"/>
            </a>
        </div>
        
        <ul class="menu">
            <li  id="countdown">
                <strong>Temps restant</strong> :
                <span id="countdown_day" >--</span> jours
                <span id="countdown_hour">--</span> heures
                <span id="countdown_min" >--</span> minutes
                <span id="countdown_sec" >--</span> secondes
            </li>

            <li id="lo" style="margin-left:20px">
                <span>Login: </span> {{$u_labs->labs_keys->login}}
            </li>
            <li id="pw" style="margin-left:5px">
                <span>Password: </span> {{$u_labs->labs_keys->password}}
            </li>
            <li style="margin-left:5px">
                <blink id="close_lab" style="color:red"></blink>
            </li>

        </ul>
        <br>
        

    </nav>
</header>


<section class="py-50 bg-white" style="padding-bottom:0px!important">

    @if($startlab == 1)
    <iframe src="https://labs.ls2ec.com" id="frame_lab"  style="background-image: linear-gradient(to bottom, rgb(7 102 51) 0%, rgb(7 102 51) 100%), linear-gradient(to bottom, rgb(11 142 54) 0%, rgb(7 102 51) 100%);;
  background-clip: content-box, padding-box;padding:20px" width="100%" height="700" frameborder="0"></iframe>
  
	<section class="bg-white" id="is_over" style="background-image: linear-gradient(to bottom, rgb(255 255 255) 0%, rgb(255 255 255) 100%), linear-gradient(to bottom, rgb(11 142 54) 0%, rgb(7 102 51) 100%);;
  background-clip: content-box, padding-box;padding:20px; text-align:center" hidden width="100%" height="700">

        <img src="{{ assets   }}images/labs_time_is_over.png" alt="" height="700"  />

    </section>
    @elseif($startlab == 0)
        <div class="alert alert-info">@tt("Your session is scheduled from :from to :to ", ["from"=>$u_labs->date, "to"=>$u_labs->datefin]) </div>
    @elseif($startlab == -1)
        <div class="alert alert-info">@tt("Your session has expired")</div>
    @endif

</section>

<!-- Messenger Plugin de discussion Code -->
<div id="fb-root"></div>

<!-- Your Plugin de discussion code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<footer class="footer_three">
    <div class="footer-top bg-dark3 pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="widget">
                        <h4 class="footer-title">@tt("About")</h4>
                        <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                        <p class="text-capitalize mb-20">
                            @tt("LS2EC TRAINING existe pour résoudre les problèmes respectifs du manque d’expérience pratique des profils juniors adapté aux besoins des clients grands comptes et de l’absence de mise à jour continue des profils expérimentés au cours de nos expériences en tant qu’Ingénieur et Architecte Réseau, Sécurité.")

                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="widget">
                        <h4 class="footer-title">@tt("Contact Info")</h4>
                        <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                        <ul class="list list-unstyled mb-30">
                            <li> <i class="fa fa-map-marker"></i> 15 RUE DE VIENNE 95380 LOUVRES FRANCE</li>
                            <li> <i class="fa fa-phone"></i> <span>+33 6 51 95 76 24 </span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="widget">
                        <h4 class="footer-title">@tt("Payments type")</h4>
                        <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                        <ul class="payment-icon list-unstyled d-flex gap-items-1">
                            <li class="ps-0">
                                <a href="javascript:;"><i class="fa fa-cc-amex" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa fa-cc-visa" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                        <h4 class="footer-title mt-20">@tt("Newsletter")</h4>
                        <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto w-60">
                        <div class="newsletter-error"></div>
                        <div class="mb-20">
                            <form id="newsletter-form" method="post">
                                <div class="input-group">
                                    <input name="email" required="required" class="form-control" placeholder="{{t('Your Email Address')}}" type="email">
                                    <button name="submit" onclick="app.newsletter(this)" value="Submit" type="button" class="btn btn-primary"> <i class="fa fa-envelope"></i> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom bg-dark3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-12 text-md-start text-center"> © 2021 <span class="text-white">ls2ec</span>  All Rights Reserved.</div>
                <div class="col-md-6 mt-md-0 mt-20">
                    <div class="social-icons">
                        <ul class="list-unstyled d-flex gap-items-1 justify-content-md-end justify-content-center">
                            <li><a href="https://web.facebook.com/ls2ectraining" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="https://www.linkedin.com/company/ls2ec-training" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-linkedin"><i class="fa fa-linkedin"></i></a></li>
                           </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "150716517121878");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<?php foreach (App::$jsfiles as $jsfile){ ?>
<script src="<?= $jsfile ?>"></script>
<?php } ?>
<!-- Vendor JS -->
<script src="{{ assets   }}js/vendors.min.js"></script>
<!-- Corenav Master JavaScript -->
<script src="{{ assets   }}corenav-master/coreNavigation-1.1.3.js"></script>
<script src="{{ assets   }}js/nav.js"></script>
<script src="{{ assets   }}vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
<script src="{{ assets   }}vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>


<script src="{{ assets   }}vendor_components/vertical-slider/jquery.vticker-min.js"></script>

<script src="{{ assets   }}vendor_components/select2/dist/js/select2.full.js"></script>

<script type="text/javascript" src="{{ assets   }}vendor_components/jAlert/jAlert.js"></script>

<script type="text/javascript" src="{{ assets   }}vendor_components/jAlert/jAlert-functions.js"></script>



<!-- ls2ec front end -->
<script src="{{ assets   }}js/template.js"></script>
<script>

    $("#testLoad").load("https://www.afroskills.org/");
    
    
</script>



<script>

        let timetotal = 0;
        function openAlert(){
            $.jAlert({
                'title':'@tt("Time is Over")',
                'content': "@tt('Do you want to schedule a new lab?') ?.<br>",
                'theme': 'red',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){location.href = __env+"alllabs" }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){location.href = __env+"mylabs"  }}
                ]
            });
                    
        }

        let alt = false;

        function blink() {
            var blinks = document.getElementsByTagName('blink');
            for (var i = blinks.length - 1; i >= 0; i--) {
            var s = blinks[i];
            s.style.visibility = (s.style.visibility === 'visible') ? 'hidden' : 'visible';
            }
            window.setTimeout(blink, 1000);
        }
        if (document.addEventListener) document.addEventListener("DOMContentLoaded", blink, false);
        else if (window.addEventListener) window.addEventListener("load", blink, false);
        else if (window.attachEvent) window.attachEvent("onload", blink);
        else window.onload = blink;
		var datestop ;
		var diff;
		$("#frame_lab").noResize = true;
        
		countdownManager = {
			// Configuration
			targetTime: null, // Date cible du compte à rebours (00:00:00)
			displayElement: { // Elements HTML où sont affichés les informations
				day:  null,
				hour: null,
				min:  null,
				sec:  null
			},
			
			// Initialisation du compte à rebours (à appeler 1 fois au chargement de la page)
			init: function(date){
				// Récupération des références vers les éléments pour l'affichage
				// La référence n'est récupérée qu'une seule fois à l'initialisation pour optimiser les performances
				this.displayElement.day  = jQuery('#countdown_day');
				this.displayElement.hour = jQuery('#countdown_hour');
				this.displayElement.min  = jQuery('#countdown_min');
				this.displayElement.sec  = jQuery('#countdown_sec');
				this.targetTime= new Date(date);
				// Lancement du compte à rebours
				this.tick(); // Premier tick tout de suite
				window.setInterval("countdownManager.tick(1000);", 1000); // Ticks suivant, répété toutes les secondes (1000 ms)
			},
			
			// Met à jour le compte à rebours (tic d'horloge)
			tick: function(time = 0){
				// Instant présent
                timetotal += time;
                let t = timetotal/1000;
                var timeNow  = new Date('{{gmdate("Y-m-d H:i")}}');;
                timeNow.setSeconds(timeNow.getSeconds() + t);
                //console.log(timeNow);

 //alert(timeNow);

                // On s'assure que le temps restant ne soit jamais négatif (ce qui est le cas dans le futur de targetTime)
				if( timeNow > this.targetTime ){
					timeNow = this.targetTime;
				}
				
				// Calcul du temps restant
				diff = this.dateDiff(timeNow, this.targetTime);
				
				this.displayElement.day.text(  diff.day  );
				this.displayElement.hour.text( diff.hour );
				this.displayElement.min.text(  diff.min  );
				this.displayElement.sec.text(  diff.sec  );

				if(diff.hour == 0 && diff.min == 3 ){
					$("#close_lab").html("FERMETURE DANS 3 MIN");
				}
				if(diff.hour == 0 && diff.min == 2 ){
					$("#close_lab").html("FERMETURE DANS 2 MIN");
				}
				if(diff.hour == 0 && diff.min == 1 ){
					$("#close_lab").html("FERMETURE DANS 1 MIN");
				}
				if(diff.hour == 0 && diff.min == 0  && diff.sec==0){
					$("#close_lab").html("TEMPS D'ACCES AU LABS EXPIRE");
					$("#frame_lab").attr("src","#");
					$("#frame_lab").attr('hidden','hidden');
					$("#lo").attr('hidden','hidden');
					$("#pw").attr('hidden','hidden');
					$("#is_over").removeAttr('hidden');
					
                    if(!alt){
                        openAlert();
                        alt = true;
                    }
				}
			},
			
			// Calcul la différence entre 2 dates, en jour/heure/minute/seconde
			dateDiff: function(date1, date2){
				var diff = {}                           // Initialisation du retour
				var tmp = date2 - date1;
		
				tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
				diff.sec = tmp % 60;                    // Extraction du nombre de secondes
				tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
				diff.min = tmp % 60;                    // Extraction du nombre de minutes
				tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
				diff.hour = tmp % 24;                   // Extraction du nombre d'heures
				tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
				diff.day = tmp;
		
				return diff;
			}
		};
		
		jQuery(function($){
			// Lancement du compte à rebours au chargement de la page
            @if($startlab == 1)
			    countdownManager.init("{{$u_labs->datefin}}");
            @endif
		});

        window.onkeypress = function(e) {
            
            
            var x = document.activeElement.tagName;
               
            if (x == 'BODY') {
                
                focusWhenReady();
                
            }
        };
		
        //$('iframe').focus();
       // $('iframe').contentWindow.document.body.focus();
        var x = document.activeElement.tagName;
                
        focusWhenReady = function(){
            
            $('iframe')[0].contentWindow.focus();
            
        }

        

        setTimeout(focusWhenReady, 10);

    </script>
</body>
</html>
