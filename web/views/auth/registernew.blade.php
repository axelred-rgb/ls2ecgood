@extends('layout')
@section('content')
    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white">@tt("Register")</h2>

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
                            <h2 class="text-primary">@tt("Get started with Us")</h2>
                            <p class="mb-0">@tt("Register a New Membership")</p>
                        </div>
                        <div class="p-40">
                            {!! Form::open(new user(), ["action" => __env."api/user.create", "method" => "post"]) !!}

                            <div class='form-group'>
                                {!! Form::input('firstname', "", ['class' => 'form-control', 'placeholder' => t('Firstname*')]) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::input('lastname', "", ['class' => 'form-control', 'placeholder' => t('Lastname*')]) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::input('username', "", ['class' => 'form-control', 'placeholder' => t('Username*')]) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::email('email', "", ['class' => 'form-control', 'placeholder' => t('Email*')]) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::select('country.id',
                                    FormManager::Options_Helper('namecode', Country::allrows()),
                                    "",
                                    ['class' => 'form-control', 'placeholder' => t('Select your country*')]); !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::input('telephone', "", ['class' => 'form-control', 'placeholder' => t('phone number without phone code')]) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::input('raison', "", ['class' => 'form-control'], 'hidden') !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::password('password', "", ['class' => 'form-control', 'placeholder' => t('password*')]) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::password('confirmpassword', "", ['class' => 'form-control', 'placeholder' => t('confirm password*')]) !!}
                            </div>
                            <div id="captcha"></div>
                            <h4 class="box-title mb-15 mt-5">
                                <input onchange="cgufunction()"  type="checkbox" id="cgu" name="cgu" value="cgu">
                                <label class="box-title mb-15" for="cgu" style="font-size: 1.2857142857142858rem">
                                    @tt("J'accepte les ") @tt("politique de confidentialité"). @tt("Cliquez") <a target="_blank" style="color:#186209!important;" href="{{__front}}document/PCD.pdf">@tt("ici")</a> @tt("pour les consulter")
                                </label><br>
                            </h4><br>
                            <div class="form-error">
                            </div>

                            <button type="button" onclick="app.register(this)" disabled  class="btn btn-info w-p100 mt-15 submit">@tt("Envoyer")</button>

                            {!! Form::close() !!}
                            <div class="text-center">
                                <p class="mt-15 mb-0">@tt("Already have an account?")<a href="{{route('login')}}" class="text-danger ms-5"> @tt("Log In")</a></p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection
@section("jsimport")
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
    </script>
    <script type="text/javascript">
        let recaptchat = false;
        var verifyCallback = function(response) {
            $("form").attr("action", "{{__env}}"+"api/user.create" );
            recaptchat = true;
            if($('#cgu:checked').length > 0){
                $(".submit").removeAttr("disabled");
            }
        };

        var onloadCallback = function() {

            grecaptcha.render('captcha', {
                'sitekey' : '6LeodRIdAAAAAEQTyVHaynthWv0pXLTHpZy_BeXc',
                'callback' : verifyCallback,
                'theme' : 'light'
            });
        };

        function cgufunction(){

            // ////alert($(this).is(":checked"));
            if($('#cgu:checked').length > 0){
                if(recaptchat){
                    $(".submit").removeAttr("disabled");
                }
            }
            else{
                $(".submit").attr("disabled",true);
            }
        }
    </script>

@endsection