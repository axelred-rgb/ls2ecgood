@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-code-promo" role="tabpanel" aria-labelledby="pills-code-promo-tab">
        <h4 class="box-title mb-0">
            @tt("Code promo")
        </h4>
        <hr>

        <div class="bg-img box box-body py-50" style="background-image: url({{ assets   }}images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white">@tt("Ajouter un code promo")</h1>
            </div>
            <div class="message"></div>
            <div class="form row g-0 align-items-center cours-search max-w-950" id="code-promo">
                <div class="form-group col-xl-3 col-lg-3  col-12 mb-lg-0 mb-5 bg-white ser-slt">
                    <input type="text" name="code" class="form-control input-lg b-0 be-1 border-light rounded-0" min="1"  placeholder="@tt('code')">
                </div>
                <div class="form-group col-xl-3 col-lg-3 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                    <input type="number" name="valeur" class="form-control input-lg b-0 be-1 border-light rounded-0" min="1"  placeholder="@tt('valeur en %')">
                </div>
                <div class="form-group  col-xl-4 col-lg-4 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                    <input type="number" name="condition" class="form-control input-lg b-0 be-1 border-light rounded-0" min="1"  placeholder="@tt('Nombre de mois superieur à')">
                </div>
                <div class="col-xl-2 col-lg-2 col-12 mb-0">
                    <button onclick="app.addCode(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Ajouter")</button>
                </div>
                <div id="payment"></div>
            </div>
        </div>

        <h4 class="box-title mb-0">
            @tt("Liste des codes promo")
        </h4>
        <hr>
        <div class="table-responsive">
            <table class="table no-border">
                <thead>
                <tr class="text-uppercase bg-lightest">
                    <th><span class="text-dark">@tt("Code")</span></th>
                    <th><span class="text-fade">@tt("Valeur")</span></th>
                    <th><span class="text-fade">@tt("Condition")</span></th>
                    <th><span class="text-fade">*</span></th>

                </tr>
                </thead>
                <tbody>
                @foreach(array_reverse($codes) as $code)
                    <tr>
                        <td id="title{{$code->getId()}}">
                            {{$code->getCode()}}
                        </td>

                        <td>
                            {{$code->getValeur()}}
                        </td>
                        <td>
                            {{$code->getCondition()}}
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="getDataDisable('{{$code->getId()}}')" id="buttonDisable"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section("jsimport")
    <script>
        $('select').select2();

        function getDataDisable(user){
            id=user;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want to delete code ') "+title,
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function(){location.href = '{{route("deletecode")}}?id='+id;return false; }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }
    </script>


@endsection
