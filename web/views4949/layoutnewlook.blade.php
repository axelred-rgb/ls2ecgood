<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="Keywords" content>
    <meta name="author" content>
    <meta name="facebook-domain-verification" content="3i9o7z4aajug8vbuwf2dy8cwucdnid">




    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image:src" content="">
    <meta property="og:image" content="">
    <meta name="twitter:title" content="Home">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/logo5.png" type="image/x-icon">
    <meta name="description" content="">


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


    <style>
        #CookiebotWidget .CookiebotWidget-consent-details button{
            color:#186209!important;
        }
        #CookiebotWidget #CookiebotWidget-buttons #CookiebotWidget-btn-change {
            background-color: #186209!important;
            border-color: #186209!important;
        }
        #CookiebotWidget .CookiebotWidget-body .CookiebotWidget-consents-list li.CookiebotWidget-approved svg {
            fill: #186209!important;
        }
        #CybotCookiebotDialogNav .CybotCookiebotDialogNavItemLink.CybotCookiebotDialogActive {
            border-bottom: 1px solid #186209!important;
            color: #186209!important;
        }
        #CybotCookiebotDialogFooter .CybotCookiebotDialogBodyButton, #CybotCookiebotDialogFooter #CybotCookiebotDialogBodyLevelButtonLevelOptinAllowallSelection,#CybotCookiebotDialogFooter #CybotCookiebotDialogBodyButtonAccept, #CybotCookiebotDialogFooter #CybotCookiebotDialogBodyLevelButtonAccept, #CybotCookiebotDialogFooter #CybotCookiebotDialogBodyLevelButtonLevelOptinAllowAll{
            background-color:#186209!important;
            border-color: #186209!important;
        }
    </style>
	<!-- Global site tag (gtag.js) - Google Ads: AW-332951563 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-332951563"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'AW-332951563');
</script>





    <!-- Style-->
    <link rel="stylesheet" href="{{assets}}newlook/css/dv_style.css">
    <link rel="stylesheet" href="{{assets}}newlook/css/stylesheet.css">

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{assets}}newlook/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{assets}}newlook/css/style.css">
    <link rel="stylesheet" href="{{assets}}newlook/css/skin_color.css">

    <link rel="stylesheet" href="{{assets}}newlook/css/select2.min.css">


    <link rel="icon" href="{{assets}}newlook/logo.ico" type="image/icon type">

    <!-- Messenger Plugin de discussion Code -->





    <link rel="stylesheet" href="{{assets}}newlook/assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="{{assets}}newlook/assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="{{assets}}newlook/assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
    <link rel="stylesheet" href="{{assets}}newlook/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{assets}}newlook/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="{{assets}}newlook/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="{{assets}}newlook/assets/parallax/jarallax.css">
    <link rel="stylesheet" href="{{assets}}newlook/assets/socicon/css/styles.css">
    <link rel="stylesheet" href="{{assets}}newlook/assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Space+Grotesk:300,400,500,600,700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Space+Grotesk:300,400,500,600,700&display=swap"></noscript>
    <link rel="preload" as="style" href="{{assets}}newlook/assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="{{assets}}newlook/assets/mobirise/css/mbr-additional.css" type="text/css">

</head>

<body class="theme-primary">

<!-- The social media icon bar -->
<div class="icon-bar-sticky">
    <a href="https://web.facebook.com/ls2ectraining/" class="waves-effect waves-light btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
    <a href="https://www.linkedin.com/company/ls2ec-training" class="waves-effect waves-light btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>

</div>
@include("layout.header")

@yield("content")



 <div style="position:fixed; bottom:1%; right:1%; z-index:9999;">
<a aria-label="" href="https://wa.me/+237679911795"> <img alt="Chat on WhatsApp" src="{{ assets   }}images/whatsapp.png" /> </a>
</div>

<!-- Your Plugin de discussion code-->

<footer class="footer_three">
    <div class="footer-top bg-dark3 pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="widget">
                        <h4 class="footer-title">@tt("C'est quoi LS2EC TRAINING ?")</h4>
                        <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                        <p class="text-capitalize mb-20">
                            @tt("C'est la réponse contre le syndrome de l'imposteur vécu par les étudiants/élèves ingénieurs en fin d'études auprès de certaines ESN.")
                            <br>
                            <br>	@tt("C'est aussi la réponse pour aider des personnes en reconversion professionnelle afin qu'elles puissent apprendre la cybersécurité grâce à une approche en douceur.")
                            <br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="widget">
                        <h4 class="footer-title">@tt("Contact Info")</h4>
                        <hr class="bg-primary mb-10 mt-0 d-inline-block mx-auto w-60">
                        <ul class="list list-unstyled mb-30">
                            <li> <i class="fa fa-map-marker"></i> 15 RUE DE VIENNE 95380 LOUVRES FRANCE</li>
                            <li> <i class="fa fa-mail"></i> <span>morelle.tchakoute@ls2ec.com </span></li>
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
                        <!--<hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto w-60">
                        <div class="newsletter-error"></div>
                        <div class="mb-20">
                            <form id="newsletter-form" method="post">
                                <div class="input-group">
                                    <input name="email" required="required" class="form-control" placeholder="{{t('Your Email Address')}}" type="email">
                                    <button name="submit" onclick="app.newsletter(this)" value="Submit" type="button" class="btn btn-primary"> <i class="fa fa-envelope"></i> </button>
                                </div>
                            </form>
                        </div>-->
                        <!-- AWeber Web Form Generator 3.0.1 -->
