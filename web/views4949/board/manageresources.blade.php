@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-payments" role="tabpanel" aria-labelledby="pills-payments-tab">
        <h4 class="box-title mb-0">
            @tt("All products")
        </h4>
        <hr>

        <div class="text-right">
            <button onclick="model._new(this, 'product')" class="btn btn-info pull-right">@tt("Add product")</button>
        </div>

        <!-- Tab panes -->

        {!! ProductTable::init(new Product())
->buildresourcetable()
->setModel("resource")
->render() !!}
    </div>

@endsection

@section("jsimport")
    <script>
        model._visibility = function (el, id, visibility) {
            model.addLoader($(el))
            Drequest.api("update.product?id="+id).data({
                product:{
                    status: visibility
                }
            }).raw((response)=>{
                model.removeLoader()
                if (visibility == 0)
                    $("#"+id).remove()
                else
                    alert("the product is now visible")

                console.log(response)
            })
        }
    </script>
@endsection