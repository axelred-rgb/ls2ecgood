@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        <h4 class="box-title mb-0">
            @tt("Purshase Tokens")
        </h4>
        <hr>
        
        <div class="bg-img box box-body py-50" style="background-image: url({{ assets   }}images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white">@tt("Purshase Tokens")</h1>
                <div class="message"></div>		
            </div>
            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token"> 
                <div class="form-group col-xl-5 col-lg-5 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                    <select class="form-select" onchange="reset()" id="pack" style="width: 100%;" name="packtoken">
                        <option selected="selected"  disabled>@tt("Tokens")</option>
                        @foreach($packTokens as $packToken)
                            <option value="{{$packToken->id}}">{{$packToken->nombre}} @tt("Tokens")  ({{$packToken->prix}} €) </option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group col-xl-5 col-lg-4 col-12 mb-lg-0 mb-5 bg-white"> 
                    <input type="number" name="quantity" id="qte" class="form-control input-lg b-0 be-1 border-light rounded-0" min="1" placeholder="@tt('quantity')">
                    <input type="hidden" name="user" value="{!! App::$user->getId() !!}">
                </div>
                <div class="col-xl-2 col-lg-3 col-12 mb-0"> 
                    <button onclick="app.buyToken(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Purchase")</button> 

                </div>
            </div>

            <div class="form row g-0 align-items-center cours-search max-w-950" hidden id="paymentToken">
                <table class="table">
                    <thead>
                        <tr class="text-uppercase bg-lightest">
                            <th  style="text-align: center;">@tt("Prix HT")</th>
                            <th  style="text-align: center;">@tt("TVA") (20%)</th>
                            <th  style="text-align: center;">@tt("Prix TTC")</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="Ttcprice" style="text-align: center;font-size: 50px;color: #ffffff;"></td>
                            <td id="TVA" style="text-align: center;font-size: 50px;color: #ffffff;">20%</td>
                            <td id="Totalprice" style="text-align: center;font-size: 50px;color: #ffffff;"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button onclick="app.paymentTokenFinal(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Make a payment")</button>
                            </td>
                        </tr>
                    </tbody> 
                </table>
            </div>
            <div class="messageF"></div>
            <div id="paypalbtn" hidden class="form align-items-center cours-search max-w-950" style="text-align:center"></div>
            
        </div>


        <h4 class="box-title mb-0">
            @tt("My purchases")
        </h4>
        <hr>
        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th>@tt("Date")</th>
                    <th>@tt("Pack")</th>
                    <th>@tt("Unit price")</th>
                    <th>@tt("Quantity")</th>
                    <th>@tt("Total price")</th>
                </tr>
                </thead>
                <tbody>
                    @foreach(array_reverse($user_tokens) as $user_token)
                        <tr>
                            <td>{{$user_token->date}}</td>
                            <td>{{$user_token->packtokken->getNombre()}}</td>
                            <td>{{$user_token->price}} €</td>
                            <td>{{$user_token->quantite}}</td>
                            <td>{{$user_token->quantite*$user_token->price}} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
