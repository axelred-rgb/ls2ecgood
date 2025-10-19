@extends('layout')
@section('content')


    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white">@tt("Checkout")</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->

    <section class="py-50">
        <div class="container">
            <div class="row">


                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">@tt("Product Summary")</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>@tt("Target")</th>
                                        <th>@tt("Plan")</th>
                                        <th>@tt("Unit price")</th>
                                        <th hidden>@tt("Period")</th>
                                        <th>@tt("Code promo")</th>
                                        <th>@tt("Price")</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @if($subscription->getTarget()=="i")
                                            <td>@tt("Individuals")</td>
                                        @else
                                            <td>@tt("Enterprise")</td>
                                        @endif
                                        <td>{{$subscription->getName()}}</td>
                                        <td>
                                            @if(App::$user->getId())
                                                {{$subscription->getM_price('check')}}€  - {{$subscription->getMonth()}} @tt("Month")
                                            @else
                                                {{--												<label style="font-size: 16px; font-weight: bold" for="">@tt('Europe-Amerique-Asie')</label>--}}

                                                {{$subscription->getM_price('check')}} € {{$subscription->getMonth()}} @tt("Month")

                                                {{--												<hr>--}}
                                                {{--												<label style="font-size: 16px; font-weight: bold" for="">@tt('Afrique')</label>--}}
                                                {{--												<label for="">{{$subscription->getY_a_price()}}  € / @tt("Years")</label><br>--}}
                                                {{--												<label for="">{{$subscription->getM_a_price()}}  € / @tt("Months")</label>--}}
                                            @endif
                                        </td>
                                        @if($subscription->getTarget()=="i")

                                            <td hidden>
                                                <?php $a = '12'.tt("mounths")?>
                                                <label for="">@tt("Nombre de mois")</label>
                                                <input type="number" min="1" id="qte" value="{{$subscription->getMonth()}}" style="border-color:#0b8e36" class="form-control">
                                            </td>
                                        @else
                                            <td><?php $a = '5'.tt("days")?> {{$a}}</td>
                                        @endif
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="codepromo" style="border-color:#0b8e36" class="form-control">
                                                <div id="errorcode"></div>
                                                @if(!App::$user->getId())
                                                    <button onclick="location.href='{{route('login')}}';" type="button" class="btn btn-info w-p100 mt-15">@tt("Login to apply promo code")</button>
                                                @else
                                                    <button onclick="checkCode(this)" class="btn btn-primary mt-2">@tt('Appliquer le code promo')</button>
                                                @endif
                                            </div>

                                        </td>
                                        <td id="price">
                                            0 €
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="5" class="text-end">@tt("Total HT")</th>
                                        <th id="pricetotal">
                                            0 €
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-end">@tt("TVA") (20%)</th>
                                        <th id="pricetva">
                                            0 €
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-end">@tt("Total TTC")</th>
                                        <th id="pricetotalttc">
                                            0 €
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            @if(App::$user->getId())
                                <?php $c_subscription = User_subscription::where("this.user_id", App::$user->getId())->andwhere('this.subscription_id',$subscription->getId())->count() ?>

                                @if($c_subscription == 0)
                                    <hr>
                                    <div id="payment_method">
                                        <h4 class="box-title mb-15">@tt("Choose payment Option")</h4>
                                        <div class="tab-content tabcontent-border" >
                                            <div class="tab-pane active" id="pay" role="tabpanel">
                                                <div class="p-30">
                                                    <div id="smart-button-container">
                                                        <div id="messageF"></div>
                                                        <div style="text-align: center;">
                                                            <div id="paypal-button-container"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <?php $a = "user_subscription.created_at";?>
                                    <?php $u_subscription = array_reverse(User_subscription::where("this.user_id", App::$user->getId())->andwhere('this.subscription_id',$subscription->getId())->__getAll())[0] ?>
                                    <?php
                                    $date1 = $u_subscription->$a;
                                    $date2 = date("Y-m-d h:i:s");

                                    $ts1 = strtotime($date1);
                                    $ts2 = strtotime($date2);

                                    $year1 = date('Y', $ts1);
                                    $year2 = date('Y', $ts2);

                                    $month1 = date('m', $ts1);
                                    $month2 = date('m', $ts2);

                                    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                    ?>
                                    @if($diff < 12)
                                        <div class="row justify-content-center g-0">
                                            <div class="col-lg-5 col-md-5 col-12">
                                                <div class="box box-body">

                                                    <div class="content-top-agile pb-0 pt-20">
                                                        <h2 class="text-primary">@tt("Vous avez déja souscrit à cet abonnement ! ")</h2>

                                                    </div>
                                                    <div class="p-40">
                                                        <?php $_SESSION['IDSUBSCRIPTION'] = ""; ?>
                                                        <a href="{{route('myboard')}}" type="button" class="btn btn-info w-p100 mt-15">@tt("Continuer")</a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <hr>
                                        <div id="payment_method">
                                            <h4 class="box-title mb-15">@tt("Choose payment Option")</h4>
                                            <div class="tab-content tabcontent-border" >
                                                <div class="tab-pane active" id="pay" role="tabpanel">
                                                    <div class="p-30">
                                                        <div id="smart-button-container">
                                                            <div id="messageF"></div>
                                                            <div style="text-align: center;">
                                                                <div id="paypal-button-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <button onclick="location.href='{{route('login')}}';" type="button" class="btn btn-info w-p100 mt-15">@tt("Login to Pay")</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








