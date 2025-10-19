@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        <h4 class="box-title mb-0">
            @tt("Give tokens")
        </h4>
        <hr>

        <div class="bg-img box box-body py-50" style="background-image: url({{ assets   }}images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white">@tt("Give tokens")</h1>			
            </div>
            <div class="message"></div>
            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token"> 
                <div class="form-group col-xl-5 col-lg-5 col-12 mb-lg-0 mb-5 bg-white ser-slt"> 
                    <select class="form-select" id="pack" style="width: 100%;" name="user">
                        <option selected="selected" disabled>@tt("Users")</option>
                        @foreach($users as $user)
                            <option value="{{$user->getId()}}">{{$user->getFirstName()}} {{$user->getLastName()}} </option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group col-xl-5 col-lg-4 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                    <input type="number" name="quantity" class="form-control input-lg b-0 be-1 border-light rounded-0" min="1" value="1" placeholder="@tt('quantity')">
                </div>
                <div class="col-xl-2 col-lg-3 col-12 mb-0"> 
                    <button onclick="app.giveToken(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Give")</button>
                </div>
                <div id="payment"></div>
            </div>				
        </div>
    </div>
@endsection
@section("jsimport")
    <script>
        $('select').select2();
    </script>
    
@endsection
