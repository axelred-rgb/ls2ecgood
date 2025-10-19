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


    <link rel="icon" href="{{ assets   }}images/logo.ico" type="image/icon type">

</head>

<body class="theme-primary">

<!-- The social media icon bar -->
<div class="icon-bar-sticky">
    <a href="https://web.facebook.com/ls2ectraining/" class="waves-effect waves-light btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
    <a href="https://www.linkedin.com/company/ls2ec-training" class="waves-effect waves-light btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>

</div>
<header class="top-bar">
    <div class="topbar">

        <div class="container">
            <div class="row justify-content-end">
                
                <div class="col-lg-6 col-12 xs-mb-10">
                    <div class="topbar-call text-center text-lg-end topbar-right">
                        <ul class="list-inline d-lg-flex justify-content-end">
                            <li class="me-10 ps-10 lng-drop">
                                <select class="header-lang-bx selectpicker" onchange="window.location.href = __env+this.value">
                                    <option  value="{{App::$lang->getIso_code()}}" >
                                        {{App::$lang->getName()}}
                                    </option>

                            @foreach(Dvups_lang::otherLangs(local()) as $lang)
                                        <option value="{{$lang->getIso_code()}}" >

                                                {{$lang->getName()}}

                                        </option>
                            @endforeach

                                </select>
                            </li>
                            @if(App::$user->getId())
                                <li class="me-10 ps-10"><a href="{{route('myboard')}}"><i class="text-white fa fa-user d-md-inline-block d-none"></i> @tt("Account")</a></li>
                                <li class="me-10 ps-10"><a href="{{route('logout')}}"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> @tt("Logout")</a></li>
                             @else
                                <li class="me-10 ps-10"><a href="{{route('register')}}"><i class="text-white fa fa-user d-md-inline-block d-none"></i> @tt("Register")</a></li>
                                <li class="me-10 ps-10"><a href="{{route('login')}}"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> @tt("Login")</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav hidden class="nav-white nav-transparent">
        <div class="nav-header">
            <a href="{{route('home')}}" class="brand">
                <img src="{{ assets   }}images/logo-training.png" alt=""/>
            </a>
            <button class="toggle-bar">
                <span class="ti-menu"></span>
            </button>
        </div>
        <ul class="menu">
            <li>
                <a href="{{route('home')}}">@tt("Home")</a>
            </li>
            <li>
                <a href="{{route('about')}}">@tt("About")</a>
            </li>
            <li class="dropdown">
                <a href="courses_list.html">@tt("Training")</a>
                <ul class="dropdown-menu">
                    @foreach(App::$academies as $academy)
                        <li class="dropdown">
                            <a href="#">{{$academy->getName()}}</a>
                            <ul class="dropdown-menu">
                                @foreach(Courses::where($academy)->__getAll() as $course)
                                    <li><a href="{{route('coursedetail')}}?id={{$course->getId()}}">{{$course->getName()}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{route('pricing')}}">@tt("Pricing")</a>
            </li>
            <li>
                <a href="{{route('bloglist')}}">@tt("Blog")</a>
            </li>
            <li>
                <a href="{{route('investor')}}">@tt("Investors")</a>
            </li>
            <li>
                <a href="{{route('contact')}}">@tt("Contact")</a>
            </li>
        </ul>

        <div class="wrap-search-fullscreen">
            <div class="container">
                <button class="close-search"><span class="ti-close"></span></button>
                <input type="text" placeholder="@tt('Search...')" />
            </div>
        </div>
    </nav>
</header>


@yield("content")

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
<script src="{{ assets   }}vendor_components/select2/dist/js/select2.full.js"></script>
<script src="{{ assets   }}vendor_components/vertical-slider/jquery.vticker-min.js"></script>


<!-- ls2ec front end -->
<script src="{{ assets   }}js/template.js"></script>

@yield("jsimport")
</body>
</html>