<style type="text/css">
#af-form-228731659 .af-body .af-textWrap{width:70%;display:block;float:right;}
#af-form-228731659 .af-body .privacyPolicy{color:#FFFFFF;font-size:14px;font-family:Helvetica, sans-serif;}
#af-form-228731659 .af-body a{color:#FFFFFF;text-decoration:underline;font-style:normal;font-weight:normal;}
#af-form-228731659 .af-body input.text, #af-form-228731659 .af-body textarea{background-color:#FFFFFF;border-color:#D9D9D9;border-width:1px;border-style:solid;color:#C7C7C7;text-decoration:none;font-style:normal;font-weight:normal;font-size:24px;font-family:Trebuchet MS, sans-serif;}
#af-form-228731659 .af-body input.text:focus, #af-form-228731659 .af-body textarea:focus{background-color:#FFFAD6;border-color:#030303;border-width:1px;border-style:solid;}
#af-form-228731659 .af-body label.previewLabel{display:block;float:left;width:25%;text-align:left;color:#FFFFFF;text-decoration:none;font-style:normal;font-weight:normal;font-size:14px;font-family:Helvetica, sans-serif;}
#af-form-228731659 .af-body{padding-bottom:16px;padding-top:0px;background-repeat:repeat-x;background-position:top left;background-image:none;color:#FFFFFF;font-size:14px;font-family:Helvetica, sans-serif;}
#af-form-228731659 .af-quirksMode{padding-right:16px;padding-left:16px;}
#af-form-228731659 .af-standards .af-element{padding-right:16px;padding-left:16px;}
#af-form-228731659 .buttonContainer input.submit{background-image:none;background-color:#1D4D08;color:#FFFFFF;text-decoration:none;font-style:normal;font-weight:normal;font-size:18px;font-family:Helvetica, sans-serif;}
#af-form-228731659 .buttonContainer input.submit{width:auto;}
#af-form-228731659 .buttonContainer{text-align:center;}
#af-form-228731659 button,#af-form-228731659 input,#af-form-228731659 submit,#af-form-228731659 textarea,#af-form-228731659 select,#af-form-228731659 label,#af-form-228731659 optgroup,#af-form-228731659 option{float:none;position:static;margin:0;}
#af-form-228731659 div{margin:0;}
#af-form-228731659 form,#af-form-228731659 textarea,.af-form-wrapper,.af-form-close-button,#af-form-228731659 img{float:none;color:inherit;position:static;background-color:none;border:none;margin:0;padding:0;}
#af-form-228731659 input,#af-form-228731659 button,#af-form-228731659 textarea,#af-form-228731659 select{font-size:100%;}
#af-form-228731659 select,#af-form-228731659 label,#af-form-228731659 optgroup,#af-form-228731659 option{padding:0;}
#af-form-228731659,#af-form-228731659 .quirksMode{width:100%;max-width:359px;}
#af-form-228731659.af-quirksMode{overflow-x:hidden;}
#af-form-228731659{background-color:transparent;border-color:#000000;border-width:1px;border-style:none;}
#af-form-228731659{display:block;}
#af-form-228731659{overflow:hidden;}
.af-body .af-textWrap{text-align:left;}
.af-body input.image{border:none!important;}
.af-body input.submit,.af-body input.image,.af-form .af-element input.button{float:none!important;}
.af-body input.submit{white-space:inherit;}
.af-body input.text{width:100%;float:none;padding:2px!important;}
.af-body.af-standards input.submit{padding:4px 12px;}
.af-clear{clear:both;}
.af-element label{text-align:left;display:block;float:left;}
.af-element{padding-bottom:5px;padding-top:5px;}
.af-form-wrapper{text-indent:0;}
.af-form{box-sizing:border-box;text-align:left;margin:auto;}
.af-quirksMode .af-element{padding-left:0!important;padding-right:0!important;}
.lbl-right .af-element label{text-align:right;}
body {
}