@endsection
@section("jsimport")

    <script src="https://www.paypal.com/sdk/js?client-id=ASq4h0hB7HT_bFKcGu8HFqqPHKOLlu0qszDornLOeSuMOPp9xXbbtQuQ0csML6egXOBLExP-aZDK0kOV&currency=EUR"></script>

{{--    @if(App::$user->getRole() == 3)--}}
{{--    @else--}}
{{--        <script src="https://www.paypal.com/sdk/js?client-id=AX-b9tAA43U18tmHWrPdzgbVRmMTtk4IsqLnkJufx-pSutyEUSQCjnoLTPNaG6ayGUcqcKAd_OtZcpQ1&currency=EUR"></script>--}}
{{--    @endif--}}
    <script src="{{ assets   }}js/paypal.js"></script>
    <script>

        var subscription = '{{$subscription->getId()}}';
        var route = '{{route('confirmorder')}}?id='+subscription;
        var initprice = parseInt('{{$subscription->getM_price('check')}}');
        var inityear = parseInt('{{$subscription->getY_price('check')}}');
        var initpricemonth = parseInt('{{$subscription->getM_price('check')}}');
        var tva = (20*initprice)/100;
        var ttc = initprice + tva;
        var route = '{{route('confirmorder')}}?id='+subscription;
        let nbre_month  = {{$subscription->getMonth()}};


        route = '{{route('confirmordernew')}}?id='+subscription;
        route += '&month='+{{$subscription->getMonth()}};

        setAllprice({{$subscription->getM_price()}});


        // function calculatePrice(){
        // 	alert($(this).val());
        // }
        {{--$("#qte").bind("input", function() {--}}
        {{--    route = '{{route('confirmorder')}}?id='+subscription;--}}
        {{--    nbre_month = $("#qte").val();--}}
        {{--    if(nbre_month == ''){--}}
        {{--        nbre_month = '0';--}}
        {{--    }--}}
        {{--    nbre_month = parseInt({{$subscription->getMonth()}});--}}
        {{--    if(nbre_month >= 12){--}}
        {{--        let nbre_year = parseInt(nbre_month / 12);--}}
        {{--        let nbre_mo = nbre_month % 12;--}}
        {{--        //alert(nbre_mo);--}}
        {{--        initprice = (inityear * nbre_year) + (initpricemonth * nbre_mo);--}}
        {{--        setAllprice(initprice);--}}
        {{--    }--}}
        {{--    else{--}}
        {{--        initprice = initpricemonth * nbre_month;--}}
        {{--        setAllprice(initprice);--}}
        {{--    }--}}
        {{--    route += '&month='+nbre_month;--}}
        {{--    //alert($("#qte").val());--}}
        {{--});--}}
        function checkCode(el){
            model.addLoader($(el));

            var price = initprice;
            let code = $("#codepromo").val();
            $.get(__env+"api/lazyloading.codepromo?dfilters=on&code:eq="+code, function(data, status){
                //data.listEntity;
                model.removeLoader();
                //console.log(data.listEntity[0].valeur);

                $p = price;

                if(data.listEntity.length > 0){
                    //price = price * parseInt(data.listEntity[0].valeur);

                    if(data.listEntity[0].nbremonth == 0 || data.listEntity[0].state != 0){

                        $('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
                    }
                    else{
                        if(data.listEntity[0].nbremonth !== -1){

                            if(data.listEntity[0].code != code){

                                $('#errorcode').html('<span style="color:#fb0202">@tt("code invalide")</span>');
                            }
                            else{
                                if(data.listEntity[0].nbremonth <= nbre_month){
                                    route += '&code=' + data.listEntity[0].id;

                                    price = setAllprice(price, parseInt(data.listEntity[0].valeur) / 100);

                                    $('#errorcode').html('<span style="color:#0b8e36">' + data.listEntity[0].valeur + ' % @tt("de réduction")</span>');
                                }
                                else{
                                    $('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
                                }
                            }

                        }
                        else{
                            route += '&code=' + data.listEntity[0].id;

                            price = setAllprice(price, parseInt(data.listEntity[0].valeur) / 100);

                            $('#errorcode').html('<span style="color:#0b8e36">' + data.listEntity[0].valeur + ' % @tt("de réduction")</span>');
                        }
                    }

                }
                else{
                    $('#errorcode').html('<span style="color:#fb0202">@tt("Code invalide")</span>');
                }
            });
        }


        function setAllprice(price, reduction = 0){
            $p = price;
            price = price * reduction;

            price = $p - price;
            price = Math.round(price * 100) / 100;
            tva = (20*price)/100;
            tva = Math.round(tva * 100) / 100;
            ttc = price + tva;
            ttc = Math.round(ttc * 100) / 100;
            route += '&price='+price;
            route += '&tva='+tva;
            route += '&ttc='+ttc;

            $('#paypal-button-container').empty();
            $a = '';
            if(reduction !== 0){
                $a += '<span style="text-decoration:line-through">'+$p+' €</span><br>';
            }
            $a += '<span>'+price+' €</span>';
            $('#pricetotal').html('<span>'+price+' €</span>');
            $('#pricetva').html('<span>'+tva+' €</span>');
            $('#pricetotalttc').html('<span>'+ttc+' €</span>');
            $('#price').html($a);
            price = ttc;
            route += '&montant='+price;

            //return price;
            purchase(price, 'Euro', 'EUR', "{{$subscription->getName()}}" , '{{$a}}', '#paypal-button-container',function(){ location.href = route; });

        }


        function reset(){
            //alert("maff");
            $("#message").html("");
            $("#paypal-button-container").html("");
            $('#payment_method').attr('hidden','hidden');
        }
        function  aaa(subscription, date){
            alert(subscription);
            alert(date);
        }
        function payment(){
            reset();

            if($('#begindate').val() == ""){
                alert($('#begindate').val());
                $('#message').html(`
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
					</button>
					${'@tt("Vous devez selectionner une date")'}
				</div>
				`);
            }
            else{
                $("#payment_method").removeAttr('hidden');
                var date  = $('#begindate').val();

            }
        }



    </script>
@endsection
