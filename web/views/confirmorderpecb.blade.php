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

    <section data-bs-version="5.1" class="video03 digitalm4_video03 cid-thNjjzg15m mb-25" id="video03-3f">
        <div class="container align-center">

            <div class="row justify-content-center mt-5">

                <div class="col-sm-6 pl-lg-5 pl-md-0 pr-md-0">
                    <h5 class="badge mbr-bold mbr-fonts-style display-7" style="display: block!important;">@tt("Félicitations pour votre abonnement") !</h5>

                    <p class="mbr-text pb-2 align-left mbr-fonts-style display-5">
                        @tt("Etapes à suivre") :
                    </p>
                    <div class="mbr-list mbr-fonts-style display-7">
                        <ul class="list">
                            <li>@tt("Cliquez sur le boutton ci dessous pour créer votre compte sur PECB")</li>
                            <li>@tt("Une fois inscrit connectez vous  à votre compte")</li>
                            <li>@tt("Suivez le cours")</li>
                        </ul>
                    </div>
                    <div class="mbr-section-btn"><a type="submit" class="btn btn-primary display-7" href="https://pecb.com/en/user/checkEmail" target="_blank">
                            @tt("Cliquez ici pour vous inscrire")</a></div>
                </div>
            </div>
        </div>

    </section>

@endsection