#af-form-228731659 {
  border-radius: 6px !important;
  box-shadow: rgba(0, 0, 0, .05) 0px 4px 30px 10px;
}

#af-form-228731659 .bodyText p {
  margin: 0 0 1em !important;
}

#af-form-228731659 .af-body {
  padding-top:
}

#af-form-228731659 .af-body .af-textWrap {
  width: 100% !important;
}

#af-form-228731659 .af-body .af-element {
  padding-top: 0px!important;
  padding-bottom: 0px!important;
}
#af-form-228731659 .af-body .af-element:first-child {
  margin-top: 0 !important;
}
#af-form-228731659 .af-body label.previewLabel {
  font-weight: 700 !important;
  margin-top: 0.25rem !important;
  margin-bottom: .25rem !important;
}
#af-form-228731659 .af-body input.text,
#af-form-228731659 .af-body textarea {
  border-radius: 3px !important;
  box-sizing: border-box !important;
  color: #444444 !important;
  font-size: 1rem !important;
  margin-bottom: 0.75rem !important;
  padding: 8px 12px !important;
  -webkit-transition-duration: 0.3s;
          transition-duration: 0.3s;
}

#af-form-228731659 .af-body select {
  width: 100%;
}
#af-form-228731659 .af-body .af-dateWrap select {
  width: 33%;
}
#af-form-228731659 .choiceList-radio-stacked {
  margin-bottom: 1rem !important;
  width: 100% !important;
}
#af-form-228731659 .af-element-radio {
  margin: 0 !important;
}
#af-form-228731659 .af-element-radio input.radio {
  display: inline;
  height: 0;
  opacity: 0;
  overflow: hidden;
  width: 0;
}
#af-form-228731659 .af-element-radio input.radio:checked ~ label {
  font-weight: 700 !important;
}
#af-form-228731659 .af-element-radio input.radio:focus ~ label {
  box-shadow: inset 0 0 0 2px rgba(25,35,70,.25);
}
#af-form-228731659 .af-element-radio input.radio:checked ~ label:before {
  background-color: #777777;
  border-color: #d6dee3;
}
#af-form-228731659 .af-element-radio label.choice {
  border: 1px solid #d6dee3;
  border-radius: 3px !important;
  display: block !important;
  font-weight: 300 !important;
  margin: 0.5rem 0 !important;
  padding: 1rem 1rem 1rem 2rem !important;
  position: relative;
  -webkit-transition-duration: 0.3s;
          transition-duration: 0.3s;
}
#af-form-228731659 .af-element-radio label.choice:before {
  background-color: #FFF;
  border: 1px solid #d6dee3;
  border-radius: 50%;
  content: '';
  height: 0.75rem;
  margin-left: -1.3rem;
  position: absolute;
  -webkit-transition-duration: 0.3s;
          transition-duration: 0.3s;
  width: 0.75rem;
}
#af-form-228731659 .buttonContainer {
  box-sizing: border-box !important;
}
#af-form-228731659 .af-footer {
  box-sizing: border-box !important;
}

#af-form-228731659 .af-footer p {
  margin: 0 !important;
}
#af-form-228731659 input.submit,
#af-form-228731659 #webFormSubmitButton {
  background-image: none;
  border: none;
  border-radius: 3px !important;
  font-weight: bold;
  margin-top: 0.5rem !important;
  margin-bottom: 0.5rem !Important;
  padding: 0.6rem 2.5rem !important;
  -webkit-transition-duration: 0.3s;
          transition-duration: 0.3s;
}
#af-form-228731659 input.submit:hover,
#af-form-228731659 #webFormSubmitButton:hover {
  cursor: pointer;
  opacity: 0.9;
}

#af-form-228731659 input.text:hover {
  cursor: pointer;
  opacity: 0.9;
}

.poweredBy a,
.privacyPolicy p {
  color: #FFFFFF !important;
  font-size: 0.75rem !important;
}
</style>
<form method="post" class="af-form-wrapper" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl"  >
<div style="display: none;">
<input type="hidden" name="meta_web_form_id" value="228731659" />
<input type="hidden" name="meta_split_id" value="" />
<input type="hidden" name="listname" value="awlist6248764" />
<input type="hidden" name="redirect" value="" id="redirect_b80f38bc63cbb19f4f40dcd984134d25" />

