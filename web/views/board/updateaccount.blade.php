@extends('board.layoutboard')
@section('content')
    <style>
        .cours-search label{
            font-size: 18px;
            color: #ffffff;
        }
    </style>
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        <h4 class="box-title mb-0">
            @tt("My profile")
        </h4>
        <hr>

        <div class="bg-img box box-body py-50" style="background-image: url({{ assets   }}images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white">@tt("Update personnal information")</h1>
                <div class="message"></div>
            </div>

            <div class="row">
                <div class="form col-6 g-0 align-items-center cours-search " style="width: 45%;"id="purchase-token">
                    <label for="">@tt("Nom")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">

                        <input type="text" name="nom" id="nom" value="{{App::$user->getFirstname()}}" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('Nom')">
                    </div>

                </div>
                <div class="form col-6 g-0 align-items-center cours-search" style="width: 45%" id="purchase-token">
                    <label for="">@tt("Prénom")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="text" name="prenom" id="prenom" value="{{App::$user->getLastname()}}" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('prenom')">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="form col-6 g-0 align-items-center cours-search " style="width: 45%;"id="purchase-token">
                    <label for="">@tt("Username")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="text" name="username" id="username2" value="{{App::$user->getUsername()}}" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('username')">
                    </div>

                </div>
                <div class="form col-6 g-0 align-items-center cours-search" style="width: 45%" id="purchase-token">
                    <label for="">@tt("Email")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="email" name="email" value="{{App::$user->getEmail()}}" id="email" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('email')">
                    </div>

                </div>
            </div>

            <div class="message"></div>
            <div class="row">
                <div class="col-6"></div>
                <div class="form col-6 g-0 align-items-center cours-search">
                    <button type="button" onclick="app.updateUser(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Update")</button>


                </div>
            </div>
        </div>

    </div>

    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">

        <div class="bg-img box box-body py-50" style="background-image: url({{ assets   }}images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white">@tt("Update Phone number")</h1>
                <div class="message"></div>
            </div>

            <div class="row">
                <div class="form col-6 g-0 align-items-center cours-search " style="width: 45%;"id="purchase-token">
                    <label for="">@tt("Country")</label>
                    <select class="form-control  input-lg b-0 be-1 border-light rounded-0" onchange="reset()" id="country" style="width: 100%;" name="packtoken">
                        <option selected="selected"  disabled>@tt("Country")</option>
                        @foreach(Country::all() as $country)
                            <option {{ $country->getId() == App::$user->getCountry()->getId() ? 'selected': '' }} value="{{$country->getId()}}"> {{$country->getName()}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form col-6 g-0 align-items-center cours-search" style="width: 45%" id="purchase-token">
                    <label for="">@tt("Phonenumber without country code")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="tel" name="tel" value="{{App::$user->getPhonenumber()}}" id="phonenumber" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('Phonenumber')">
                    </div>

                </div>

                <div class="form col-6 g-0 align-items-center cours-search" hidden="hidden" style="width: 45%" id="code-act">
                    <label for="">@tt("Code d'activation")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="text" name="code"  id="code" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('Code d activation')">
                    </div>

                </div>
                <div class="form col-6 g-0 align-items-center cours-search" hidden="hidden" style="width: 45%" id="pass-word">
                    <label for="">@tt("Password")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="password" name="password"  id="password" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('Mot de passe')">
                    </div>

                </div>

                <div class="message2"></div>

                <div class="form col-6 g-0 align-items-center cours-search" hidden="hidden"  id="updatephonecountry">
                    <button type="button" onclick="app.updatephonorcountrystep2(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Update")</button>
                </div>

            </div>
            <div class="row">
                <div class="col-6"></div>
                <div class="form col-6 g-0 align-items-center cours-search">
                    <button id="updatephonecountry" onclick="app.updatephonorcountrystep2(this)" hidden="hidden"  class="btn w-p100 btn-danger rounded-0">@tt("Update")</button>

                    <button type="button" onclick="app.updatephonorcountrystep1(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Send activation code")</button>
                </div>
            </div>
        </div>

    </div>

    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">

        <div class="bg-img box box-body py-50" style="background-image: url({{ assets   }}images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white">@tt("Mettre à jour son mot de passe")</h1>
                <div class="message"></div>
            </div>

            <div class="row">
                <div class="form col-12 g-0 align-items-center cours-search"  style="width: 100%" id="pass-word">
                    <label for="">@tt("Ancien mot de passe")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="password" name="password"  id="passwordlast" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('Ancien mot de passe')">
                    </div>

                </div>

                <div class="form col-6 g-0 align-items-center cours-search"  style="width: 45%" id="pass-word">
                    <label for="">@tt("Nouveau mot de passe")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="password" name="password"  id="passwordnew" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('Nouveau mot de passe')">
                    </div>

                </div>
                <div class="form col-6 g-0 align-items-center cours-search"  style="width: 45%" id="pass-word">
                    <label for="">@tt("Confirmer le nouveau mot de passe")</label>
                    <div class="form-group mb-lg-0 mb-5 bg-white">
                        <input type="password" name="password"  id="passwordnewconfirm" class="form-control input-lg b-0 be-1 border-light rounded-0"  placeholder="@tt('Confirmer les mot de passe')">
                    </div>

                </div>

                <div class="message2"></div>

                <div class="form col-6 g-0 align-items-center cours-search"   id="updatephonecountry">
                    <button type="button"  onclick="app.changepassword(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Mettre à jour")</button>
                </div>

            </div>
{{--            <div class="row">--}}
{{--                <div class="col-6"></div>--}}
{{--                <div class="form col-6 g-0 align-items-center cours-search">--}}
{{--                    <button id="updatephonecountry" onclick="app.updatephonorcountrystep2(this)" hidden="hidden"  class="btn w-p100 btn-danger rounded-0">@tt("Update")</button>--}}

{{--                    <button type="button" onclick="app.updatephonorcountrystep1(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Send activation code")</button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </div>
@endsection
@section("jsimport")


    <script>

        $('#pack').select2();
        function reset(){
            //alert("maff");
            $("#paypalbtn").html("");
            $("#paypalbtn").attr("hidden",'hidden');
            $('#paymentToken').attr('hidden','hidden');
        }
        $('#qte').on('change keyup', function() {
            reset();
        });
    </script>
@endsection