<input type="hidden" name="meta_adtracking" value="Newsletter_Home_Page" />
<input type="hidden" name="meta_message" value="1001" />
<input type="hidden" name="meta_required" value="name,email" />
<input type="hidden" name="meta_forward_vars" value="1" />
<input type="hidden" name="meta_tooltip" value="" />
</div>
<div id="af-form-228731659" class="af-form"><div id="af-body-228731659" class="af-body af-standards">
<div class="af-element">
<label class="previewLabel" for="awf_field-115415168">Nom: </label>
<div class="af-textWrap">
<input id="awf_field-115415168" type="text" name="name" class="text" value=""  onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " tabindex="500" />
</div>
<div class="af-clear"></div></div>
<div class="af-element">
<label class="previewLabel" for="awf_field-115415169">Email: </label>
<div class="af-textWrap"><input class="text" id="awf_field-115415169" type="text" name="email" value="" tabindex="501" onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " />
</div><div class="af-clear"></div>
</div>
<div class="af-element buttonContainer">
<input name="submit" class="submit" type="submit" value="S'inscrire" tabindex="502" />
<div class="af-clear"></div>
</div>
<div class="af-element privacyPolicy" style="text-align: center">
<!--<p>We respect your <a title="Privacy Policy" href="https://www.aweber.com/permission.htm" target="_blank" rel="nofollow">email privacy</a></p>-->
<div class="af-clear"></div>
</div>
<div class="af-element tag" style="display:none;"><input id="awf_tag-115415172" type="hidden" name="tag_115415172" value="newsletter_abonnes" /></div>
</div>
</div>
<div style="display: none;"><img src="https://forms.aweber.com/form/displays.htm?id=TEwc7MyMbKyc" alt="" /></div>
</form>
<script type="text/javascript">
// Special handling for in-app browsers that don't always support new windows
(function() {
    function browserSupportsNewWindows(userAgent) {
        var rules = [
            'FBIOS',
            'Twitter for iPhone',
            'WebView',
            '(iPhone|iPod|iPad)(?!.*Safari\/)',
            'Android.*(wv|\.0\.0\.0)'
        ];
        var pattern = new RegExp('(' + rules.join('|') + ')', 'ig');
        return !pattern.test(userAgent);
    }

    if (!browserSupportsNewWindows(navigator.userAgent || navigator.vendor || window.opera)) {
        document.getElementById('af-form-228731659').parentElement.removeAttribute('target');
    }
})();
</script><script type="text/javascript">
    <!--
    (function() {
        var IE = /@cc_on!@/false;
        if (!IE) { return; }
        if (document.compatMode && document.compatMode == 'BackCompat') {
            if (document.getElementById("af-form-228731659")) {
                document.getElementById("af-form-228731659").className = 'af-form af-quirksMode';
            }
            if (document.getElementById("af-body-228731659")) {
                document.getElementById("af-body-228731659").className = "af-body inline af-quirksMode";
            }
            if (document.getElementById("af-header-228731659")) {
                document.getElementById("af-header-228731659").className = "af-header af-quirksMode";
            }
            if (document.getElementById("af-footer-228731659")) {
                document.getElementById("af-footer-228731659").className = "af-footer af-quirksMode";
            }
        }
    })();
    -->
</script>
<script type="text/javascript">document.getElementById('redirect_b80f38bc63cbb19f4f40dcd984134d25').value = document.location;</script>
<!-- /AWeber Web Form Generator 3.0.1 -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom bg-dark3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-12 text-md-start text-center"> © 2023 <span class="text-white">ls2ec</span>  All Rights Reserved.</div>
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


<script type="text/javascript"> _linkedin_partner_id = "4267169"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(l) { if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])}; window.lintrk.q=[]} var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(window.lintrk); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=4267169&fmt=gif" /> </noscript>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JHVTRFCD8K"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-JHVTRFCD8K');
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


<!-- ls2ec front end -->
<script src="{{ assets   }}js/template.js"></script>
<script>

    $("#testLoad").load("https://www.afroskills.org/");


</script>

<script>
    $(document).on('keypress',function(e) {
        if (e.keyCode === 13){

            var focused = $(':focus');
            alert(focused.html());
            var form = focused.parents('form');
            if( form.length )
            {
                if(!form.find("button").attr('disabled')){
                    form.find("button").trigger('click');
                }

            }
        }

    });
</script>

<script type="text/javascript">
	$(".wrap-zone-ki-defile").owlCarousel({
            margin: 10,
            items:1,
			center: true,
            loop:false,
            dots: false,
            nav:false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplaySpeed: 5000,
            autoplayHoverPause:true,
            smartSpeed: 5000,
            navText:["<div class='nav-btn prev-slide'><i class=\"fa fa-arrow-left\"></i></div>","<div class='nav-btn next-slide'><i class=\"fa fa-arrow-right\"></i></div>"],
            responsive:{
                0:{
                    items:1
                },
                300:{
                    items:1
                },
                600:{
                    items:1
                },
                700:{
                    items:1
                },
                1100:{
                    items:1
                },
                1200:{
                    items:1
                }
            }
		});




</script>



@yield("jsimport")
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="0597d90e-3c84-45a6-b5d7-a4fd23ce0517" data-blockingmode="auto" type="text/javascript"></script>

</body>
</html>



